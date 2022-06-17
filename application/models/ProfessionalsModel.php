<?php

class ProfessionalsModel extends CI_Model
{
    
    /* For Insert */

    public function Professionals_Insert($data)
    {
        return $this->db->insert('professionals', $data);
    }

    /* For Delete */

    public function Professionals_Delete($id)
    {
        return $this->db->delete('professionals', ['professionalId' => $id]);
    }

    /* For Update Professionals */

    public function Professionals_Update($id, $data)
    {
        return $this->db->where('professionalId', $id)
            ->update('professionals', $data);
    }

    /* For Display */

    public function Professionals_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('professionals')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('professionals')
                ->where('professionalId', $id)
                ->get();
            return $sel->row();
        }
    }
}