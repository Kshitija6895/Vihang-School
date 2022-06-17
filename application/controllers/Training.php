<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Training extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TrainingModel');
    }

    /*Training */

/*Training Page */

    public function index()
    {
        $Training = $this->TrainingModel->Training_Select();
        $this->load->view('Training/Index', ['Training' => $Training]);
    }

/* Add or Edit Training */

    public function AddEdit_Training($id = null)
    {
        if ($id == null) {
            $this->load->view('Training/AddEdit_Training');
        } else {
            $Training = $this->TrainingModel->Training_Select($id);
            $this->load->view('Training/AddEdit_Training', ['Training' => $Training]);

        }
    }

/* validate Add Or Edit Training */

    public function Training_Validate($id = null)
    {
        if ($id == null) {
            // Add Training
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Training_rules')) {
                $post = $this->input->post();
                $Add = $this->TrainingModel->Training_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Training');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Training/AddEdit_Training');
                }
            } else {
                $this->load->view('Training/AddEdit_Training');
            }
        } else {
            // Edit Training
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Training_rules')) {
                $post = $this->input->post();
                $Edit = $this->TrainingModel->Training_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Training');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Training/AddEdit_Training');
                }
                return redirect('Training');
            } else {
                $this->Training_Select($id);
            }

        }

    }

/* Delete Training */

    public function Del_Training($id)
    {

        $Delete = $this->TrainingModel->Training_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Training');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            return redirect('Training');
        }
    }

}