<?php
if ($this->session->has_userdata('success')) :
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses</strong> <?= $this->session->userdata('success'); ?>.
        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </a>
    </div>
<?php
elseif ($this->session->has_userdata('delete')) :
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sukses</strong> <?= $this->session->userdata('delete'); ?>.
        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </a>
    </div>
<?php
elseif ($this->session->has_userdata('error')) :
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error</strong> <?= $this->session->userdata('error'); ?>.
        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </a>
    </div>
<?php
endif;
?>