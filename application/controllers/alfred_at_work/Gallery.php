<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){ redirect('alfredatwork/login'); }
		$this->load->model('alfred_at_work/Profile_Model');
		$this->load->model('alfred_at_work/Medias_Model');
		$this->load->model('alfred_at_work/Gallery_Model');

	}

	public function index(){
		$this->load->view('alfred_at_work/includes/head.php');
		$datas = array();
		$datas['anchor'] = 'gallery';
		$datas['gallery_datas'] = $this->Gallery_Model->show_artists_data();
		$datas['first_name'] = $this->Profile_Model->show_username_data()->first_name;
		$this->load->view('alfred_at_work/gallery.php', $datas);
	}

	public function switch_status( $id ){
		echo $this->Gallery_Model->switch_status( $id );
	}

	public function insert(){
		echo $this->Gallery_Model->insert( $_POST['name']);
	}

	public function delete( $id ){
		$media_id = 'gallery_header_picture_' . $id;
		$full_path = $this->Medias_Model->get_full_path( $media_id );
		if( $full_path != false ){
			unlink( $full_path );
			$this->Medias_Model->delete( $media_id );
		}
		$media_id = 'gallery_thumbnail_picture_' . $id;
		$full_path = $this->Medias_Model->get_full_path( $media_id );
		if( $full_path != false ){
			unlink( $full_path );
			$this->Medias_Model->delete( $media_id );
		}

		echo $this->Gallery_Model->delete( $id );
	}
}