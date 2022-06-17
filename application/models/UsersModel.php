<?php

class UsersModel extends CI_Model
{
    
    /* For Insert */

    public function Users_Insert($data)
    {
        return $this->db->insert('parents', $data);
    }

    /* For Delete */

    public function Users_Delete($id)
    {
        return $this->db->delete('parents', ['parentId' => $id]);
    }

    /* For Update Users */

    public function Users_Update($id, $data)
    {
        return $this->db->where('parentId', $id)
            ->update('parents', $data);
    }

    /* For Display */

    public function Users_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('parents')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('parents')
                ->where(['parentId'=>$id,'isParent'=>0])
                ->get();
            return $sel->row();
        }
    }
}