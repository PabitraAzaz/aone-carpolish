<div class="car-popup" id="carPopup">
    <div class="car-sheet">
        <span class="car-close" onclick="closeCarPopup()">×</span>

        <div class="brand">
            <img src="<?= base_url() ?>public/assets/img/logo/logo.png" alt="Car Polish">
            <h4>A-ONE CAR POLISH<br><span></span></h4>
        </div>

        <h2 class="headline">Get Showroom Shine<br>At Home ✨</h2>

        <div class="badge">⭐ Flat 20% OFF on First Order</div>

        <div class="form-card">
            <h3>Unlock<br><strong>Exclusive Car Care Deals</strong></h3>

            <div class="phone-field">
                <span>🇮🇳 +91</span>
                <input
                    type="tel"
                    id="phone"
                    inputmode="numeric"
                    pattern="[6-9][0-9]{9}"
                    maxlength="10"
                    placeholder="Enter Mobile Number"
                    required>

            </div>

            <button class="cta-btn" onclick="submitPopup()">Get My Discount</button>

            <p class="terms">
                🔒 No spam • 🚗 Trusted by 5,000+ car owners
            </p>

            <p id="successMsg">✅ Offer unlocked! Redirecting…</p>
        </div>
    </div>
</div>

<style>
    .car-popup {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .45);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        display: flex;
        align-items: flex-end;
        justify-content: center;
        z-index: 9999;
        opacity: 0;
        pointer-events: none;
        transition: opacity .35s ease;
    }

    .car-popup.show {
        opacity: 1;
        pointer-events: auto;
    }

    .car-sheet {
        width: 100%;
        max-width: 602px;
        height: 85vh;
        background: linear-gradient(180deg, #120f0f, #ff4949);
        border-radius: 22px 22px 0 0;
        padding: 26px 18px;
        text-align: center;
        color: #fff;
        animation: sheetUp .55s cubic-bezier(.22, 1, .36, 1);
    }

    @keyframes sheetUp {
        from {
            transform: translateY(110%) scale(.96);
            opacity: 0;
        }

        to {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    }

    .car-close {
        position: absolute;
        top: 14px;
        right: 16px;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #f5c86a;
        color: #000;
        font-size: 22px;
        line-height: 34px;
        cursor: pointer;
    }

    .brand img {
        width: 58px;
        margin-bottom: 6px;
    }

    .brand h4 {
        margin: 0;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .brand span {
        font-size: 12px;
        color: #f5c86a;
    }

    .headline {
        margin: 16px 0;
        font-size: 1.5rem;
    }

    .badge {
        background: linear-gradient(90deg, #f5c86a, #ffd36d);
        color: #000;
        padding: 8px 16px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 18px;
        font-weight: 700;
        position: relative;
        overflow: hidden;
    }

    .badge::after {
        content: "";
        position: absolute;
        inset: 0;
        left: -100%;
        background: linear-gradient(120deg,
                transparent,
                rgba(255, 255, 255, .5),
                transparent);
        animation: shimmer 2.8s infinite;
    }

    @keyframes shimmer {
        100% {
            left: 100%;
        }
    }

    .form-card {
        background: #fff;
        border-radius: 14px;
        padding: 20px 14px;
        color: #111;
    }

    .phone-field {
        display: flex;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 14px;
        transition: box-shadow .2s ease, border-color .2s ease;
    }

    .phone-field:focus-within {
        border-color: #f5c86a;
        box-shadow: 0 0 0 2px rgba(245, 200, 106, .3);
    }

    .phone-field span {
        background: #f3f3f3;
        padding: 10px;
    }

    .phone-field input {
        border: none;
        flex: 1;
        padding: 10px;
        outline: none;
    }

    .cta-btn {
        width: 100%;
        background: linear-gradient(90deg, #111, #333);
        color: #f5c86a;
        border: none;
        padding: 13px;
        font-size: 16px;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: transform .12s ease, box-shadow .12s ease;
    }

    .cta-btn:active {
        transform: scale(.96);
    }

    .terms {
        font-size: 12px;
        margin-top: 10px;
        color: #000000ff;
    }

    #successMsg {
        display: none;
        margin-top: 10px;
        color: green;
        font-weight: 600;
        animation: popFade .45s ease forwards;
    }

    @keyframes popFade {
        from {
            transform: translateY(8px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @media (min-width: 600px) {
        .car-popup {
            display: none;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const popup = document.getElementById("carPopup");
        const phoneInput = document.getElementById("phone");
        const successMsg = document.getElementById("successMsg");
        const preloader = document.getElementById("preloader");

        // Check if preloader was already shown in this session
        const preloaderShownInSession = sessionStorage.getItem("preloaderShown");
        if (preloaderShownInSession === "true") {
            preloader.classList.add("hidden");
            preloader.style.display = "none";
            return;
        }

        if (!preloader) return;

        let popupShown = false;

        // 👀 Watch preloader disappearance
        const observer = new MutationObserver(() => {
            const isHidden =
                preloader.style.display === "none" ||
                preloader.classList.contains("hidden") ||
                !document.body.contains(preloader);

            if (isHidden && !popupShown) {
                popupShown = true;

                // Mark preloader as shown in session
                sessionStorage.setItem("preloaderShown", "true");

                // ⏱️ SHOW POPUP AFTER 2 SECONDS
                setTimeout(() => {
                    popup.classList.add("show");
                }, 2000);

                observer.disconnect();
            }
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true,
            attributes: true
        });

        // Close popup
        window.closeCarPopup = () => {
            popup.classList.remove("show");
        };

        // Submit + validate
        window.submitPopup = () => {
            const phone = phoneInput.value.trim();
            const phoneRegex = /^[6-9]\d{9}$/;

            if (!phoneRegex.test(phone)) {
                alert("Please enter a valid 10-digit mobile number");
                phoneInput.focus();
                return;
            }

            successMsg.style.display = "block";
            document.querySelector(".cta-btn").disabled = true;

            setTimeout(() => {
                closeCarPopup();
            }, 1500);
        };
    });
</script>