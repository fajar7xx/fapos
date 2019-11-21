<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit User Data</h2>

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
                        <div class="card">
                            <h4 class="card-header">Add User</h4>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-6">
                                        <form action="" method="post" autocomplete="off">
                                            <input type="hidden" name="user_id" value="<?= $user->user_id; ?>">
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="fullname">Fullname<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="text" name="fullname" id="fullname" placeholder="Fullname" class="form-control" value="<?= $this->input->post('fullname') ?? $user->name; ?>">
                                                    <?php echo form_error('fullname', '<div class="text-danger text-sm">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="username">Username<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="text" name="username" id="username" placeholder="username" class="form-control" value="<?= $this->input->post('username') ?? $user->username; ?>">
                                                    <?php echo form_error('username', '<div class="text-danger text-sm">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="password">password</label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                                                    <small>Boleh Kosong jika tak ingin diganti</small>
                                                    <?php echo form_error('password', '<div class="text-danger text-sm">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="password2">Confirm Password</label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <input type="password" name="password2" id="password2" placeholder="Confirm password" class="form-control">
                                                    <?php echo form_error('password2', '<div class="text-danger text-sm">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="address">Address</label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control"><?= $this->input->post('address') ?? $user->address; ?></textarea>
                                                    <?php echo form_error('address', '<div class="text-danger text-sm">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="level">Level<span class="text-danger">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-8">
                                                    <select name="level" id="level" class="form-control">
                                                        <option value=""> --Choose Level-- </option>
                                                        <?php
                                                        $level = $this->input->post('level') ? $this->input->post('level') : $user->level;
                                                        ?>
                                                        <option value="1" <?= $level == 1 ? 'selected' : null; ?>>Admin</option>
                                                        <option value="2" <?= $level == 2 ? 'selected' : null; ?>>Kasir</option>
                                                    </select>
                                                    <?php echo form_error('level', '<div class="text-danger text-sm">', '</div>'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group row text-right">
                                                <div class="col col-sm-11 col-lg-11 offset-sm-1 offset-lg-0">
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                    <a href="<?= site_url('users'); ?>" class="btn btn-space btn-secondary">Cancel</a>
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