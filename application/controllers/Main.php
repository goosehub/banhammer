<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('main_model', '', TRUE);
        $this->load->model('user_model', '', TRUE);

        // Force ssl
        if (!is_dev()) {
            force_ssl();
        }

        // Get shared data
        $this->data['active_sites'] = $this->main_model->get_active_sites();
        $this->data['user'] = $this->get_user_by_session();

        // Configuration
        $this->confidence_minimum = 2;
        $this->action_outlier_review_minimum = 1;
        $this->action_outlier_percentage = 5;
        $this->data['real_report'] = false;
        $this->data['current_site']['name'] = 'Overall';
        $this->data['current_site']['slug'] = 'default';
        $this->data['login_reminder_point'] = 30;
        $this->data['hours_between_reviews'] = 24;
        $this->data['suggest_account_at'] = 30;
        $this->data['leaderboard_minimum'] = 30;
        if (is_dev()) {
            $this->data['leaderboard_minimum'] = 3;
        }
    }

    public function landing()
    {
        $data = $this->data;
        $data['page_title'] = site_name();
        $sites = $this->main_model->get_all_sites();

        // Main leaderboard
        $data['leaderboards_raw'] = array();
        $data['leaderboard'] = array();
        foreach ($sites as $site) {
            $data['this_leaderboard'] = $this->main_model->get_leaderboard_for_site($site['id'], $data['leaderboard_minimum']);
            foreach ($data['this_leaderboard'] as &$leader) {
                $leader['site'] = $site['name'];
            }
            $data['leaderboard'] = array_merge($data['leaderboard'], $data['this_leaderboard']);
        }        
        $data['leaderboard'] = $this->sort_leaderboard_main($data['leaderboard']);
        $data['validation_errors'] = $this->session->flashdata('validation_errors');

        // A/B testing
        $ab_array = array('hide_subheader', 'show_subheader');
        $data['ab_test'] = $ab_array[array_rand($ab_array)];

        $this->load->view('templates/header', $data);
        $this->load->view('toolbar', $data);
        $this->load->view('landing', $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('templates/footer', $data);
    }

    public function homepage($slug, $offset = 0, $limit = 20)
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

        $data['page_title'] = $data['current_site']['name'];
        $data['slug'] = $slug;
        $this->load->view('templates/header', $data);
        $this->load->view('toolbar', $data);
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

        // Get a post for queue
        $ip = $_SERVER['REMOTE_ADDR'];
        $data['post'] = $this->main_model->get_post_for_queue($data['current_site']['id'], $ip, $this->data['hours_between_reviews']);
        if ($data['post']) {
            $data['post']['time_ago'] = get_time_ago(strtotime($data['post']['created']));
        }

        $data['offences'] = $this->main_model->get_offences_by_site($data['current_site']['id']);
        $data['actions'] = $this->main_model->get_actions();

        $data['page_title'] = $data['current_site']['name'] . ' Moderator Queue';
        $data['slug'] = $slug;
        $this->load->view('templates/header', $data);
        $this->load->view('toolbar', $data);
        $this->load->view('sites/' . $slug . '/style', $data);
        $this->load->view('queue_result', $data);
        $this->load->view('sites/' . $slug . '/queue', $data);
        $this->load->view('queue_form', $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('sites/' . $slug . '/script', $data);
        $this->load->view('templates/footer', $data);
    }

    public function new_review($slug)
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

        // Validation
        $this->form_validation->set_rules('post_id', 'post_id', 'trim|required|integer|greater_than[0]|max_length[10]');
        $this->form_validation->set_rules('offence', 'offence', 'trim|required|integer|greater_than[0]|max_length[10]');
        $this->form_validation->set_rules('action', 'action', 'trim|required|integer|greater_than[0]|max_length[10]');
        
        // Fail
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            echo report_bugs_string();
            return false;
        }

        $data['site_key'] = $data['current_site']['id'];
        $user_input['offence_key'] = $this->input->post('offence');
        $user_input['post_key'] = $this->input->post('post_id');
        $user_input['action_key'] = $this->input->post('action');
        $review_result = array();

        // Check if this was recently reviewed (most likely to be frequent malicious target)
        $ip = $_SERVER['REMOTE_ADDR'];
        $recently_reveiwed = $this->main_model->recent_reviews_for_post($user_input['post_key'], $ip, $this->data['hours_between_reviews']);

        if (!empty($recently_reveiwed)) {
            if (is_dev()) {
                echo 'recently reviewed';
                die();
            }
            redirect(base_url() . 'site/' . $slug . '/queue', 'refresh');
            return false;
        }

        // Check that action was appropriate
        $action_percentage = $this->main_model->percent_of_reviews_with_action_by_post_key($user_input['post_key'], $user_input['action_key']);
        if ($action_percentage['total'] > $this->action_outlier_review_minimum && (!$action_percentage || $action_percentage['percent'] < $this->action_outlier_percentage) ) {
            $review_result['bool'] = false;
            $review_result['message'] = 'Fail - Inappropriate Action';
            $review_result['class'] = 'alert-danger';
        }

        // Insert as new review
        $ip = $_SERVER['REMOTE_ADDR'];
        $this->main_model->create_review($data['user']['current_account']['id'], $data['site_key'], $user_input['post_key'], $user_input['offence_key'], $user_input['action_key'], $ip);

        // Update post offence if no confidence
        $reviewed_post = $this->main_model->get_post_by_id($user_input['post_key']);
        if ($reviewed_post['offence_key'] != $user_input['offence_key'] && $reviewed_post['confidence'] <= 1) {
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
            $data['user']['current_account']['streak']++;
            $data['user']['current_account']['pass']++;
            $review_result['bool'] = true;
            $review_result['message'] = 'Pass';
            $review_result['class'] = 'alert-success';
        }
        else {
            $data['user']['current_account']['streak'] = 0;
            $data['user']['current_account']['fail']++;
            $review_result['bool'] = false;
            $review_result['message'] = 'Fail - Wrong Offence';
            $review_result['class'] = 'alert-danger';
        }
        $data['user']['current_account']['total']++;

        // Update user
        if ($data['user']['logged_in']) {
            $this->main_model->update_account($data['user']['current_account']);
        }
        else {
            $sess_array = array(
                'id' => 0,
                'username' => 'Anonymous',
                'logged_in' => false,
                'current_account' => array(
                    'id' => 0,
                    'pass' => $data['user']['current_account']['pass'],
                    'fail' => $data['user']['current_account']['fail'],
                    'streak' => $data['user']['current_account']['streak'],
                    'total' => $data['user']['current_account']['total'],
                ),
            );
            $this->session->set_userdata('user', $sess_array);
            $user = $this->session->userdata('user');
        }

        // Get user with new info
        // redirect(base_url() . 'site/' . $slug . '/queue', 'refresh');

        $ip = $_SERVER['REMOTE_ADDR'];
        $output['post'] = $this->main_model->get_post_for_queue($data['current_site']['id'], $ip, $this->data['hours_between_reviews']);
        if ($output['post']) {
            $output['post']['time_ago'] = get_time_ago(strtotime($output['post']['created']));
            $output['post']['username'] = html_clean($output['post']['username']);
            $output['post']['content'] = html_clean($output['post']['content']);
        }
        else {
            $output['post'] = false;
        }
        $output['review_result'] = $review_result;
        $output['new_accuracy'] = accuracy_calculator($data['user']['current_account']['pass'], $data['user']['current_account']['fail']);
        echo json_encode($output);
    }

    function real_report($slug)
    {
        // Validation
        $this->form_validation->set_rules('post_id', 'post_id', 'trim|required|integer|greater_than[0]|max_length[10]');
        
        // Fail
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            echo report_bugs_string();
            return false;
        }

        $user_input['post_id'] = $this->input->post('post_id');
        $this->main_model->real_report($user_input['post_id']);   

        // Get user with new info
        redirect(base_url() . 'site/' . $slug . '/queue', 'refresh');     
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
        $this->form_validation->set_rules('content', 'Message', 'trim|required|max_length[10000]');
        
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
            $post['image'] = '';
            $post['ip'] = $_SERVER['REMOTE_ADDR'];

            if ($data['current_site']['anonymous_flag']) {
                $post['username'] = 'Anonymous';
            }

            // Create post
            $this->main_model->create_post($post, $data['user']);
        }

        redirect(base_url() . 'site/' . $slug, 'refresh');
    }

    public function leaderboard($slug)
    {
        $data = $this->data;
        $data['current_site'] = $this->main_model->get_current_site($slug);
        if (empty($data['current_site']) || !$data['current_site']['active']) {
            $this->page('site_not_found');
            return false;
        }

        // Get recent posts
        $data['leaderboard'] = $this->main_model->get_leaderboard_for_site($data['current_site']['id'], $data['leaderboard_minimum']);
        $data['leaderboard'] = $this->sort_leaderboard_main($data['leaderboard']);

        $data['page_title'] = $data['current_site']['name'] . ' Leaderboard';
        $data['slug'] = $slug;
        $this->load->view('templates/header', $data);
        $this->load->view('toolbar', $data);
        $this->load->view('sites/' . $slug . '/style', $data);
        $this->load->view('sites/' . $slug . '/leaderboard', $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('sites/' . $slug . '/script', $data);
        $this->load->view('templates/footer', $data);
    }

    public function sort_leaderboard_main($leaderboard_array)
    {
        foreach ($leaderboard_array as &$leaderboard) {
            // Null means it could not divide by 0 to get the accuracy
            if (is_null($leaderboard['accuracy'])) {
                $leaderboard['accuracy'] = 100;
            }
            // Round
            $leaderboard['accuracy'] = sprintf('%0.2f', $leaderboard['accuracy']);
        }
        // Sort by accuracy
        $leaderboard_array = $this->array_orderby($leaderboard_array, 'accuracy', SORT_DESC, 'total', SORT_DESC);
        return $leaderboard_array;
    }

    // http://php.net/manual/en/function.array-multisort.php#100534
    public function array_orderby()
    {
        $args = func_get_args();
        $data = array_shift($args);
        foreach ($args as $n => $field) {
            if (is_string($field)) {
                $tmp = array();
                foreach ($data as $key => $row)
                    $tmp[$key] = $row[$field];
                    $args[$n] = $tmp;
                }
        }
        $args[] = &$data;
        call_user_func_array('array_multisort', $args);
        return array_pop($args);
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
                    'id' => 0,
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
        $user['accuracy'] = accuracy_calculator($user['current_account']['pass'], $user['current_account']['fail']);
        return $user; 
    }

    public function page($slug)
    {
        $data = $this->data;
        $data['page_title'] = deslug($slug);
        $this->load->view('templates/header', $data);
        $this->load->view('toolbar', $data);
        $this->load->view('pages/' . $slug, $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('templates/footer', $data);
    }

}
