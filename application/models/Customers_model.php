<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers_model extends CI_Model
{
    public function get($id = NULL)
    {
        $this->db->from('customers');
        if ($id != NULL) {
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db
            ->where('customer_id', $id)
            ->delete('customers');
    }

    public function add($post)
    {
        $params = [
            'name' => htmlspecialchars($post['name']),
            'phone' => htmlspecialchars($post['phone']),
            'gender' => htmlspecialchars($post['gender']),
            'address' => htmlspecialchars($post['address'])
        ];

        $this->db->insert('customers', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => htmlspecialchars($post['name']),
            'phone' => htmlspecialchars($post['phone']),
            'gender' => htmlspecialchars($post['gender']),
            'address' => htmlspecialchars($post['address']),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db
            ->where('customer_id', $post['id'])
            ->update('customers', $params);
    }
}
