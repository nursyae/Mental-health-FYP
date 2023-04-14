<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Score_model extends CI_Model
{

    public function create($data)
    {
        $this->db->insert('score', $data);
    }

    public function listing($id = null)
    {
        $this->db->select('*');
        $this->db->from('score');
        $this->db->join('users', 'users.user_id = score.score_user_id', 'left');
        $this->db->order_by('score_id', 'desc');
        if ($id != null) {
            $this->db->where('score_user_id', $id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('score');
        $this->db->join('users', 'users.user_id = score.score_user_id', 'left');
        $this->db->where('score_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete($id)
    {
        $this->db->where('score_id', $id);
        $this->db->delete('score');
    }

    public function get_skore_latest($user_id)
    {
        $this->db->select('*');
        $this->db->from('score');
        $this->db->where('score_user_id', $user_id);
        $this->db->order_by('score_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }
}
