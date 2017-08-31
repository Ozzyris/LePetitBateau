<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model{
	
	public function email_check( $email ){
		$sql = $this->db->query("SELECT email FROM users WHERE email = '$email' LIMIT 1");
		if( $sql->num_rows() != 0 ){
			return 'true';
		}else{
			header('HTTP/1.1 500 The email adress you enter is incorect' );
       		header('Content-Type: application/json; charset=UTF-8');
        	die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
		}
		
	}	

	public function get_user_id( $token ){
		$sql = $this->db->query("SELECT id FROM users WHERE forgotten_password_code = '$token' LIMIT 1");
		if( $sql->num_rows() != 0 ){
			return $sql->result()[0];
		}else{
			return false;
		}
		
	}
	
}