<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artist_Model extends CI_Model{

	public function show_last_three_artist_data(){
		$sql = $this->db->query("SELECT id, name, thumbnail_picture FROM artists WHERE status = '1' ORDER BY id DESC LIMIT 3");
		return $sql->result();
	}

	public function show_all_artist_data(){
		$sql = $this->db->query("SELECT id, name, thumbnail_picture FROM artists WHERE status = '1' ORDER BY id DESC");
		return $sql->result();
	}

	public function show_artist_details_data( $id ){
		$sql = $this->db->query("SELECT name, description FROM artists WHERE id = '$id'");
		return $sql->result()[0];
	}

	public function get_highlight_artist(){
		$sql = $this->db->query("SELECT id, name FROM artists WHERE status = '1' AND highlight ='1' ORDER BY name DESC");
		return $sql->result();
	}

}
