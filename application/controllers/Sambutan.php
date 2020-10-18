<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sambutan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('sambutan_model', 'sambutan');
	}

	public function index()
	{
		$data['title']		= 'Sambutan';
		$data['page']		= 'sambutan/index';
		$data['content'] 	= $this->sambutan->getData();

		$this->load->view('back/layouts/main', $data);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('content', 'Sambutan', 'required',
			['required' => 'Kata sambutan tidak boleh kosong!']
		);

		if($this->form_validation->run() == false){
			$data['title']			= 'Ubah Sambutan';
			$data['page']			= 'sambutan/edit';
			$data['content']		= $this->sambutan->getData();
			$data['form_action']	= base_url('sambutan/edit/' . $id);
			$this->load->view('back/layouts/main', $data);
		}else{
			$data = [
				'content'	=> $this->input->post('content', true),
			];

			if(!empty($_FILES['photo']['name'])){
				$upload 	 = $this->sambutan->uploadImage();

				if($upload){
					$sambutan = $this->sambutan->getData();

					if(file_exists('img/sambutan/' . $sambutan->photo) && $sambutan->photo){
						unlink('img/sambutan/' . $sambutan->photo);
					}
					
					$data['photo'] = $upload;
				 }else{
					redirect(base_url("sambutan/edit/$id"));
				 }
			}

			$this->sambutan->updateData($id, $data);
			$this->session->set_flashdata('success', 'Sambutan Berhasil Diupdate.');

			redirect(base_url('sambutan'));
		}
	}

}

/* End of file Controllername.php */
