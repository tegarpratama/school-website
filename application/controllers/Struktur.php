<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('struktur_model', 'struktur');
	}

	public function index()
	{
		$data['title']		= 'Struktur Organisasi';
		$data['page']		= 'struktur/index';
		$data['content'] 	= $this->struktur->getData();

		$this->load->view('back/layouts/main', $data);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('photo', 'photo', 'trim');
		
		if($this->form_validation->run() == false){
			$data['title']			= 'Ubah Struktur Organisasi';
			$data['page']			= 'struktur/form';
			$data['content']		= $this->struktur->getData();
			$data['form_action']	= base_url('struktur/edit/' . $id);
			$this->load->view('back/layouts/main', $data);
		}else{
			if(!empty($_FILES['photo']['name'])){
				$upload 	 = $this->struktur->uploadImage();

				if($upload){
					$struktur = $this->struktur->getData();

					if(file_exists('img/struktur_organisasi/' . $struktur->photo) && $struktur->photo){
						unlink('img/struktur_organisasi/' . $struktur->photo);
					}
					
					$data['photo'] = $upload;
				 }else{
					redirect(base_url("struktur/edit/$id"));
				 }
			}

			$this->struktur->updateData($id, $data);
			$this->session->set_flashdata('success', 'Struktur Organisasi Berhasil Diupdate.');

			redirect(base_url('struktur'));
		}
	}

}

/* End of file Controllername.php */
