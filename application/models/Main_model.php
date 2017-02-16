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
    function get_all_sites()
    {
        $this->db->select('*');
        $this->db->from('site');
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
    function get_site_post_count($site_key)
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('post');
        $this->db->where('site_key', $site_key);
        $query = $this->db->get();
        $result = $query->result_array();
        return isset($result[0]['count']) ? $result[0]['count'] : false;
    }
    function get_site_posts($site_key, $offset, $limit)
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('site_key', $site_key);
        $this->db->offset($offset);
        $this->db->limit($limit);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function get_post_by_id($post_key)
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('id', $post_key);
        $query = $this->db->get();
        $result = $query->result_array();
        return isset($result[0]) ? $result[0] : false;
    }
    function get_random_post($site_key)
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('site_key', $site_key);
        $this->db->order_by('id', 'random');
        $query = $this->db->get();
        $result = $query->result_array();
        return isset($result[0]) ? $result[0] : false;
    }
    function create_post($post)
    {
        $data = array(
            'site_key' => $post['site_key'],
            'username' => $post['username'],
            'content' => $post['content'],
            'image' => $post['image'],
            'offence_key' => 1,
            'confidence' => 1,
            'last_reviewed' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('post', $data);
        return $this->db->insert_id();
    }
    function create_review($account_key, $site_key, $post_key, $offence_key, $action_key)
    {
        $data = array(
            'account_key' => $account_key,
            'site_key' => $site_key,
            'post_key' => $post_key,
            'offence_key' => $offence_key,
            'action_key' => $action_key,
        );
        $this->db->insert('review', $data);
        return $this->db->insert_id();
    }
    function get_offences_by_site($site_key)
    {
        $this->db->select('*');
        $this->db->from('enforcement');
        $this->db->join('offence', 'enforcement.offence_key = offence.id', 'left');
        $this->db->where('site_key', $site_key);
        $this->db->order_by('offence.sort', 'ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function get_actions()
    {
        $this->db->select('*');
        $this->db->from('action');
        $this->db->order_by('sort', 'ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function update_post($post)
    {
        $data = array(
            'offence_key' => $post['offence_key'],
            'confidence' => $post['confidence'],
            'review_tally' => $post['review_tally'],
            'last_reviewed' => date('Y-m-d H:i:s', time()),
        );
        $this->db->where('id', $post['id']);
        $this->db->update('post', $data);
    }
    function update_account($account)
    {
        $data = array(
            'streak' => $account['streak'],
            'pass' => $account['pass'],
            'fail' => $account['fail'],
            'total' => $account['total'],
        );
        $this->db->where('id', $account['id']);
        $this->db->update('account', $data);
    }
    function real_report($post_key)
    {
        $this->db->set('real_report', 'real_report+1', FALSE);
        $this->db->where('id', $post_key);
        $this->db->update('post');
    }
}
?>