<?php

class CounsellingModel extends CI_Model
{
    
    /* For Insert */

    public function Counselling_Insert($data)
    {
        return $this->db->insert('counselling', $data);
    }

    /* For Delete */

    public function Counselling_Delete($id)
    {
        return $this->db->delete('counselling', ['counsellingId' => $id]);
    }

    /* For Update Counselling */

    public function Counselling_Update($id, $data)
    {
        return $this->db->where('counsellingId', $id)
            ->update('counselling', $data);
    }

    /* For Display */

    public function Counselling_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('counselling')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('counselling')
                ->where('counsellingId', $id)
                ->get();
            return $sel->row();
        }
    }
}