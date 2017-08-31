<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artwork_Model extends CI_Model{

	public function show_last_three_artwork_data(){
		$sql = $this->db->query("SELECT id, name, thumbnail_picture FROM artworks WHERE status = '1' ORDER BY id DESC LIMIT 3");
		return $sql->result();
	}

	public function show_all_artworks_data( $id ){
		$sql = $this->db->query("SELECT id, name, thumbnail_picture FROM artworks WHERE status = '1' AND artist_id = '$id' ORDER BY id DESC");
		return $sql->result();
	}

	public function show_artworks_details_data( $id ){
		$sql = $this->db->query("SELECT id, name, artist_id, header_picture, medium, year, price, availability, description FROM artworks WHERE status = '1' AND id = '$id' LIMIT 1");
		return $sql->result()[0];
	}

}
