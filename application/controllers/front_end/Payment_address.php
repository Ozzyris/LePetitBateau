<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_address extends CI_Controller {

	public function __construct(){
		parent::__construct();
	   	$this->load->model('front_end/Artist_Model');
	   	$this->load->model('front_end/Payment_Model');
	}

	public function index(){
		$this->load->view('front_end/includes/head.php');
		$data = array();
		$data['anchor'] = 'shop';
		$data['highlight_artists'] = $this->Artist_Model->get_highlight_artist();
		$this->load->view('front_end/payment_address.php', $data);
	}

	public function save_user_data(){
		echo $this->Payment_Model->save_user_data( json_decode( $_POST['user_details'] ) );
	}
}