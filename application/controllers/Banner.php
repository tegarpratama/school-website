<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	var $table = 'banners';
	var $id = 'id';
	var $select = ['*'];
	var $column_order = ['', 'title', 'text', 'photo'];
	var $column_search = ['title', 'text', 'photo'];
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('my_model', 'my');
		$this->load->model('banner_model', 'banner');
	}
	
	public function index()
	{
		$data['title'] 	 = 'Data Banner';
      $data['page'] 		 = 'banner/index';
		$data['datatable'] = 'banner/index-datatable';
		
      $this->load->view('back/layouts/main', $data);
	}

	public function ajax_list()
   {
      $list = $this->my->get_datatables();
		$data = [];
		$no = 1;
      foreach($list as $li){
			$row = [];
			$row[] = $no++;
			$row[] = $li->title;
			$row[] = $li->text;

			if($li->photo){
            $row[] = '<a href="' . base_url('img/banner/' . $li->photo).'" target="_blank"><img src="'.base_url('img/banner/' . $li->photo) . '" class="img-responsive" style="max-height:150px; max-width:400px;"/></a>';
         }else{
            $row[] = '(No photo)';
			}

         $row[] = 
         '<a class="btn btn-sm btn-warning text-white" href="'.base_url("banner/edit/$li->id").'" 
         title="Edit">
			<i class="fa fa-pencil-alt"></i></a>

			<a class="btn btn-sm btn-danger" href="#" 
			title="Delete" onclick="delete_banner('."'".$li->id."'".')">
			<i class="fa fa-trash"></i></a>';
         $data[] = $row;
      }

      $output = [
         'draw'            => $_POST['draw'],
         'recordsTotal'    => $this->my->count_all(),
         'recordsFiltered' => $this->my->count_filtered(),
         'data'            => $data
      ];

      echo json_encode($output);
	}

	public function add()
	{
		if(!$_POST){
			$input = (object) $this->banner->getDefaultValues();
		}else{
			$input = (object) $this->input->post(null, true);
		}

		$this->form_validation->set_rules('title', 'Judul','required',[
			'required' => 'Teks tidak boleh kosong!'
			]
		);
		$this->form_validation->set_rules('text', 'Teks','required',[
			'required' => 'Teks tidak boleh kosong!'
			]
		);

		if($this->form_validation->run() == false){
			$data['title'] 		= 'Tambah Banner';
			$data['page']			= 'banner/form';
			$data['form_action'] = base_url("banner/add");
			$data['input'] 		= $input;
			$this->load->view('back/layouts/main', $data);
		}else{
			
			$data = [
				'title' 	=> $this->input->post('title', true),
				'text'	=> $this->input->post('text', true),
			];

			
			if(!empty($_FILES['photo']['name'])){
				$upload = $this->banner->uploadImage();
				$data['photo'] = $upload;
			}
			
			$this->banner->insert($data);
			$this->session->set_flashdata('success', 'Banner Berhasil Ditambahkan.');

			redirect(base_url('banner'));
		}
	}

	public function edit($id)
	{
		if(!$_POST){
			$input = (object) $this->banner->getDataById($id);
		}else{
			$input = (object) $this->input->post(null, true);
		}

		$this->form_validation->set_rules('title', 'Teks','required',[
			'required' => 'Teks tidak boleh kosong!'
			]
		);
		$this->form_validation->set_rules('text', 'Teks','required',[
			'required' => 'Teks tidak boleh kosong!'
			]
		);

		if($this->form_validation->run() == false){
			$data['title']			= 'Ubah Banner';
			$data['page']			= 'banner/form';
			$data['input']			= $input;
			// var_dump($data['input']);
			$data['form_action']	= base_url('banner/edit/' . $id);
			$this->load->view('back/layouts/main', $data);
		}else{
			$data = [
				'title' => $this->input->post('title', true),
				'text'	=> $this->input->post('text', true),
			];

			if(!empty($_FILES['photo']['name'])){
				$upload = $this->banner->uploadImage();

				if($upload){
					$banner = $this->banner->getDataById($id);

					if(file_exists('img/banner/' . $banner->photo) && $banner->photo){
						unlink('img/banner/' . $banner->photo);
					}
					
					$data['photo'] = $upload;
				}else{
					redirect(base_url("banner/edit/$id"));
				}
			}

			$this->banner->update($id, $data);
			$this->session->set_flashdata('success', 'Banner Berhasil Diupdate.');

			redirect(base_url('banner'));
		}
	}

	public function delete()
	{
		$id = $this->input->post('id', true);
		$banner = $this->banner->getDataById($id);

		if(file_exists('img/banner/' . $banner->photo) && $banner->photo){
			unlink('img/banner/' . $banner->photo);
		}

		$this->banner->delete($id);
		echo json_encode(["status" => TRUE]);
	}

}

/* End of file Controllername.php */
