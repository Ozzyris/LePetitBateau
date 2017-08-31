<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('front_end/Artist_Model');
		$this->load->model('front_end/Artwork_Model');
	}

	public function index(){
		$this->load->view('front_end/includes/head.php');
		$data = array();
		$data['anchor'] = 'shop';
		$data['highlight_artists'] = $this->Artist_Model->get_highlight_artist();
		$data['artworks_datas'] = $this->Artwork_Model->show_last_three_artwork_data();
		$data['artists_datas'] = $this->Artist_Model->show_all_artist_data();
		$this->load->view('front_end/shop.php', $data);
	}
}