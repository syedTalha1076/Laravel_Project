<!-- AI Assistant Widget (Groq powered) -->
<div
    id="ai-assistant-widget"
    data-ask-url="{{ route('admin.ai_assistant.ask') }}"
>
    <!-- Toggle Button -->
    <button
        type="button"
        id="ai-assistant-toggle"
        aria-label="Open AI Assistant"
    >
        <svg id="ai-assistant-icon-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="26" height="26"><path d="M12 2a7 7 0 0 0-7 7v3.586l-1.707 1.707A1 1 0 0 0 4 16h16a1 1 0 0 0 .707-1.707L19 12.586V9a7 7 0 0 0-7-7Z"/><circle cx="12" cy="9" r="2.5"/></svg>
        <svg id="ai-assistant-icon-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22" style="display:none;"><path d="M18 6 6 18M6 6l12 12"/></svg>
    </button>

    <!-- Chat Panel -->
    <div id="ai-assistant-panel" style="display:none;">
        <div id="ai-assistant-header">
            <span>AI Assistant</span>
            <span id="ai-assistant-subtitle">Powered by Group 17 &middot; Groq</span>
        </div>

        <div id="ai-assistant-messages">
            <div class="ai-msg ai-msg-bot">
                Hi! I'm your CRM AI assistant. Ask me about leads, contacts, products, or anything CRM-related.
            </div>
        </div>

        <div id="ai-assistant-typing" style="display:none;">
            <span></span><span></span><span></span>
        </div>

        <form id="ai-assistant-form" autocomplete="off">
            <input
                type="text"
                id="ai-assistant-input"
                placeholder="Type your message..."
                maxlength="4000"
                required
            />
            <button type="submit" id="ai-assistant-send" aria-label="Send">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
            </button>
        </form>
    </div>
</div>

<style>
    #ai-assistant-widget {
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 10010;
        font-family: inherit;
    }

    #ai-assistant-toggle {
        width: 56px;
        height: 56px;
        border-radius: 9999px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background: linear-gradient(135deg, #1E5F8C, #ff7a29);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        transition: transform 0.15s ease;
    }

    #ai-assistant-toggle:hover {
        transform: scale(1.06);
    }

    #ai-assistant-panel {
        position: absolute;
        right: 0;
        bottom: 70px;
        width: 340px;
        max-width: calc(100vw - 32px);
        height: 460px;
        max-height: calc(100vh - 120px);
        border-radius: 14px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background: #0b1f3a;
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.35);
        border: 1px solid rgba(255, 122, 41, 0.35);
    }

    #ai-assistant-header {
        padding: 12px 16px;
        background: linear-gradient(90deg, #0b1f3a, #123c69);
        color: #fff;
        border-bottom: 2px solid #ff7a29;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    #ai-assistant-header span:first-child {
        font-weight: 700;
        font-size: 14px;
    }

    #ai-assistant-subtitle {
        font-size: 11px;
        opacity: 0.7;
    }

    #ai-assistant-messages {
        flex: 1;
        overflow-y: auto;
        padding: 12px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        background: #0d2440;
    }

    .ai-msg {
        max-width: 85%;
        padding: 8px 12px;
        border-radius: 10px;
        font-size: 13px;
        line-height: 1.45;
        white-space: pre-wrap;
        word-break: break-word;
    }

    .ai-msg-bot {
        align-self: flex-start;
        background: #14304f;
        color: #e7eefb;
        border-bottom-left-radius: 2px;
    }

    .ai-msg-user {
        align-self: flex-end;
        background: linear-gradient(135deg, #1E5F8C, #ff7a29);
        color: #fff;
        border-bottom-right-radius: 2px;
    }

    .ai-msg-error {
        align-self: flex-start;
        background: #4a1b14;
        color: #ffd7cc;
        border-bottom-left-radius: 2px;
    }

    #ai-assistant-typing {
        padding: 0 16px 8px;
        display: flex;
        gap: 4px;
        background: #0d2440;
    }

    #ai-assistant-typing span {
        width: 6px;
        height: 6px;
        border-radius: 9999px;
        background: #ff7a29;
        animation: ai-typing-bounce 1.2s infinite ease-in-out;
    }

    #ai-assistant-typing span:nth-child(2) { animation-delay: 0.15s; }
    #ai-assistant-typing span:nth-child(3) { animation-delay: 0.3s; }

    @keyframes ai-typing-bounce {
        0%, 60%, 100% { transform: translateY(0); opacity: 0.5; }
        30% { transform: translateY(-4px); opacity: 1; }
    }

    #ai-assistant-form {
        display: flex;
        gap: 8px;
        padding: 10px;
        background: #0b1f3a;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    #ai-assistant-input {
        flex: 1;
        border: 1px solid rgba(255, 255, 255, 0.15);
        background: #14304f;
        color: #fff;
        border-radius: 8px;
        padding: 8px 10px;
        font-size: 13px;
        outline: none;
    }

    #ai-assistant-input::placeholder {
        color: rgba(255, 255, 255, 0.45);
    }

    #ai-assistant-input:focus {
        border-color: #ff7a29;
    }

    #ai-assistant-send {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        background: #ff7a29;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    #ai-assistant-send:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    @media (max-width: 480px) {
        #ai-assistant-panel {
            width: calc(100vw - 24px);
            right: -12px;
        }
    }
</style>

<script>
    (function () {
        const widget    = document.getElementById('ai-assistant-widget');
        const toggleBtn = document.getElementById('ai-assistant-toggle');
        const iconOpen  = document.getElementById('ai-assistant-icon-open');
        const iconClose = document.getElementById('ai-assistant-icon-close');
        const panel     = document.getElementById('ai-assistant-panel');
        const messages  = document.getElementById('ai-assistant-messages');
        const typing    = document.getElementById('ai-assistant-typing');
        const form      = document.getElementById('ai-assistant-form');
        const input     = document.getElementById('ai-assistant-input');
        const sendBtn   = document.getElementById('ai-assistant-send');
        const askUrl    = widget.dataset.askUrl;

        let history = [];
        let isOpen = false;
        let isSending = false;

        function toggle() {
            isOpen = !isOpen;
            panel.style.display = isOpen ? 'flex' : 'none';
            iconOpen.style.display = isOpen ? 'none' : 'block';
            iconClose.style.display = isOpen ? 'block' : 'none';

            if (isOpen) {
                input.focus();
                messages.scrollTop = messages.scrollHeight;
            }
        }

        function appendMessage(text, role) {
            const bubble = document.createElement('div');
            bubble.className = 'ai-msg ' + (
                role === 'user' ? 'ai-msg-user' : (role === 'error' ? 'ai-msg-error' : 'ai-msg-bot')
            );
            bubble.textContent = text;
            messages.appendChild(bubble);
            messages.scrollTop = messages.scrollHeight;
        }

        async function sendMessage(message) {
            isSending = true;
            sendBtn.disabled = true;
            typing.style.display = 'flex';
            messages.scrollTop = messages.scrollHeight;

            try {
                const csrfMeta = document.querySelector('meta[name="csrf-token"]');

                const response = await fetch(askUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        ...(csrfMeta ? { 'X-CSRF-TOKEN': csrfMeta.content } : {}),
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({ message: message, history: history }),
                });

                const data = await response.json();

                typing.style.display = 'none';

                appendMessage(data.reply, data.error ? 'error' : 'bot');

                if (!data.error) {
                    history.push({ role: 'user', content: message });
                    history.push({ role: 'assistant', content: data.reply });
                    history = history.slice(-10);
                }
            } catch (e) {
                typing.style.display = 'none';
                appendMessage('Sorry, something went wrong while reaching the AI assistant.', 'error');
            } finally {
                isSending = false;
                sendBtn.disabled = false;
            }
        }

        toggleBtn.addEventListener('click', toggle);

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const message = input.value.trim();

            if (!message || isSending) {
                return;
            }

            appendMessage(message, 'user');
            input.value = '';
            sendMessage(message);
        });
    })();
</script>
