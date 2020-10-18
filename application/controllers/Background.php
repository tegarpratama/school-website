<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Background extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('background_model', 'background');
	}

	public function index()
	{
		$data['title']		= 'Background Jurusan';
		$data['page']		= 'background/index';
		$data['content'] 	= $this->background->getData();

		$this->load->view('back/layouts/main', $data);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('photo', 'photo', 'trim');
		
		if($this->form_validation->run() == false){
			$data['title']			= 'Ubah Background Jurusan';
			$data['page']			= 'background/form';
			$data['content']		= $this->background->getData();
			$data['form_action']	= base_url('background/edit/' . $id);
			$this->load->view('back/layouts/main', $data);
		}else{
			if(!empty($_FILES['photo']['name'])){
				$upload 	 = $this->background->uploadImage();

				if($upload){
					$background = $this->background->getData();

					if(file_exists('img/background/' . $background->photo) && $background->photo){
						unlink('img/background/' . $background->photo);
					}
					
					$data['photo'] = $upload;
				 }else{
					redirect(base_url("background/edit/$id"));
				 }
			}

			$this->background->updateData($id, $data);
			$this->session->set_flashdata('success', 'Background Jurusan Berhasil Diupdate.');

			redirect(base_url('background'));
		}
	}

}

/* End of file Controllername.php */
