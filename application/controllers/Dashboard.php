<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// $this->load->view('dashboard');
		check_not_login();
		$this->templates->load('template', 'dashboard');
	}
}
