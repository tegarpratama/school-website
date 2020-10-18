<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('identitas_model', 'identitas');
	}

	public function index()
	{
		$data['title']		= 'Identitas Web';
		$data['page']		= 'identitas/index';
		$data['content'] 	= $this->identitas->getData();

		$this->load->view('back/layouts/main', $data);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('meta_description', 'Deskripsi', 'required',
			['required' => 'Deskripsi tidak boleh kosong!']
		);
		$this->form_validation->set_rules('meta_keyword', 'Keyword', 'required',
			['required' => 'Keyword tidak boleh kosong!']
		);

		if($this->form_validation->run() == false){
			$data['title']			= 'Ubah Identitas Website';
			$data['page']			= 'identitas/form';
			$data['content']		= $this->identitas->getData();
			$data['form_action']	= base_url('identitas/edit/' . $id);
			$this->load->view('back/layouts/main', $data);
		}else{
			$data = [
				'meta_title'			=> '',
				'meta_description'	=> $this->input->post('meta_description', true),
				'meta_keyword'			=> $this->input->post('meta_keyword', true),
			];

			$this->identitas->updateData($id, $data);
			$this->session->set_flashdata('success', 'Identitas Website Berhasil Diupdate.');

			redirect(base_url('identitas'));
		}
	}

}

/* End of file Controllername.php */
