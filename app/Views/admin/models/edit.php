<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('p_name') ?>Brands|Edit<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <?php $session = session() ?>
    <?php $invalidCreds = session()->get('invalid_creds'); ?>
    <?php $errors = $invalidCreds['errors'] ?? []; ?>


    <?php if ($session->get('invalid_creds') !== null) : ?>
        <div class="card card-<?= $session->get('invalid_creds')['type'] ?>">
            <div class="card-header">
                <h3 class="card-title">
                    <?php foreach ($errors as $err): ?>
                        <?= esc($err) ?><br>
                    <?php endforeach; ?>
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!-- ⭐ FORM START -->
    <form method="POST" action="<?= base_url('admin/models/edit/' . $modelData['id']) ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <!-- ⭐ IMAGE FIELD WITH DRAG & DROP + LIVE PREVIEW -->
        <div class="mb-3">
            <label class="form-label">Logo</label>
            <?php if (!empty($errors['image'])) : ?>
                <span class="bg-danger">** <?= esc($errors['image']) ?></span>
            <?php endif; ?>

            <div class="row g-3 align-items-start">

                <!-- ⭐ PREVIEW BOX -->
                <div class="col-12 col-md-3">
                    <div id="previewBox"
                        style="width:100%; height:120px; border-radius:10px; background:rgba(255,255,255,0.05);
                       border:1px dashed rgba(255,255,255,0.15); display:flex; align-items:center;
                       justify-content:center; overflow:hidden;">

                        <img id="previewImage"
                            src="<?= base_url('uploads/models/' . $modelData['image']) ?>"
                            style="width:100%; height:100%; object-fit:contain;">

                    </div>
                </div>

                <!-- ⭐ DRAG & DROP ZONE -->
                <div class="col-12 col-md-9">
                    <div id="dropZone"
                        style="padding:18px; border:2px dashed rgba(255,255,255,0.25); border-radius:10px;
                           text-align:center; cursor:pointer;">

                        <i class="fas fa-upload fa-2x text-light"></i>

                        <h6 class="mt-2 mb-1 text-white">Drag & Drop or Click to Upload</h6>
                        <p class="small text-muted mb-0">JPG, JPEG, PNG, WEBP — Max 2MB</p>
                    </div>

                    <input type="file" id="service_image" name="image"
                        accept="image/png, image/jpeg, image/jpg, image/webp"
                        style="display:none;">
                </div>

            </div>
        </div>







        <!-- ⭐ TITLE FIELD -->
        <div class="mb-3">
            <label for="name" class="form-label">Model Name</label>
            <?php if (!empty($errors['name'])) : ?>
                <span class="bg-danger"> ** <?= esc($errors['name']) ?></span>
            <?php endif; ?>
            <input id="brandName" type="text" name="name" class="form-control" value="<?= esc($modelData['name']) ?>">
        </div>




        <!-- Slug -->
        <div class="mb-3">
            <label class="form-label text-white">Slug</label>
            <input type="text" name="slug" class="form-control"
                id="slug"
                value="<?= esc($modelData['slug']) ?>">
        </div>









        <div class="mb-3">
            <label for="brand" class="form-label">Brand name</label>
            <select name="brand" class="form-control">
                <?php for ($i = 0; $i < count($brandD); $i++) : ?>
                    <?php if ($modelData["brand_id"] === $brandD[$i]["brand_id"]) : ?>
                        <option value="<?= $brandD[$i]["brand_id"] ?>" selected><?= $brandD[$i]["name"] ?></option>
                    <?php else : ?>
                        <option value="<?= $brandD[$i]["brand_id"] ?>"><?= $brandD[$i]["name"] ?></option>
                    <?php endif; ?>
                <?php endfor; ?>
            </select>
        </div>










        <!-- ⭐ ANIMATED SUBMIT BUTTON -->
        <button type="submit" id="submitBtn" class="btn btn-primary btn-lg px-4">
            <span id="submitText">Update</span>
        </button>


    </form>

</main>


<!-- ⭐ JS SCRIPT FOR DRAG-DROP, PREVIEW, BUTTON ANIMATION -->
<script>
    const dropZone = document.getElementById("dropZone");
    const fileInput = document.getElementById("service_image");
    const previewImg = document.getElementById("previewImage");

    dropZone.addEventListener("click", () => fileInput.click());

    fileInput.addEventListener("change", function() {
        showPreview(this.files[0]);
    });

    dropZone.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZone.style.borderColor = "#fff";
    });

    dropZone.addEventListener("dragleave", () => {
        dropZone.style.borderColor = "rgba(255,255,255,0.25)";
    });

    dropZone.addEventListener("drop", (e) => {
        e.preventDefault();
        dropZone.style.borderColor = "rgba(255,255,255,0.25)";
        const file = e.dataTransfer.files[0];
        fileInput.files = e.dataTransfer.files;
        showPreview(file);
    });

    function showPreview(file) {
        if (!file) return;

        if (file.type.startsWith("image/")) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                previewImg.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    }

    // AUTO SLUG
    document.getElementById("brandName").addEventListener("keyup", function() {
        let text = this.value.toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById("slug").value = text;
    });
</script>




<?= $this->endSection() ?>

<!-- /.content -->

</div>

<!-- /.content-wrapper -->



<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

</aside>

<!-- /.control-sidebar -->