<?php

class LearningModel extends CI_Model
{
    
    /* For Insert */

    public function Learning_Insert($data)
    {
        return $this->db->insert('learning', $data);
    }

    /* For Delete */

    public function Learning_Delete($id)
    {
        return $this->db->delete('learning', ['learningId' => $id]);
    }

    /* For Update Learning */

    public function Learning_Update($id, $data)
    {
        return $this->db->where('learningId', $id)
            ->update('learning', $data);
    }

    /* For Display */

    public function Learning_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('learning')
                ->get();
            return $sel->result();

        } else {
            $sel['audio'] = $this->db->select('learningId,audio,sprite')
                ->from('learning-audio')
                ->where('learningId', $id)
                ->get()->row();
            $sel['list'] = $this->db->select('learningId,word,label,image as wordImage')
                ->from('learning-details')
                ->where('learningId', $id)
                ->get()->result();
            return $sel;
        }
    }
}