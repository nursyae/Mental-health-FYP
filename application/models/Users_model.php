<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    function create($data)
    {
        $this->db->insert('users', $data);
        return true;
    }

    public function get_by_email($email)
    {
        $this->db->where('user_email', $email);
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
