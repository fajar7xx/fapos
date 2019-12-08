<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"><?= ucfirst($page); ?> Item</h2>

                        <hr>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">


                <div class="row">
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->

                    <!-- recent orders  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php
                        $this->view('messages');
                        ?>
                        <div class="card">
                            <h4 class="card-header"><?= ucfirst($page); ?> Item</h4>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-6">
                                        <form action="<?= site_url('items/process'); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="barcode">Barcode<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="hidden" name="id" value="<?= $row->item_id; ?>">
                                                    <input type="text" name="barcode" id="barcode" placeholder="barcode" class="form-control" value="<?= $row->barcode; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="name">Item Name<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="text" name="name" id="name" placeholder="name" class="form-control" value="<?= $row->name_item; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="category">Category<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <select name="category" id="category" class="custom-select">
                                                        <option value="">--choose a category--</option>
                                                        <?php
                                                        foreach ($category->result() as $key => $data) :
                                                            ?>
                                                            <option value="<?= $data->cat_id; ?>" <?= $data->cat_id == $row->cat_id ? 'selected' : NULL; ?>><?= $data->name_cat; ?></option>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="unit">unit<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <?= form_dropdown('unit', $units, $selected_unit, [
                                                        'class' => 'custom-select',
                                                        'required' => 'required',
                                                        'id' => 'unit'
                                                    ]); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="price">Price<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="number" name="price" id="price" placeholder="price" class="form-control" value="<?= $row->price; ?>" min="0" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="picture">Picture<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <?php
                                                    if ($page == 'edit') :
                                                        if ($row->picture != NULL) :
                                                            ?>
                                                            <div class="my-2">
                                                                <img src="<?= base_url('images/products/' . $row->picture); ?>" class="img-fluid img-thumbnail" style="height: auto; width: 320px;">
                                                            </div>
                                                    <?php
                                                        endif;
                                                    endif;
                                                    ?>
                                                    <input type="file" name="picture" id="picture" class="form-control">
                                                    <small class="form-text text-muted">
                                                        Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'tidak ada'; ?>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="form-group row text-right">
                                                <div class="col col-sm-11 col-lg-11 offset-sm-1 offset-lg-0">
                                                    <button type="submit" class="btn btn-space btn-primary" name="<?= $page; ?>"> Submit</button>
                                                    <a href="<?= site_url('Items'); ?>" class="btn btn-space btn-secondary">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end recent orders  -->
                    <!-- ============================================================== -->
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
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    Copyright © 2019 Concept. All rights reserved.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
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