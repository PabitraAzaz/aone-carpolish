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
            title: "Full Car Body Wax Polishing",
            img: "<?= base_url('public/assets/img/services/1.png') ?>",

            intro: "Ceramic coating & wax polishing enhances your car’s shine while protecting it from UV rays, dust, water spots, oxidation, and minor scratches.",

            includes: [
                "Complete exterior foam wash & surface cleaning",
                "Machine polishing for swirl & scratch reduction",
                "Premium wax / ceramic protection coating",
                "Tyre & alloy cleaning with gloss finish"
            ],

            benefits: [
                "Deep gloss & showroom shine",
                "UV, dust & water protection",
                "Long-lasting paint safety",
                "Improves resale value"
            ],

            process: "We start with deep exterior cleaning, followed by machine polishing to remove imperfections. A premium wax or ceramic layer is applied to protect and enhance long-lasting shine."
        },

        2: {
            title: "Dashboard Cleaning & Wax Polish",
            img: "<?= base_url('public/assets/img/services/dashboard.png') ?>",

            intro: "A premium interior care service that cleans, restores, and protects your dashboard and interior panels from dust, stains, and sun damage.",

            includes: [
                "Dashboard dust & stain removal",
                "Interior panel deep cleaning",
                "Protective wax coating application",
                "UV protection treatment"
            ],

            benefits: [
                "Prevents cracking & fading",
                "Restores dashboard shine",
                "Keeps interior fresh & clean",
                "Long-lasting protection"
            ],

            process: "We carefully clean all dashboard and interior surfaces, remove dust and stains, and apply a protective wax coating to prevent fading and maintain a fresh finish."
        },

        3: {
            title: "Full Interior Vacuum Cleaning",
            img: "<?= base_url('public/assets/img/services/vacuum-cleaning.png') ?>",

            intro: "Comprehensive vacuum cleaning service that removes dust, dirt, and debris from all interior areas for a fresh and comfortable cabin.",

            includes: [
                "Seat & carpet vacuum cleaning",
                "Footwell & mat cleaning",
                "Boot space vacuuming",
                "Hard-to-reach area cleaning"
            ],

            benefits: [
                "Dust-free cabin environment",
                "Improves air quality",
                "Comfortable driving experience",
                "Maintains interior hygiene"
            ],

            process: "Our team uses high-power vacuum equipment to clean seats, carpets, boot space, and tight areas, ensuring a completely dust-free and fresh interior."
        },

        4: {
            title: "All Seat Foam Wash & Polish",
            img: "<?= base_url('public/assets/img/services/seat-foam-wash.png') ?>",

            intro: "Deep seat cleaning service using foam-based solutions to remove stains, dirt, and odours while restoring comfort and hygiene.",

            includes: [
                "Foam-based deep seat cleaning",
                "Fabric & leather safe treatment",
                "Stain & dirt removal",
                "Odour removal process"
            ],

            benefits: [
                "Hygienic & fresh seating",
                "Removes tough stains",
                "Restores seat softness",
                "Improves interior comfort"
            ],

            process: "We apply professional foam cleaners to seats, scrub gently to remove stains, and extract dirt to restore softness, freshness, and hygiene."
        },

        5: {
            title: "Nickel & Chrome Wax Polish",
            img: "<?= base_url('public/assets/img/services/nickle-polish.png') ?>",

            intro: "Specialized metal polishing service that restores shine and protects chrome and metal parts from rust, dullness, and corrosion.",

            includes: [
                "Chrome & metal polishing",
                "Oxidation removal",
                "Water mark cleaning",
                "Protective anti-rust coating"
            ],

            benefits: [
                "Mirror-like metal shine",
                "Prevents rust & corrosion",
                "Enhances overall appearance",
                "Long-lasting finish"
            ],

            process: "We polish all metal parts like grills and trims, remove oxidation and dullness, and apply a protective coating for long-lasting shine."
        },

        6: {
            title: "Headlamp & All Glass Scratch Removing",
            img: "<?= base_url('public/assets/img/services/headlamp.png') ?>",

            intro: "Precision restoration service that removes minor scratches, haze, and swirl marks from headlamps and glass surfaces.",

            includes: [
                "Headlamp restoration polishing",
                "Glass scratch reduction",
                "Swirl & haze removal",
                "Clarity enhancement treatment"
            ],

            benefits: [
                "Improves night visibility",
                "Crystal-clear glass finish",
                "Safer driving experience",
                "Enhanced vehicle look"
            ],

            process: "We carefully polish headlights and glass surfaces to remove scratches and haze, restoring clarity and improving visibility for safer driving."
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