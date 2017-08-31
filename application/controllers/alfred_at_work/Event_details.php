<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_details extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){ redirect('alfredatwork/login'); }
		$this->load->model('alfred_at_work/Profile_Model');
		$this->load->model('alfred_at_work/Event_Model');
		$this->load->model('alfred_at_work/Medias_Model');
	}

	public function index( $id ){
		$this->load->view('alfred_at_work/includes/head.php');
		$datas = array();
		$datas['anchor'] = 'events';
		$datas['event_datas'] = $this->Event_Model->show_event_details_data( $id );
		$datas['first_name'] = $this->Profile_Model->show_username_data()->first_name;
		$media_id = 'event_header_picture_' . $id;
		$datas['media_header_datas'] = $this->Medias_Model->show_media_details_data( $media_id );
		$media_id = 'event_thumbnail_picture_' . $id;
		$datas['media_thumbnail_datas'] = $this->Medias_Model->show_media_details_data( $media_id );
		$this->load->view('alfred_at_work/event_details.php', $datas);
	}

	public function name( $id ){
		echo $this->Event_Model->name( $id, htmlspecialchars($_POST['name']) );
	}

    public function date( $id ){
        $timestamp = DateTime::createFromFormat('m/d/Y', $_POST['date'])->getTimestamp();
        echo $this->Event_Model->date( $id, $timestamp );
    }

	public function description( $id ){
		echo $this->Event_Model->description( $id, addslashes($_POST['description']) );
	}

	public function address( $id ){
		echo $this->Event_Model->address( $id, addslashes($_POST['address']) );
	}

	public function facebook( $id ){
		echo $this->Event_Model->facebook( $id, htmlspecialchars($_POST['facebook']) );
	}

	public function eventbrit( $id ){
		echo $this->Event_Model->eventbrit( $id, htmlspecialchars($_POST['eventbrit']) );
	}

	public function header_picture( $id ){
		if(count($_FILES) > 0 && isset($_FILES)){
			$original_name = $_FILES['file']['name'];

			$config['upload_path'] = './assets/uploads/events/header_picture/';
			$config['allowed_types'] = 'jpg|png';
			$config['file_name'] = 'event_header_picture_' . $id;
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
				echo $this->Event_Model->picture( $id, $config['upload_path'].$file_data['file_name'] );
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

			$config['upload_path'] = './assets/uploads/events/thumbnail_picture/';
			$config['allowed_types'] = 'jpg|png';
			$config['file_name'] = 'event_thumbnail_picture_' . $id;
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
				echo $this->Event_Model->thumbnail( $id, $config['upload_path'].$file_data['file_name'] );
			}
		}else{
			$data = array("status" => 'error', 'message' => 'An error happen while transfering, please try again shorly.');
			header('Content-Type: application/json');
			echo json_encode( $data );
		}
	}
}