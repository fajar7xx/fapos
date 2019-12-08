<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items_model extends CI_Model
{
    public function get($id = NULL)
    {
        $this->db
            ->select('product_items.*, product_categories.name_cat as category, units.name_unit as unit')
            ->from('product_items')
            ->join('product_categories', 'product_categories.cat_id = product_items.cat_id')
            ->join('units', 'units.unit_id = product_items.unit_id');
        if ($id != NULL) {
            $this->db->where('item_id', $id);
        }
        $query = $this->db
            ->order_by('barcode', 'asc')
            ->get();
        return $query;
    }

    public function del($id)
    {
        $this->db
            ->where('item_id', $id)
            ->delete('product_items');
    }

    public function add($post)
    {
        $params = [
            'barcode' => htmlspecialchars($post['barcode']),
            'name_item' => htmlspecialchars($post['name']),
            'cat_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => htmlspecialchars($post['price']),
            'picture' => $post['picture']
        ];

        $this->db->insert('product_items', $params);
    }

    public function edit($post)
    {
        $params = [
            'barcode' => htmlspecialchars($post['barcode']),
            'name_item' => htmlspecialchars($post['name']),
            'cat_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => htmlspecialchars($post['price']),
            'updated' => date('Y-m-d H:i:s')
        ];

        if ($post['picture'] != NULL) {
            $params['picture'] = $post['picture'];
        }

        $this->db
            ->where('item_id', $post['id'])
            ->update('product_items', $params);
    }

    function check_barcode($code, $id = NULL)
    {
        $this->db
            ->from('product_items')
            ->where('barcode',  $code);
        if ($id != NULL) {
            $this->db->where('item_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
