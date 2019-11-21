<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"><?= ucfirst($page); ?> Costumer Data</h2>

                        <hr>
                    </div>
                </div>
            </div>
            <div class="ecommerce-widget">


                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h4 class="card-header">Add Customer</h4>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-6">
                                        <form action="<?= site_url('customers/process'); ?>" method="post" autocomplete="off">
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="name">Customer Name<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="hidden" name="id" value="<?= $row->customer_id; ?>">
                                                    <input type="text" name="name" id="name" placeholder="name" class="form-control" value="<?= $row->name; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="gender">Gender<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <select name="gender" id="gender" class="form-control" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="L" <?= $row->gender == 'L' ? 'selected' : null; ?>>Laki - laki</option>
                                                        <option value="P" <?= $row->gender == 'P' ? 'selected' : null; ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="phone">Phone<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="<?= $row->phone; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="address">Address<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <textarea name="address" id="address" class="form-control" cols="30" rows="10" required><?= $row->address; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row text-right">
                                                <div class="col col-sm-11 col-lg-11 offset-sm-1 offset-lg-0">
                                                    <button type="submit" class="btn btn-space btn-primary" name="<?= $page; ?>"> Submit</button>
                                                    <a href="<?= site_url('customers'); ?>" class="btn btn-space btn-secondary">Cancel</a>
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