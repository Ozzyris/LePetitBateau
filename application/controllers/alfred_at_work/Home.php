<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){ redirect('alfredatwork/login'); }
		$this->load->model('alfred_at_work/Profile_Model');
	}

	public function index(){
		$this->load->view('alfred_at_work/includes/head.php');
		$datas = array();
		$datas['anchor'] = 'home';
		$datas['first_name'] = $this->Profile_Model->show_username_data()->first_name;
		$this->load->view('alfred_at_work/home.php', $datas);
	}
}