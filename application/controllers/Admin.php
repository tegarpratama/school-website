<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('admin_model', 'admin');
		$this->load->model('menu_model', 'menu');
		$this->load->model('banner_model', 'banner');
		$this->load->model('fasilitas_model', 'fasilitas');
		$this->load->model('berita_model', 'berita');

	}

	public function index()
	{
		$data['title'] 			 = 'Admin';
		$data['page']				 = 'dashboard/index';
		$data['total_banner'] 	 = $this->banner->totalBanner();
		$data['total_fasilitas'] = $this->fasilitas->totalFasilitas();
		$data['total_berita'] 	 = $this->berita->countBerita();
		// $data['chart'] 			 = $this->admin->areaChart();
      $data['pageChart'] 		 = '_chart';

		$this->load->view('back/layouts/main', $data);
	}


}

/* End of file Controllername.php */
