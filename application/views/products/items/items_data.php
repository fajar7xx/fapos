<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Product Items </h2>
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
                        <h5 class="float-left">Product Items</h5>
                        <a href="<?= site_url('items/add'); ?>" class="float-right btn btn-primary btn-sm">Tambah Item Product</a>
                    </div>
                    <div class="card-body p-0">
                        <?php
                        // debug apakah data bisa muncul atau tidak
                        // print_r($users->result()); 
                        ?>
                        <div class="table-responsive p-2">
                            <table class="table table-show table-hover">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0 text-center">#</th>
                                        <th class="border-0">Images</th>
                                        <th class="border-0">Barcode</th>
                                        <th class="border-0">Nama Item</th>
                                        <th class="border-0">Kategory</th>
                                        <th class="border-0">Unit</th>
                                        <th class="border-0">Harga</th>
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
                                            <td>
                                                <?php
                                                    if ($data->picture != null) :
                                                        ?>
                                                    <img src="<?= base_url('images/products/' . $data->picture); ?>" class="img-fluid img-thumbnail" style="height: 50px; width: auto;">
                                                <?php
                                                    else :
                                                        ?>
                                                    <img src="<?= base_url('images/product.png'); ?>" class="img-fluid img-thumbnail" style="height: 50px; width: auto;">
                                                <?php
                                                    endif;
                                                    ?>
                                            </td>
                                            <td><?= $data->barcode; ?></td>
                                            <td><?= $data->name_item; ?></td>
                                            <td><?= $data->category; ?></td>
                                            <td><?= $data->unit; ?></td>
                                            <td><?= rupiah($data->price); ?></td>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= site_url('items/edit/' . $data->item_id); ?>" class="btn btn-success btn-xs" title="Update">
                                                    <i class="fas fa-edit fa-fw"></i>
                                                </a>
                                                <a href="<?= site_url('items/del/' . $data->item_id); ?>" class="btn btn-danger btn-xs" title="delete" onclick="return confirm('apakah anda yakin ingin menghapus data ini!')">
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