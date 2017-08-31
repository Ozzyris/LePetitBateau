<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
    	parent::__construct();
  	}

	public function index(){
    $this->load->view('alfred_at_work/includes/head.php');
		$this->load->view('alfred_at_work/login.php');
	}

	public function auth(){
		if(isset( $_POST['email'], $_POST['password']) ){
			if (!$this->ion_auth->is_max_login_attempts_exceeded($_POST['email'])){
				if($this->ion_auth->login($_POST['email'], $_POST['password'])){
					$this->ion_auth->clear_login_attempts($_POST['email']);
					$userId = $this->ion_auth->get_user_id();
					$session_data = array( 'user_id'  => $userId );
                	$this->session->set_userdata($session_data);
					$data = array("status" => 'success', 'message' => 'Loggin in.');
					header('Content-Type: application/json');
					echo json_encode( $data );

				}else{
					$error = $this->ion_auth->errors();
					$data = array("status" => 'error', 'message' => $error);
					header('Content-Type: application/json');
					echo json_encode( $data );
				}
			}else{
				$data = array("status" => 'error', 'message' => 'You have too many login attempts');
				header('Content-Type: application/json');
				echo json_encode( $data );
			}
		}else{
			die('Not found');
		}
	}

	public function logout(){
	    $this->ion_auth->logout();
	    redirect('alfredatwork/login');
	}
}