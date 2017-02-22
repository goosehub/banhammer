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
    function get_overall_leaderboard($limit)
    {
        $this->db->select('`user`.username, `account`.*, SUM(pass) as pass, SUM(fail) as fail, MAX(streak) as streak, SUM(total) as total, (100 - (100 / ( (pass + fail) / fail) ) ) as accuracy');
        $this->db->from('user');
        $this->db->join('account', 'user.id = account.user_key', 'left');
        $this->db->where('total >= ', $limit);
        $this->db->group_by('user_key');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function get_leaderboard_for_site($site_key, $limit)
    {
        $this->db->select('account.*, user.username, (100 - (100 / ( (pass + fail) / fail) ) ) as accuracy');
        $this->db->from('account');
        $this->db->join('user', 'user.id = account.user_key', 'left');
        $this->db->where('site_key', $site_key);
        $this->db->where('total >= ', $limit);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
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
    function get_post_for_queue($site_key, $ip, $hours_between_reviews)
    {
        $site_key = mysqli_real_escape_string(get_mysqli(), $site_key);
        $ip = mysqli_real_escape_string(get_mysqli(), $ip);

        // Left Join with negative check makes this query delicate, be careful
        // Specific select to keep offence_key, confidence, real report, and other data secret
        $raw_query = "
        SELECT `post`.id, `post`.username, `post`.content, `post`.created
        FROM `post`
        WHERE `post`.`site_key` = " . $site_key . "
        AND NOT EXISTS (
            SELECT *
            FROM `review`
            WHERE `post_key` = `post`.`id`
            AND `ip` = '" . $ip . "'
            AND `review`.`created` > timestampadd(hour, -" . $hours_between_reviews . ", now())
        )
        ORDER BY RAND()
        LIMIT 1;
        ";
        $query = $this->db->query($raw_query);
        $result = $query->result_array();
        return isset($result[0]) ? $result[0] : false;
    }
    function recent_reviews_for_post($post_key, $ip, $hours_between_reviews)
    {
        $this->db->select('*');
        $this->db->from('review');
        $this->db->where('post_key', $post_key);
        $this->db->where('ip', $ip);
        $this->db->where('`created` > timestampadd(hour, -' . $hours_between_reviews . ', now())', '', false);
        $query = $this->db->get();
        return $query->result_array();
    }
    function create_post($post, $user)
    {
        $data = array(
            'site_key' => $post['site_key'],
            'username' => $post['username'],
            'content' => $post['content'],
            'image' => $post['image'],
            'ip' => $post['ip'],
            'offence_key' => 1,
            'confidence' => 1,
            'account_key' => $user['current_account']['id'],
            'last_reviewed' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('post', $data);
        return $this->db->insert_id();
    }
    function create_review($account_key, $site_key, $post_key, $offence_key, $action_key, $ip)
    {
        $data = array(
            'account_key' => $account_key,
            'site_key' => $site_key,
            'post_key' => $post_key,
            'offence_key' => $offence_key,
            'action_key' => $action_key,
            'ip' => $ip,
        );
        $this->db->insert('review', $data);
        return $this->db->insert_id();
    }
    function percent_of_reviews_with_action_by_post_key($post_key, $action_key)
    {
        $post_key = mysqli_real_escape_string(get_mysqli(), $post_key);
        $action_key = mysqli_real_escape_string(get_mysqli(), $action_key);

        // Get percent of reviews with this action
        $query = $this->db->query("
            SELECT 100 * SUM(CASE WHEN `action_key` = " . $action_key . " THEN 1 ELSE 0 END)/COUNT(*) as percent, COUNT(*) as total
            FROM `review`
            WHERE `post_key` = " . $post_key . "
        ");
        $result = $query->result_array();
        if (!$result[0]['percent']) {
            $result[0]['percent'] = 100;
        }
        return $result[0];
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