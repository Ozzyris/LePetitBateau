<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Set_password extends CI_Controller {

	public function __construct(){
    	parent::__construct();
		$this->load->model('alfred_at_work/Login_Model');
  	}

	public function index( $token ){
		$this->load->view('alfred_at_work/includes/head.php');
		$datas = array();
		$datas['token'] = $token;
		$this->load->view('alfred_at_work/set_password.php', $datas);
	}

	public function update_password(){
		$token = $_POST['token'];
		$password = $_POST['password'];
		$password_confirmation = $_POST['password_confirmation'];

		if($password == $password_confirmation){
			$id = $this->Login_Model->get_user_id( $token );
			$reset = $this->ion_auth->forgotten_password_complete($token);
	
			if ($reset){
				if( $id != false ){
					$id = $id->id;
					$data = array( 'password' => $password );
					if( $this->ion_auth->update($id, $data) ){
						$data = array("status" => 'success', 'message' => 'Password Reset'); 
						header('Content-Type: application/json');
						echo json_encode( $data );
					}
				}else{
					$data = array("status" => 'error', 'message' => 'Reset password Token expire, Please try again.');   
					header('Content-Type: application/json');
					echo json_encode( $data );
				}
			}else{
				$data = array("status" => 'error', 'message' => 'Reset password Token expire, Please try again.');   
				header('Content-Type: application/json');
				echo json_encode( $data );
			}
		}else{
			$data = array("status" => 'error', 'message' => 'Password do not match');    
			header('Content-Type: application/json');
			echo json_encode( $data );
		}
	}

}