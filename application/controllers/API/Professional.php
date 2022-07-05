<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Professional extends REST_Controller {
    public function __construct() {
       parent::__construct();
	   $this->load->model('ProfessionalsModel');
    }

    public function index_post()
    {
    	$data=$this->post();
    	$id=$this->ProfessionalsModel->Professionals_Insert($data);
    	$this->response(["status"=>true,"professionalId"=>$id], REST_Controller::HTTP_OK);
    }

    public function paymentUpdate_post()
    {
    	$data=$this->post();
    	$this->ProfessionalsModel->uploadPaymentScreenshot($data);
    	$this->response(["status"=>true], REST_Controller::HTTP_OK);
    }

}
?>