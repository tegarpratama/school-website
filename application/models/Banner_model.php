<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

	public function getBanner()
	{
		$this->db->limit(3);
		return $this->db->get('banners')->result();
	}

	public function getDataById($id)
	{
		return $this->db->get_where('banners', ['id' => $id])->row();
	}

	public function insert($data)
	{
		$this->db->insert('banners', $data);
	}

	public function update($id, $data)
	{
		$this->db->update('banners', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
      $this->db->delete('banners');
	}

	public function getDefaultValues()
   {
      return [
			'title' => '',
			'text'  => '', 
         'photo' => '',
      ];
	}

	public function totalBanner()
	{
		$this->db->from('banners');
      return $this->db->count_all_results();
	}

	public function uploadImage(){
      $config = [
        'upload_path'     => './img/banner',
		  'encrypt_name'    => TRUE,
        'allowed_types'   => 'jpg|jpeg|png|JPG|PNG',
        'max_size'        => 3000,
        'max_width'       => 0,
        'max_height'      => 0,
        'overwrite'       => TRUE,
        'file_ext_tolower'=> TRUE
      ];
  
      $this->load->library('upload', $config);
		
		if($this->upload->do_upload('photo')){
			return $this->upload->data('file_name');
		}else{
			$this->session->set_flashdata('image_error', 'Jenis file yang diupload tidak diizinkan atau file terlalu besar.');
     		return false;
		}
   }

}

/* End of file ModelName.php */
