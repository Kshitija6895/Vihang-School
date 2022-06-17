<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Academics extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AcademicsModel');
    }

    /*Academics */

/*Academics Page */

    public function index()
    {
        $Academics = $this->AcademicsModel->Academics_Select();
        $this->load->view('Academics/Index', ['Academics' => $Academics]);
    }

/* Add or Edit Academics */

    public function AddEdit_Academics($id = null)
    {
        if ($id == null) {
            $this->load->view('Academics/AddEdit_Academics');
        } else {
            $Academics = $this->AcademicsModel->Academics_Select($id);
            $this->load->view('Academics/AddEdit_Academics', ['Academics' => $Academics]);

        }
    }

/* validate Add Or Edit Academics */

    public function Academics_Validate($id = null)
    {
        if ($id == null) {
            // Add Academics
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Academics_rules')) {
                $post = $this->input->post();
                $Add = $this->AcademicsModel->Academics_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Academics');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Academics/AddEdit_Academics');
                }
            } else {
                $this->load->view('Academics/AddEdit_Academics');
            }
        } else {
            // Edit Academics
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Academics_rules')) {
                $post = $this->input->post();
                $Edit = $this->AcademicsModel->Academics_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Academics');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Academics/AddEdit_Academics');
                }
                return redirect('Academics');
            } else {
                $this->Academics_Select($id);
            }

        }

    }

/* Delete Academics */

    public function Del_Academics($id)
    {

        $Delete = $this->AcademicsModel->Academics_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Academics');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            return redirect('Academics');
        }
    }

}