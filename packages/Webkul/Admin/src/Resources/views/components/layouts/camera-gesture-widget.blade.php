@php
    /**
     * Camera Gesture Navigation — same command map as voice widget.
     * Uses MediaPipe Hands (CDN, no subscription) to detect finger
     * hover + pinch/push gesture for navigation.
     */
    $gestureCommandDefs = [
        ['label' => 'Dashboard',       'route' => 'admin.dashboard.index',                          'icon' => '🏠'],
        ['label' => 'Leads',           'route' => 'admin.leads.index',                              'icon' => '🎯'],
        ['label' => 'Create Lead',     'route' => 'admin.leads.create',                             'icon' => '➕'],
        ['label' => 'Quotes',          'route' => 'admin.quotes.index',                             'icon' => '📋'],
        ['label' => 'Contacts',        'route' => 'admin.contacts.persons.index',                   'icon' => '👥'],
        ['label' => 'Organizations',   'route' => 'admin.contacts.organizations.index',             'icon' => '🏢'],
        ['label' => 'Activities',      'route' => 'admin.activities.index',                         'icon' => '📅'],
        ['label' => 'Products',        'route' => 'admin.products.index',                           'icon' => '📦'],
        ['label' => 'Inbox',           'route' => 'admin.mail.index',    'params' => ['route' => 'inbox'], 'icon' => '📧'],
        ['label' => 'Settings',        'route' => 'admin.settings.index',       'icon' => '⚙️'],
        ['label' => 'Configuration',   'route' => 'admin.configuration.index',  'icon' => '🔧'],
        ['label' => 'Customers',       'route' => 'admin.customers.index',       'icon' => '👤'],
        ['label' => 'Follow-Ups',      'route' => 'admin.follow-ups.index',      'icon' => '📞'],
        ['label' => 'Sales Reports',   'route' => 'admin.sales-reports.index',   'icon' => '📊'],
        ['label' => 'Activity Log',    'route' => 'admin.activity-log.index',    'icon' => '📋'],
    ];

    $gestureNavJs = [];
    foreach ($gestureCommandDefs as $def) {
        if (\Illuminate\Support\Facades\Route::has($def['route'])) {
            $gestureNavJs[] = [
                'label' => $def['label'],
                'url'   => route($def['route'], $def['params'] ?? []),
                'icon'  => $def['icon'],
            ];
        }
    }
@endphp

<!-- ═══════════════════════════════════════════════════════════
     Camera Gesture Navigation Widget
     HOW IT WORKS:
       1. Tap the camera button (bottom-left, above the mic button).
       2. A panel opens showing your webcam feed + a menu list.
       3. Move your index finger over a menu item to highlight it
          (the item glows orange as you hover).
       4. To OPEN the highlighted item: close your hand into a
          fist (all fingers down) — think of it as "pushing" or
          "grabbing" the option.
       5. The page navigates to that section.
     ═══════════════════════════════════════════════════════════ -->

<div id="cam-gesture-widget">
    <!-- Toggle button -->
    <button type="button" id="cam-gesture-toggle" aria-label="Activate camera gesture navigation">
        <span id="cam-gesture-pulse"></span>
        <!-- Camera icon (idle) -->
        <svg id="cam-icon-idle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
            <path d="M23 7 16 12 23 17V7z"/>
            <rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>
        </svg>
        <!-- Stop icon (active) -->
        <svg id="cam-icon-active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round" width="22" height="22"
             style="display:none;">
            <rect x="6" y="6" width="12" height="12" rx="2"/>
        </svg>
    </button>

    <!-- Panel -->
    <div id="cam-gesture-panel" style="display:none;">
        <div id="cam-gesture-header">
            <span>👆 Gesture Navigation</span>
            <button type="button" id="cam-gesture-close" aria-label="Close gesture navigation">&times;</button>
        </div>

        <div id="cam-gesture-body">
            <!-- Left: camera feed + canvas overlay -->
            <div id="cam-gesture-feed-wrap">
                <video id="cam-gesture-video" autoplay playsinline muted></video>
                <canvas id="cam-gesture-canvas"></canvas>
                <div id="cam-gesture-status-bar">
                    <span id="cam-gesture-status">Starting camera…</span>
                </div>
            </div>

            <!-- Right: nav menu -->
            <div id="cam-gesture-menu">
                <p id="cam-menu-hint">Point to an item, then make a fist to open it</p>
                <ul id="cam-menu-list">
                    @foreach($gestureNavJs as $item)
                        <li class="cam-menu-item"
                            data-url="{{ $item['url'] }}"
                            data-label="{{ $item['label'] }}">
                            <span class="cam-menu-icon">{{ $item['icon'] }}</span>
                            <span class="cam-menu-label">{{ $item['label'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Feedback bar -->
        <div id="cam-gesture-feedback" style="display:none;"></div>
    </div>
</div>

<style>
    /* ── Widget container ── */
    #cam-gesture-widget {
        position: fixed;
        left: 24px;
        bottom: 92px; /* sits above the voice mic button */
        z-index: 10009;
        font-family: inherit;
    }

    /* ── Toggle button ── */
    #cam-gesture-toggle {
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
        background: linear-gradient(135deg, #0f4c75, #1b98e0);
        box-shadow: 0 6px 20px rgba(0,0,0,.25);
        transition: transform .15s ease;
    }
    #cam-gesture-toggle:hover { transform: scale(1.06); }
    #cam-gesture-toggle.cam-active {
        background: linear-gradient(135deg, #c62828, #ff7a29);
    }

    #cam-gesture-pulse {
        position: absolute;
        inset: -6px;
        border-radius: 9999px;
        border: 2px solid #1b98e0;
        opacity: 0;
        pointer-events: none;
    }
    #cam-gesture-widget.cam-running #cam-gesture-pulse {
        opacity: 1;
        animation: cam-ping 1.6s infinite ease-out;
    }
    @keyframes cam-ping {
        0%   { transform: scale(1);    opacity: .7; }
        70%  { transform: scale(1.35); opacity: 0; }
        100% { transform: scale(1.35); opacity: 0; }
    }

    /* ── Panel ── */
    #cam-gesture-panel {
        position: absolute;
        left: 0;
        bottom: 70px;
        width: 640px;
        max-width: calc(100vw - 24px);
        border-radius: 14px;
        overflow: hidden;
        background: #0b1f3a;
        box-shadow: 0 12px 40px rgba(0,0,0,.45);
        border: 1px solid rgba(27, 152, 224, .4);
        display: flex;
        flex-direction: column;
    }

    #cam-gesture-header {
        padding: 11px 14px;
        background: linear-gradient(90deg, #0b1f3a, #123c69);
        color: #fff;
        border-bottom: 2px solid #1b98e0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 700;
        font-size: 14px;
    }
    #cam-gesture-close {
        background: none;
        border: none;
        color: #fff;
        font-size: 20px;
        line-height: 1;
        cursor: pointer;
        opacity: .75;
    }
    #cam-gesture-close:hover { opacity: 1; }

    /* ── Body (feed + menu side-by-side) ── */
    #cam-gesture-body {
        display: flex;
        gap: 0;
    }

    /* ── Video feed ── */
    #cam-gesture-feed-wrap {
        position: relative;
        width: 320px;
        min-width: 220px;
        background: #000;
        flex-shrink: 0;
    }
    #cam-gesture-video {
        width: 100%;
        display: block;
        transform: scaleX(-1); /* mirror so it feels natural */
    }
    #cam-gesture-canvas {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        pointer-events: none;
        transform: scaleX(-1);
    }
    #cam-gesture-status-bar {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        background: rgba(0,0,0,.6);
        padding: 4px 8px;
        font-size: 11px;
        color: #aee;
        text-align: center;
    }

    /* ── Menu ── */
    #cam-gesture-menu {
        flex: 1;
        overflow-y: auto;
        padding: 10px 8px 10px 10px;
        max-height: 300px;
    }
    #cam-menu-hint {
        margin: 0 0 8px;
        font-size: 11px;
        color: #7bb4dc;
        line-height: 1.4;
    }
    #cam-menu-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .cam-menu-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 7px 10px;
        border-radius: 8px;
        cursor: default;
        border: 1px solid transparent;
        transition: background .1s, border-color .1s;
        color: #d9e6f7;
        font-size: 13px;
        user-select: none;
    }
    .cam-menu-item.cam-hovered {
        background: rgba(255,122,41,.15);
        border-color: #ff7a29;
        color: #fff;
    }
    .cam-menu-item.cam-selected {
        background: rgba(46,160,67,.2);
        border-color: #3fcf6f;
        color: #7ee7a0;
    }
    .cam-menu-icon { font-size: 16px; line-height: 1; }
    .cam-menu-label { font-size: 13px; }

    /* ── Feedback ── */
    #cam-gesture-feedback {
        margin: 0 12px 10px;
        padding: 7px 10px;
        border-radius: 8px;
        font-size: 12px;
        line-height: 1.4;
    }
    #cam-gesture-feedback.cam-fb-success {
        background: rgba(46,160,67,.15);
        color: #7ee7a0;
        border: 1px solid rgba(46,160,67,.35);
    }
    #cam-gesture-feedback.cam-fb-error {
        background: rgba(220,38,38,.15);
        color: #ffb3b3;
        border: 1px solid rgba(220,38,38,.35);
    }
    #cam-gesture-feedback.cam-fb-info {
        background: rgba(27,152,224,.15);
        color: #cfe3ff;
        border: 1px solid rgba(27,152,224,.35);
    }

    /* ── Responsive ── */
    @media (max-width: 680px) {
        #cam-gesture-panel { width: calc(100vw - 16px); left: -8px; }
        #cam-gesture-body  { flex-direction: column; }
        #cam-gesture-feed-wrap { width: 100%; }
        #cam-gesture-menu  { max-height: 200px; }
    }
</style>

<script>
(function () {
    /* ─── DOM refs ─── */
    const widget     = document.getElementById('cam-gesture-widget');
    const toggleBtn  = document.getElementById('cam-gesture-toggle');
    const closeBtn   = document.getElementById('cam-gesture-close');
    const panel      = document.getElementById('cam-gesture-panel');
    const video      = document.getElementById('cam-gesture-video');
    const canvas     = document.getElementById('cam-gesture-canvas');
    const statusEl   = document.getElementById('cam-gesture-status');
    const feedbackEl = document.getElementById('cam-gesture-feedback');
    const menuList   = document.getElementById('cam-menu-list');
    const iconIdle   = document.getElementById('cam-icon-idle');
    const iconActive = document.getElementById('cam-icon-active');

    if (!widget) return;

    /* ─── Nav items from blade ─── */
    const navItems = @json($gestureNavJs);

    /* ─── State ─── */
    let stream         = null;
    let animFrame      = null;
    let handsModel     = null;
    let hoveredIdx     = -1;
    let isFist         = false;
    let fistHoldFrames = 0;
    const FIST_THRESHOLD = 8;   // frames fist must be held before navigate
    let navigating     = false;
    let ctx            = null;
    let isRunning      = false;

    /* ─── Feedback helper ─── */
    function showFeedback(text, type) {
        feedbackEl.textContent = text;
        feedbackEl.className   = 'cam-fb-' + (type || 'info');
        feedbackEl.style.display = 'block';
    }

    /* ─── Highlight a menu item ─── */
    function highlightItem(idx) {
        const items = menuList.querySelectorAll('.cam-menu-item');
        items.forEach(function (el, i) {
            el.classList.toggle('cam-hovered', i === idx);
        });
        hoveredIdx = idx;
    }

    /* ─── Navigate to hovered item ─── */
    function commitNavigation() {
        if (navigating) return;
        if (hoveredIdx < 0 || hoveredIdx >= navItems.length) return;

        navigating = true;
        const item  = navItems[hoveredIdx];
        const items = menuList.querySelectorAll('.cam-menu-item');
        if (items[hoveredIdx]) items[hoveredIdx].classList.add('cam-selected');
        showFeedback('Opening ' + item.label + '…', 'cam-fb-success');

        setTimeout(function () {
            window.location.href = item.url;
        }, 600);
    }

    /* ──────────────────────────────────────────────────────────
       Gesture detection — pure JS, no MediaPipe subscription.
       We use the MediaPipe Hands WASM via the public CDN
       (tasks-vision package) which is free and requires no API key.
       ────────────────────────────────────────────────────────── */

    let mpLoaded  = false;
    let mpLoading = false;

    function loadMediaPipe(callback) {
        if (mpLoaded) { callback(); return; }
        if (mpLoading) {
            // Poll until loaded
            const poll = setInterval(function () {
                if (mpLoaded) { clearInterval(poll); callback(); }
            }, 200);
            return;
        }
        mpLoading = true;
        statusEl.textContent = 'Loading hand-tracking model…';

        // Load @mediapipe/tasks-vision from jsDelivr (no auth needed)
        const script = document.createElement('script');
        script.src   = 'https://cdn.jsdelivr.net/npm/@mediapipe/tasks-vision@0.10.14/vision_bundle.js';
        script.onload = function () {
            // FilesetResolver + HandLandmarker come from the bundle as window globals
            const vision = window.mediapipeTasksVision || window;
            const FilesetResolver = vision.FilesetResolver;
            const HandLandmarker  = vision.HandLandmarker;

            if (!FilesetResolver || !HandLandmarker) {
                // Fallback: use the @mediapipe/hands legacy solution
                loadLegacyMediaPipe(callback);
                return;
            }

            FilesetResolver.forVisionTasks(
                'https://cdn.jsdelivr.net/npm/@mediapipe/tasks-vision@0.10.14/wasm'
            ).then(function (filesetResolver) {
                return HandLandmarker.createFromOptions(filesetResolver, {
                    baseOptions: {
                        modelAssetPath: 'https://storage.googleapis.com/mediapipe-models/hand_landmarker/hand_landmarker/float16/1/hand_landmarker.task',
                        delegate: 'GPU',
                    },
                    runningMode:          'VIDEO',
                    numHands:             1,
                    minHandDetectionConfidence: 0.6,
                    minHandPresenceConfidence:  0.6,
                    minTrackingConfidence:      0.5,
                });
            }).then(function (handLandmarker) {
                handsModel = { type: 'tasks', detector: handLandmarker };
                mpLoaded   = true;
                mpLoading  = false;
                callback();
            }).catch(function (err) {
                console.warn('[CamGesture] tasks-vision failed, trying legacy:', err);
                loadLegacyMediaPipe(callback);
            });
        };
        script.onerror = function () {
            loadLegacyMediaPipe(callback);
        };
        document.head.appendChild(script);
    }

    /* Legacy @mediapipe/hands fallback (also free, CDN) */
    function loadLegacyMediaPipe(callback) {
        statusEl.textContent = 'Loading hand model (legacy)…';

        // Load the legacy Hands solution scripts
        function loadScript(src, cb) {
            const s = document.createElement('script');
            s.src     = src;
            s.onload  = cb;
            s.onerror = function () { cb(new Error('Script load failed: ' + src)); };
            document.head.appendChild(s);
        }

        const base = 'https://cdn.jsdelivr.net/npm/@mediapipe/hands@0.4.1675469240/';
        loadScript(base + 'hands.js', function () {
            if (typeof Hands === 'undefined') {
                statusEl.textContent = 'Hand-tracking unavailable in this browser.';
                return;
            }

            const hands = new Hands({
                locateFile: function (file) { return base + file; },
            });
            hands.setOptions({
                maxNumHands:             1,
                modelComplexity:         1,
                minDetectionConfidence:  0.6,
                minTrackingConfidence:   0.5,
            });
            hands.onResults(function (results) {
                legacyResults = results;
            });

            handsModel = { type: 'legacy', detector: hands };
            mpLoaded   = true;
            mpLoading  = false;
            callback();
        });
    }

    let legacyResults = null; // buffer for legacy onResults callback

    /* ─── Landmark helpers ─── */

    // Index-finger tip = landmark 8, MCP = 5
    // Middle-finger tip = 12, Ring = 16, Pinky = 20, Thumb = 4
    // Wrist = 0

    function tipY(lm, tipIdx, mcpIdx) {
        // returns true when finger is folded (tip below mcp in image coords)
        return lm[tipIdx].y > lm[mcpIdx].y;
    }

    function detectFist(landmarks) {
        // Fist: all four fingers folded AND thumb tip near index MCP
        const indexFolded  = tipY(landmarks, 8,  5);
        const middleFolded = tipY(landmarks, 12, 9);
        const ringFolded   = tipY(landmarks, 16, 13);
        const pinkyFolded  = tipY(landmarks, 20, 17);
        // Thumb: tip (4) x close to index MCP (5) x
        const thumbClose   = Math.abs(landmarks[4].x - landmarks[5].x) < 0.12;
        return indexFolded && middleFolded && ringFolded && pinkyFolded && thumbClose;
    }

    function indexTipNorm(landmarks) {
        // Index-finger tip position normalised [0-1] in frame
        return { x: landmarks[8].x, y: landmarks[8].y };
    }

    /* ─── Map normalised hand position to menu item ─── */
    function mapHandToMenuIdx(normX, normY) {
        // normX / normY are in [0,1] from MediaPipe (origin = top-left of mirrored frame)
        // We mirror X because we flip the video with CSS scaleX(-1):
        // the raw landmark X from MP is 0=right, 1=left (from model POV)
        // After our CSS mirror the user sees their LEFT hand on the left,
        // so the landmark X already matches screen left→right after we invert.
        const screenX = (1 - normX) * canvas.offsetWidth;
        const screenY = normY       * canvas.offsetHeight;

        // Menu panel bounding box relative to viewport
        const menuEl   = document.getElementById('cam-gesture-menu');
        const menuRect = menuEl.getBoundingClientRect();

        // Convert canvas position to absolute page position
        const canvasRect = canvas.getBoundingClientRect();
        const absX = canvasRect.left + screenX;
        const absY = canvasRect.top  + screenY;

        if (absX < menuRect.left || absX > menuRect.right) return -1;

        const items    = menuList.querySelectorAll('.cam-menu-item');
        for (let i = 0; i < items.length; i++) {
            const r = items[i].getBoundingClientRect();
            if (absY >= r.top && absY <= r.bottom) return i;
        }
        return -1;
    }

    /* ─── Draw hand skeleton on canvas ─── */
    function drawLandmarks(landmarks) {
        if (!ctx) return;
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Connections between landmarks (MediaPipe hand topology)
        const CONNECTIONS = [
            [0,1],[1,2],[2,3],[3,4],         // thumb
            [0,5],[5,6],[6,7],[7,8],          // index
            [9,10],[10,11],[11,12],           // middle (5→9 wrist-palm)
            [0,9],[9,13],[13,14],[14,15],[15,16], // ring
            [0,13],[13,17],[17,18],[18,19],[19,20], // pinky
            [5,9],[9,13],[13,17],             // palm
        ];

        ctx.strokeStyle = 'rgba(27,152,224,0.7)';
        ctx.lineWidth   = 2;
        CONNECTIONS.forEach(function ([a, b]) {
            const la = landmarks[a];
            const lb = landmarks[b];
            ctx.beginPath();
            // landmarks are in [0,1]; canvas is CSS-mirrored so we keep raw X
            ctx.moveTo(la.x * canvas.width, la.y * canvas.height);
            ctx.lineTo(lb.x * canvas.width, lb.y * canvas.height);
            ctx.stroke();
        });

        // Dots
        landmarks.forEach(function (lm, i) {
            ctx.beginPath();
            ctx.arc(lm.x * canvas.width, lm.y * canvas.height, i === 8 ? 7 : 3, 0, Math.PI * 2);
            ctx.fillStyle = i === 8 ? '#ff7a29' : 'rgba(255,255,255,0.8)';
            ctx.fill();
        });
    }

    /* ─── Main render loop ─── */
    let lastVideoTime = -1;

    function renderLoop() {
        if (!isRunning) return;
        animFrame = requestAnimationFrame(renderLoop);

        if (!video.videoWidth) return; // frame not ready yet

        // Sync canvas size
        if (canvas.width !== video.videoWidth || canvas.height !== video.videoHeight) {
            canvas.width  = video.videoWidth;
            canvas.height = video.videoHeight;
            if (!ctx) ctx = canvas.getContext('2d');
        }

        if (!handsModel) return;

        let landmarks = null;

        if (handsModel.type === 'tasks') {
            // Tasks-vision: detect per video timestamp
            const nowMs = performance.now();
            if (video.currentTime !== lastVideoTime) {
                lastVideoTime = video.currentTime;
                try {
                    const result = handsModel.detector.detectForVideo(video, nowMs);
                    if (result.landmarks && result.landmarks.length > 0) {
                        landmarks = result.landmarks[0];
                    }
                } catch (e) { /* ignore frame errors */ }
            }
        } else {
            // Legacy: send frame and read buffered result
            handsModel.detector.send({ image: video }).catch(function () {});
            if (legacyResults && legacyResults.multiHandLandmarks && legacyResults.multiHandLandmarks.length > 0) {
                landmarks = legacyResults.multiHandLandmarks[0];
            }
        }

        if (landmarks) {
            drawLandmarks(landmarks);

            const tip    = indexTipNorm(landmarks);
            const newIdx = mapHandToMenuIdx(tip.x, tip.y);
            if (newIdx !== hoveredIdx) {
                highlightItem(newIdx);
                fistHoldFrames = 0; // reset fist counter on item change
            }

            const nowFist = detectFist(landmarks);
            if (nowFist && hoveredIdx >= 0) {
                fistHoldFrames++;
                if (!isFist) {
                    isFist = true;
                    statusEl.textContent = 'Hold fist to confirm…';
                }
                if (fistHoldFrames >= FIST_THRESHOLD && !navigating) {
                    commitNavigation();
                }
            } else {
                fistHoldFrames = 0;
                isFist = false;
                statusEl.textContent = hoveredIdx >= 0
                    ? 'Hovering: ' + navItems[hoveredIdx].label + ' — make a fist to open'
                    : 'Point at a menu item';
            }
        } else {
            // No hand detected
            if (ctx) ctx.clearRect(0, 0, canvas.width, canvas.height);
            highlightItem(-1);
            fistHoldFrames = 0;
            isFist = false;
            if (!navigating) statusEl.textContent = '✋ Show your hand in front of the camera';
        }
    }

    /* ─── Start camera + model ─── */
    function startCamera() {
        if (isRunning) return;
        isRunning   = true;
        navigating  = false;
        hoveredIdx  = -1;

        widget.classList.add('cam-running');
        toggleBtn.classList.add('cam-active');
        iconIdle.style.display   = 'none';
        iconActive.style.display = 'block';
        panel.style.display      = 'flex';

        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'user', width: 320, height: 240 } })
            .then(function (s) {
                stream      = s;
                video.srcObject = s;
                return video.play();
            })
            .then(function () {
                statusEl.textContent = 'Camera ready. Loading hand model…';
                loadMediaPipe(function () {
                    statusEl.textContent = '✋ Show your hand in front of the camera';
                    renderLoop();
                });
            })
            .catch(function (err) {
                isRunning = false;
                widget.classList.remove('cam-running');
                toggleBtn.classList.remove('cam-active');
                iconIdle.style.display   = 'block';
                iconActive.style.display = 'none';
                showFeedback('Camera access denied. Please allow camera permission in your browser.', 'cam-fb-error');
            });
    }

    /* ─── Stop camera ─── */
    function stopCamera() {
        isRunning = false;
        if (animFrame) { cancelAnimationFrame(animFrame); animFrame = null; }
        if (stream)    { stream.getTracks().forEach(function (t) { t.stop(); }); stream = null; }
        video.srcObject = null;
        if (ctx) ctx.clearRect(0, 0, canvas.width, canvas.height);
        highlightItem(-1);

        widget.classList.remove('cam-running');
        toggleBtn.classList.remove('cam-active');
        iconIdle.style.display   = 'block';
        iconActive.style.display = 'none';
        panel.style.display      = 'none';
        feedbackEl.style.display = 'none';
        navigating = false;
    }

    /* ─── Event listeners ─── */
    toggleBtn.addEventListener('click', function () {
        if (isRunning) { stopCamera(); } else { startCamera(); }
    });

    closeBtn.addEventListener('click', function () { stopCamera(); });

    // Stop camera when page is hidden (e.g. tab switch)
    document.addEventListener('visibilitychange', function () {
        if (document.hidden && isRunning) stopCamera();
    });
})();
</script>
