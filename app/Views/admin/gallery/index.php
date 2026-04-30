<?= $this->extend('admin/components/assemble') ?>





<?= $this->section('content') ?>
<!-- Content -->








<div class="content">

    <div class="container mb-5">
        <a href="<?= base_url('admin/gallery/create') ?>"
            class="btn btn-sm btn-success">
            <i class="bi bi-plus"></i>নতুন ছবি যোগ করুন
        </a>

    </div>
    <div class="container-fluid">
        <h3 class="mb-4">⭐ ছবির লিস্ট</h3>

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

        <!-- Table -->
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>ছবি</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($gal)) : ?>
                        <?php foreach ($gal as $key => $t) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>

                                <!-- Image -->
                                <td>
                                    <?php if (!empty($t['image'])): ?>
                                        <img src="<?= base_url('uploads/gallery/' . $t['image']); ?>"
                                            alt="Gallery photo"
                                            class="img-thumbnail"
                                            style="width:60px; height:60px; object-fit:cover;">
                                    <?php else: ?>
                                        <span class="text-muted">N/A</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Actions -->
                                <td>
                                    <a href="<?= base_url('admin/gallery/delete/' . $t['id']); ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('আপনি কি নিশ্চিতভাবে মুছে ফেলতে চান?');">
                                        <i class="bi bi-trash"></i> ডিলিট
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





<?= $this->endsection() ?>