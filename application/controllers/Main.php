<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {

        parent::__construct();
        $this->load->model('main_model', '', TRUE);

        // Get list of active sites
        $this->data['active_sites'] = $this->main_model->get_active_sites();
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

    public function homepage($slug, $offset = 0)
    {
        $data = $this->data;
        $data['current_site'] = $this->main_model->get_current_site($slug);

        // Get recent posts

        $data['page_title'] = $slug;
        $data['slug'] = $slug;
        $data['offset'] = $offset;
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

        // If post request, handle post request

        // Get a random post

        $data['page_title'] = $slug . ' Moderator Queue';
        $data['slug'] = $slug;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('sites/' . $slug . '/style', $data);
        $this->load->view('sites/' . $slug . '/queue', $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('sites/' . $slug . '/script', $data);
        $this->load->view('templates/footer', $data);
    }

    public function new_post()
    {
        $data = $this->data;

        // Handle post request

        echo '<pre>'; print_r($_POST); echo '</pre>';
    }

    public function login()
    {
        $data = $this->data;

        // Handle post request

        echo '<pre>'; print_r($_POST); echo '</pre>';
    }

    public function new_user()
    {
        $data = $this->data;

        // Handle post request

        echo '<pre>'; print_r($_POST); echo '</pre>';
    }

    public function about()
    {
        $data = $this->data;
        $data['page_title'] = 'more info';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('pages/about', $data);
        $this->load->view('templates/scripts', $data);
        $this->load->view('templates/footer', $data);
    }

}
