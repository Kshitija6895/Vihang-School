<?php

class homeSliderModel extends CI_Model
{
    
    /* For Insert */

    public function homeSlider_Insert($data)
    {
        return $this->db->insert('homeslider', $data);
    }

    /* For Delete */

    public function homeSlider_Delete($id)
    {
        return $this->db->delete('homeslider', ['homeSliderId' => $id]);
    }

    /* For Update homeSlider */

    public function homeSlider_Update($id, $data)
    {
        return $this->db->where('homeSliderId', $id)
            ->update('homeslider', $data);
    }

    /* For Display */

    public function homeSlider_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('homeslider')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('homeslider')
                ->where('homeSliderId', $id)
                ->get();
            return $sel->row();
        }
    }
}