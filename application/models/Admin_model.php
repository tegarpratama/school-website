<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

   public function areaChart() {
   
      $query =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(date) as month_name FROM posts WHERE YEAR(date) = '" . date('Y') . "' GROUP BY YEAR(date),MONTH(date)"); 
 
      $record = $query->result();
      $data = [];
 
      foreach($record as $row) {
            $data['label'][] = $row->month_name;
            $data['data'][] = (int) $row->count;
      }
      
      $result = json_encode($data);
      return $result;
    }

}

/* End of file Admin_model.php */
