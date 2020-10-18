<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {

	public function getDataById($id)
	{
		return $this->db->get_where('facilities', ['id' => $id])->row();
	}

	public function getAllFasility()
	{
		return $this->db->get('facilities')->result();
	}

	public function insert($data)
	{
		$this->db->insert('facilities', $data);
	}

	public function update($id, $data)
	{
		$this->db->update('facilities', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
      $this->db->delete('facilities');
	}

	public function getDefaultValues()
   {
      return [
         'name'        	=> '',
         'photo'        => '',
      ];
	}

	public function totalFasilitas()
	{
		$this->db->from('facilities');
      return $this->db->count_all_results();
	}
	
	public function uploadImage($imageName){
      $config = [
        'upload_path'     => './img/fasilitas',
		  'file_name'       => $imageName,
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
