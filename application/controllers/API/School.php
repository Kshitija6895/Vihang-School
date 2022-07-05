<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class School extends REST_Controller {
    public function __construct() {
       parent::__construct();
	   $this->load->model('SchoolsModel');
    }

    public function index_post()
    {
    	$data=$this->post();
    	$id=$this->SchoolsModel->Schools_Insert($data);
    	$this->response(["status"=>true,"schoolId"=>$id], REST_Controller::HTTP_OK);
    }

    public function paymentUpdate_post()
    {
    	$data=$this->post();
    	$this->SchoolsModel->uploadPaymentScreenshot($data);
    	$this->response(["status"=>true], REST_Controller::HTTP_OK);
    }

}
?>