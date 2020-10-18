<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas_model extends CI_Model {

	public function getData()
	{
		return $this->db->get_where('identity')->row();
	}

	public function updateData($id, $data)
	{
		$this->db->update('identity', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
	
	public function uploadImage(){
      $config = [
        'upload_path'     => './img/identitas',
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
