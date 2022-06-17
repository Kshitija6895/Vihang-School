<?php

class GalleryModel extends CI_Model
{
    
    /* For Insert */

    public function Gallery_Insert($data)
    {
        return $this->db->insert('gallery', $data);
    }

    /* For Delete */

    public function Gallery_Delete($id)
    {
        return $this->db->delete('gallery', ['galleryId' => $id]);
    }

    /* For Update Gallery */

    public function Gallery_Update($id, $data)
    {
        return $this->db->where('galleryId', $id)
            ->update('gallery', $data);
    }

    /* For Display */

    public function Gallery_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('gallery')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('gallery')
                ->where('galleryId', $id)
                ->get();
            return $sel->row();
        }
    }
}