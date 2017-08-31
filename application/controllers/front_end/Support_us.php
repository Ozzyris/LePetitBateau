<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support_us extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('front_end/Artist_Model');
	}

	public function index(){
		$this->load->view('front_end/includes/head.php');
		$data = array();
		$data['anchor'] = 'support_us';
		$data['highlight_artists'] = $this->Artist_Model->get_highlight_artist();
		$this->load->view('front_end/support_us.php', $data);
	}

	public function newsletter(){
		$result = $this->mailchimp->post("lists/ea46d17773/members", [ 'email_address' => $_POST['email'], 'status' => 'subscribed', ]);
		if ( $this->mailchimp ) {
			$data = array("status" => 'success', 'message' => 'Your email has been added to our newsletter');
			header('Content-Type: application/json');
			echo json_encode( $data );
		} else {
			$data = array("status" => 'error', 'message' => $MailChimp->getLastError());
			header('Content-Type: application/json');
			echo json_encode( $data );
		} 
	}
}