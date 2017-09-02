<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_recapitulatif extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('front_end/Artist_Model');
	}

	public function index( $id ){
		$this->load->view('front_end/includes/head.php');
		$data = array();
		$data['anchor'] = 'shop';
		$data['highlight_artists'] = $this->Artist_Model->get_highlight_artist();
		$this->load->view('front_end/payment_recapitulatif.php', $data);
	}
}