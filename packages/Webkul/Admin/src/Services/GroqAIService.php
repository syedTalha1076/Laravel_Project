<?php

namespace Webkul\Admin\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Webkul\Contact\Repositories\PersonRepository;
use Webkul\Lead\Repositories\LeadRepository;
use Webkul\Product\Repositories\ProductRepository;

class GroqAIService
{
    /**
     * Create a new service instance.
     */
    public function __construct(
        protected LeadRepository $leadRepository,
        protected ProductRepository $productRepository,
        protected PersonRepository $personRepository
    ) {}

    /**
     * Send a message to the Groq AI agent and get a reply.
     *
     * Accepts the new user message plus the recent conversation history so
     * the agent has memory of the current chat session (history is kept on
     * the client side and re-sent with every request, since Groq's API is
     * stateless).
     *
     * @param  array<int, array{role: string, content: string}>  $history
     * @return array{reply: string, error: bool}
     */
    public function ask(string $message, array $history = []): array
    {
        $apiKey = config('services.groq.key');

        if (empty($apiKey)) {
            return [
                'reply' => 'The AI assistant is not configured yet. Please set GROQ_API_KEY in the .env file.',
                'error' => true,
            ];
        }

        $messages = array_merge(
            [['role' => 'system', 'content' => $this->buildSystemPrompt()]],
            $this->sanitizeHistory($history),
            [['role' => 'user', 'content' => $message]]
        );

        try {
            $response = Http::withToken($apiKey)
                ->timeout(30)
                ->post(config('services.groq.url'), [
                    'model'       => config('services.groq.model'),
                    'messages'    => $messages,
                    'temperature' => 0.6,
                    'max_tokens'  => 1024,
                ]);

            if ($response->failed()) {
                Log::error('Groq AI request failed', [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);

                return [
                    'reply' => 'Sorry, the AI assistant could not be reached right now. Please try again in a moment.',
                    'error' => true,
                ];
            }

            $reply = $response->json('choices.0.message.content');

            return [
                'reply' => $reply ?: "Sorry, I didn't get a response. Please try rephrasing your question.",
                'error' => false,
            ];
        } catch (\Throwable $e) {
            Log::error('Groq AI request exception', ['message' => $e->getMessage()]);

            return [
                'reply' => 'Sorry, something went wrong while contacting the AI assistant.',
                'error' => true,
            ];
        }
    }

    /**
     * Build a system prompt that gives the agent live, lightweight context
     * about this CRM instance so its answers are grounded and useful.
     */
    protected function buildSystemPrompt(): string
    {
        try {
            $totalLeads = $this->leadRepository->count();
            $totalPersons = $this->personRepository->count();
            $totalProducts = $this->productRepository->count();
        } catch (\Throwable $e) {
            $totalLeads = $totalPersons = $totalProducts = 'unknown';
        }

        return <<<PROMPT
            You are the AI assistant built into a Laravel-based CRM admin panel.
            Help the logged-in staff member with questions about using the CRM
            (leads, contacts, products, quotes, activities, settings), general
            sales/CRM advice, and quick calculations or drafting (e.g. follow-up
            emails). Keep answers concise and practical, formatted in plain text
            or simple markdown.

            Current CRM snapshot (for context only, do not repeat unless asked):
            - Total leads: {$totalLeads}
            - Total contacts: {$totalPersons}
            - Total products: {$totalProducts}

            You do not have direct database access beyond these counts, so do not
            invent specific record details (names, amounts, dates) that were not
            given to you in the conversation.
            PROMPT;
    }

    /**
     * Keep only valid role/content pairs and cap history length to avoid
     * unbounded token growth.
     *
     * @param  array<int, array{role: string, content: string}>  $history
     * @return array<int, array{role: string, content: string}>
     */
    protected function sanitizeHistory(array $history): array
    {
        $allowedRoles = ['user', 'assistant'];

        $clean = [];

        foreach ($history as $entry) {
            if (
                isset($entry['role'], $entry['content'])
                && in_array($entry['role'], $allowedRoles, true)
                && is_string($entry['content'])
                && $entry['content'] !== ''
            ) {
                $clean[] = [
                    'role'    => $entry['role'],
                    'content' => mb_substr($entry['content'], 0, 4000),
                ];
            }
        }

        // Keep only the last 10 messages to stay within context limits.
        return array_slice($clean, -10);
    }
}
