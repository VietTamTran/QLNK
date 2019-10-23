<?php
class Autocomplete extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('datacomplete');
    }
    
    public function index(){
        $this->load->view('view_demo');
    }
    public function GetCountryName(){
        $keyword=$this->input->post('keyword');
        $data=$this->datacomplete->GetRow($keyword);        
        echo json_encode($data);
    }
    
}
?>