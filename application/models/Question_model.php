<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Question_model extends CI_Model
{
    public function create($data)
    {
        $this->db->insert('question', $data);
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('question_id', $id);
        $this->db->update('question', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('question_id', $id);
        $this->db->delete('question');
        return true;
    }

    public function listing()
    {
        $query = $this->db->get('question');
        return $query->result();
    }

    public function get($id)
    {
        $this->db->where('question_id', $id);
        $query = $this->db->get('question');
        return $query->row();
    }
}
