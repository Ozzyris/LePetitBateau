<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Model extends CI_Model{

	public function show_events_data(){
		$sql = $this->db->query("SELECT id, name, date, thumbnail_picture, status FROM events ORDER BY date DESC");
		return $sql->result();
	}

	public function show_event_details_data( $id ){
		$sql = $this->db->query("SELECT * FROM events WHERE id = '$id' LIMIT 1");
		return $sql->result()[0];
	}

	public function switch_status( $id ){
		$sql = $this->db->query("SELECT status FROM events WHERE id = '$id' LIMIT 1");
		$result = $sql->result()[0];

		if( $result->status == 1 ){
			$sql = $this->db->query("UPDATE events SET status='0' WHERE id = $id");
		}elseif( $result->status == 0 ){
			$sql = $this->db->query("UPDATE events SET status='1' WHERE id = $id");
		}
		if( $sql == true ) {
			$data = array("status" => 'success', 'message' => 'Status Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function name( $id, $name ){
		$sql = $this->db->query("UPDATE events SET name = '$name' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Name Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function date( $id, $date ){
		$sql = $this->db->query("UPDATE events SET date = '$date' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Date Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function description( $id, $description ){
		$sql = $this->db->query("UPDATE events SET description = '$description' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Description Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function address( $id, $address ){
		$sql = $this->db->query("UPDATE events SET address = '$address' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Address Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function facebook( $id, $facebook ){
		$sql = $this->db->query("UPDATE events SET facebook_link = '$facebook' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Facebook Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function eventbrit( $id, $eventbrit ){
		$sql = $this->db->query("UPDATE events SET eventbrit_link = '$eventbrit' WHERE id = '$id' LIMIT 1");
		if( $sql == true ){
			$data = array("status" => 'success', 'message' => 'Eventbrit Updated');
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

	public function picture( $id, $path ){
		$sql = $this->db->query("UPDATE events SET header_picture = '$path' WHERE id = '$id' LIMIT 1");
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
		$sql = $this->db->query("UPDATE events SET thumbnail_picture = '$path' WHERE id = '$id' LIMIT 1");
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