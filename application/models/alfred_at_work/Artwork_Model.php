<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artwork_Model extends CI_Model{

	public function show_artworks_data( $id ){
		$sql = $this->db->query("SELECT id, year, name, thumbnail_picture, status FROM artworks WHERE artist_id = '$id' ORDER BY id DESC");
		return $sql->result();
	}

	public function show_artwork_details_data( $id ){
		$sql = $this->db->query("SELECT * FROM artworks WHERE id = '$id' LIMIT 1");
		return $sql->result()[0];
	}

	public function switch_status( $id ){
		$sql = $this->db->query("SELECT status FROM artworks WHERE id = '$id' LIMIT 1");
		$result = $sql->result()[0];

		if( $result->status == 1 ){
			$sql = $this->db->query("UPDATE artworks SET status='0' WHERE id = $id");
		}elseif( $result->status == 0 ){
			$sql = $this->db->query("UPDATE artworks SET status='1' WHERE id = $id");
		}
		if( $sql == true ) {
			$data = array("status" => 'success', 'message' => 'Status Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	// public function insert( $title ){
	// 	$datas = array(
	// 		'name' => $title,
	// 		'thumbnail_picture' => 'assets/alfred_at_work/images/THUMB_placeholder.png'
	// 	);
	// 	$sql = $this->db->insert('artists', $datas);
	// 	if( $sql == true ) {
	// 		$data = array("status" => 'success', 'message' => 'Artist Created');
	// 		header('Content-Type: application/json');
	// 		return json_encode( $data );
	// 	}
	// }


	// public function delete( $id ){
	// 	$sql = $this->db->query("DELETE FROM artists WHERE id = '$id'");
	// 	if( $sql == true ) {
	// 		$data = array("status" => 'success', 'message' => 'Artist Deleted');
	// 		header('Content-Type: application/json');
 //    		return json_encode( $data );
	// 	}
	// }

	public function name( $id, $name ){
		$sql = $this->db->query("UPDATE artworks SET name = '$name' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Name Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function year( $id, $year ){
		$sql = $this->db->query("UPDATE artworks SET year = '$year' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Year Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function medium( $id, $medium ){
		$sql = $this->db->query("UPDATE artworks SET medium = '$medium' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Medium Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function price( $id, $price ){
		$sql = $this->db->query("UPDATE artworks SET price = '$price' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Price Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function description( $id, $description ){
		$sql = $this->db->query("UPDATE artworks SET description = '$description' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Description Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function availability( $id, $availability ){
		$sql = $this->db->query("UPDATE artworks SET availability = '$availability' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Availability Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function picture( $id, $path ){
		$sql = $this->db->query("UPDATE artworks SET header_picture = '$path' WHERE id = '$id' LIMIT 1");
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
		$sql = $this->db->query("UPDATE artworks SET thumbnail_picture = '$path' WHERE id = '$id' LIMIT 1");
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