<?php

class PolicyModel extends CI_Model
{
    
    /* For Insert */

    public function Policy_Insert($data)
    {
        return $this->db->insert('policy', $data);
    }

    /* For Delete */

    public function Policy_Delete($id)
    {
        return $this->db->delete('policy', ['policyId' => $id]);
    }

    /* For Update Policy */

    public function Policy_Update($id, $data)
    {
        return $this->db->where('policyId', $id)
            ->update('policy', $data);
    }

    /* For Display */

    public function Policy_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('policy')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('policy')
                ->where('policyId', $id)
                ->get();
            return $sel->row();
        }
    }
}