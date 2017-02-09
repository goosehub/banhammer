<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<br>' . $this->db->last_query() . '<br>';

Class main_model extends CI_Model
{
    function select_row($table, $id)
    {
       $this->db->select('*');
       $this->db->from($table);
       $this->db->where('id', $id);
       $query = $this->db->get();
       return $query->result_array();
    }

    function insert_row($table, $column)
    {
        $data = array(
            'column' => $column,
        );
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function update_row($table, $id, $column)
    {
        $data = array(
            'column' => $column,
            'modified' => date('Y-m-d H:i:s', time())
        );
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function delete_row($table, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }
}
?>