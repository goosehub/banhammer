<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<br>' . $this->db->last_query() . '<br>';

Class main_model extends CI_Model
{
    function get_active_sites()
    {
        $this->db->select('*');
        $this->db->from('site');
        $this->db->where('active', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function get_current_site($slug)
    {
        $this->db->select('*');
        $this->db->from('site');
        $this->db->where('slug', $slug);
        $query = $this->db->get();
        $result = $query->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function get_posts($input)
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('site_key', $input['site_key']);
        $this->db->offset($input['offset']);
        $this->db->limit($input['limit']);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function get_random_post($input)
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('site_key', $input['site_key']);
        $this->db->order_by('id', 'random');
        $query = $this->db->get();
        $result = $query->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function create_post($input)
    {
        $data = array(
            'site_key' => $input['site_key'],
            'username' => $input['username'],
            'content' => $input['content'],
            'image' => $input['image'],
            'offence_key' => 1,
            'confidence' => 1,
            'last_reviewed' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('post', $data);
        return $this->db->insert_id();
    }

    function get_offences_by_site($site_key)
    {
        $this->db->select('*');
        $this->db->from('enforcement');
        $this->db->where('site_key', $site_key);
        $query = $this->db->get();
        $sub_results = $query->result_array();
        $result = array();
        foreach ($sub_results as $sub_result) {
            $this->db->select('*');
            $this->db->from('offence');
            $this->db->where('id', $sub_result['offence_key']);
            $query = $this->db->get();
            $offence = $query->result_array();
            $result[] = $offence[0];
        }
        return $result;
    }

    function get_actions()
    {
        $this->db->select('*');
        $this->db->from('action');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
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
}
?>