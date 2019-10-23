<?php
class Datacomplete extends CI_Model{
    
    public function GetRow($keyword) {        
        $this->db->order_by('id', 'ASC');
        $this->db->like("name", $keyword);
        return $this->db->get('autocomplete')->result_array();
    }
}