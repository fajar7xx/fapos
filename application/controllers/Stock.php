<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Category_model');
    }

    public function stock_in_data()
    {
        // echo "data stok";
        $this->templates->load('template', 'transaction/stock_in/stock_in_data');
    }
    public function stock_in_add()
    {
        // echo "data tambah stok";
        $this->templates->load('template', 'transaction/stock_in/stock_in_form');
    }

    public function process()
    {
        if (isset($_POST['stok_masuk'])) {
            echo "proses tambah stok";
        } elseif (isset($_POST['stok_keluar'])) {
            echo "Proses stok keluar";
        }
    }
}
