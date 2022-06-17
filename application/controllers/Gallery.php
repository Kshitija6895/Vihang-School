<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('GalleryModel');
    }

    /*Gallery */

/*Gallery Page */

    public function index()
    {
        $Gallery = $this->GalleryModel->Gallery_Select();
        $this->load->view('Gallery/Index', ['Gallery' => $Gallery]);
    }

/* Add or Edit Gallery */

    public function AddEdit_Gallery($id = null)
    {
        if ($id == null) {
            $this->load->view('Gallery/AddEdit_Gallery');
        } else {
            $Gallery = $this->GalleryModel->Gallery_Select($id);
            $this->load->view('Gallery/AddEdit_Gallery', ['Gallery' => $Gallery]);

        }
    }

/* validate Add Or Edit Gallery */

    public function Gallery_Validate($id = null)
    {
        if ($id == null) {
            // Add Gallery
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Gallery_rules')) {
                $post = $this->input->post();
                $Add = $this->GalleryModel->Gallery_Insert($post);
                if ($Add) {
                    $this->session->set_flashdata("Success", "Submitted Successfully !");
                    return redirect('Gallery');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Gallery/AddEdit_Gallery');
                }
            } else {
                $this->load->view('Gallery/AddEdit_Gallery');
            }
        } else {
            // Edit Gallery
            $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->fv->run('Gallery_rules')) {
                $post = $this->input->post();
                $Edit = $this->GalleryModel->Gallery_Update($id, $post);
                if ($Edit) {
                    $this->session->set_flashdata("Success", "Updated Successfully !");
                    return redirect('Gallery');
                } else {
                    $this->session->set_flashdata("Error", "Please Fill All Details!");
                    $this->load->view('Gallery/AddEdit_Gallery');
                }
                return redirect('Gallery');
            } else {
                $this->Gallery_Select($id);
            }

        }

    }

/* Delete Gallery */

    public function Del_Gallery($id)
    {

        $Delete = $this->GalleryModel->Gallery_Delete($id);
        if ($Delete) {
            $this->session->set_flashdata("Success", "Deleted Successfully !");
            return redirect('Gallery');
        } else {
            $this->session->set_flashdata("Error", "Please Try Again!");
            return redirect('Gallery');
        }
    }

}