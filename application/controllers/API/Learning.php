<?php

  defined('BASEPATH') OR exit('No direct script access allowed');
   
  require APPPATH . 'libraries/REST_Controller.php';
     
class Learning extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
       $this->load->model('LearningModel');
    
    }
      
    /* For Display */ 

    public function SelectLearning_get($id=null)
    {
        $Select = $this->LearningModel->Learning_Select($id);
        $this->response($Select,REST_Controller::HTTP_OK);
    }
        
        
}
?>