<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		check_not_login();

		// autentikasi agar yang bukan admin d riderct aja
		check_admin();

		$this->load->model('Users_model');

		// loadlibrary dan helper
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');
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

	public function edit($id)
	{
		// validasikan
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'trim|min_length[5]|callback_username_check');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'password', 'trim|min_length[6]');
			$this->form_validation->set_rules(
				'password2',
				'Konfirmasi Password',
				'required|trim|matches[password]',
				[
					'matches' => '%s tidak sesuai dengan password'
				]
			);
		}
		if ($this->input->post('password2')) {
			$this->form_validation->set_rules(
				'password2',
				'Konfirmasi Password',
				'required|trim|matches[password]',
				[
					'matches' => '%s tidak sesuai dengan password'
				]
			);
		}
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('level', 'Level', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan di isi ya');
		$this->form_validation->set_message('min_length', '%s terlalu pendek, min 6 karakter');
		$this->form_validation->set_message('is_unique', '{field} telah digunakan, silahkan menggunakan yang lain');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->Users_model->getUser($id);
			if ($query->num_rows() > 0) {
				$data['user'] = $query->row();
				$this->templates->load('template', 'users/user_edit', $data);
			} else {
				echo "<script>alert('data tidak ditemukan')</script>";
				echo "<script>window.location='" . site_url('users') . "'</script>";
			}
		} else {
			// echo "SUkses dopng";

			$post = $this->input->post(NULL, TRUE);
			$this->Users_model->updateUser($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('data berhasil disimpan')</script>";
			}
			echo "<script>window.location='" . site_url('users') . "'</script>";
		}
	}

	// method callbanck username check
	public function username_check()
	{
		$post = $this->input->post(NULL, TRUE);
		$query = $this->db->query("SELECT * FROM users WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} ini sudah dipakai. silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$this->Users_model->deleteUser($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('data berhasil dihapus')</script>";
		}
		echo "<script>window.location='" . site_url('users') . "'</script>";
	}
}
