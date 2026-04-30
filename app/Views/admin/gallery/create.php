<?= $this->extend('admin/components/assemble') ?>


<?= $this->section('content') ?>
<!-- Content -->
<div class="content">
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Card Form -->
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">✨ নতুন ছবি যোগ করুন</h5>
            <a href="<?= base_url('admin/gallery') ?>" class="btn btn-sm btn-light">
                <i class="bi bi-list"></i> সব ছবি
            </a>
        </div>

        <div class="card-body">
            <form action="<?= base_url('admin/gallery/create') ?>" method="POST" enctype="multipart/form-data">

                <!-- Image -->
                <div class="mb-3">
                    <label class="form-label">📸 ছবি (ঐচ্ছিক)</label>
                    <small class="text-danger">(360*360 for best result)</small>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-success fw-bold px-4">✅ সংরক্ষণ করুন</button>
            </form>
        </div>
    </div>
</div>




<?= $this->endsection() ?>