<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Register extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
	   $this->load->model('ParentsModel');
    }

    public function index_post()
    {
    	$data=$this->post();
    	$id =$this->ParentsModel->Parents_Insert($data);
    	$this->response(["status"=>true,"parentId"=>$id], REST_Controller::HTTP_OK);
    }

}
?>