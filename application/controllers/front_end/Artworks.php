<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artworks extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('front_end/Artwork_Model');
		$this->load->model('front_end/Artist_Model');
	}

	public function index( $id ){
		$this->load->view('front_end/includes/head.php');
		$data = array();
		$data['anchor'] = 'shop';
		$data['highlight_artists'] = $this->Artist_Model->get_highlight_artist();
		$data['artworks_datas'] = $this->Artwork_Model->show_artworks_details_data( $id );
		$this->load->view('front_end/artworks.php', $data);
	}
}