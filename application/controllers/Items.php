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

    function get_ajax()
    {
        $list = $this->Items_model->get_datatables();
        // $data = array();
        $data = [];
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            // $row = array();
            $row = [];
            $row[] = $no . ".";
            $row[] = $item->picture != null ? '<img src="' . base_url('images/products' . $item->picture) . '" class="img-fluid img-thumbnail" style="height: 50px; width: auto;">' : '<img src="' . base_url('images/product.png') . '" class="img-fluid img-thumbnail" style="height: 50px; width: auto;">';

            $row[] = $item->barcode;
            // '<br><a href="' . site_url('item/barcode_qrcode/' . $item->item_id) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';

            $row[] = $item->name_item;
            $row[] = $item->category_name;
            $row[] = $item->unit_name;
            $row[] = rupiah($item->price);
            $row[] = $item->stock;

            // add html for action
            $row[] = '<a href="' . site_url('items/barcode_qrcode/' . $item->item_id) . '" class="btn btn-info btn-xs mr-1" title="Barcode - Qrcode"><i class="fas fa-barcode fa-fw"></i></a><a href="' . site_url('items/edit/' . $item->item_id) . '" class="btn btn-primary btn-xs" title="Update"><i class="fas fa-edit fa-fw"></i></a>
            <a href="' . site_url('items/del/' . $item->item_id) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash fa-fw"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Items_model->count_all(),
            "recordsFiltered" => $this->Items_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
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
                            $target_file = '/fapos/images/products' . $item->picture;

                            // var_dump($target_file);
                            // die;

                            delete_files($target_file, TRUE);
                            // unlink($target_file);

                            if (delete_files($target_file, TRUE)) {
                                echo "berhasil di hapus";
                                die;
                            } else {
                                echo "gagal dihapus";
                                die;
                            }
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
        $item = $this->Items_model->get($id)->row();
        if ($item->picture != NULL) {
            $target_file = '/fapos/images/products' . $item->picture;

            // var_dump($target_file);
            // die;

            delete_files($target_file, TRUE);
            // unlink($target_file);
        }
        $this->Items_model->del($id);
        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('data berhasil dihapus')</script>";
            $this->session->set_flashdata('delete', 'Data Berhasil di hapus');
        }
        // echo "<script>window.location='" . site_url('Items') . "'</script>";
        redirect('Items');
    }

    public function barcode_qrcode($id)
    {
        $data['row'] = $this->Items_model->get($id)->row();
        $this->templates->load('template', 'products/items/barcode_qrcode.php', $data);


        // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        // echo $generator->getBarcode('1234567890', $generator::TYPE_CODE_128);
    }

    function print_barcode($id)
    {
        $data['row'] = $this->Items_model->get($id)->row();
        $html = $this->load->view('products/items/barcode_print', $data, TRUE);
        $this->fungsi->PdfGenerator($html, 'barcode-' . $data['row']->barcode, 'A4', 'potrait');
    }

    function print_qrcode($id)
    {
        $data['row'] = $this->Items_model->get($id)->row();
        $html = $this->load->view('products/items/qrcode_print', $data, TRUE);
        $this->fungsi->PdfGenerator($html, 'qrcode-' . $data['row']->barcode, 'A4', 'potrait');
    }
}
