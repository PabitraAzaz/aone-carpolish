<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Banners<?= $this->endSection() ?>
<?= $this->section('content') ?>



<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <div>

        <a href="<?= base_url('admin/brands/create') ?>">
            <button type="button" class="btn btn-primary m-2">
                Add
            </button>
        </a>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Banners</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Actions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($brands as $key => $p): ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <?php
                                    $logoFile = $p['logo'] ?? '';
                                    $uploadedLogoPath = 'uploads/brands/' . $logoFile;
                                    $fallbackLogoPath = 'public/assets/img/brand/' . ($p['slug'] ?? '') . '.png';
                                    $logoPath = $uploadedLogoPath;

                                    if (empty($logoFile) || !is_file(FCPATH . $uploadedLogoPath)) {
                                        $logoPath = $fallbackLogoPath;
                                    }
                                ?>
                                <td>
                                    <img src="<?= base_url($logoPath) ?>"
                                        class="img-circle elevation-2" style="height :50px ; width:50px"
                                        onerror="this.src='<?= base_url('public/assets/web/img/brand_logos/1.png') ?>'">
                                </td>

                                <td><?= $p['name'] ?></td>
                                <td><?= $p['slug'] ?></td>

                                <td><a href="<?= base_url("/admin/brands/edit/" . $p["brand_id"]) ?>" class="text-white"><button class="btn-success btn">Edit</button></a></td>

                                <td>
                                    <a href="<?= base_url("/admin/brands/delete/" . $p['brand_id']) ?>"
                                        class="text-white"
                                        onclick="return confirm('Are you sure you want to delete <?= addslashes($p['name']) ?> ?')">
                                        <button class="btn-danger btn">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>


                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Actions</th>
                            <th>Actions</th>
                        </tr>

                    </tfoot>

                </table>

            </div>

            <!-- /.card-body -->

        </div>

    </div>

</main>



<?= $this->endSection() ?>

<!-- /.content -->

</div>

<!-- /.content-wrapper -->



<!-- Control Sidebar -->



<!-- /.control-sidebar -->