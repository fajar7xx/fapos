<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    public function login($post){
        $query = $this->db
            ->select('*')
            ->from('users')
            ->where('username', $post['username'])
            ->where('password', sha1($post['password']))
            ->get();

        return $query;
    }
}