<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Category </h2>
                    <hr>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php
                $this->view('messages');
                ?>

                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left">Data Category</h5>
                        <a href="<?= site_url('category/add'); ?>" class="float-right btn btn-primary btn-sm">Tambah Kategori</a>
                    </div>
                    <div class="card-body p-0">
                        <?php
                        // debug apakah data bisa muncul atau tidak
                        // print_r($users->result()); 
                        ?>
                        <div class="table-responsive">
                            <table class="table" id="dt-show">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0 text-center">#</th>
                                        <th class="border-0">Category</th>
                                        <th class="border-0 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($row->result() as $key => $data) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $data->name_cat; ?></td>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= site_url('category/edit/' . $data->cat_id); ?>" class="btn btn-success btn-sm" title="Update">
                                                    <i class="fas fa-edit fa-fw"></i>
                                                </a>
                                                <a href="<?= site_url('category/del/' . $data->cat_id); ?>" class="btn btn-danger btn-sm" title="delete" onclick="return confirm('apakah anda yakin ingin menghapus data ini!')">
                                                    <i class="fas fa-trash fa-fw"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>