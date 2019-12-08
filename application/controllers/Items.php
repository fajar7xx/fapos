<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'Items_model',
            'Category_model',
            'Unit_model'
        ]);
    }

    public function index()
    {
        // $this->load->view('dashboard');

        $data['row'] = $this->Items_model->get();
        $this->templates->load('template', 'products/items/items_data.php', $data);
    }

    public function add()
    {
        $Items = new stdClass();
        $Items->item_id = null;
        $Items->barcode = null;
        $Items->name_item = null;
        $Items->price = null;
        $Items->cat_id = null;

        $select_category = $this->Category_model->get();

        $select_unit = $this->Unit_model->get();
        $units[null] = '--Choose Unit--';
        foreach ($select_unit->result() as $unit) {
            $units[$unit->unit_id] = $unit->name_unit;
        }

        $data = [
            'page' => 'add',
            'row' => $Items,
            'category' => $select_category,
            'units' => $units,
            'selected_unit' => NULL,
        ];

        $this->templates->load('template', 'products/items/items_form', $data);
    }

    public function edit($id)
    {
        $query = $this->Items_model->get($id);
        if ($query->num_rows() > 0) {
            $Items = $query->row();

            $select_category = $this->Category_model->get();

            $select_unit = $this->Unit_model->get();
            $units[null] = '--Choose Unit--';
            foreach ($select_unit->result() as $unit) {
                $units[$unit->unit_id] = $unit->name_unit;
            }

            $data = [
                'page' => 'edit',
                'row' => $Items,
                'category' => $select_category,
                'units' => $units,
                'selected_unit' => $Items->unit_id,
            ];
            $this->templates->load('template', 'products/items/items_form', $data);
        } else {
            echo "<script>alert('data tidak ditemukan')</script>";
            echo "<script>window.location='" . site_url('Items') . "'</script>";
        }
    }

    public function process()
    {
        // konfigurasi untul upload file/image
        $config['upload_path'] = './images/products/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 512;
        $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 100);

        // load library for upload
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->Items_model->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode sudah dimiliki, harap menggunakan barcode lainnya");
                redirect('Items/add');
            } else {
                if (@$_FILES['picture']['name'] != NULL) {
                    if ($this->upload->do_upload('picture')) {
                        $post['picture'] = $this->upload->data('file_name');
                        $this->Items_model->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Berhasil di simpan');
                        }
                        redirect('Items');
                    } else {
                        $error = $this->Upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('Items/add');
                    }
                } else {
                    $post['picture'] = NULL;
                    $this->Items_model->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil di simpan');
                    }
                    redirect('Items');
                }
            }
        } elseif (isset($_POST['edit'])) {
            if ($this->Items_model->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode sudah dimiliki, harap menggunakan barcode lainnya");
                redirect('Items/edit/' . $post['id']);
            } else {
                if (@$_FILES['picture']['name'] != NULL) {
                    if ($this->upload->do_upload('picture')) {

                        // replace gambar or file
                        $item = $this->Items_model->get($post['id'])->row();
                        if ($item->picture != NULL) {
                            $target_file = './images/products/' . $item->picture;
                            // delete_files($target_file);
                            unlink($target_file);
                        }


                        $post['picture'] = $this->upload->data('file_name');
                        $this->Items_model->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Berhasil di simpan');
                        }
                        redirect('Items');
                    } else {
                        $error = $this->Upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('Items/edit/' . $post['id']);
                    }
                } else {
                    $post['picture'] = NULL;
                    $this->Items_model->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil di simpan');
                    }
                    redirect('Items');
                }
            }
        }
    }


    public function del($id)
    {
        $this->Items_model->del($id);
        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('data berhasil dihapus')</script>";
            $this->session->set_flashdata('delete', 'Data Berhasil di hapus');
        }
        // echo "<script>window.location='" . site_url('Items') . "'</script>";
        redirect('Items');
    }
}
