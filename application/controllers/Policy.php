<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Policy extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PolicyModel');
    }

    /*Policy */

/*Policy Page */

    public function index()
    {
        $Policy = $this->PolicyModel->Policy_Select();
        $this->load->view('Policy/Index', ['Policy' => $Policy]);
    }

/* Add or Edit Policy */

    public function AddEdit_Policy($id = null)
    {
        if ($id == null) {
            $this->load->view('Policy/AddEdit_Policy');
        } else {
            $Policy = $this->PolicyModel->Policy_Select($id);
            $this->load->view('Policy/AddEdit_Policy', ['Policy' => $Policy]);

        }
    }

/* validate Add Or Edit Policy */

    public function Policy_Validate($id = null)
    {
        if ($id == null) {
            // Add Policy
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Policy_rules')) {
                $post = $this->input->post();
                $Add = $this->PolicyModel->Policy_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Policy');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Policy/AddEdit_Policy');
                }
            } else {
                $this->load->view('Policy/AddEdit_Policy');
            }
        } else {
            // Edit Policy
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Policy_rules')) {
                $post = $this->input->post();
                $Edit = $this->PolicyModel->Policy_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Policy');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Policy/AddEdit_Policy');
                }
                return redirect('Policy');
            } else {
                $this->Policy_Select($id);
            }

        }

    }

/* Delete Policy */

    public function Del_Policy($id)
    {

        $Delete = $this->PolicyModel->Policy_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Policy');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            return redirect('Policy');
        }
    }

}