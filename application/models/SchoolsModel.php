<?php

class SchoolsModel extends CI_Model
{
    
    /* For Insert */

    public function Schools_Insert($data)
    {
        return $this->db->insert('schools', $data);
    }

    /* For Delete */

    public function Schools_Delete($id)
    {
        return $this->db->delete('schools', ['schoolId' => $id]);
    }

    /* For Update Schools */

    public function Schools_Update($id, $data)
    {
        return $this->db->where('schoolId', $id)
            ->update('schools', $data);
    }

    /* For Display */

    public function Schools_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('schools')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('schools')
                ->where('schoolId', $id)
                ->get();
            return $sel->row();
        }
    }
}