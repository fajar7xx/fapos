<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Units extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Unit_model');
    }

    public function index()
    {
        // $this->load->view('dashboard');

        $data['row'] = $this->Unit_model->get();
        $this->templates->load('template', 'products/unit/unit_data', $data);
    }

    public function add()
    {
        $unit = new stdClass();
        $unit->unit_id = null;
        $unit->name_unit = null;
        $data = [
            'page' => 'add',
            'row' => $unit
        ];

        $this->templates->load('template', 'products/unit/unit_form', $data);
    }

    public function edit($id)
    {
        $query = $this->Unit_model->get($id);
        if ($query->num_rows() > 0) {
            $units = $query->row();

            $data = [
                'page' => 'edit',
                'row' => $units
            ];

            $this->templates->load('template', 'products/unit/unit_form', $data);
        } else {
            echo "<script>alert('data tidak ditemukan')</script>";
            echo "<script>window.location='" . site_url('units') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->Unit_model->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->Unit_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('data berhasil disimpan')</script>";
            $this->session->set_flashdata('success', 'Data Berhasil di simpan');
        }
        // echo "<script>window.location='" . site_url('units') . "'</script>";
        redirect('units');
    }


    public function del($id)
    {
        $this->Unit_model->del($id);
        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('data berhasil dihapus')</script>";
            $this->session->set_flashdata('delete', 'Data Berhasil di hapus');
        }
        // echo "<script>window.location='" . site_url('units') . "'</script>";
        redirect('units');
    }
}
