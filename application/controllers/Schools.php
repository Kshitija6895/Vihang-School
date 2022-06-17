<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schools extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SchoolsModel');
    }

    /*Schools */

/*Schools Page */

    public function index()
    {
        $Schools = $this->SchoolsModel->Schools_Select();
        $this->load->view('Schools/Index', ['Schools' => $Schools]);
    }

/* Add or Edit Schools */

    public function AddEdit_Schools($id = null)
    {
        if ($id == null) {
            $this->load->view('Schools/AddEdit_Schools');
        } else {
            $Schools = $this->SchoolsModel->Schools_Select($id);
            $this->load->view('Schools/AddEdit_Schools', ['Schools' => $Schools]);

        }
    }

/* validate Add Or Edit Schools */

    public function Schools_Validate($id = null)
    {
        if ($id == null) {
            // Add Schools
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Schools_rules')) {
                $post = $this->input->post();
                $Add = $this->SchoolsModel->Schools_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Schools');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Schools/AddEdit_Schools');
                }
            } else {
                $this->load->view('Schools/AddEdit_Schools');
            }
        } else {
            // Edit Schools
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Schools_rules')) {
                $post = $this->input->post();
                $Edit = $this->SchoolsModel->Schools_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Schools');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Schools/AddEdit_Schools');
                }
                return redirect('Schools');
            } else {
                $this->Schools_Select($id);
            }

        }

    }

/* Delete Schools */

    public function Del_Schools($id)
    {

        $Delete = $this->SchoolsModel->Schools_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Schools');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            return redirect('Schools');
        }
    }

}