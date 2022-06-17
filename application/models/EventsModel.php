<?php

class EventsModel extends CI_Model
{
    
    /* For Insert */

    public function Events_Insert($data)
    {
        return $this->db->insert('events', $data);
    }

    /* For Delete */

    public function Events_Delete($id)
    {
        return $this->db->delete('events', ['eventId' => $id]);
    }

    /* For Update Events */

    public function Events_Update($id, $data)
    {
        return $this->db->where('eventId', $id)
            ->update('events', $data);
    }

    /* For Display */

    public function Events_Select($id = null)
    {
        if ($id == null) {
            $sel = $this->db->select('*')
                ->from('events')
                ->get();
            return $sel->result();

        } else {
            $sel = $this->db->select('*')
                ->from('events')
                ->where('eventId', $id)
                ->get();
            return $sel->row();
        }
    }
}