<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qrcode Product - <?= $row->barcode; ?></title>
</head>

<body>
    <img src="images/qr-code/item-<?= $row->item_id; ?>.png" class="img-fluid" style="width:200px; height:auto;">
    <br>
    <?= $row->barcode; ?>
</body>

</html>