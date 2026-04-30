<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Banners<?= $this->endSection() ?>
<?= $this->section('content') ?>



<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <div>

        <a href="<?= base_url('admin/models/create') ?>">
            <button type="button" class="btn btn-primary m-2">
                Add
            </button>
        </a>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Car Models</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Slug</th>
                            <th>Actions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($modelData as $key => $p): ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <?php
                                    $imageFile = $p['image'] ?? '';
                                    $uploadedImagePath = 'uploads/models/' . $imageFile;
                                    $fallbackImagePath = 'public/assets/img/model/' . ($p['slug'] ?? '') . '.png';
                                    $imagePath = $uploadedImagePath;

                                    if (empty($imageFile) || !is_file(FCPATH . $uploadedImagePath)) {
                                        $imagePath = $fallbackImagePath;
                                    }
                                ?>
                                <td>
                                    <img src="<?= base_url($imagePath) ?>"
                                        class="img-circle elevation-2" style="height :50px ; width:50px"
                                        onerror="this.src='<?= base_url('public/assets/web/img/model/alto.png') ?>'">
                                </td>

                                <td><?= $p['name'] ?></td>
                                <td><?= $p['brand_name'] ?></td>

                                <td><?= $p['slug'] ?></td>

                                <td><a href="<?= base_url("/admin/models/edit/" . $p["id"]) ?>" class="text-white"><button class="btn-success btn">Edit</button></a></td>

                                <td>
                                    <a href="<?= base_url("/admin/models/delete/" . $p['id']) ?>"
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
                            <th>Brand</th>
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