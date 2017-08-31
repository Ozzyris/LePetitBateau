<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artworks extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){ redirect('alfredatwork/login'); }
		$this->load->model('alfred_at_work/Profile_Model');
		$this->load->model('alfred_at_work/Gallery_Model');
		$this->load->model('alfred_at_work/Medias_Model');
		$this->load->model('alfred_at_work/Artwork_Model');
	}

	public function index( $id ){
		$this->load->view('alfred_at_work/includes/head.php');
		$datas = array();
		$datas['anchor'] = 'gallery';
		$datas['artworks_datas'] = $this->Artwork_Model->show_artworks_data( $id );
		$datas['artist_name'] = $this->Gallery_Model->show_artist_details_data( $id )->name;
		$datas['first_name'] = $this->Profile_Model->show_username_data()->first_name;
		$this->load->view('alfred_at_work/artworks.php', $datas);
	}

	public function switch_status( $id ){
		echo $this->Artwork_Model->switch_status( $id );
	}
}