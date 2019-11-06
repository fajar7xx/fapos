<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function login($post)
    {
        $query = $this->db
            ->select('*')
            ->from('users')
            ->where('username', $post['username'])
            ->where('password', sha1($post['password']))
            ->get();

        return $query;
    }

    public function getUser($id = null)
    {
        $this->db->from('users');

        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function addUser($post)
    {
        $data = [
            'name' => $post['fullname'],
            'username' => $post['username'],
            'password' => sha1($post['password']),
            'pass_origin' => $post['password'],
            'address' => $post['address'] != ""  ? $post['address'] : NULL,
            'level' => $post['level']
        ];

        $this->db->insert('users', $data);
    }
}
