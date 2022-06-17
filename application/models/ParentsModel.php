<?php

class ParentsModel extends CI_Model
{
    
    /* For Insert */

    public function Parents_Insert($data)
    {
        return $this->db->insert('parents', $data);
    }

    /* For Delete */

    public function Parents_Delete($id)
    {
        return $this->db->delete('parents', ['parentId' => $id]);
    }

    /* For Update Parents */

    public function Parents_Update($id, $data)
    {
        return $this->db->where('parentId', $id)
            ->update('parents', $data);
    }

    /* For Display */

    public function Parents_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('parents')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('parents')
                ->where(['parentId'=>$id,'isParent'=>1])
                ->get();
            return $sel->row();
        }
    }
}