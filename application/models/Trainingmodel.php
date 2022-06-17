<?php

class TrainingModel extends CI_Model
{
    
    /* For Insert */

    public function Training_Insert($data)
    {
        return $this->db->insert('training', $data);
    }

    /* For Delete */

    public function Training_Delete($id)
    {
        return $this->db->delete('training', ['trainingId' => $id]);
    }

    /* For Update Training */

    public function Training_Update($id, $data)
    {
        return $this->db->where('trainingId', $id)
            ->update('training', $data);
    }

    /* For Display */

    public function Training_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('training')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('training')
                ->where('trainingId', $id)
                ->get();
            return $sel->row();
        }
    }
}