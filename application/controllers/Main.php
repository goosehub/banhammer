<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('main_model', '', TRUE);
    }

    public function landing()
    {
        // Get list of sites

        $data['page_title'] = site_name();
        $this->load->view('templates/header', $data);
        $this->load->view('landing', $data);
        $this->load->view('templates/footer', $data);
    }

    public function homepage($slug, $offset = 0)
    {
        // Get recent posts

        $data['page_title'] = $slug;
        $data['slug'] = $slug;
        $data['offset'] = $offset;
        $this->load->view('templates/header', $data);
        $this->load->view('sites/' . $slug . '/homepage', $data);
        $this->load->view('templates/footer', $data);
    }

    public function queue($slug)
    {
        // If post request, get previous review

        // Get a random post

        $data['page_title'] = $slug . ' Moderator Queue';
        $data['slug'] = $slug;
        $this->load->view('templates/header', $data);
        $this->load->view('sites/' . $slug . '/queue', $data);
        $this->load->view('templates/footer', $data);
    }

    public function new_post()
    {
        // Handle post request

        echo '<pre>'; print_r($_POST); echo '</pre>';
    }

    public function login()
    {
        // Handle post request

        echo '<pre>'; print_r($_POST); echo '</pre>';
    }

    public function new_user()
    {
        // Handle post request

        echo '<pre>'; print_r($_POST); echo '</pre>';
    }

    public function about()
    {
        $data['page_title'] = 'more info';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/about', $data);
        $this->load->view('templates/footer', $data);
    }

}
