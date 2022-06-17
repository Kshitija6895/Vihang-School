<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EventsModel');
    }

    /*Events */

/*Events Page */

    public function index()
    {
        $Events = $this->EventsModel->Events_Select();
        $this->load->view('Events/Index', ['Events' => $Events]);
    }

/* Add or Edit Events */

    public function AddEdit_Events($id = null)
    {
        if ($id == null) {
            $this->load->view('Events/AddEdit_Events');
        } else {
            $Events = $this->EventsModel->Events_Select($id);
            $this->load->view('Events/AddEdit_Events', ['Events' => $Events]);

        }
    }

/* validate Add Or Edit Events */

    public function Events_Validate($id = null)
    {
        if ($id == null) {
            // Add Events
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Events_rules')) {
                $post = $this->input->post();
                $Add = $this->EventsModel->Events_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Events');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Events/AddEdit_Events');
                }
            } else {
                $this->load->view('Events/AddEdit_Events');
            }
        } else {
            // Edit Events
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Events_rules')) {
                $post = $this->input->post();
                $Edit = $this->EventsModel->Events_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Events');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Events/AddEdit_Events');
                }
                return redirect('Events');
            } else {
                $this->Events_Select($id);
            }

        }

    }

/* Delete Events */

    public function Del_Events($id)
    {

        $Delete = $this->EventsModel->Events_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Events');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            return redirect('Events');
        }
    }

}