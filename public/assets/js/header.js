//  ==================== PreLOader ================================ 
document.addEventListener("DOMContentLoaded", () => {
    const preloader = document.getElementById("preloader");
    const logo = document.getElementById("brandLogo");
    const headerLogo = document.getElementById("headerLogo");
    const skip = document.querySelector(".preloaderCls");

    const mobilePopup = document.getElementById("mobileOfferModal");

    /* ======================= */
    /* SHOW MOBILE POPUP       */
    /* ======================= */
    const showMobilePopup = () => {
        if (window.innerWidth <= 600) {
            mobilePopup.style.display = "flex";

            // Fade after small delay
            setTimeout(() => {
                mobilePopup.classList.add("fade-in");
            }, 50);
        }
    };

    /* ======================= */
    /* CLOSE POPUP             */
    /* ======================= */
    window.closeMobileOffer = () => {
        mobilePopup.classList.remove("fade-in");
        setTimeout(() => {
            mobilePopup.style.display = "none";
        }, 250);
    };

    /* ======================= */
    /* END PRELOADER           */
    /* ======================= */
    const endPreloader = () => {
        headerLogo.style.opacity = "1";
        preloader.classList.add("hidden");

        // Show popup after preloader ends
        setTimeout(showMobilePopup, 500);
    };

    /* ======================= */
    /* ANIMATE LOGO            */
    /* ======================= */
    const animateLogoToHeader = () => {
        const logoRect = logo.getBoundingClientRect();
        const headerRect = headerLogo.getBoundingClientRect();
        const deltaX = headerRect.left - logoRect.left;
        const deltaY = headerRect.top - logoRect.top;

        logo.style.transition = "all 0.1s ease";
        logo.style.transform = `translate(${deltaX}px, ${deltaY}px) scale(0.6)`;

        setTimeout(endPreloader, 1200);
    };

    /* AUTO RUN AFTER 2 SEC */
    setTimeout(animateLogoToHeader, 2000);

    /* SKIP BUTTON */
    skip.addEventListener("click", animateLogoToHeader);
});
//  ======================================================================== 

//  ======================= desktop nav ============================== 
// Sticky search only
const search = document.querySelector(".mobile-search");
window.addEventListener("scroll", () => {
    if (window.scrollY > 100) search.classList.add("stuck");
    else search.classList.remove("stuck");
});

// Modal toggle
const modal = document.getElementById("profileModal");
const btn = document.getElementById("profileBtn");
const close = modal.querySelector(".modal-close");

btn.addEventListener("click", () => modal.classList.add("active"));
close.addEventListener("click", () => modal.classList.remove("active"));
document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll(".desktop-nav .nav-link");
    const currentPath = window.location.pathname.replace(/\/+$/, "") || "/";

    navLinks.forEach((link) => {
        const href = link.getAttribute("href");

        // Skip placeholders like "#"
        if (!href || href === "#") return;

        const linkPath = new URL(link.href).pathname.replace(/\/+$/, "") || "/";

        // Remove existing active class
        link.classList.remove("active");

        // Add active only if the path matches current URL
        if (linkPath === currentPath) {
            link.classList.add("active");
        }
    });
});
//  ======================================================================== 

//  ====================== MObile Nav ============================= 
document.addEventListener("DOMContentLoaded", () => {
    const navItems = document.querySelectorAll(".bottom-nav .nav-item");
    const currentPath = window.location.pathname.replace(/\/+$/, "") || "/";

    navItems.forEach((item) => {
        const href = item.getAttribute("href");
        if (!href || href === "#") return; // skip placeholder links

        const linkPath = new URL(item.href).pathname.replace(/\/+$/, "") || "/";
        item.classList.remove("active");

        if (linkPath === currentPath) {
            item.classList.add("active");
        }
    });

});
//  ======================================================================== 