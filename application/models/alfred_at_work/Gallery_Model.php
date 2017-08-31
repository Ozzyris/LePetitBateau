<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_Model extends CI_Model{

	public function show_artists_data(){
		$sql = $this->db->query("SELECT id, name, thumbnail_picture, status FROM artists ORDER BY id DESC");
		return $sql->result();
	}

	public function show_artist_details_data( $id ){
		$sql = $this->db->query("SELECT * FROM artists WHERE id = '$id' LIMIT 1");
		return $sql->result()[0];
	}

	public function switch_status( $id ){
		$sql = $this->db->query("SELECT status FROM artists WHERE id = '$id' LIMIT 1");
		$result = $sql->result()[0];

		if( $result->status == 1 ){
			$sql = $this->db->query("UPDATE artists SET status='0' WHERE id = $id");
		}elseif( $result->status == 0 ){
			$sql = $this->db->query("UPDATE artists SET status='1' WHERE id = $id");
		}
		if( $sql == true ) {
			$data = array("status" => 'success', 'message' => 'Status Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function insert( $title ){
		$datas = array(
			'name' => $title,
			'thumbnail_picture' => 'assets/alfred_at_work/images/THUMB_placeholder.png'
		);
		$sql = $this->db->insert('artists', $datas);
		if( $sql == true ) {
			$data = array("status" => 'success', 'message' => 'Artist Created');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}


	public function delete( $id ){
		$sql = $this->db->query("DELETE FROM artists WHERE id = '$id'");
		if( $sql == true ) {
			$data = array("status" => 'success', 'message' => 'Artist Deleted');
			header('Content-Type: application/json');
    		return json_encode( $data );
		}
	}

	public function highlight( $id ){
		$sql = $this->db->query("SELECT highlight FROM artists WHERE id = '$id' LIMIT 1");
		$highlight = $sql->result()[0]->highlight;
		if( $highlight == 1 ){
			$sql = $this->db->query("UPDATE artists SET highlight='0' WHERE id = $id");
		}elseif( $highlight == 0 ){
			$sql = $this->db->query("UPDATE artists SET highlight='1' WHERE id = $id");
		}
		if( $sql == true ) {
			$data = array("status" => 'success', 'message' => 'Highlight Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function real_name( $id, $real_name ){
		$sql = $this->db->query("UPDATE artists SET name = '$real_name' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Real Name Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function artist_name( $id, $artist_name ){
		$sql = $this->db->query("UPDATE artists SET artist_name = '$artist_name' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Artist Name Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function website( $id, $website ){
		$sql = $this->db->query("UPDATE artists SET website = '$website' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Website Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function phone( $id, $phone ){
		$sql = $this->db->query("UPDATE artists SET phone = '$phone' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Phone Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function description( $id, $description ){
		$sql = $this->db->query("UPDATE artists SET description = '$description' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Description Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function picture( $id, $path ){
		$sql = $this->db->query("UPDATE artists SET header_picture = '$path' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Header Picture Uploaded');
			header('Content-Type: application/json');
			return json_encode( $data );
		}else{
			unlink( $path );
			$data = array("status" => 'error', 'message' => 'An error happen while transfering, please try again shorly.');
			header('Content-Type: application/json');
			echo json_encode( $data );
		}
	}

	public function thumbnail( $id, $path ){
		$sql = $this->db->query("UPDATE artists SET thumbnail_picture = '$path' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Thumbnail Picture Uploaded');
			header('Content-Type: application/json');
			return json_encode( $data );
		}else{
			unlink( $path );
			$data = array("status" => 'error', 'message' => 'An error happen while transfering, please try again shorly.');
			header('Content-Type: application/json');
			echo json_encode( $data );
		}
	}
}