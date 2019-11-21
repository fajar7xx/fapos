<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function get($id = NULL)
    {
        $this->db->from('product_categories');
        if ($id != NULL) {
            $this->db->where('cat_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db
            ->where('cat_id', $id)
            ->delete('product_categories');
    }

    public function add($post)
    {
        $params = [
            'name_cat' => htmlspecialchars($post['name'])
        ];

        $this->db->insert('product_categories', $params);
    }

    public function edit($post)
    {
        $params = [
            'name_cat' => htmlspecialchars($post['name']),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db
            ->where('cat_id', $post['id'])
            ->update('product_categories', $params);
    }
}
