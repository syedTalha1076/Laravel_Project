@php
    /**
     * Voice navigation command map.
     *
     * Each entry maps one or more spoken keywords to an admin route.
     * Route::has(...) guards against modules that may not be registered
     * in a given installation, so nothing breaks if a route is missing.
     */
    $voiceCommandDefs = [
        ['keywords' => ['dashboard', 'home', 'main page'], 'route' => 'admin.dashboard.index', 'label' => 'Dashboard'],

        ['keywords' => ['lead', 'leads'], 'route' => 'admin.leads.index', 'label' => 'Leads'],
        ['keywords' => ['create lead', 'new lead', 'add lead', 'add new lead'], 'route' => 'admin.leads.create', 'label' => 'Create Lead'],

        ['keywords' => ['quote', 'quotes'], 'route' => 'admin.quotes.index', 'label' => 'Quotes'],
        ['keywords' => ['create quote', 'new quote', 'add quote', 'add new quote'], 'route' => 'admin.quotes.create', 'label' => 'Create Quote'],

        ['keywords' => ['mail', 'email', 'emails', 'inbox'], 'route' => 'admin.mail.index', 'params' => ['route' => 'inbox'], 'label' => 'Inbox'],
        ['keywords' => ['draft', 'drafts'], 'route' => 'admin.mail.index', 'params' => ['route' => 'draft'], 'label' => 'Drafts'],
        ['keywords' => ['outbox'], 'route' => 'admin.mail.index', 'params' => ['route' => 'outbox'], 'label' => 'Outbox'],
        ['keywords' => ['sent', 'sent mail', 'sent items'], 'route' => 'admin.mail.index', 'params' => ['route' => 'sent'], 'label' => 'Sent'],
        ['keywords' => ['trash', 'deleted mail', 'deleted emails'], 'route' => 'admin.mail.index', 'params' => ['route' => 'trash'], 'label' => 'Trash'],

        ['keywords' => ['activity', 'activities'], 'route' => 'admin.activities.index', 'label' => 'Activities'],

        ['keywords' => ['contact', 'contacts', 'person', 'persons', 'people'], 'route' => 'admin.contacts.persons.index', 'label' => 'Contacts'],
        ['keywords' => ['create contact', 'new contact', 'add contact', 'add person'], 'route' => 'admin.contacts.persons.create', 'label' => 'Create Contact'],
        ['keywords' => ['organization', 'organizations', 'company', 'companies'], 'route' => 'admin.contacts.organizations.index', 'label' => 'Organizations'],
        ['keywords' => ['create organization', 'new organization', 'add organization', 'add company'], 'route' => 'admin.contacts.organizations.create', 'label' => 'Create Organization'],

        ['keywords' => ['product', 'products'], 'route' => 'admin.products.index', 'label' => 'Products'],
        ['keywords' => ['create product', 'new product', 'add product'], 'route' => 'admin.products.create', 'label' => 'Create Product'],

        ['keywords' => ['setting', 'settings'], 'route' => 'admin.settings.index', 'label' => 'Settings'],
        ['keywords' => ['group', 'groups', 'user group', 'user groups'], 'route' => 'admin.settings.groups.index', 'label' => 'Groups'],
        ['keywords' => ['role', 'roles'], 'route' => 'admin.settings.roles.index', 'label' => 'Roles'],
        ['keywords' => ['user', 'users', 'team member', 'team members'], 'route' => 'admin.settings.users.index', 'label' => 'Users'],
        ['keywords' => ['pipeline', 'pipelines'], 'route' => 'admin.settings.pipelines.index', 'label' => 'Pipelines'],
        ['keywords' => ['source', 'sources', 'lead source', 'lead sources'], 'route' => 'admin.settings.sources.index', 'label' => 'Sources'],
        ['keywords' => ['type', 'types', 'lead type', 'lead types'], 'route' => 'admin.settings.types.index', 'label' => 'Types'],
        ['keywords' => ['warehouse', 'warehouses'], 'route' => 'admin.settings.warehouses.index', 'label' => 'Warehouses'],
        ['keywords' => ['attribute', 'attributes'], 'route' => 'admin.settings.attributes.index', 'label' => 'Attributes'],
        ['keywords' => ['email template', 'email templates', 'template', 'templates'], 'route' => 'admin.settings.email_templates.index', 'label' => 'Email Templates'],
        ['keywords' => ['event', 'events'], 'route' => 'admin.settings.marketing.events.index', 'label' => 'Events'],
        ['keywords' => ['campaign', 'campaigns'], 'route' => 'admin.settings.marketing.campaigns.index', 'label' => 'Campaigns'],
        ['keywords' => ['webhook', 'webhooks'], 'route' => 'admin.settings.webhooks.index', 'label' => 'Webhooks'],
        ['keywords' => ['workflow', 'workflows'], 'route' => 'admin.settings.workflows.index', 'label' => 'Workflows'],
        ['keywords' => ['data transfer', 'import', 'imports'], 'route' => 'admin.settings.data_transfer.imports.index', 'label' => 'Data Transfer'],
        ['keywords' => ['web form', 'web forms', 'webform', 'webforms'], 'route' => 'admin.settings.web_forms.index', 'label' => 'Web Forms'],
        ['keywords' => ['tag', 'tags'], 'route' => 'admin.settings.tags.index', 'label' => 'Tags'],

        ['keywords' => ['configuration', 'config'], 'route' => 'admin.configuration.index', 'label' => 'Configuration'],

        ['keywords' => ['my account', 'account', 'profile'], 'route' => 'admin.user.account.edit', 'label' => 'My Account'],

        ['keywords' => ['customer', 'customers'], 'route' => 'admin.customers.index', 'label' => 'Customers'],
        ['keywords' => ['create customer', 'new customer', 'add customer'], 'route' => 'admin.customers.create', 'label' => 'Create Customer'],

        ['keywords' => ['follow up', 'follow ups', 'followup', 'followups', 'follow-up', 'follow-ups', 'schedule follow up'], 'route' => 'admin.follow-ups.index', 'label' => 'Follow-Ups'],
        ['keywords' => ['create follow up', 'new follow up', 'schedule follow up', 'add follow up'], 'route' => 'admin.follow-ups.create', 'label' => 'Schedule Follow-Up'],

        ['keywords' => ['sales report', 'sales reports', 'report', 'reports'], 'route' => 'admin.sales-reports.index', 'label' => 'Sales Reports'],

        ['keywords' => ['activity log', 'activity logs', 'audit log', 'audit logs', 'user log', 'logs'], 'route' => 'admin.activity-log.index', 'label' => 'Activity Log'],
    ];

    $voiceCommandsJs = [];

    foreach ($voiceCommandDefs as $def) {
        if (\Illuminate\Support\Facades\Route::has($def['route'])) {
            $voiceCommandsJs[] = [
                'keywords' => $def['keywords'],
                'url'      => route($def['route'], $def['params'] ?? []),
                'label'    => $def['label'],
            ];
        }
    }
@endphp

<!-- Voice Command Widget (Web Speech API powered, navigates by spoken section name) -->
<div id="voice-command-widget">
    <!-- Toggle Button -->
    <button
        type="button"
        id="voice-command-toggle"
        aria-label="Activate voice navigation"
    >
        <span id="voice-command-pulse"></span>
        <svg id="voice-command-icon-idle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3Z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
        <svg id="voice-command-icon-active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" style="display:none;"><rect x="6" y="6" width="12" height="12" rx="2"/></svg>
    </button>

    <!-- Panel -->
    <div id="voice-command-panel" style="display:none;">
        <div id="voice-command-header">
            <span>Voice Navigation</span>
            <button type="button" id="voice-command-close" aria-label="Close voice navigation">&times;</button>
        </div>

        <p id="voice-command-status">Tap the mic and say a section name.</p>

        <div id="voice-command-transcript-wrap">
            <p id="voice-command-transcript">&nbsp;</p>
        </div>

        <div id="voice-command-feedback" style="display:none;"></div>

        <button type="button" id="voice-command-help-toggle">What can I say?</button>

        <div id="voice-command-help-list" style="display:none;">
            <p>Say things like:</p>
            <ul>
                <li>"open leads" &middot; "open contacts" &middot; "open products"</li>
                <li>"open quotes" &middot; "open settings" &middot; "open dashboard"</li>
                <li>"create lead" &middot; "add contact" &middot; "new product"</li>
                <li>"open inbox" &middot; "open activities" &middot; "open users"</li>
                <li>"go back" &middot; "scroll down" &middot; "logout"</li>
                <li>"open camera" &middot; "camera" &middot; "close camera"</li>
                <li>"customers" &middot; "follow up" &middot; "sales reports" &middot; "activity log"</li>
            </ul>
        </div>
    </div>
</div>

<style>
    #voice-command-widget {
        position: fixed;
        left: 24px;
        bottom: 24px;
        z-index: 10010;
        font-family: inherit;
    }

    #voice-command-toggle {
        position: relative;
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

    #voice-command-toggle:hover {
        transform: scale(1.06);
    }

    #voice-command-toggle:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    #voice-command-pulse {
        position: absolute;
        inset: -6px;
        border-radius: 9999px;
        border: 2px solid #ff4d4d;
        opacity: 0;
        pointer-events: none;
    }

    #voice-command-widget.vc-listening #voice-command-pulse {
        opacity: 1;
        animation: voice-command-ping 1.4s infinite ease-out;
    }

    #voice-command-widget.vc-listening #voice-command-toggle {
        background: linear-gradient(135deg, #c62828, #ff7a29);
    }

    @keyframes voice-command-ping {
        0%   { transform: scale(1);   opacity: 0.8; }
        70%  { transform: scale(1.35); opacity: 0; }
        100% { transform: scale(1.35); opacity: 0; }
    }

    #voice-command-panel {
        position: absolute;
        left: 0;
        bottom: 70px;
        width: 300px;
        max-width: calc(100vw - 32px);
        border-radius: 14px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background: #0b1f3a;
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.35);
        border: 1px solid rgba(255, 122, 41, 0.35);
    }

    #voice-command-header {
        padding: 12px 14px;
        background: linear-gradient(90deg, #0b1f3a, #123c69);
        color: #fff;
        border-bottom: 2px solid #ff7a29;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 700;
        font-size: 14px;
    }

    #voice-command-close {
        background: none;
        border: none;
        color: #fff;
        font-size: 18px;
        line-height: 1;
        cursor: pointer;
        opacity: 0.75;
    }

    #voice-command-close:hover {
        opacity: 1;
    }

    #voice-command-status {
        margin: 0;
        padding: 10px 14px 0;
        font-size: 12px;
        color: #b9cce4;
    }

    #voice-command-transcript-wrap {
        padding: 6px 14px 8px;
        min-height: 20px;
    }

    #voice-command-transcript {
        margin: 0;
        font-size: 13px;
        font-style: italic;
        color: #e7eefb;
        word-break: break-word;
    }

    #voice-command-feedback {
        margin: 0 14px 10px;
        padding: 8px 10px;
        border-radius: 8px;
        font-size: 12px;
        line-height: 1.4;
    }

    #voice-command-feedback.vc-feedback-success {
        background: rgba(46, 160, 67, 0.15);
        color: #7ee7a0;
        border: 1px solid rgba(46, 160, 67, 0.35);
    }

    #voice-command-feedback.vc-feedback-error {
        background: rgba(220, 38, 38, 0.15);
        color: #ffb3b3;
        border: 1px solid rgba(220, 38, 38, 0.35);
    }

    #voice-command-feedback.vc-feedback-info {
        background: rgba(30, 95, 140, 0.2);
        color: #cfe3ff;
        border: 1px solid rgba(30, 95, 140, 0.4);
    }

    #voice-command-help-toggle {
        margin: 0 14px 10px;
        align-self: flex-start;
        background: none;
        border: none;
        color: #ff9d5c;
        font-size: 12px;
        cursor: pointer;
        padding: 0;
        text-decoration: underline;
    }

    #voice-command-help-list {
        margin: 0 14px 14px;
        padding: 10px;
        border-radius: 8px;
        background: #14304f;
        color: #d9e6f7;
        font-size: 11.5px;
        line-height: 1.6;
    }

    #voice-command-help-list p {
        margin: 0 0 4px;
        font-weight: 700;
        color: #fff;
    }

    #voice-command-help-list ul {
        margin: 0;
        padding-left: 16px;
    }

    @media (max-width: 480px) {
        #voice-command-panel {
            width: calc(100vw - 24px);
            left: -12px;
        }
    }
</style>

<script>
    (function () {
        const widget       = document.getElementById('voice-command-widget');
        const toggleBtn     = document.getElementById('voice-command-toggle');
        const closeBtn      = document.getElementById('voice-command-close');
        const panel         = document.getElementById('voice-command-panel');
        const statusEl      = document.getElementById('voice-command-status');
        const transcriptEl  = document.getElementById('voice-command-transcript');
        const feedbackEl    = document.getElementById('voice-command-feedback');
        const iconIdle       = document.getElementById('voice-command-icon-idle');
        const iconActive     = document.getElementById('voice-command-icon-active');
        const helpToggle     = document.getElementById('voice-command-help-toggle');
        const helpList       = document.getElementById('voice-command-help-list');

        if (!widget) {
            return;
        }

        const navCommands = @json($voiceCommandsJs);

        // Utility / control commands that perform an in-page action instead of navigating.
        const actionCommands = [
            {
                keywords: ['logout', 'log out', 'sign out', 'sign me out'],
                label: 'Logout',
                action: function () {
                    const form = document.getElementById('adminLogout');
                    if (form) {
                        form.submit();
                    }
                },
            },
            {
                keywords: ['go back', 'navigate back', 'previous page', 'back'],
                label: 'Back',
                action: function () { history.back(); },
            },
            {
                keywords: ['refresh', 'reload', 'reload page', 'refresh page'],
                label: 'Refresh',
                action: function () { location.reload(); },
            },
            {
                keywords: ['scroll down'],
                label: 'Scroll down',
                action: function () { window.scrollBy({ top: 600, behavior: 'smooth' }); },
            },
            {
                keywords: ['scroll up'],
                label: 'Scroll up',
                action: function () { window.scrollBy({ top: -600, behavior: 'smooth' }); },
            },
            {
                keywords: ['scroll to top', 'top of page', 'top of the page'],
                label: 'Top of page',
                action: function () { window.scrollTo({ top: 0, behavior: 'smooth' }); },
            },
        ];

        const navigationPrefixes = [
            'can you please open', 'can you please go to', 'can you open', 'can you go to',
            'could you open', 'could you go to', 'please open', 'please go to', 'please show',
            'navigate to', 'take me to', 'switch to',
            'go to', 'go open',
            'open the', 'open',
            'show me the', 'show me', 'show',
            'display the', 'display',
        ];

        function normalize(text) {
            return (text || '')
                .toLowerCase()
                .replace(/[.,!?]/g, '')
                .replace(/\s+/g, ' ')
                .trim();
        }

        function stripNavigationPrefix(text) {
            for (let i = 0; i < navigationPrefixes.length; i++) {
                const prefix = navigationPrefixes[i];
                if (text === prefix) {
                    return '';
                }
                if (text.indexOf(prefix + ' ') === 0) {
                    return text.slice(prefix.length).trim();
                }
            }
            return text;
        }

        function findCommand(transcript) {
            const raw = normalize(transcript);
            const stripped = stripNavigationPrefix(raw);
            const allCommands = navCommands.concat(actionCommands);

            // Pass 1: exact match (most reliable).
            for (let i = 0; i < allCommands.length; i++) {
                const cmd = allCommands[i];
                for (let j = 0; j < cmd.keywords.length; j++) {
                    const kw = cmd.keywords[j];
                    if (raw === kw || stripped === kw) {
                        return cmd;
                    }
                }
            }

            // Pass 2: longest keyword contained in the phrase wins (avoids
            // "lead" matching inside "create lead" when the more specific
            // command should be picked).
            let best = null;
            let bestLen = 0;
            for (let i = 0; i < allCommands.length; i++) {
                const cmd = allCommands[i];
                for (let j = 0; j < cmd.keywords.length; j++) {
                    const kw = cmd.keywords[j];
                    if ((stripped.indexOf(kw) !== -1 || raw.indexOf(kw) !== -1) && kw.length > bestLen) {
                        best = cmd;
                        bestLen = kw.length;
                    }
                }
            }

            return best;
        }

        const SpeechRecognitionImpl = window.SpeechRecognition || window.webkitSpeechRecognition;

        if (!SpeechRecognitionImpl) {
            toggleBtn.addEventListener('click', function () {
                panel.style.display = 'flex';
                statusEl.textContent = 'Voice commands need Chrome or Edge on a secure (https) connection.';
            });
            return;
        }

        const recognition = new SpeechRecognitionImpl();
        recognition.lang = 'en-US';
        recognition.continuous = true;
        recognition.interimResults = true;
        recognition.maxAlternatives = 3;

        let isListening = false;
        let manualStop = true;

        function setListeningUI(active) {
            isListening = active;
            widget.classList.toggle('vc-listening', active);
            iconIdle.style.display = active ? 'none' : 'block';
            iconActive.style.display = active ? 'block' : 'none';
            statusEl.textContent = active
                ? 'Listening... say a section name.'
                : 'Tap the mic and say a section name.';
        }

        function showFeedback(text, type) {
            feedbackEl.textContent = text;
            feedbackEl.className = 'vc-feedback-' + (type || 'info');
            feedbackEl.style.display = 'block';
        }

        function speak(text) {
            if (!('speechSynthesis' in window)) {
                return;
            }
            try {
                const utter = new SpeechSynthesisUtterance(text);
                utter.rate = 1.05;
                window.speechSynthesis.speak(utter);
            } catch (e) {
                // Speech synthesis is a nice-to-have; ignore failures silently.
            }
        }

        function handleTranscript(transcript) {
            transcriptEl.textContent = '"' + transcript + '"';

            const match = findCommand(transcript);

            if (!match) {
                showFeedback("Sorry, I didn't recognize that command.", 'error');
                speak("Sorry, I didn't catch that command.");
                return;
            }

            showFeedback('Opening ' + match.label + '...', 'success');
            speak('Opening ' + match.label);

            if (match.action) {
                setTimeout(match.action, 250);
            } else if (match.url) {
                setTimeout(function () {
                    window.location.href = match.url;
                }, 450);
            }
        }

        recognition.addEventListener('result', function (event) {
            let finalTranscript = '';

            for (let i = event.resultIndex; i < event.results.length; i++) {
                if (event.results[i].isFinal) {
                    finalTranscript += event.results[i][0].transcript;
                } else {
                    transcriptEl.textContent = '"' + event.results[i][0].transcript + '"';
                }
            }

            if (finalTranscript.trim()) {
                handleTranscript(finalTranscript.trim());
            }
        });

        recognition.addEventListener('end', function () {
            setListeningUI(false);

            if (!manualStop) {
                setTimeout(function () {
                    if (!manualStop) {
                        try {
                            recognition.start();
                            setListeningUI(true);
                        } catch (e) {
                            // Ignore - recognition may already be running.
                        }
                    }
                }, 300);
            }
        });

        recognition.addEventListener('error', function (event) {
            setListeningUI(false);

            if (event.error === 'not-allowed' || event.error === 'service-not-allowed') {
                manualStop = true;
                showFeedback('Microphone access was blocked. Please allow microphone permission.', 'error');
            } else if (event.error === 'no-speech') {
                showFeedback('No speech detected. Tap the mic and try again.', 'info');
            } else if (event.error !== 'aborted') {
                showFeedback('Voice recognition error: ' + event.error, 'error');
            }
        });

        function startListening() {
            manualStop = false;
            transcriptEl.textContent = '\u00A0';
            feedbackEl.style.display = 'none';
            try {
                recognition.start();
                setListeningUI(true);
            } catch (e) {
                // Already started - ignore.
            }
        }

        function stopListening() {
            manualStop = true;
            try {
                recognition.stop();
            } catch (e) {
                // Ignore.
            }
            setListeningUI(false);
        }

        toggleBtn.addEventListener('click', function () {
            panel.style.display = 'flex';

            if (isListening) {
                stopListening();
            } else {
                startListening();
            }
        });

        closeBtn.addEventListener('click', function () {
            stopListening();
            panel.style.display = 'none';
        });

        helpToggle.addEventListener('click', function () {
            const isHidden = helpList.style.display === 'none';
            helpList.style.display = isHidden ? 'block' : 'none';
            helpToggle.textContent = isHidden ? 'Hide examples' : 'What can I say?';
        });
    })();
</script>
