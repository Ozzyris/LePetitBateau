<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('alfred_at_work/Login_Model');
	}

	public function index(){
		$this->load->view('alfred_at_work/includes/head.php');
		$this->load->view('alfred_at_work/forgot_password.php');
	}

	public function send_recovery_email(){
		$email = $_POST['email'];
		$saved_email = $this->Login_Model->email_check( $email );

		if( $saved_email == 'true' ){
			$forgotten = $this->ion_auth->forgotten_password( $email );
			if( $forgotten ) {
				$data = array("status" => 'success', 'message' => 'A recovery email as been sent, check your spam.');
				header('Content-Type: application/json');
 				echo json_encode( $data );
			}else{
				echo $this->ion_auth->errors();
			}
		}
	}

}


