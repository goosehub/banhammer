<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class User extends CI_Controller {

	function __construct() {
	    parent::__construct();
        $this->load->model('main_model', '', TRUE);
	    $this->load->model('user_model', '', TRUE);
	}

	// Login
	public function login()
	{
        // Clear existing session
        $this->session->unset_userdata('user');

		// Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[64]|callback_login_validation');
        
		// Fail
        if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url(), 'refresh');
            return false;
        }

        // Compare to database
        $username = $this->input->post('username');
        $user = $this->user_model->get_user_by_username($username);

        // Update last login
        $this->user_model->update_last_login($user['id']);

        // Login
        $sess_array = array(
            'id' => $user['id'],
            'username' => $user['username'],
            'logged_in' => true,
        );
        $this->session->set_userdata('user', $sess_array);
        redirect(base_url(), 'refresh');
	}

	// Validate Login Callback
	public function login_validation($password)
	{
		// Get other parameters
        $username = $this->input->post('username');

		// Compare to database
        $user = $this->user_model->get_user_for_login($username);

        // Fail
        if (!$user || !password_verify($password, $user['password'])) {
            return 'Invalid username or password';
        }
		// Success
        return true;
	}

	// Register
	public function register()
	{
		// Validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[64]|matches[confirm]|callback_register_validation');
        $this->form_validation->set_rules('confirm', 'Confirm', 'trim|required');

        // Fail
        if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('failed_form', 'register');
        	$this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url(), 'refresh');
        }
        // Success
        else {
            $this->session->set_flashdata('just_registered', true);
            redirect(base_url(), 'refresh');
        }
	}

	// Validate Register Callback
    public function register_validation($password) {
        // Set parameters
        $email = 'placeholder@gmail.com';
        $username = $this->input->post('username');
        $facebook_id = 0;
        $ip = $_SERVER['REMOTE_ADDR'];

        // Email Validation
        $validate_emails = false;
        if ($validate_emails) {
            $this->load->helper('email');
            if (!valid_email($email)) {
                $this->form_validation->set_message('validation_errors', 'This is not a working email address');
                return false;
            }
        }

        // Attempt new user register
        $sites = $this->main_model->get_all_sites();
        $user_id = $this->user_model->register($username, $password, $email, $facebook_id, $ip, $sites);

        // Fail
        if (!$user_id) {
            $this->form_validation->set_message('validation_errors', 'Username already exists');
            return false;
        }

        // Success, create session
        $sess_array = array(
            'id' => $user_id,
            'username' => $username,
            'logged_in' => true,
        );
        $this->session->set_userdata('user', $sess_array);
        return true;
    }

	// Logout
    public function logout() {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }
}