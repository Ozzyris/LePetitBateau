<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_details extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){ redirect('alfredatwork/login'); }
		$this->load->model('alfred_at_work/Profile_Model');
		$this->load->model('alfred_at_work/Medias_Model');
		$this->load->model('alfred_at_work/Gallery_Model');

	}

	public function index( $id ){
		$this->load->view('alfred_at_work/includes/head.php');
		$datas = array();
		$datas['anchor'] = 'gallery';
		$datas['gallery_datas'] = $this->Gallery_Model->show_artist_details_data( $id );
		$media_id = 'gallery_header_picture_' . $id;
		$datas['media_header_datas'] = $this->Medias_Model->show_media_details_data( $media_id );
		$media_id = 'gallery_thumbnail_picture_' . $id;
		$datas['media_thumbnail_datas'] = $this->Medias_Model->show_media_details_data( $media_id );
		$datas['first_name'] = $this->Profile_Model->show_username_data()->first_name;
		$this->load->view('alfred_at_work/gallery_details.php', $datas);
	}

	public function highlight( $id ){
		echo $this->Gallery_Model->highlight( $id );
	}

	public function real_name( $id ){
		echo $this->Gallery_Model->real_name( $id, $_POST['real_name'] );
	}

	public function artist_name( $id ){
		echo $this->Gallery_Model->artist_name( $id, $_POST['artist_name'] );
	}

	public function website( $id ){
		echo $this->Gallery_Model->website( $id, $_POST['website'] );
	}

	public function phone( $id ){
		echo $this->Gallery_Model->phone( $id, $_POST['phone'] );
	}

	public function description( $id ){
		echo $this->Gallery_Model->description( $id,  addslashes($_POST['description']) );
	}

	public function header_picture( $id ){
		if(count($_FILES) > 0 && isset($_FILES)){
			$original_name = $_FILES['file']['name'];

			$config['upload_path'] = './assets/uploads/artists/header_picture/';
			$config['allowed_types'] = 'jpg|png';
			$config['file_name'] = 'gallery_header_picture_' . $id;
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
				echo $this->Gallery_Model->picture( $id, $config['upload_path'].$file_data['file_name'] );
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

			$config['upload_path'] = './assets/uploads/artists/thumbnail_picture/';
			$config['allowed_types'] = 'jpg|png';
			$config['file_name'] = 'gallery_thumbnail_picture_' . $id;
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
				echo $this->Gallery_Model->thumbnail( $id, $config['upload_path'].$file_data['file_name'] );
			}
		}else{
			$data = array("status" => 'error', 'message' => 'An error happen while transfering, please try again shorly.');
			header('Content-Type: application/json');
			echo json_encode( $data );
		}
	}
}