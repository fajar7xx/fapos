<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers_model extends CI_Model
{
    public function get($id = NULL)
    {
        $this->db->from('suppliers');
        if ($id != NULL) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db
            ->where('supplier_id', $id)
            ->delete('suppliers');
    }

    public function add($post)
    {
        $params = [
            'name' => htmlspecialchars($post['name']),
            'phone' => htmlspecialchars($post['phone']),
            'address' => htmlspecialchars($post['address']),
            'description' => empty($post['description']) ? null : htmlspecialchars($post['description'])
        ];

        $this->db->insert('suppliers', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => htmlspecialchars($post['name']),
            'phone' => htmlspecialchars($post['phone']),
            'address' => htmlspecialchars($post['address']),
            'description' => empty($post['description']) ? null : htmlspecialchars($post['description']),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db
            ->where('supplier_id', $post['id'])
            ->update('suppliers', $params);
    }
}
