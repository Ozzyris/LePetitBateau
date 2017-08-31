<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if( !$this->ion_auth->logged_in() ){ redirect('alfredatwork/login'); }
		$this->load->model('alfred_at_work/Profile_Model');
		$this->load->model('alfred_at_work/Dashboard_Model');
	}

	public function index(){
		$this->load->view('alfred_at_work/includes/head.php');
		$datas = array();
		$datas['anchor'] = 'dashboard';
		$datas['first_name'] = $this->Profile_Model->show_username_data()->first_name;
		$datas['system_datas'] = $this->Dashboard_Model->show_system_data();
		$result = $this->mailchimp->get('lists/ea46d17773/members');
		$datas['mailchimp_data'] = $result['members'];
		$this->load->view('alfred_at_work/dashboard.php', $datas);
	}

	public function archive_system_data( $id ){
		echo $this->Dashboard_Model->archive_system_data( $id );
	}

	public function archive_mailchimp(){
		$subscriber_hash = $this->mailchimp->subscriberHash( $_POST['email'] );
		$this->mailchimp->delete("lists/ea46d17773/members/$subscriber_hash");
		echo "Email Deleted";
	}

}