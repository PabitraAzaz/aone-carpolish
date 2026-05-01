/* =========================================
   1. NAVBAR SCROLL EFFECT
   ========================================= */
window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar");
    if (navbar) { // Safety check to ensure navbar exists on the page
        navbar.classList.toggle("scrolled", window.scrollY > 50);
    }
});

/* =========================================
   2. MOBILE DROPDOWN TOGGLE
   ========================================= */
function toggleDropdown() {
    const menu = document.getElementById("mobileDropdown");
    const arrow = document.getElementById("arrow");

    if (!menu || !arrow) return; // Safety check if elements are missing

    if (menu.style.display === "block") {
        menu.style.display = "none";
        arrow.classList.remove("rotate");
    } else {
        menu.style.display = "block";
        arrow.classList.add("rotate");
    }
}
