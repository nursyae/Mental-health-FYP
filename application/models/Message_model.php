<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message_model extends CI_Model
{

    public function create($data)
    {
        $this->db->insert('message', $data);
    }

    public function reply($data)
    {
        $this->db->insert('reply', $data);
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->join('users', 'users.user_id = message.message_user_id', 'left');
        $this->db->order_by('message_id', 'desc');
        $query = $this->db->get();
        $arr = array();
        foreach ($query->result() as $key =>  $row) {
            $arr[$key] = $row;
            $this->db->select('*');
            $this->db->from('reply');
            $this->db->join('users', 'users.user_id = reply.message_user_id', 'left');
            $this->db->where('message_id', $row->message_id);
            $this->db->order_by('message_id', 'desc');
            $query2 = $this->db->get();
            if ($query2->num_rows() > 0) {
                $arr[$key]->message_status = $query2->result();
            } else {
                $arr[$key]->message_status = '0';
            }
        }
        return $arr;
    }

    public function listing_sent($id)
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->join('users', 'users.user_id = message.message_user_id', 'left');
        $this->db->where('message_user_id', $id);
        $this->db->order_by('message_id', 'desc');
        $query = $this->db->get();
        $arr = array();
        foreach ($query->result() as $key =>  $row) {
            $arr[$key] = $row;
            $this->db->select('*');
            $this->db->from('reply');
            $this->db->join('users', 'users.user_id = reply.message_user_id', 'left');
            $this->db->where('message_id', $row->message_id);
            $this->db->order_by('message_id', 'desc');
            $query2 = $this->db->get();
            if ($query2->num_rows() > 0) {
                $arr[$key]->reply = $query2->result();
            } else {
                $arr[$key]->reply = array();
            }
        }
        return $arr;
    }

    public function listing_received($id = null)
    {
        $this->db->select('*');
        $this->db->from('reply');
        $this->db->join('users', 'users.user_id = reply.message_user_id', 'left');
        if ($id != null) {
            $this->db->where('message_user_id', $id);
        }
        $this->db->order_by('message_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->join('users', 'users.user_id = message.message_user_id', 'left');
        $this->db->where('message_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete($id)
    {
        $this->db->where('message_id', $id);
        $this->db->delete('message');
    }

    public function list_status($status = 0)
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->join('users', 'users.user_id = message.message_user_id', 'left');
        $this->db->where('message_status', $status);
        $this->db->order_by('message_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_seen_by_user_id($seen, $user_id)
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->join('users', 'users.user_id = message.message_user_id', 'left');
        $this->db->where('message_seen', $seen);
        $this->db->where('message_user_id', $user_id);
        $this->db->order_by('message_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_status($id = null)
    {
        $this->db->set('message_status', 1);
        if ($id != null) {
            $this->db->where('message_id', $id);
        }
        $this->db->update('message');
    }

    public function update_seen_by_user_id($user_id)
    {
        $this->db->set('message_seen', 1);
        $this->db->where('message_user_id', $user_id);
        $this->db->update('message');
    }
}
