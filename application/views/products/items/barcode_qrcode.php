<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Barcode Generator</h2>
                        <a href="<?= site_url('items'); ?>" class="btn btn-warning">Back</a>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="ecommerce-widget">

                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h4 class="card-header">Barcode Generator</h4>
                            <div class="card-body p-4">
                                <?php
                                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '"><br>';
                                echo $row->barcode;
                                ?>
                                <a href="<?= site_url('items/print_barcode/' . $row->item_id); ?>" class="btn btn-block btn-primary mt-4" target="blank">Print Barcode</a>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h4 class="card-header">QR Code Generator</h4>
                            <div class="card-body p-4">
                                <?php
                                $qrCode = new Endroid\QrCode\QrCode($row->barcode);

                                $qrCode->writeFile('images/qr-code/item-' . $row->item_id . '.png');
                                ?>
                                <img src="<?= base_url('/images/qr-code/item-' . $row->item_id . '.png'); ?>" class="img-fluid" style="width:200px; height:auto;">
                                <br>
                                <?= $row->barcode; ?>
                                <a href="<?= site_url('items/print_qrcode/' . $row->item_id); ?>" class="btn btn-block btn-primary mt-4" target="blank">Print QRcode</a>
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