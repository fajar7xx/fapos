<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Stock Out</h2>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php
                $this->view('messages');
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left">Data Stock Out </h5>
                        <a href="<?= site_url('stock/out/add'); ?>" class="float-right btn btn-primary btn-sm">Tambah Stok</a>
                    </div>
                    <div class="card-body p-0">
                        <?php
                        // debug apakah data bisa muncul atau tidak
                        // print_r($users->result()); 
                        ?>
                        <div class="table-responsive p-2">
                            <table class="table table-show">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0 text-center">#</th>
                                        <th class="border-0">Barcode</th>
                                        <th class="border-0">Item</th>
                                        <th class="border-0">Qty</th>
                                        <th class="border-0">Date</th>
                                        <th class="border-0 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($row as $key => $data):
                                    ?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$data->barcode;?></td>
                                            <td><?=$data->item;?></td>
                                            <td><?=$data->qty;?></td>
                                            <td><?=indo_date($data->date);?></td>
                                            <td>
                                            <button type="button" class="btn btn-xs btn-light" 
                                                id = "detailbuttonmodal"
                                                data-toggle="modal"
                                                data-target="#detailStockInModal"
                                                data-barcode="<?= $data->barcode; ?>" 
                                                data-itemName = "<?=$data->item;?>"
                                                data-supplierName = "<?=$data->supplier;?>"
                                                data-qty = "<?=$data->qty;?>"
                                                data-date = "<?=indo_date($data->date);?>"
                                                data-detail = "<?=$data->detail;?>"
                                                >
                                                Detail
                                            </button>
                                                <a href="<?=site_url('stock/in/del/'.$data->stock_id.'/'.$data->item_id);?>"class="btn btn-xs btn-danger">hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</div>


<!-- Modal -->
<div class="modal fade" id="detailStockInModal" tabindex="-1" role="dialog" aria-labelledby="detailStockInModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailStockInModalLabel">Detail Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" width="100%">
                    <tbody>
                        <tr>
                            <th style="width: 30%">Barcode</th>
                            <td>
                                <span id="barcode"></span>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Item Name</th>
                            <td>
                                <span id="itemName"></span>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Supplier Name</th>
                            <td>
                                <span id="supplier"></span>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Quantity</th>
                            <td>
                                <span id="qty"></span>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Date</th>
                            <td>
                                <span id="date"></span>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Detail</th>
                            <td>
                                <span id="detail"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>