<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function process(){
		// echo "Proses nya berjalan";
		
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			// echo "proses login";
			$this->load->model('Users_model');
			$query = $this->Users_model->login($post);
			
			if($query->num_rows() > 0){
				// echo "login berhasil lo";
				$rows = $query->row();

				// debug hasilnya
				// echo $rows->username;
				// hasilnya : admin
				$params = [
					'user_id' => $rows->user_id,
					'level' => $rows->level
				];
				$this->session->set_userdata($params);
				echo "<script>
							alert('selamat login berhasil'); 
							window.location = '".site_url('dashboard')."';
					</script>";
			}else{
				// echo "loginmu ggal, kesian deh lo";
				echo "<script>
							alert('Gagal. Anda gagal login!'); 
							window.location = '".site_url('auth/login')."';
					</script>";
			}

		}else{
			// echo "tidak d proses lo";
			echo "<script>
							alert('Gagal. Anda gagal login!'); 
							window.location = '".site_url('auth/login')."';
					</script>";
		}
	}

	public function logout(){
		$params = [
			'user_id',
			'level'
		];
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
