<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Professionals extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfessionalsModel');
    }

    /*Professionals */

/*Professionals Page */

    public function index()
    {
        $Professionals = $this->ProfessionalsModel->Professionals_Select();
        $this->load->view('Professionals/Index', ['Professionals' => $Professionals]);
    }

/* Add or Edit Professionals */

    public function AddEdit_Professionals($id = null)
    {
        if ($id == null) {
            $this->load->view('Professionals/AddEdit_Professionals');
        } else {
            $Professionals = $this->ProfessionalsModel->Professionals_Select($id);
            $this->load->view('Professionals/AddEdit_Professionals', ['Professionals' => $Professionals]);

        }
    }

/* validate Add Or Edit Professionals */

    public function Professionals_Validate($id = null)
    {
        if ($id == null) {
            // Add Professionals
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Professionals_rules')) {
                $post = $this->input->post();
                $Add = $this->ProfessionalsModel->Professionals_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Professionals');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Professionals/AddEdit_Professionals');
                }
            } else {
                $this->load->view('Professionals/AddEdit_Professionals');
            }
        } else {
            // Edit Professionals
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Professionals_rules')) {
                $post = $this->input->post();
                $Edit = $this->ProfessionalsModel->Professionals_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Professionals');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Professionals/AddEdit_Professionals');
                }
                return redirect('Professionals');
            } else {
                $this->Professionals_Select($id);
            }

        }

    }

/* Delete Professionals */

    public function Del_Professionals($id)
    {

        $Delete = $this->ProfessionalsModel->Professionals_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Professionals');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            return redirect('Professionals');
        }
    }

}