<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	var $table = 'posts';
	var $id = 'id';
	var $select = ['*'];
	var $column_order = ['', 'title', '', 'is_active', 'date'];
	var $column_search = ['title', 'seo_title', 'content', 'photo', 'is_active', 'date'];

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('my_model', 'my');
		$this->load->model('berita_model', 'berita');
		$this->load->helper('ci_helper');
	}
	
	public function index()
	{
		$data['title'] 	 = 'Data berita';
      $data['page'] 		 = 'berita/index';
		$data['datatable'] = 'berita/index-datatable';
		
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
			
			if($li->photo){
            $row[] = '<a href="' . base_url('img/berita/' . $li->photo).'" target="_blank"><img src="'.base_url('img/berita/' . $li->photo) . '" class="img-responsive" style="max-height:150px; max-width:250px;"/></a>';
         }else{
            $row[] = '(No photo)';
			}

			$row[] = $li->is_active;
			$row[] = $li->date;

         $row[] = 
         '<a class="btn btn-sm btn-warning text-white" href="'.base_url("berita/edit/$li->id").'" 
         title="Edit">
				<i class="fa fa-pencil-alt"></i>
			</a>

			<a class="btn btn-sm btn-danger" href="#" 
			title="Delete" onclick="delete_berita('."'".$li->id."'".')">
				<i class="fa fa-trash"></i>
			</a>';
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
			$input = (object) $this->berita->getDefaultValues();
		}else{
			$input = (object) $this->input->post(null, true);
		}

		$this->form_validation->set_rules('title', 'Judul','required',[
			'required' => 'Judul berita tidak boleh kosong!'
			]
		);
		$this->form_validation->set_rules('content', 'Konten','required',[
			'required' => 'Konten berita tidak boleh kosong!'
			]
		);

		if($this->form_validation->run() == false){
			$data['title'] 		= 'Tambah Berita';
			$data['page']			= 'berita/form';
			$data['form_action'] = base_url("berita/add");
			$data['input'] 		= $input;
			$this->load->view('back/layouts/main', $data);
		}else{
			
			$data = [
				'title' 		=> $this->input->post('title', true),
				'seo_title' => slugify($this->input->post('title', true)),
				'content' 	=> $this->input->post('content', true),
				'is_active' => $this->input->post('is_active', true),
				'date' 		=> date('Y-m-d'),
			];

			if(!empty($_FILES['photo']['name'])){
				$imageName = url_title($data['title'], '-', true) . '-' . date('YmdHis');
				$upload = $this->berita->uploadImage($imageName);
				$this->_create_thumbs($upload);
				$data['photo'] = $upload;
			}
			
			$this->berita->insert($data);
			$this->session->set_flashdata('success', 'Berita Berhasil Ditambahkan.');

			redirect(base_url('berita'));
		}
	}

	public function edit($id)
	{
		if(!$_POST){
			$input = (object) $this->berita->getDataById($id);
		}else{
			$input = (object) $this->input->post(null, true);
		}

		$this->form_validation->set_rules('title', 'Judul','required',[
			'required' => 'Judul berita tidak boleh kosong!'
			]
		);
		$this->form_validation->set_rules('content', 'Konten','required',[
			'required' => 'Konten berita tidak boleh kosong!'
			]
		);

		if($this->form_validation->run() == false){
			$data['title']			= 'Ubah Berita';
			$data['page']			= 'berita/form';
			$data['input']			= $input;
			$data['form_action']	= base_url('berita/edit/' . $id);
			
			$this->load->view('back/layouts/main', $data);
		}else{
			$data = [
				'title' 		=> $this->input->post('title', true),
				'seo_title' => slugify($this->input->post('title', true)),
				'content' 	=> $this->input->post('content'),
				'is_active' => $this->input->post('is_active', true),
				'date' 		=> date('Y-m-d'),
			];

			if(!empty($_FILES['photo']['name'])){
				$imageName = url_title($data['name'], '-', true) . '-' . date('YmdHis');
				$upload = $this->berita->uploadImage($imageName);
				$this->_create_thumbs($upload);

				if($upload){
					$berita = $this->berita->getDataById($id);

					if(file_exists('img/berita/' . $berita->photo) && $berita->photo){
						unlink('img/berita/' . $berita->photo);
						unlink('img/berita/thumbs/' . $berita->photo);
					}
					
					$data['photo'] = $upload;
				}else{
					redirect(base_url("berita/edit/$id"));
				}
			}

			$this->berita->update($id, $data);
			$this->session->set_flashdata('success', 'Berita Berhasil Diupdate.');

			redirect(base_url('berita'));
		}
	}

	public function delete()
	{
		$id = $this->input->post('id', true);
		$berita = $this->berita->getDataById($id);

		if(file_exists('img/berita/' . $berita->photo) && $berita->photo){
			unlink('img/berita/' . $berita->photo);
			unlink('img/berita/thumbs/' . $berita->photo);
		}

		$this->berita->delete($id);
		echo json_encode(["status" => TRUE]);
	}

	public function _create_thumbs($file_name)
	{
		$config = [
			// Thumbnail Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> './img/berita/' . $file_name,
				'maintain_ratio'	=> TRUE,
				'width'				=> 350,
				'height'				=> 200,
				'new_image'			=> './img/berita/thumbs/' . $file_name
			]
		];

		$this->load->library('image_lib', $config[0]);

		foreach ($config as $item){
			$this->image_lib->initialize($item);

			if(!$this->image_lib->resize()){
				return false;
			}

			$this->image_lib->clear();
		}
	}

}

/* End of file Controllername.php */
