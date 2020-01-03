<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'Category_model',
            'Items_model',
            'Suppliers_model',
            'Stocks_model'
        ]);
    }


    // stock in
    public function stock_in_data()
    {
        // echo "data stok";
        $data['row'] = $this->Stocks_model->get_stock_in()->result();
        $this->templates->load('template', 'transaction/stock_in/stock_in_data', $data);
    }
    public function stock_in_add()
    {
        // echo "data tambah stok";
        $items = $this->Items_model->get()->result();
        $suppliers = $this->Suppliers_model->get()->result();
        $data = [
            'items' => $items,
            'suppliers' => $suppliers
        ];
        $this->templates->load('template', 'transaction/stock_in/stock_in_form', $data);
    }

    public function stock_in_del(){
        $stock_id = $this->uri->segment(4);
        $item_Id = $this->uri->segment(5);

        $qty = $this->Stocks_model->get($stock_id)->row()->qty;

        $data = [
            'qty' => $qty,
            'item_id' => $item_Id
        ];

        // update stok di product item
        $this->Items_model->update_stock_out($data);
        $this->Stocks_model->del($stock_id);


        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil di hapus');
        }
        redirect('stock/in');
    }

    public function process()
    {
        if (isset($_POST['stok_masuk'])) {
            // echo "proses tambah stok";
            $post = $this->input->post(null, TRUE);
            $this->Stocks_model->add_stock_in($post);
            $this->Items_model->update_stock_in($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil di simpan');
            }
            redirect('stock/in');
        } elseif (isset($_POST['stok_keluar'])) {
            // echo "Proses stok keluar";
            $post = $this->input->post(null, TRUE);

            $this->Stocks_model->add_stock_out($post);
            $this->Items_model->update_stock_out($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil di simpan');
            }
            redirect('stock/out');
        }
    }

    // stock out
    public function stock_out_data()
    {
        // echo "data stok";
        $data['row'] = $this->Stocks_model->get_stock_out()->result();
        $this->templates->load('template', 'transaction/stock_out/stock_out_data', $data);
    }
    public function stock_out_add()
    {
        // echo "data tambah stok";
        $items = $this->Items_model->get()->result();
        $suppliers = $this->Suppliers_model->get()->result();
        $data = [
            'items' => $items,
            'suppliers' => $suppliers
        ];
        $this->templates->load('template', 'transaction/stock_out/stock_out_form', $data);
    }
}
