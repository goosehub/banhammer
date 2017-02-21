<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class user_model extends CI_Model
{
 function get_all_users()
 {
    $this->db->select('id, username, created');
    $this->db->from('user');
    $query = $this->db->get();
    return $query->result_array();
 }
 // TODO: use raw sql and joins when reads become a performance becomes a pain point
 function get_user_by_id($user_id)
 {
    // Get user
    $this->db->select('`user`.id, username, last_login, `user`.created, SUM(pass) as pass, SUM(fail) as fail, MAX(streak) as streak, SUM(total) as total');
    $this->db->from('user');
    $this->db->join('account', 'user.id = account.user_key', 'left');
    $this->db->where('`user`.id', $user_id);
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->result_array();
    if (!isset($result[0])) {
        return false;
    }
    $user = $result[0];
    $user['logged_in'] = true;
    $user['current_account']['id'] = 0;
    $user['current_account']['pass'] = $user['pass'];
    $user['current_account']['fail'] = $user['fail'];
    $user['current_account']['streak'] = $user['streak'];
    $user['current_account']['total'] = $user['total'];

    return $user;
 }
 function get_user_by_username($username)
 {
    $this->db->select('id, username, created');
    $this->db->from('user');
    $this->db->where('username', $username);
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->result_array();
    return isset($result[0]) ? $result[0] : false;
 }
 function get_user_for_login($username)
 {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $username);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
        $result = $query->result_array();
        return isset($result[0]) ? $result[0] : false;
    } else {
        return false;
    }
 }
 function get_account_by_site($user_key, $site_key) {
    $this->db->select('*');
    $this->db->from('account');
    $this->db->where('user_key', $user_key);
    $this->db->where('site_key', $site_key);
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->result_array();
    return isset($result[0]) ? $result[0] : false;
}
 function update_last_login($user_id)
 {
    $data = array(
        'last_login' => date('Y-m-d H:i:s', time()),
    );
    $this->db->where('id', $user_id);
    $this->db->update('user', $data);
 }
 function register($username, $password, $email, $facebook_id, $ip, $ab_test, $sites)
 {
    // Check if user already exists
    $this->db->select('username');
    $this->db->from('user');
    $this->db->where('username', $username);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return false;
    }

    // Insert user into user
    $data = array(
        'username' => $username,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'email' => $email,
        'facebook_id' => $facebook_id,
        'ip' => $ip,
        'ab_test' => $ab_test,
        'last_login' => date('Y-m-d H:i:s', time()),
    );
    $this->db->insert('user', $data);

    $user_key = $this->db->insert_id();

    foreach ($sites as $site) {
        // Insert user into user
        $data = array(
            'user_key' => $user_key,
            'site_key' => $site['id'],
            'pass' => 0,
            'fail' => 0,
            'streak' => 0,
            'total' => 0,
        );
        $this->db->insert('account', $data);
    }

    return $user_key;
 }

}
?>