<?php

namespace Webkul\Admin\Http\Controllers\AIAssistant;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Services\GroqAIService;

class AIAssistantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected GroqAIService $groqAIService) {}

    /**
     * Handle an incoming chat message and return the AI agent's reply.
     */
    public function ask(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message'           => 'required|string|max:4000',
            'history'           => 'sometimes|array',
            'history.*.role'    => 'required_with:history|string|in:user,assistant',
            'history.*.content' => 'required_with:history|string',
        ]);

        $result = $this->groqAIService->ask(
            $validated['message'],
            $validated['history'] ?? []
        );

        return new JsonResponse($result, $result['error'] ? 502 : 200);
    }
}
