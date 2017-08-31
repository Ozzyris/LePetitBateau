<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends CI_Model{

	public function show_username_data(){
		$id = $this->session->userdata('user_id');
		$sql = $this->db->query("SELECT first_name FROM users WHERE id = '$id' LIMIT 1");
		return $sql->result()[0];
	}

	public function show_profile_data(){
		$sql = $this->db->query("SELECT first_name, last_name, email FROM users");
		return $sql->result()[0];
	}

	public function name_content( $user_id, $first_name, $last_name ){
        $sql = $this->db->query("UPDATE users SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$user_id'");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Name Updated');
			header('Content-Type: application/json');
    		return json_encode( $data );
		}
	}

	public function email_content( $user_id, $email ){
        $sql = $this->db->query("UPDATE users SET email = '$email' WHERE id = '$user_id'");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Email Updated');
			header('Content-Type: application/json');
    		return json_encode( $data );
		}
	}

}