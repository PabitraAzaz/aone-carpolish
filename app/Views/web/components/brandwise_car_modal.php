<style>
    /* ===============================
   BASE MODAL (DESKTOP DEFAULT)
    =============================== */

    .car-modal {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        display: none;
        z-index: 2000;
        align-items: center;
        justify-content: center;
    }

    .car-modal.show {
        display: flex;
    }

    .car-modal-sheet {
        width: 520px;
        max-height: 85vh;
        background: #ffffff;
        border-radius: 18px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    /* ===============================
   HEADER
    =============================== */

    .car-modal-header {
        display: grid;
        grid-template-columns: 40px 1fr 40px;
        align-items: center;
        padding: 16px;
        border-bottom: 1px solid #e5e7eb;
    }

    .car-modal-header h3 {
        font-size: 1.05rem;
        font-weight: 700;
        text-align: center;
    }

    .back-btn,
    .close-btn {
        background: none;
        border: none;
        font-size: 1.1rem;
        cursor: pointer;
    }

    .back-btn {
        visibility: hidden;
    }

    /* ===============================
   SEARCH
    =============================== */

    .car-search {
        padding: 14px 16px;
        border-bottom: 1px solid #f1f1f1;
    }

    .car-search input {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #ddd;
        font-size: 0.9rem;
    }

    /* ===============================
   BODY
    =============================== */

    .car-modal-body {
        padding: 16px;
        overflow-y: auto;
    }

    /* ===============================
   GRID (DESKTOP)
    =============================== */

    .car-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    /* ===============================
   CARD
    =============================== */

    .car-card {
        background: #f6f7f9;
        border-radius: 14px;
        padding: 14px 10px;
        text-align: center;
        cursor: pointer;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .car-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
    }

    .car-card img {
        max-width: 100%;
        height: 38px;
        margin-bottom: 8px;
        object-fit: contain;
    }

    .car-card span {
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* ===============================
   MODEL PRICE
    =============================== */

    .model-price {
        font-size: 0.8rem;
        font-weight: 700;
        color: #ff7a18;
        margin-top: 6px;
    }

    /* ===============================
   UTIL
    =============================== */

    .hidden {
        display: none;
    }

    /* ===============================
   CHECKOUT FORM VIEW
    =============================== */

    .checkout-form-view {
        padding: 20px;
    }

    .selected-car-summary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 20px;
        border-radius: 14px;
        color: #fff;
        margin-bottom: 20px;
    }

    .selected-car-summary h4 {
        margin: 0 0 12px 0;
        font-size: 1.1rem;
    }

    .car-detail-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        font-size: 0.9rem;
    }

    .car-detail-row strong {
        font-weight: 700;
    }

    .checkout-form {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .form-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .form-field label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #333;
    }

    .form-field input,
    .form-field textarea {
        padding: 12px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 0.9rem;
        font-family: inherit;
        transition: all 0.2s ease;
    }

    .form-field input:focus,
    .form-field textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-field textarea {
        resize: vertical;
        min-height: 80px;
    }

    .required-mark {
        color: #ff3d2f;
    }

    .proceed-payment-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 14px;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        margin-top: 8px;
        transition: transform 0.2s ease;
    }

    .proceed-payment-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
    }

    .proceed-payment-btn:active {
        transform: translateY(0);
    }
</style>



<style>
    /* ===============================
   MOBILE APP MODE
    =============================== */

    @media (max-width: 767px) {

        .car-modal {
            align-items: flex-end;
        }

        .car-modal-sheet {
            width: 100%;
            max-height: 90vh;
            border-radius: 22px 22px 0 0;
        }

        /* Header = App Bar */
        .car-modal-header {
            padding: 14px;
        }

        .car-modal-header h3 {
            font-size: 0.95rem;
        }

        .back-btn {
            visibility: visible;
        }

        /* Search */
        .car-search {
            padding: 12px;
        }

        .car-search input {
            font-size: 0.85rem;
            padding: 10px 12px;
        }

        /* Grid = App Icons */
        .car-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .car-card {
            padding: 12px 8px;
            border-radius: 16px;
        }

        .car-card img {
            height: 50px;
            border-radius: 40px;
        }

        .car-card span {
            font-size: 0.75rem;
        }

        .model-price {
            font-size: 0.7rem;
        }
    }
</style>

<!-- CAR SELECTION MODAL -->
<div class="car-modal" id="carModal">
    <div class="car-modal-sheet">

        <!-- HEADER -->
        <div class="car-modal-header">
            <button class="back-btn" id="backBtn">←</button>
            <h3 id="modalTitle">Select Manufacturer</h3>
            <button class="close-btn" id="closeCarModal">✕</button>
        </div>

        <!-- SEARCH -->
        <div class="car-search">
            <input type="text" id="searchInput" placeholder="Search brand or model">
        </div>

        <!-- CONTENT -->
        <div class="car-modal-body" id="brandView">

            <!-- BRAND GRID -->
            <div class="car-grid">



                <?php foreach ($modelData as $m) : ?>
                    <div class="car-card"
                        onclick="window.location.href='<?= base_url('brands/' . $brand['slug'] . '/' . $m['slug'] . '/' . 'book-online/') ?>'"
                        style="cursor:pointer;">

                        <img src="<?= base_url('public/assets/img/model/') . $m['image'] ?>">
                        <br><span><?= $m['name'] ?></span>

                    </div>
                <?php endforeach ?>


            </div>
        </div>


    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const modal = document.getElementById('carModal');
        const openBtn = document.getElementById('openCarModal');
        const closeBtn = document.getElementById('closeCarModal');
        const searchInput = document.getElementById('searchInput');

        if (!modal || !openBtn) return;

        // OPEN
        openBtn.addEventListener('click', () => {
            modal.classList.add('show');
        });

        // CLOSE
        closeBtn.addEventListener('click', () => {
            modal.classList.remove('show');
        });

        // SEARCH FILTER
        searchInput.addEventListener('keyup', function() {
            const value = this.value.toLowerCase();
            document.querySelectorAll('.car-card').forEach(card => {
                card.style.display =
                    card.innerText.toLowerCase().includes(value) ?
                    'block' :
                    'none';
            });
        });

    });
</script>