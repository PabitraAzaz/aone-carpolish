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
            <h5 class="mb-0">✨ নতুন টেস্টিমোনিয়াল যোগ করুন</h5>
            <a href="<?= base_url('admin/testimonial') ?>" class="btn btn-sm btn-light">
                <i class="bi bi-list"></i> সব টেস্টিমোনিয়াল
            </a>
        </div>

        <div class="card-body">
            <form action="<?= base_url('admin/testimonial/create-testimonial') ?>" method="POST" enctype="multipart/form-data">

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">👤 ক্লায়েন্টের নাম</label>
                    <input type="text" name="name" class="form-control" placeholder="ক্লায়েন্টের নাম লিখুন" required>
                </div>

                <!-- Profession -->
                <div class="mb-3">
                    <label class="form-label">💼 পেশা / টাইটেল</label>
                    <input type="text" name="profession" class="form-control" placeholder="যেমন: ব্যবসায়ী, ডাক্তার" required>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="form-label">🏠 ঠিকানা</label>
                    <input type="text" name="address" class="form-control" placeholder="কলকাতা" required>
                </div>

                <!-- Testimonial -->
                <div class="mb-3">
                    <label class="form-label">📝 মন্তব্য</label>
                    <textarea name="message" rows="4" class="form-control" placeholder="ক্লায়েন্টের অভিজ্ঞতা লিখুন..." required></textarea>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label class="form-label">📸 ছবি (ঐচ্ছিক)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-success fw-bold px-4">✅ সংরক্ষণ করুন</button>
            </form>
        </div>
    </div>
</div>




<?= $this->endsection() ?>