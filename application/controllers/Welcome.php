<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model( 'LoginModel' );

    }

    public function Index() {
        
        $this->fv->set_rules( 'username', 'User Name', 'required' );
        $this->fv->set_rules( 'password', 'Password', 'required' );
        $this->fv->set_error_delimiters( '<div class="text-danger">', '</div>' );
        if ( $this->fv->run() ) {
            $username = $this->input->post( 'username' );
            $password = $this->input->post( 'password' );
            $loginData = $this->LoginModel->AdminLogin( $username, $password );
            if ( $loginData ) {
                $this->session->set_userdata( $loginData );
                $this->session->set_flashdata( 'Success', 'login Successfully !' );
                redirect( 'Welcome/Home' );

            } else {
                $this->session->sess_destroy();
                $this->session->set_flashdata( 'Error', 'Invalid Username & Password!' );
                $this->load->view('Index');

            }
        } else {
            $this->session->sess_destroy();
            $this->load->view('Index');
        }

    }

    /* Home Page */

    public function Home() {
        $this->load->view( 'Home' );
    }



    public function Logout() {
        $this->session->sess_destroy();
        redirect( 'Welcome/Index' );
    }

}
?>