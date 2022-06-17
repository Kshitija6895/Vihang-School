<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Counselling extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CounsellingModel');
    }

    /*Counselling */

/*Counselling Page */

    public function index()
    {
        $Counselling = $this->CounsellingModel->Counselling_Select();
        $this->load->view('Counselling/Index', ['Counselling' => $Counselling]);
    }

/* Add or Edit Counselling */

    public function AddEdit_Counselling($id = null)
    {
        if ($id == null) {
            $this->load->view('Counselling/AddEdit_Counselling');
        } else {
            $Counselling = $this->CounsellingModel->Counselling_Select($id);
            $this->load->view('Counselling/AddEdit_Counselling', ['Counselling' => $Counselling]);

        }
    }

/* validate Add Or Edit Counselling */

    public function Counselling_Validate($id = null)
    {
        if ($id == null) {
            // Add Counselling
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Counselling_rules')) {
                $post = $this->input->post();
                $Add = $this->CounsellingModel->Counselling_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Counselling');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Counselling/AddEdit_Counselling');
                }
            } else {
                $this->load->view('Counselling/AddEdit_Counselling');
            }
        } else {
            // Edit Counselling
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Counselling_rules')) {
                $post = $this->input->post();
                $Edit = $this->CounsellingModel->Counselling_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Counselling');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Counselling/AddEdit_Counselling');
                }
                return redirect('Counselling');
            } else {
                $this->Counselling_Select($id);
            }

        }

    }

/* Delete Counselling */

    public function Del_Counselling($id)
    {

        $Delete = $this->CounsellingModel->Counselling_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Counselling');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            return redirect('Counselling');
        }
    }

}