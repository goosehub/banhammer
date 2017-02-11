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
 function get_user_by_id($user_id)
 {
    $this->db->select('id, username, pass, fail, streak, total, last_login, created');
    $this->db->from('user');
    $this->db->where('id', $user_id);
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->result_array();
    return isset($result[0]) ? $result[0] : false;
 }
 function get_user_by_username($username)
 {
    $this->db->select('id, username, pass, fail, streak, total, last_login, created');
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
 function update_last_login($user_id)
 {
    $data = array(
        'last_login' => date('Y-m-d H:i:s', time()),
    );
    $this->db->where('id', $user_id);
    $this->db->update('user', $data);
 }
 function register($username, $password, $email, $facebook_id, $ip)
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
        'pass' => 0,
        'fail' => 0,
        'streak' => 0,
        'total' => 0,
        'last_login' => date('Y-m-d H:i:s', time()),
    );
    $this->db->insert('user', $data);

    return $this->db->insert_id();
 }

}
?>