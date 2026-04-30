<?= $this->extend('admin/components/assemble') ?>





<?= $this->section('content') ?>
<!-- Content -->


<div class="content">
    <div class="container-fluid">
        <h3 class="mb-4">📩 মেসেজ লিস্ট</h3>







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




        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>নাম</th>
                        <th>ফোন</th>
                        <th>হোয়াটসঅ্যাপ</th>
                        <th>বার্তা</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)) : ?>
                        <?php foreach ($data as $key => $msg) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= esc($msg['name']); ?></td>
                                <td><?= esc($msg['phone']); ?></td>
                                <td><?= esc($msg['whatsapp']); ?></td>
                                <td><?= esc($msg['message']); ?></td>
                                <td>
                                    <a href="<?= base_url('admin/form-data/delete/' . $msg['id']); ?>"
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