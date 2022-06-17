<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Login extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
	   $this->load->model('LoginModel');
    }

    public function index_post()
    {
    	$loginData=null;
    	$name=$this->input->post('name');
    	$password=$this->input->post('password');
    	$loginData=$this->LoginModel->Login($name,$password);
    	if($loginData!=null){
    		$loginData['loginStatus']=true;
    		$this->session->set_userdata($loginData);
    	}
    	else{
    		$loginData['loginStatus']=false;
    		$this->session->sess_destroy();		
    	}
    	
    	$this->response($loginData, REST_Controller::HTTP_OK);
    }
   /*  public function index_get()
    {
    	if($this->session->has_userdata('name')){
    	$loginData=null;
    	$loginData=$this->LoginModel->Login($this->session->userdata('name'),$this->session->userdata('password'));
    	if($loginData!=null){
    		$loginData['loginStatus']=true;
    		$this->session->set_userdata($loginData);
    	}
    	else{
    		$loginData['loginStatus']=false;	
			
    	}
    	
    	$this->response($loginData, REST_Controller::HTTP_OK);
    	}
    	else{
    		$loginData['loginStatus']=false;		
    	$this->response($loginData, REST_Controller::HTTP_OK);
    	}
    }
*/
}
?>