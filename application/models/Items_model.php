<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items_model extends CI_Model
{
    // start datatables
    // var $column_order = array(null, 'barcode', 'p_item.name', 'category_name', 'unit_name', 'price', 'stock'); //set column field database for datatable orderable
    var $column_order = [
        null,
        'barcode',
        'product_items.name_item',
        'category_name',
        'unit_name',
        'price',
        'stock'
    ];

    // var $column_search = array('barcode', 'p_item.name', 'price'); //set column field database for datatable searchable
    var $column_search = [
        'barcode',
        'product_items.name_item',
        'price'
    ];

    // // default order
    var $order = [
        'item_id' => 'asc'
    ];

    private function _get_datatables_query()
    {
        $this->db->select('product_items.*, product_categories.name_cat as category_name, units.name_unit as unit_name');
        $this->db->from('product_items');
        $this->db->join('product_categories', 'product_items.cat_id = product_categories.cat_id');
        $this->db->join('units', 'product_items.unit_id = units.unit_id');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('product_items');
        return $this->db->count_all_results();
    }
    // end datatables


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

    function update_stock_in($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $this->db
            ->set('stock', 'stock' . '+' . $qty, false)
            ->where('item_id', $id)
            ->update('product_items');
    }

    function update_stock_out($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $this->db
            ->set('stock', 'stock' . '-' . $qty, false)
            ->where('item_id', $id)
            ->update('product_items');
    }
}
