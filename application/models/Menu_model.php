<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function getMenu()
	{
		if($this->session->userdata('id') != 1) {
			return $this->db->where('is_active', 'Y')->where('user_id', '2')->get('menus')->result();
		}else{
			return $this->db->where('is_active', 'Y')->get('menus')->result();
		}
	}

	public function getSubmenu($id)
	{
		$this->db->select(['submenus.sub_title', 'submenus.sub_url', 'submenus.is_active']);
		$this->db->from('submenus');
		$this->db->join('menus', 'submenus.menu_id = menus.id');
		$this->db->where('submenus.menu_id', $id);
		$this->db->where('submenus.is_active', 'Y');
		return $this->db->get()->result();
	}

}

/* End of file ModelName.php */
