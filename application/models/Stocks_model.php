<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stocks_model extends CI_Model
{
    public function get($id = null){
        $this->db->from('stocks');
        if($id != null){
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_stock_in(){
        $this->db
        ->select('stocks.*, product_items.name_item as item, suppliers.name as supplier, product_items.barcode as barcode')
        ->from('stocks')
        ->join('product_items', 'stocks.item_id = product_items.item_id')
        ->join('suppliers', 'stocks.supplier_id = suppliers.supplier_id', 'left')
        ->where('stocks.type', 'in')
        ->order_by('stock_id', 'desc');

        $query = $this->db->get();
        return $query;

    }

    public function add_stock_in($post)
    {
        $params = [
            'item_id' => $post['item_id'],
            'type' => 'in',
            'detail' => $post['detail'],
            'supplier_id' => ($post['supplier'] ?: NULL),
            'qty' => $post['qty'],
            'date' => $post['tanggal'],
            'user_id' => $this->session->userdata('user_id')
        ];

        $this->db->insert('stocks', $params);
    }

    public function get_stock_out(){
        $this->db
        ->select('stocks.*, product_items.name_item as item, suppliers.name as supplier, product_items.barcode as barcode')
        ->from('stocks')
        ->join('product_items', 'stocks.item_id = product_items.item_id')
        ->join('suppliers', 'stocks.supplier_id = suppliers.supplier_id', 'left')
        ->where('stocks.type', 'out')
        ->order_by('stock_id', 'desc');

        $query = $this->db->get();
        return $query;

    }

    public function add_stock_out($post)
    {
        $params = [
            'item_id' => $post['item_id'],
            'type' => 'out',
            'detail' => $post['detail'],
            'supplier_id' => ($post['supplier'] ?: NULL),
            'qty' => $post['qty'],
            'date' => $post['tanggal'],
            'user_id' => $this->session->userdata('user_id')
        ];

        $this->db->insert('stocks', $params);
    }

    public function del($id){
        $this->db
        ->where('stock_id', $id)
        ->delete('stocks');
    }


}
