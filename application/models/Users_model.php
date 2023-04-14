<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function create($data)
    {
        $this->db->insert('users', $data);
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
        return true;
    }

    public function get_by_email($email)
    {
        $this->db->where('user_email', $email);
        $query = $this->db->get('users');

        return $query->row();
    }

    public function get_by_id($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');

        return $query->row();
    }

    public function get_by_matrix_number($id)
    {
        $this->db->where('user_matrix_number', $id);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function listing()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function total()
    {
        $query = $this->db->get('users');
        return $query->num_rows();
    }
}
