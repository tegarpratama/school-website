<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model', 'berita');
	}

	public function index($page = null)
	{
		$data['title']			= 'Berita';
		$data['news']			= $this->berita->getAllNews($page);
		$data['total_rows']  = $this->berita->countBerita();
      $data['pagination']  = $this->berita->makePagination(
         base_url('blog'), 2, $data['total_rows']
      );

      $data['page'] = 'berita/blog';
      $this->load->view('front/layouts/main', $data);
	}

	public function baca($seo_title)
	{
		$berita = $this->berita->getDataBySeo($seo_title);

		if($berita){
			$data['title']		= 'Berita';
			$data['page']		= 'berita/blog-detail';
			$data['berita']	= $berita;

			$this->load->view('front/layouts/main', $data);
		}else{
			redirect(base_url('home/index'));
		}

	}

}

/* End of file Controllername.php */
