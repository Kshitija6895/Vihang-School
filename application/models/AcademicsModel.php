<?php

class AcademicsModel extends CI_Model
{
    
    /* For Insert */

    public function Academics_Insert($data)
    {
        return $this->db->insert('academics', $data);
    }

    /* For Delete */

    public function Academics_Delete($id)
    {
        return $this->db->delete('academics', ['academicId' => $id]);
    }

    /* For Update Academics */

    public function Academics_Update($id, $data)
    {
        return $this->db->where('academicId', $id)
            ->update('academics', $data);
    }

    /* For Display */

    public function Academics_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('academics')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('academics')
                ->where('academicId', $id)
                ->get();
            return $sel->row();
        }
    }
}