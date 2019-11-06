<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">User Data</h2>

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
                            <div class="card-header">
                                <h5 class="float-left">Data Users</h5>
                                <a href="<?= site_url('users/add_user'); ?>" class="float-right btn btn-primary btn-sm">Tambah User</a>
                            </div>
                            <div class="card-body p-0">
                                <?php
                                // debug apakah data bisa muncul atau tidak
                                // print_r($users->result()); 
                                ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0 text-center">#</th>
                                                <th class="border-0">Username</th>
                                                <th class="border-0">Name</th>
                                                <th class="border-0">Address</th>
                                                <th class="border-0">level</th>
                                                <th class="border-0 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($users->result() as $key => $data) :
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $data->username; ?></td>
                                                    <td><?= $data->name; ?></td>
                                                    <td><?= $data->address; ?></td>
                                                    <td><?= $data->level == 1 ? '<span class="badge badge-primary">Admin</span>' : '<span class="badge badge-info">Kasir</span>'; ?></td>
                                                    <td class="text-center">
                                                        <a href="" class="btn btn-rounded btn-success btn-xs">Edit</a>
                                                        <a href="" class="btn btn-rounded btn-danger btn-xs">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                            <tr>
                                                <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View
                                                        Details</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
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