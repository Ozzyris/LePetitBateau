<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){ redirect('alfredatwork/login'); }
		$this->load->model('alfred_at_work/Profile_Model');
		$this->load->model('alfred_at_work/Medias_Model');
		$this->load->model('alfred_at_work/Event_Model');
	}

	public function index(){
		$this->load->view('alfred_at_work/includes/head.php');
		$datas = array();
		$datas['anchor'] = 'events';
		$datas['events_datas'] = $this->Event_Model->show_events_data();
		$datas['first_name'] = $this->Profile_Model->show_username_data()->first_name;
		$this->load->view('alfred_at_work/events.php', $datas);
	}

	public function switch_status( $id ){
		echo $this->Event_Model->switch_status( $id );
	}
}