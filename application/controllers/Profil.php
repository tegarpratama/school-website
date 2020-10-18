<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fasilitas_model', 'fasilitas');
		$this->load->model('struktur_model', 'struktur');
	}
	
	public function sejarah()
	{
		$data['title']		= 'Sejarah';
		$data['page']		= 'profil/sejarah';

		$this->load->view('front/layouts/main', $data);
	}

	public function visimisi()
	{
		$data['title']		= 'Visi & Misi';
		$data['page']		= 'profil/visimisi';

		$this->load->view('front/layouts/main', $data);
	}

	public function struktur()
	{
		$data['title']		= 'Struktur Organisasi';
		$data['page']		= 'profil/struktur';
		$data['struktur'] = $this->struktur->getData();

		$this->load->view('front/layouts/main', $data);
	}

	public function fasilitas()
	{
		$data['title']		= 'Fasilitas';
		$data['page']		= 'profil/fasilitas';
		$data['fasilitas'] = $this->fasilitas->getAllFasility();

		$this->load->view('front/layouts/main', $data);
	}

}

/* End of file Controllername.php */
