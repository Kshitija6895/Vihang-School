<?php

  defined('BASEPATH') OR exit('No direct script access allowed');
   
  require APPPATH . 'libraries/REST_Controller.php';
     
class homeSlider extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
    $this->load->model('HomeSliderModel');
    }
      
    /* For Display */ 

    public function SelecthomeSlider_get()
    {
        $Select = $this->HomeSliderModel->homeSlider_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }
        
        
}
?>