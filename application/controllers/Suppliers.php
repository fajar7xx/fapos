<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('Suppliers_model');
	}

	public function index()
	{
		// $this->load->view('dashboard');

		$data['row'] = $this->Suppliers_model->get();
		$this->templates->load('template', 'suppliers/suppliers_data', $data);
	}

	public function add()
	{
		$suppliers = new stdClass();
		$suppliers->supplier_id = null;
		$suppliers->name = null;
		$suppliers->phone = null;
		$suppliers->address = null;
		$suppliers->description = null;
		$data = [
			'page' => 'add',
			'row' => $suppliers
		];

		$this->templates->load('template', 'suppliers/suppliers_form', $data);
	}

	public function edit($id)
	{
		$query = $this->Suppliers_model->get($id);
		if ($query->num_rows() > 0) {
			$suppliers = $query->row();

			$data = [
				'page' => 'edit',
				'row' => $suppliers
			];

			$this->templates->load('template', 'suppliers/suppliers_form', $data);
		} else {
			echo "<script>alert('data tidak ditemukan')</script>";
			echo "<script>window.location='" . site_url('suppliers') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->Suppliers_model->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->Suppliers_model->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('data berhasil disimpan')</script>";
		}
		echo "<script>window.location='" . site_url('suppliers') . "'</script>";
	}


	public function del($id)
	{
		$this->Suppliers_model->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('data berhasil dihapus')</script>";
		}
		echo "<script>window.location='" . site_url('suppliers') . "'</script>";
	}
}
