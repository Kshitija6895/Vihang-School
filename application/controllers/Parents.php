<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parents extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ParentsModel');
    }

    /*Parents */

/*Parents Page */

    public function index()
    {
        $Parents = $this->ParentsModel->Parents_Select();
        $this->load->view('Parents/Index', ['Parents' => $Parents]);
    }

/* Add or Edit Parents */

    public function AddEdit_Parents($id = null)
    {
        if ($id == null) {
            $this->load->view('Parents/AddEdit_Parents');
        } else {
            $Parents = $this->ParentsModel->Parents_Select($id);
            $this->load->view('Parents/AddEdit_Parents', ['Parents' => $Parents]);

        }
    }

/* validate Add Or Edit Parents */

    public function Parents_Validate($id = null)
    {
        if ($id == null) {
            // Add Parents
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Parents_rules')) {
                $post = $this->input->post();
                $Add = $this->ParentsModel->Parents_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Parents');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Parents/AddEdit_Parents');
                }
            } else {
                $this->load->view('Parents/AddEdit_Parents');
            }
        } else {
            // Edit Parents
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Parents_rules')) {
                $post = $this->input->post();
                $Edit = $this->ParentsModel->Parents_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Parents');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Parents/AddEdit_Parents');
                }
                return redirect('Parents');
            } else {
                $this->Parents_Select($id);
            }

        }

    }

/* Delete Parents */

    public function Del_Parents($id)
    {

        $Delete = $this->ParentsModel->Parents_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Parents');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            return redirect('Parents');
        }
    }

}