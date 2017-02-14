<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('main_model', '', TRUE);
        $this->load->model('user_model', '', TRUE);

        // Get list of active sites
        $this->data['active_sites'] = $this->main_model->get_active_sites();
        $this->data['user'] = $this->get_user_by_session();

        $this->confidence_minimum = 3;
    }

    public function landing()
    {
        $data = $this->data;
        $data['page_title'] = site_name();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('landing', $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('templates/footer', $data);
    }

    public function homepage($slug, $offset = 0, $limit = 30)
    {
        $data = $this->data;
        $data['current_site'] = $this->main_model->get_current_site($slug);
        if (empty($data['current_site']) || !$data['current_site']['active']) {
            $this->page('site_not_found');
            return false;
        }
        $data['validation_errors'] = $this->session->flashdata('validation_errors');

        // Get recent posts
        $data['site_key'] = $data['current_site']['id'];
        $data['offset'] = $offset;
        $data['limit'] = $limit;
        $data['posts'] = $this->main_model->get_site_posts($data['site_key'], $data['offset'], $data['limit']);
        $data['post_count'] = $this->main_model->get_site_post_count($data['site_key']);
        $data['offences'] = $this->main_model->get_offences_by_site($data['current_site']['id']);

        $data['page_title'] = $slug;
        $data['slug'] = $slug;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('sites/' . $slug . '/style', $data);
        $this->load->view('sites/' . $slug . '/homepage', $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('sites/' . $slug . '/script', $data);
        $this->load->view('templates/footer', $data);
    }

    public function queue($slug)
    {
        $data = $this->data;
        $data['current_site'] = $this->main_model->get_current_site($slug);
        if ($data['user']['logged_in']) {
            $data['user']['current_account'] = $this->user_model->get_account_by_site($data['user']['id'], $data['current_site']['id']);
        }
        if (empty($data['current_site']) || !$data['current_site']['active']) {
            $this->page('site_not_found');
            return false;
        }

        // If post request, handle post request
        if ($this->input->method() === 'post') {
            $data = $this->new_review($data);
            if (!$data) {
                // Should only happen to hackers
                echo validation_errors();
                echo report_bugs_string();
            }
        }

        // Get a random post
        $data['post'] = $this->main_model->get_random_post($data['current_site']['id']);
        $data['offences'] = $this->main_model->get_offences_by_site($data['current_site']['id']);
        $data['actions'] = $this->main_model->get_actions();

        $data['page_title'] = $slug . ' Moderator Queue';
        $data['slug'] = $slug;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('sites/' . $slug . '/style', $data);
        $this->load->view('sites/' . $slug . '/queue', $data);
        $this->load->view('templates/queue_form', $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('sites/' . $slug . '/script', $data);
        $this->load->view('templates/footer', $data);
    }

    public function new_review($data)
    {
        // Validation
        $this->form_validation->set_rules('post_id', 'post_id', 'trim|required|integer|greater_than[0]|max_length[10]');
        $this->form_validation->set_rules('offence', 'offence', 'trim|required|integer|greater_than[0]|max_length[10]');
        $this->form_validation->set_rules('action', 'action', 'trim|required|integer|greater_than[0]|max_length[10]');
        
        // Fail
        if ($this->form_validation->run() == FALSE) {
            return false;
        }

        $data['site_key'] = $data['current_site']['id'];
        $user_input['offence_key'] = $this->input->post('offence');
        $user_input['post_key'] = $this->input->post('post_id');
        $user_input['action_key'] = $this->input->post('action');

        // Insert as new review
        $this->main_model->create_review($data['user']['current_account']['id'], $data['site_key'], $user_input['post_key'], $user_input['offence_key'], $user_input['action_key']);

        // Update post offence if no confidence
        $reviewed_post = $this->main_model->get_post_by_id($user_input['post_key']);
        if ($reviewed_post['offence_key'] != $user_input['offence_key'] && $reviewed_post['confidence'] === 1) {
            $reviewed_post['offence_key'] = $user_input['offence_key'];
        }
        // Else increase post confidence on agree
        else if ($reviewed_post['offence_key'] === $user_input['offence_key']) {
            $reviewed_post['confidence'] = $reviewed_post['confidence'] + 1;
        }
        // Else decrease post confidence on disagree
        else {
            $reviewed_post['confidence'] = $reviewed_post['confidence'] - 1;
        }
        $reviewed_post['review_tally'] = $reviewed_post['review_tally'] + 1;
        $this->main_model->update_post($reviewed_post);

        // Update session
        if ($reviewed_post['confidence'] < $this->confidence_minimum || $reviewed_post['offence_key'] === $user_input['offence_key']) {
            $new_streak = $data['user']['current_account']['streak'] + 1;
            $new_pass = $data['user']['current_account']['pass'] + 1;
            $new_fail = $data['user']['current_account']['fail'];
            $new_total = $data['user']['current_account']['total'] + 1;
            $data['review_result'] = true;
        }
        else {
            $new_streak = 0;
            $new_pass = $data['user']['current_account']['pass'];
            $new_fail = $data['user']['current_account']['fail'] + 1;
            $new_total = $data['user']['current_account']['total'] + 1;

            $data['review_result'] = false;
        }

        // Update user
        if ($data['user']['logged_in']) {
            $this->main_model->update_account($data['user']['current_account']['id'], $new_streak, $new_pass, $new_fail, $new_total);
        }
        // Update user session
        else {
            $sess_array = array(
                'logged_in' => $data['user']['logged_in'],
                'id' => $data['user']['id'],
                'username' => $data['user']['username'],
                'current_account' => array(
                    'pass' => $new_pass,
                    'fail' => $new_fail,
                    'streak' => $new_streak,
                    'total' => $new_total,
                ),
            );
            $this->session->set_userdata('user', $sess_array);
        }

        // Get user with new info
        $data['user'] = $this->get_user_by_session();
        return $data;
    }

    public function new_post($slug)
    {
        $data = $this->data;
        $data['current_site'] = $this->main_model->get_current_site($slug);
        if (empty($data['current_site']) || !$data['current_site']['active']) {
            $this->page('site_not_found');
            return false;
        }

        // Validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('content', 'Message', 'trim|max_length[10000]');

        // Image upload Config
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webm';
        $config['max_size']      = '3000';
        $config['max_width']     = '5000';
        $config['max_height']    = '5000';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);

        // Image
        $post['image'] = '';
        if (!$_FILES['image']['name'] && !$this->input->post('content')) {
            $this->session->set_flashdata('validation_errors', 'Either image or message field required');
            redirect(base_url() . 'site/' . $slug, 'refresh');
            return false;
        }
        if ( $_FILES['image']['name'] && !$this->upload->do_upload('image') ) {
            $this->session->set_flashdata('validation_errors', $this->upload->display_errors());
            redirect(base_url() . 'site/' . $slug, 'refresh');
            return false;
        }
        else if ($_FILES['image']['name']) {
            $file = $this->upload->data();
            $post['image'] = $file['file_name'];
        }
        
        // Fail
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
        }
        // Pass
        else {
            // Input
            $post['site_key'] = $data['current_site']['id'];
            $post['username'] = $this->input->post('username');
            $post['content'] = $this->input->post('content');

            // Create post
            $this->main_model->create_post($post);
        }

        redirect(base_url() . 'site/' . $slug, 'refresh');
    }

    public function get_user_by_session()
    {
        $user = $this->session->userdata('user');
        if (empty($user)) {
            $sess_array = array(
                'id' => 0,
                'username' => 'Anonymous',
                'logged_in' => false,
                'current_account' => array(
                    'pass' => 0,
                    'fail' => 0,
                    'streak' => 0,
                    'total' => 0,
                ),
            );
            $this->session->set_userdata('user', $sess_array);
            $user = $this->session->userdata('user');
        }
        if ($user['id']) {
            $user = $this->user_model->get_user_by_id($user['id']);
        }
        return $user; 
    }

    public function page($slug)
    {
        $data = $this->data;
        $data['page_title'] = deslug($slug);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('pages/' . $slug, $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('templates/footer', $data);
    }

}
