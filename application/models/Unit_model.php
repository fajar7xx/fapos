<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    public function get($id = NULL)
    {
        $this->db->from('units');
        if ($id != NULL) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db
            ->where('unit_id', $id)
            ->delete('units');
    }

    public function add($post)
    {
        $params = [
            'name_unit' => htmlspecialchars($post['name'])
        ];

        $this->db->insert('units', $params);
    }

    public function edit($post)
    {
        $params = [
            'name_unit' => htmlspecialchars($post['name']),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db
            ->where('unit_id', $post['id'])
            ->update('units', $params);
    }
}
