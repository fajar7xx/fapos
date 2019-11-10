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

    public function updateUser($post)
    {
        $data = [
            'name' => $post['fullname'],
            'username' => $post['username'],
            'address' => $post['address'] != ""  ? $post['address'] : NULL,
            'level' => $post['level']
        ];
        if (!empty($post['password'])) {
            $data['password'] = sha1($post['password']);
            $data['pass_origin'] = $post['password'];
        };


        $this->db
            ->where('user_id', $post['user_id'])
            ->update('users', $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('user_id', $id)
            ->delete('users');
    }
}
