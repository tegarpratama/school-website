<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tatatertib extends CI_Controller {

	public function index()
	{
		$data['title']		= 'Tata Tertib';
		$data['page']		= 'tatatertib/index';

		$this->load->view('front/layouts/main', $data);
	}

}

/* End of file Controllername.php */
