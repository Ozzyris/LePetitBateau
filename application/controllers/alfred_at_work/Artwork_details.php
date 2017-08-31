<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artwork_details extends CI_Controller {
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
		$datas['artwork_datas'] = $this->Artwork_Model->show_artwork_details_data( $id );
		$datas['artist_datas'] = $this->Gallery_Model->show_artist_details_data( $datas['artwork_datas']->artist_id );
		$datas['first_name'] = $this->Profile_Model->show_username_data()->first_name;
		$media_id = 'artwork_header_picture_' . $id;
		$datas['media_header_datas'] = $this->Medias_Model->show_media_details_data( $media_id );
		$media_id = 'artwork_thumbnail_picture_' . $id;
		$datas['media_thumbnail_datas'] = $this->Medias_Model->show_media_details_data( $media_id );
		$this->load->view('alfred_at_work/artwork_details.php', $datas);
	}

	public function name( $id ){
		echo $this->Artwork_Model->name( $id,  htmlspecialchars($_POST['name']) );
	}

	public function year( $id ){
		echo $this->Artwork_Model->year( $id, $_POST['year'] );
	}

	public function medium( $id ){
		echo $this->Artwork_Model->medium( $id, addslashes($_POST['medium']) );
	}

	public function price( $id ){
		echo $this->Artwork_Model->price( $id, $_POST['price'] );
	}

	public function description( $id ){
		echo $this->Artwork_Model->description( $id, addslashes($_POST['description']) );
	}

	public function availability( $id ){
		echo $this->Artwork_Model->availability( $id, $_POST['availability'] );
	}

	public function header_picture( $id ){
		if(count($_FILES) > 0 && isset($_FILES)){
			$original_name = $_FILES['file']['name'];

			$config['upload_path'] = './assets/uploads/artwork/header_picture/';
			$config['allowed_types'] = 'jpg|png';
			$config['file_name'] = 'artwork_header_picture_' . $id;
			$config['overwrite'] = TRUE;
			$config['detect_mime'] = TRUE;
			$config['max_size'] = 1024;
			$config['min_width'] = 1278;
			$config['max_width'] = 1282;
			$config['min_height'] = 598;
			$config['max_height'] = 602;
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors('', ''));
				$data = array("status" => 'error', 'message' => $error['error']);  
				header('Content-Type: application/json');
				echo json_encode( $data );
			}else{
				$file_data = $this->upload->data();
				$this->Medias_Model->add_media( $config['file_name'], $original_name, $file_data['file_type'], $file_data['file_size'], $config['upload_path'].$file_data['file_name'] );
				echo $this->Artwork_Model->picture( $id, $config['upload_path'].$file_data['file_name'] );
			}
		}else{
			$data = array("status" => 'error', 'message' => 'An error happen while transfering, please try again shorly.');
			header('Content-Type: application/json');
			echo json_encode( $data );
		}
	}

	public function thumbnail_picture( $id ){
		if(count($_FILES) > 0 && isset($_FILES)){
			$original_name = $_FILES['file']['name'];

			$config['upload_path'] = './assets/uploads/artwork/thumbnail_picture/';
			$config['allowed_types'] = 'jpg|png';
			$config['file_name'] = 'artwork_thumbnail_picture_' . $id;
			$config['overwrite'] = TRUE;
			$config['detect_mime'] = TRUE;
			$config['max_size'] = 1024;
			$config['min_width'] = 298;
			$config['max_width'] = 302;
			$config['min_height'] = 298;
			$config['max_height'] = 302;
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors('', ''));
				$data = array("status" => 'error', 'message' => $error['error']);  
				header('Content-Type: application/json');
				echo json_encode( $data );
			}else{
				$file_data = $this->upload->data();
				$this->Medias_Model->add_media( $config['file_name'], $original_name, $file_data['file_type'], $file_data['file_size'], $config['upload_path'].$file_data['file_name'] );
				echo $this->Artwork_Model->thumbnail( $id, $config['upload_path'].$file_data['file_name'] );
			}
		}else{
			$data = array("status" => 'error', 'message' => 'An error happen while transfering, please try again shorly.');
			header('Content-Type: application/json');
			echo json_encode( $data );
		}
	}
}