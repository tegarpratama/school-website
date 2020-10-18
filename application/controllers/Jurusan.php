<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function ap()
	{
		$data['title']		= 'Administrasi Perkantoran';
		$data['page']		= 'jurusan/ap';

		$this->load->view('front/layouts/main', $data);
	}

	public function ak()
	{
		$data['title']		= 'Akutansi';
		$data['page']		= 'jurusan/ak';

		$this->load->view('front/layouts/main', $data);
	}

	public function pm()
	{
		$data['title']		= 'Pemasaran';
		$data['page']		= 'jurusan/pm';

		$this->load->view('front/layouts/main', $data);
	}

}

/* End of file Controllername.php */
