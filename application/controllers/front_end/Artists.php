<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artists extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('front_end/Artwork_Model');
		$this->load->model('front_end/Artist_Model');
	}

	public function index( $id ){
		$this->load->view('front_end/includes/head.php');
		$data = array();
		$data['anchor'] = 'shop';
		$data['artworks_datas'] = $this->Artwork_Model->show_all_artworks_data( $id );
		$data['artist_datas'] = $this->Artist_Model->show_artist_details_data( $id );
		$data['highlight_artists'] = $this->Artist_Model->get_highlight_artist();
		$this->load->view('front_end/artists.php', $data);
	}
}