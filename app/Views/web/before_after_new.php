<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>
<div class="banner ba-banner">
    <h1><span class="typed-text typed-ba">Try Your Car Shine</span></h1>
</div>

<main class="car-clean-preview-page">
    <section class="upload-preview-section padd-mar">
        <div class="container">
            <div class="upload-preview-shell">
                <div class="upload-preview-copy">
                    <span class="upload-preview-kicker">Actual Car Preview</span>
                    <h2 class="section-title">Upload your dirty car image and preview a cleaner finish</h2>
                    <p class="upload-preview-text">
                        Add a real photo of your car and we will show a polished-looking preview using the same image,
                        so the car shape, color, and angle stay unchanged.
                    </p>

                    <div class="upload-preview-actions">
                        <label class="upload-trigger" for="carImageInput">
                            <span>Choose Car Image</span>
                            <small>JPG, PNG, WEBP up to 8MB</small>
                        </label>
                        <input type="file" id="carImageInput" accept="image/png,image/jpeg,image/webp">

                        <button type="button" class="preview-btn preview-btn-primary" id="generateCleanBtn">
                            Generate AI Washed Car
                        </button>
                        <button type="button" class="preview-btn" id="resetPreviewBtn">
                            Reset
                        </button>
                        <a href="#" class="preview-btn preview-btn-download disabled" id="downloadPreviewBtn" aria-disabled="true">
                            Download Result
                        </a>
                    </div>

                    <div class="upload-preview-note" id="uploadStatus">
                        Upload an image to generate the AI washed-car result.
                    </div>
                </div>

                <div class="upload-preview-grid">
                    <article class="preview-card">
                        <div class="preview-card-head">
                            <h3>Original Upload</h3>
                            <span>Dirty car image</span>
                        </div>
                        <div class="preview-stage" id="originalStage">
                            <img
                                id="originalPreview"
                                src="<?= base_url('public/assets/img/old_creta.png') ?>"
                                alt="Original car preview">
                        </div>
                    </article>

                    <article class="preview-card">
                        <div class="preview-card-head">
                            <h3>Cleaned Output</h3>
                            <span>Same car, clearer finish</span>
                        </div>
                        <div class="preview-stage preview-stage-output" id="resultStage">
                            <canvas id="cleanPreviewCanvas"></canvas>
                            <div class="preview-stage-placeholder" id="resultPlaceholder">
                                Upload a car image, then click "Generate AI Washed Car".
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    .car-clean-preview-page {
        padding-bottom: 60px;
    }

    .upload-preview-section .container {
        max-width: 1240px;
    }

    .upload-preview-shell {
        display: grid;
        gap: 28px;
        padding: 28px;
        border-radius: 32px;
        background:
            radial-gradient(circle at top left, rgba(255, 62, 48, 0.14), transparent 30%),
            radial-gradient(circle at bottom right, rgba(23, 107, 239, 0.12), transparent 28%),
            #fff;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.08);
    }

    .upload-preview-kicker {
        display: inline-flex;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(255, 62, 48, 0.1);
        color: #c6281f;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .upload-preview-copy .section-title {
        align-items: flex-start;
        margin-top: 16px;
        margin-bottom: 14px;
    }

    .upload-preview-copy .section-title::after {
        margin-left: 0;
    }

    .upload-preview-text {
        max-width: 720px;
        color: #475467;
        line-height: 1.7;
        margin-bottom: 0;
    }

    .upload-preview-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 24px;
    }

    #carImageInput {
        display: none;
    }

    .upload-trigger,
    .preview-btn {
        min-height: 54px;
        padding: 12px 18px;
        border-radius: 18px;
        border: 1px solid #d7dce5;
        background: #fff;
        color: #172033;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-weight: 600;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        cursor: pointer;
    }

    .upload-trigger {
        align-items: flex-start;
        flex-direction: column;
        justify-content: center;
        min-width: 220px;
    }

    .upload-trigger small {
        color: #667085;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .preview-btn-primary {
        border-color: transparent;
        background: linear-gradient(135deg, #ff5a36, #ff2f3d);
        color: #fff;
        box-shadow: 0 14px 30px rgba(255, 62, 48, 0.22);
    }

    .preview-btn-download.disabled {
        pointer-events: none;
        opacity: 0.55;
    }

    .upload-trigger:hover,
    .preview-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
    }

    .upload-preview-note {
        margin-top: 16px;
        color: #475467;
        font-size: 0.95rem;
    }

    .upload-preview-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
    }

    .preview-card {
        border-radius: 24px;
        overflow: hidden;
        background: #f8fafc;
        border: 1px solid rgba(15, 23, 42, 0.08);
    }

    .preview-card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 18px 20px;
        background: rgba(255, 255, 255, 0.88);
        border-bottom: 1px solid rgba(15, 23, 42, 0.08);
    }

    .preview-card-head h3 {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
    }

    .preview-card-head span {
        color: #667085;
        font-size: 0.85rem;
    }

    .preview-stage {
        position: relative;
        min-height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.55), rgba(255, 255, 255, 0.8)),
            repeating-linear-gradient(45deg, rgba(15, 23, 42, 0.03) 0, rgba(15, 23, 42, 0.03) 12px, transparent 12px, transparent 24px);
    }

    .preview-stage img,
    .preview-stage canvas {
        width: 100%;
        height: 420px;
        object-fit: cover;
        display: block;
    }

    .preview-stage-output canvas {
        display: none;
    }

    .preview-stage-output.is-loading::before {
        content: "Generating washed-car output...";
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(23, 32, 51, 0.72);
        color: #fff;
        font-size: 1rem;
        font-weight: 600;
        z-index: 2;
    }

    .preview-stage-placeholder {
        position: absolute;
        inset: auto 24px 24px 24px;
        padding: 14px 16px;
        border-radius: 16px;
        background: rgba(23, 32, 51, 0.82);
        color: #fff;
        font-size: 0.92rem;
        line-height: 1.5;
        text-align: center;
    }

    @media (max-width: 991px) {
        .upload-preview-grid {
            grid-template-columns: 1fr;
        }

        .preview-stage {
            min-height: 340px;
        }

        .preview-stage img,
        .preview-stage canvas {
            height: 340px;
        }
    }

    @media (max-width: 575px) {
        .upload-preview-shell {
            padding: 18px;
            border-radius: 24px;
        }

        .upload-trigger,
        .preview-btn {
            width: 100%;
        }

        .preview-card-head {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<script>
    (() => {
        const fileInput = document.getElementById('carImageInput');
        const originalPreview = document.getElementById('originalPreview');
        const generateButton = document.getElementById('generateCleanBtn');
        const resetButton = document.getElementById('resetPreviewBtn');
        const downloadButton = document.getElementById('downloadPreviewBtn');
        const statusNote = document.getElementById('uploadStatus');
        const canvas = document.getElementById('cleanPreviewCanvas');
        const placeholder = document.getElementById('resultPlaceholder');
        const resultStage = document.getElementById('resultStage');
        const csrfTokenName = '<?= csrf_token() ?>';
        const csrfHash = '<?= csrf_hash() ?>';

        const fallbackImage = originalPreview.src;
        let selectedFile = null;

        function setStatus(message) {
            statusNote.textContent = message;
        }

        function setDownloadState(enabled) {
            downloadButton.classList.toggle('disabled', !enabled);
            downloadButton.setAttribute('aria-disabled', enabled ? 'false' : 'true');
        }

        function renderResultImage(url) {
            const resultImage = new Image();
            resultImage.onload = () => {
                canvas.width = resultImage.naturalWidth || 1200;
                canvas.height = resultImage.naturalHeight || 800;
                const context = canvas.getContext('2d');
                context.clearRect(0, 0, canvas.width, canvas.height);
                context.drawImage(resultImage, 0, 0, canvas.width, canvas.height);
            };
            resultImage.src = url;
            placeholder.style.display = 'none';
            canvas.style.display = 'block';
        }

        function updateImageFromFile(file) {
            if (!file) {
                return;
            }

            if (file.size > 8 * 1024 * 1024) {
                setStatus('Please upload an image smaller than 8MB.');
                return;
            }

            const reader = new FileReader();
            reader.onload = event => {
                originalPreview.src = event.target.result;
                selectedFile = file;
                placeholder.style.display = 'block';
                canvas.style.display = 'none';
                setDownloadState(false);
                setStatus('Image uploaded. Click "Generate AI Washed Car" to create the washed output.');
            };
            reader.readAsDataURL(file);
        }

        async function generateWashedCar() {
            if (!selectedFile) {
                setStatus('Please upload a car image first.');
                return;
            }

            const formData = new FormData();
            formData.append('car_image', selectedFile);
            formData.append(csrfTokenName, csrfHash);

            resultStage.classList.add('is-loading');
            generateButton.disabled = true;
            setStatus('Sending your image to the AI service. This can take a little time.');

            try {
                const response = await fetch('<?= base_url('before_after/generate-washed-car') ?>', {
                    method: 'POST',
                    body: formData,
                });

                const payload = await response.json();

                if (!response.ok || !payload.success) {
                    throw new Error(payload.message || 'Failed to generate the washed-car image.');
                }

                renderResultImage(payload.result_url);
                downloadButton.href = payload.result_url;
                downloadButton.setAttribute('download', 'washed-car-result.png');
                setDownloadState(true);
                setStatus(payload.message || 'AI washed-car image generated successfully.');
            } catch (error) {
                canvas.style.display = 'none';
                placeholder.style.display = 'block';
                setDownloadState(false);
                setStatus(error.message || 'Something went wrong while generating the washed-car image.');
            } finally {
                resultStage.classList.remove('is-loading');
                generateButton.disabled = false;
            }
        }

        fileInput.addEventListener('change', event => {
            updateImageFromFile(event.target.files[0]);
        });

        generateButton.addEventListener('click', () => {
            generateWashedCar();
        });

        resetButton.addEventListener('click', () => {
            fileInput.value = '';
            originalPreview.src = fallbackImage;
            selectedFile = null;
            canvas.style.display = 'none';
            placeholder.style.display = 'block';
            setDownloadState(false);
            setStatus('Upload an image to generate the AI washed-car result.');
        });
    })();
</script>

<?= $this->endSection(); ?>
