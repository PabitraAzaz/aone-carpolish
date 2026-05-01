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


                <?php if (!empty($brands)): ?>
                    <?php foreach ($brands as $b) : ?>
                        <div class="car-card" data-brand="<?= $b['slug'] ?>">
                            <img src="<?= base_url('public/assets/img/brand/') . $b['logo'] ?>" style="height: 50px;">
                            <br><span><?= $b['name'] ?></span>
                        </div>
                    <?php endforeach ?>

                <?php else: ?>
                    <div class="car-card" data-brand="suzuki">
                        <img src="<?= base_url('public/assets/img/brand_logos/1.png') ?>" style="height: 50px;">
                        <br><span>Suzuki</span>
                    </div>


                    <div class="car-card" data-brand="audi">
                        <img src="<?= base_url('public/assets/img/brand/audi.png') ?>">
                        <br>
                        <span>Audi</span>
                    </div>
                    <div class="car-card" data-brand="bmw">
                        <img src="<?= base_url('public/assets/img/brand/bmw.png') ?>"><br>
                        <span>BMW</span>
                    </div>
                    <div class="car-card" data-brand="ford">
                        <img src="<?= base_url('public/assets/img/brand/ford.png') ?>"><br>
                        <span>Ford</span>
                    </div>
                    <div class="car-card" data-brand="honda">
                        <img src="<?= base_url('public/assets/img/brand/honda.png') ?>"><br>
                        <span>Honda</span>
                    </div>
                    <div class="car-card" data-brand="hyundai">
                        <img src="<?= base_url('public/assets/img/brand/hyundai.png') ?>"><br>
                        <span>Hyundai</span>
                    </div>
                    <div class="car-card" data-brand="jaguar">
                        <img src="<?= base_url('public/assets/img/brand/jaguar.png') ?>"><br>
                        <span>Jaguar</span>
                    </div>
                    <div class="car-card" data-brand="jeep">
                        <img src="<?= base_url('public/assets/img/brand/jeep.png') ?>"><br>
                        <span>Jeep</span>
                    </div>
                    <div class="car-card" data-brand="kia">
                        <img src="<?= base_url('public/assets/img/brand/kia.png') ?>"><br>
                        <span>Kia</span>
                    </div>
                    <div class="car-card" data-brand="land_rover">
                        <img src="<?= base_url('public/assets/img/brand/land_rover.png') ?>"><br>
                        <span>Land Rover</span>
                    </div>
                    <div class="car-card" data-brand="mahindra">
                        <img src="<?= base_url('public/assets/img/brand/mahindra.png') ?>"><br>
                        <span>Mahindra</span>
                    </div>
                    <div class="car-card" data-brand="mercedes_benz">
                        <img src="<?= base_url('public/assets/img/brand/mercedes_benz.png') ?>"><br>
                        <span>Mercedes-Benz</span>
                    </div>
                    <div class="car-card" data-brand="mg">
                        <img src="<?= base_url('public/assets/img/brand/mg.png') ?>"><br>
                        <span>MG</span>
                    </div>
                    <div class="car-card" data-brand="mitsubishi">
                        <img src="<?= base_url('public/assets/img/brand/mitsubishi.png') ?>"><br>
                        <span>Mitsubishi</span>
                    </div>
                    <div class="car-card" data-brand="nissan">
                        <img src="<?= base_url('public/assets/img/brand/nissan.png') ?>"><br>
                        <span>Nissan</span>
                    </div>
                    <div class="car-card" data-brand="renault">
                        <img src="<?= base_url('public/assets/img/brand/renault.png') ?>"><br>
                        <span>Renault</span>
                    </div>
                    <div class="car-card" data-brand="skoda">
                        <img src="<?= base_url('public/assets/img/brand/skoda.png') ?>"><br>
                        <span>Skoda</span>
                    </div>
                    <div class="car-card" data-brand="suzuki">
                        <img src="<?= base_url('public/assets/img/brand/suzuki.png') ?>"><br>
                        <span>Suzuki</span>
                    </div>
                    <div class="car-card" data-brand="tata">
                        <img src="<?= base_url('public/assets/img/brand/tata.png') ?>"><br>
                        <span>Tata</span>
                    </div>
                    <div class="car-card" data-brand="toyota">
                        <img src="<?= base_url('public/assets/img/brand/toyota.png') ?>"><br>
                        <span>Toyota</span>
                    </div>
                    <div class="car-card" data-brand="volkswagen">
                        <img src="<?= base_url('public/assets/img/brand/volkswagen.png') ?>"><br>
                        <span>Volkswagen</span>
                    </div>
                    <div class="car-card" data-brand="volvo">
                        <img src="<?= base_url('public/assets/img/brand/volvo.png') ?>"><br>
                        <span>Volvo</span>
                    </div>

                <?php endif ?>

            </div>
        </div>

        <!-- MODEL VIEW -->
        <div class="car-modal-body hidden" id="modelView">
            <div class="car-grid" id="modelGrid"></div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const modal = document.getElementById('carModal');
        const openBtn = document.getElementById('openCarModal');
        const closeBtn = document.getElementById('closeCarModal');
        const backBtn = document.getElementById('backBtn');
        const brandView = document.getElementById('brandView');
        const modelView = document.getElementById('modelView');
        const modelGrid = document.getElementById('modelGrid');
        const modalTitle = document.getElementById('modalTitle');

        let selectedCarData = {};
        let currentView = 'brand'; // brand or model



        if (!modal || !openBtn) return; // safety guard

        // Load car data from PHP (database) - grouped by brand slug
        const carsByBrand = {
            <?php if (isset($carData) && isset($brands)): ?>
                <?php $first = true;
                foreach ($carData as $brandId => $models): ?>
                    <?php
                    $brandInfo = null;
                    foreach ($brands as $b) {
                        if ($b['brand_id'] == $brandId) {
                            $brandInfo = $b;
                            break;
                        }
                    }
                    if ($brandInfo):
                    ?>
                        <?php if (!$first): ?>,
                        <?php endif; ?> '<?= $brandInfo['slug'] ?>': <?= json_encode(array_map(function ($m) use ($brandInfo) {
                                                                            $price = isset($m['price']) ? (float) $m['price'] : null;
                                                                            return [
                                                                                'id' => $m['id'],
                                                                                'name' => $m['name'],
                                                                                'model_slug' => $m['slug'], // Add model slug
                                                                                'brand_slug' => $brandInfo['slug'], // Add brand slug for easier access
                                                                                'price' => $price !== null ? '₹' . number_format($price, 0) : 'N/A'
                                                                            ];
                                                                        }, $models)) ?>
                    <?php $first = false;
                    endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        };

        // OPEN
        openBtn.addEventListener('click', () => {
            modal.classList.add('show');
            modalTitle.textContent = "Select Manufacturer";
            brandView.classList.remove('hidden');
            modelView.classList.add('hidden');
            backBtn.style.visibility = 'hidden';
            currentView = 'brand';
        });

        // CLOSE
        closeBtn.addEventListener('click', () => {
            modal.classList.remove('show');
            resetModal();
        });

        // BRAND CLICK
        document.querySelectorAll('.car-card[data-brand]').forEach(card => {
            card.addEventListener('click', () => {
                const brand = card.dataset.brand;
                selectedCarData.brand = brand;
                modalTitle.textContent = "Select Model";
                brandView.classList.add('hidden');
                modelView.classList.remove('hidden');
                backBtn.style.visibility = 'visible';
                currentView = 'model';
                renderModels(brand);
            });
        });

        // BACK BUTTON
        backBtn.addEventListener('click', () => {
            if (currentView === 'model') {
                // Go back to brand view
                modalTitle.textContent = "Select Manufacturer";
                brandView.classList.remove('hidden');
                modelView.classList.add('hidden');
                backBtn.style.visibility = 'hidden';
                currentView = 'brand';
            }
        });

        function renderModels(brand) {
            modelGrid.innerHTML = '';

            carsByBrand[brand].forEach(car => {
                const card = document.createElement('div');
                card.className = 'car-card';

                card.innerHTML = `
                <span>${car.name}</span>
                <div class="model-price">${car.price}</div>
            `;

                card.addEventListener('click', () => {
                    // Redirect to checkout with model_id (secure - price from database)
                    const url = `<?= base_url('brands/') ?>${car.brand_slug}/${car.model_slug}/book-online/`;

                    window.location.href = url;
                });

                modelGrid.appendChild(card);
            });
        }

        function resetModal() {
            modalTitle.textContent = "Select Manufacturer";
            brandView.classList.remove('hidden');
            modelView.classList.add('hidden');
            backBtn.style.visibility = 'hidden';
            currentView = 'brand';
        }

    });
</script>