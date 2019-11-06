<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		check_not_login();
		$this->load->model('Users_model');
	}

	public function index()
	{
		// $this->load->view('dashboard');
		// check_not_login();

		// $this->load->model('Users_model');
		$data['users'] = $this->Users_model->getUser();

		$this->templates->load('template', 'users/user_data', $data);
	}

	public function add_user()
	{
		// load library dlu
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');

		// validasikan
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');
		$this->form_validation->set_rules(
			'password2',
			'Konfirmasi Password',
			'required|trim|matches[password]',
			[
				'matches' => '%s tidak sesuai dengan password'
			]
		);
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('level', 'Level', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan di isi ya');
		$this->form_validation->set_message('min_length', '%s terlalu pendek, min 6 karakter');
		$this->form_validation->set_message('is_unique', '{field} telah digunakan, silahkan menggunakan yang lain');

		if ($this->form_validation->run() == FALSE) {
			$this->templates->load('template', 'users/user_add');
		} else {
			// echo "SUkses dopng";

			$post = $this->input->post(NULL, TRUE);
			$this->Users_model->addUser($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('data berhasil disimpan')</script>";
			}
			echo "<script>window.location='" . site_url('users') . "'</script>";
		}
	}
}
