<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Category_model');
    }

    public function index()
    {
        // $this->load->view('dashboard');

        $data['row'] = $this->Category_model->get();
        $this->templates->load('template', 'products/category/category_data', $data);
    }

    public function add()
    {
        $category = new stdClass();
        $category->cat_id = null;
        $category->name_cat = null;
        $data = [
            'page' => 'add',
            'row' => $category
        ];

        $this->templates->load('template', 'products/category/category_form', $data);
    }

    public function edit($id)
    {
        $query = $this->Category_model->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();

            $data = [
                'page' => 'edit',
                'row' => $category
            ];

            $this->templates->load('template', 'products/category/category_form', $data);
        } else {
            echo "<script>alert('data tidak ditemukan')</script>";
            echo "<script>window.location='" . site_url('category') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->Category_model->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->Category_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('data berhasil disimpan')</script>";
            $this->session->set_flashdata('success', 'Data Berhasil di simpan');
        }
        // echo "<script>window.location='" . site_url('category') . "'</script>";
        redirect('category');
    }


    public function del($id)
    {
        $this->Category_model->del($id);
        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('data berhasil dihapus')</script>";
            $this->session->set_flashdata('delete', 'Data Berhasil di hapus');
        }
        // echo "<script>window.location='" . site_url('category') . "'</script>";
        redirect('category');
    }
}
