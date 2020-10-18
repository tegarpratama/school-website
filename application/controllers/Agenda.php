<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jadwal_model', 'jadwal');
	}
	
	public function index()
	{
		$data['title']		= 'Agenda';
		$data['page']		= 'agenda/index';
		$data['agenda']	= $this->jadwal->getData();
		$this->load->view('front/layouts/main', $data);
	}

}

/* End of file Controllername.php */
