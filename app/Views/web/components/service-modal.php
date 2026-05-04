<style>
    /* OVERLAY */
    .modal {
        position: fixed;
        inset: 0;
        width: 100vw;
        height: 100vh;

        background: rgba(0, 0, 0, 0.6);

        display: none;

        align-items: center;
        justify-content: center;

        z-index: 999999;
    }

    /* MODAL BOX */
    .modal-content {
        background: #fff;
        width: 92%;
        max-width: 520px;
        max-height: 90vh;

        border-radius: 16px;
        overflow: hidden;

        display: flex;
        flex-direction: column;

        position: relative;
    }

    /* IMAGE */
    .modal-content img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
        background: #eee;
    }

    /* BODY */
    .modal-body {
        padding: 18px;
        overflow-y: auto;
    }

    /* TITLE */
    .modal-body h2 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    /* INTRO */
    .modal-intro {
        font-size: 14px;
        color: #555;
        line-height: 1.6;
        margin-bottom: 12px;
    }

    /* CLOSE */
    .close {
        position: absolute;
        top: 10px;
        right: 14px;
        font-size: 22px;
        cursor: pointer;
        color: #fff;
    }

    /* ACCORDION */
    .accordion {
        font-size: 15px;
        font-weight: 600;
        padding: 14px 0;
        border-bottom: 1px solid #eee;

        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }

    .accordion i {
        transition: 0.3s;
    }

    /* PANEL */
    .panel {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;

        font-size: 13px;
        color: #444;
    }

    .panel.open {
        padding-bottom: 10px;
    }

    .panel ul {
        padding-left: 18px;
        margin-top: 8px;
    }

    .panel li {
        margin-bottom: 4px;
    }

    /* ACTIVE */
    .accordion.active i {
        transform: rotate(180deg);
    }

    .panel.open {
        margin-top: 8px;
    }
</style>

<!-- ===== MODAL ===== -->
<div id="serviceModal" class="modal">

    <div class="modal-content">

        <span class="close" onclick="closeModal()">&times;</span>

        <img id="modalImg">

        <div class="modal-body">

            <h2 id="modalTitle"></h2>

            <p class="modal-intro" id="modalIntro"></p>

            <!-- ACCORDION -->
            <div class="accordion" onclick="toggleAcc(this)">
                What’s included
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="panel" id="modalIncludes"></div>

            <div class="accordion" onclick="toggleAcc(this)">
                Why choose this service
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="panel" id="modalBenefits"></div>

            <div class="accordion" onclick="toggleAcc(this)">
                Service process
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="panel" id="modalProcess"></div>

        </div>

    </div>

</div>

<script>
    const services = {
        1: {
            title: "Premium Car Wash & Interior Cleaning",
            img: "https://img.freepik.com/free-photo/car-wash-service_23-2149334136.jpg",
            intro: "Give your car a showroom-like shine with our professional cleaning service.",

            includes: [
                "Exterior foam wash with scratch-free cleaning",
                "Interior vacuuming and dashboard polishing",
                "Tyre and alloy cleaning"
            ],

            benefits: [
                "Improves vehicle appearance",
                "Protects paint and interior surfaces",
                "Enhances driving comfort"
            ],

            process: "Our expert arrives at your location, inspects the vehicle, performs deep cleaning using specialized tools, and ensures a spotless finish."
        },

        2: {
            title: "Engine Oil Change & Health Check",
            img: "https://img.freepik.com/free-photo/car-engine-maintenance_23-2149334138.jpg",
            intro: "Keep your engine running smoothly with high-performance oil replacement.",

            includes: [
                "Premium engine oil replacement",
                "Engine diagnostics check",
                "Fluid inspection"
            ],

            benefits: [
                "Improves engine life",
                "Enhances performance",
                "Prevents breakdowns"
            ],

            process: "Our technician replaces old oil, checks engine components, and ensures optimal performance."
        }
    };

    /* OPEN */
    function openModal(id) {
        const data = services[id];
        const modal = document.getElementById("serviceModal");

        modal.style.display = "flex";
        modal.style.opacity = "1"; // ensure visible

        document.body.style.overflow = "hidden";

        document.getElementById("modalTitle").innerText = data.title;
        document.getElementById("modalImg").src = data.img || "";
        document.getElementById("modalIntro").innerText = data.intro || "";

        // Includes
        let incHTML = "<ul>";
        data.includes?.forEach(i => incHTML += `<li>${i}</li>`);
        incHTML += "</ul>";
        document.getElementById("modalIncludes").innerHTML = incHTML;

        // Benefits
        let benHTML = "<ul>";
        data.benefits?.forEach(i => benHTML += `<li>${i}</li>`);
        benHTML += "</ul>";
        document.getElementById("modalBenefits").innerHTML = benHTML;

        // Process
        document.getElementById("modalProcess").innerHTML = `<p>${data.process || ""}</p>`;

        // 👉 AUTO OPEN FIRST SECTION (IMPORTANT FIX)
        const firstAcc = document.querySelector(".accordion");
        if (firstAcc) {
            firstAcc.classList.add("active");
            let panel = firstAcc.nextElementSibling;
            panel.style.maxHeight = panel.scrollHeight + "px";
            panel.classList.add("open");
        }
    }

    /* CLOSE */
    function closeModal() {
        document.getElementById("serviceModal").style.display = "none";
        document.body.style.overflow = "auto";
    }

    /* ACCORDION */
    function toggleAcc(el) {
        el.classList.toggle("active");

        let panel = el.nextElementSibling;

        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            panel.classList.remove("open");
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            panel.classList.add("open");
        }
    }
</script>