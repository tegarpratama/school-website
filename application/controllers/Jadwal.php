<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('jadwal_model', 'jadwal');
	}

	public function index()
	{
		$data['title']		= 'Agenda';
		$data['page']		= 'agenda/index';
		$data['content'] 	= $this->jadwal->getData();

		$this->load->view('back/layouts/main', $data);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('photo', 'photo', 'trim');
		
		if($this->form_validation->run() == false){
			$data['title']			= 'Ubah Agenda Sekolah';
			$data['page']			= 'agenda/form';
			$data['content']		= $this->jadwal->getData();
			$data['form_action']	= base_url('jadwal/edit/' . $id);
			$this->load->view('back/layouts/main', $data);
		}else{
			if(!empty($_FILES['photo']['name'])){
				$upload 	 = $this->jadwal->uploadImage();

				if($upload){
					$jadwal = $this->jadwal->getData();

					if(file_exists('img/agenda/' . $jadwal->photo) && $jadwal->photo){
						unlink('img/agenda/' . $jadwal->photo);
					}
					
					$data['photo'] = $upload;
				 }else{
					redirect(base_url("jadwal/edit/$id"));
				 }
			}

			$this->jadwal->updateData($id, $data);
			$this->session->set_flashdata('success', 'Agenda Sekolah Berhasil Diupdate.');

			redirect(base_url('jadwal'));
		}
	}

}

/* End of file Controllername.php */
