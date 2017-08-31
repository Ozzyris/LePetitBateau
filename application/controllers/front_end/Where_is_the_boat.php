<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Where_is_the_boat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('front_end/Artist_Model');
	}

	public function index(){
		$this->load->view('front_end/includes/head.php');
		$data = array();
		$data['anchor'] = 'where_is_the_boat';
		$data['highlight_artists'] = $this->Artist_Model->get_highlight_artist();
		$this->load->view('front_end/where_is_the_boat.php', $data);
	}
}