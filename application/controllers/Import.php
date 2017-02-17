<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('main_model', '', TRUE);
    }

    // http://localhost/banhammer/import/fourchan?token=1234&board=s4s&page=1
    public function fourchan()
    {
        // Use hash equals function to prevent timing attack
        $auth = auth();
        $token = $this->input->get('token');
        if (!$token || !hash_equals($auth->token, $token)) {
            return false;
        }
        $domain = 'http://a.4cdn.org/';
        $board = $this->input->get('board');
        $page = $this->input->get('page');
        $url = $domain . $board . '/' . $page . '.json';
        $contents = file_get_contents($url);
        $json = json_decode($contents);
        foreach ($json->threads as $thread) {
            foreach ($thread->posts as $post) {
                if (!isset($post->com) || !$post->com) {
                    continue;
                }
                $comment = $post->com;
                $comment = htmlspecialchars_decode($comment);
                $comment = strip_tags($comment, '<br>');
                print_r($comment);
                echo '<hr>';
                $input['site_key'] = 1;
                $input['username'] = 'Anonymous';
                $input['content'] = $comment;
                $input['image'] = '';
                $this->main_model->create_post($input);                
            }
        }
    }
}
