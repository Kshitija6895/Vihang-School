<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModel');
    }

    /*Users */

/*Users Page */

    public function index()
    {
        $Users = $this->UsersModel->Users_Select();
        $this->load->view('Users', ['Users' => $Users]);
    }

/* Add or Edit Users */

    public function AddEdit_Users($id = null)
    {
        if ($id == null) {
            $this->load->view('AddEdit_Users');
        } else {
            $Users = $this->UsersModel->Users_Select($id);
            $this->load->view('AddEdit_Users', ['Users' => $Users]);

        }
    }

/* validate Add Or Edit Users */

    public function Users_Validate($id = null)
    {
        if ($id == null) {
            // Add Users
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Users_rules')) {
                $post = $this->input->post();
                $Add = $this->UsersModel->Users_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Users/Index');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('AddEdit_Users');
                }
            } else {
                $this->load->view('AddEdit_Users');
            }
        } else {
            // Edit Users
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Users_rules')) {
                $post = $this->input->post();
                $Edit = $this->UsersModel->Users_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Users/Index');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('AddEdit_Users');
                }
                return redirect('Users/Index');
            } else {
                $this->Users_Select($id);
            }

        }

    }

/* Delete Users */

    public function Del_Users($id)
    {

        $Delete = $this->UsersModel->Users_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Users/Index');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            $this->load->view('Users');
        }
    }

}