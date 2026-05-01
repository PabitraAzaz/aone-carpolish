document.addEventListener("DOMContentLoaded", function () {

    // ================= FAQ Section =================
    document.querySelectorAll('.accordion-button').forEach(button => {
        const icon = button.querySelector('.faq-icon');
        const target = document.querySelector(button.dataset.bsTarget);

        if (icon && target) {
            target.addEventListener('show.bs.collapse', () => {
                icon.textContent = '–';
            });

            target.addEventListener('hide.bs.collapse', () => {
                icon.textContent = '+';
            });
        }
    });

    // ================= Youtube Shorts =================
    if (document.querySelector('.portrait-slider')) {
        new Swiper('.portrait-slider', {
            slidesPerView: 1.2,
            spaceBetween: 18,
            loop: true,
            allowTouchMove: true,
            simulateTouch: true,
            grabCursor: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.2
                },
                576: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 4   // ✅ THIS is what you want
                },
                1400: {
                    slidesPerView: 4   // keep 4 even on large screens
                }
            }
        });
    }

    // ================= Banner =================
    if (document.querySelector('.banner-swiper')) {
        new Swiper(".banner-swiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false
            },
            effect: "fade",
            speed: 1000,
        });
    }

    // ================= Logo Carousel =================
    if (document.querySelector('.logo-carousel')) {
        new Swiper(".logo-carousel", {
            slidesPerView: 5,
            spaceBetween: 8,
            loop: true,
            autoplay: {
                delay: 1700,
                disableOnInteraction: false,
            },
            breakpoints: {
                320: { slidesPerView: 4, spaceBetween: 8 },
                480: { slidesPerView: 5, spaceBetween: 10 },
                768: { slidesPerView: 5, spaceBetween: 16 },
                992: { slidesPerView: 6, spaceBetween: 20 },
                1200: { slidesPerView: 7, spaceBetween: 24 }
            }
        });
    }

    // ================= About Read More =================
    const readBtn = document.querySelector(".read-more-btn");
    const extraContent = document.querySelector(".about-extra");

    if (readBtn && extraContent) {
        readBtn.addEventListener("click", () => {
            extraContent.style.display =
                extraContent.style.display === "block" ? "none" : "block";

            readBtn.textContent =
                readBtn.textContent === "Read More" ? "Read Less" : "Read More";
        });
    }

    // ================= Services Slider =================
    if (document.querySelector('.polish-swiper')) {
        new Swiper('.polish-swiper', {
            slidesPerView: 2.5,
            spaceBetween: 14,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            breakpoints: {
                320: { slidesPerView: 2.1, spaceBetween: 9 },
                460: { slidesPerView: 2.5, spaceBetween: 13 },
                640: { slidesPerView: 3.3, spaceBetween: 14 },
                1100: { slidesPerView: 4, spaceBetween: 16 }
            }
        });
    }

    // ================= Offer Banner =================
    if (document.querySelector('.banner-carousel')) {
        new Swiper('.banner-carousel', {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            autoplay: {
                delay: 3400,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }

    // ================= Typing Text =================
    const animatedTextEl = document.getElementById("animated-text");

    if (animatedTextEl) {
        const messages = [
            "Services at your door step",
            "Choose Your Style",
            "find the one for you",
            "Find the best combination",
            "Get Pick & Drop Facility"
        ];

        let currentIndex = 0;
        let currentText = "";
        let isDeleting = false;

        function type() {
            const fullText = messages[currentIndex];

            currentText = isDeleting
                ? fullText.substring(0, currentText.length - 1)
                : fullText.substring(0, currentText.length + 1);

            animatedTextEl.textContent = currentText;

            let speed = 90;

            if (!isDeleting && currentText === fullText) {
                speed = 1500;
                isDeleting = true;
            } else if (isDeleting && currentText === "") {
                isDeleting = false;
                currentIndex = (currentIndex + 1) % messages.length;
                speed = 500;
            }

            setTimeout(type, speed);
        }

        type();
    }

    // ================= Packages =================
    const brandSelect = document.getElementById('brandSelect');
    const modelSelect = document.getElementById('modelSelect');
    const packagesGrid = document.getElementById('packagesGrid');

    if (brandSelect && modelSelect && packagesGrid) {

        const brandModels = {
            toyota: ['Corolla', 'Camry', 'RAV4'],
            honda: ['Civic', 'Accord', 'CR-V'],
            bmw: ['3 Series', '5 Series', 'X5']
        };

        const packagesData = {
            Corolla: [
                { name: 'Basic Wash', services: ['Exterior Wash', 'Interior Cleaning'], price: '$25', img: '' },
                { name: 'Premium', services: ['Exterior Wash', 'Interior Cleaning', 'Waxing'], price: '$45', img: '' }
            ]
        };

        brandSelect.addEventListener('change', () => {
            const selectedBrand = brandSelect.value;
            modelSelect.innerHTML = '<option disabled selected>Select Model</option>';

            if (brandModels[selectedBrand]) {
                brandModels[selectedBrand].forEach(model => {
                    const option = document.createElement('option');
                    option.value = model;
                    option.textContent = model;
                    modelSelect.appendChild(option);
                });
                modelSelect.disabled = false;
            } else {
                modelSelect.disabled = true;
            }

            packagesGrid.innerHTML = `<p class="text-center">Select a model</p>`;
        });

        modelSelect.addEventListener('change', () => {
            const selectedModel = modelSelect.value;
            const packages = packagesData[selectedModel] || [];

            packagesGrid.innerHTML = '';

            if (!packages.length) {
                packagesGrid.innerHTML = `<p>No packages available</p>`;
                return;
            }

            packages.forEach(pkg => {
                const col = document.createElement('div');
                col.className = 'col-md-4';
                col.innerHTML = `
                    <div class="package-card">
                        <h5>${pkg.name}</h5>
                        <ul>${pkg.services.map(s => `<li>${s}</li>`).join('')}</ul>
                        <div>${pkg.price}</div>
                    </div>
                `;
                packagesGrid.appendChild(col);
            });
        });
    }

});