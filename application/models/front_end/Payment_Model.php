<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Model extends CI_Model{

	public function save_user_data( $User_details ){
		$user_id = uniqid('user_');
		$datas = array(
			'user_id' => $user_id,
			'first_name' => $User_details->firstName,
			'last_name' => $User_details->lastName,
			'email' => $User_details->email,
			'address' => $User_details->address,
			'postcode' => $User_details->postcode,
			'region' => $User_details->region,
			'city' => $User_details->city,
			'country' => $User_details->country,
			'date_ajout' => $User_details->date,
			'status' => 'order',
			'product_id' => $User_details->artwork_id
		);
		$sql = $this->db->insert('customers', $datas);
		if( $sql == true ) {
			$data = array("status" => 'success', 'message' => 'Customer Created', 'user_id' => $user_id);
			header('Content-Type: application/json');
			return json_encode( $data );
		}
	}

}
