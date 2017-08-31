<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model{

	public function show_system_data(){
		$sql = $this->db->query("SELECT * FROM system_news ORDER BY timestamp DESC LIMIT 10");
		return $sql->result();
	}

	public function archive_system_data( $id ){
		$sql = $this->db->query("UPDATE system_news SET status='0' WHERE id = $id LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Element Archive');
			header('Content-Type: application/json');
    		return json_encode( $data );
		}
	}

}