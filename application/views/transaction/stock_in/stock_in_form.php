<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">
                            Stock In
                        </h2>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h4 class="card-header">Keterangan Barang Masuk</h4>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-6">
                                        <form action="<?= site_url('stock/process'); ?>" method="post" autocomplete="off">
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="tanggal">Tanggal<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="date" name="tanggal" id="tanggal" value="<?= date('Y-m-d'); ?>" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="barcode">Barcode<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8 input-group">
                                                    <input type="hidden" name="item_id">
                                                    <input type="text" name="barcode" id="barcode" class="form-control" required>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-item">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="item">item<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="text" name="item" id="item" class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for=""></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <!-- <input type="text" name="unit" id="unit" class="form-control" value="-" readonly> -->
                                                    <div class="form-row">
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                            <label for="unit">Item Unit<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="unit" name="unit" value="-" readonly>
                                                        </div>
                                                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mb-2">
                                                            <label for="stok">Initial Stock<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="stok" name="stok" value="-" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="detail">detail<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <textarea name="detail" id="detail" cols="30" rows="5" class="form-control" placeholder="Kulakan/tambahan/etc" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="supplier">supplier<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <select name="supplier" id="supplier" class="custom-select">
                                                        <option value="">--pilih supplier --</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="qty">qty<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="number" name="qty" id="qty" class="form-control" min="0" required>
                                                </div>
                                            </div>

                                            <div class="form-group row text-right">
                                                <div class="col col-sm-11 col-lg-11 offset-sm-1 offset-lg-0">
                                                    <button type="submit" name="stok_masuk" class="btn btn-space btn-primary"> Submit</button>
                                                    <a href="<?= site_url('stock/in/'); ?>" class="btn btn-space btn-secondary">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

</div>