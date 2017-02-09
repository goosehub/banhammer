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
        $data['page_title'] = site_name();
        $this->load->view('template/header', $data);
        $this->load->view('landing', $data);
        $this->load->view('template/footer', $data);
    }

    public function about()
    {
        $data['page_title'] = 'more info';
        $this->load->view('template/header', $data);
        $this->load->view('main', $data);
        $this->load->view('template/footer', $data);
    }

    public function homepage($slug)
    {
        $data['page_title'] = $slug;
        $data['slug'] = $slug;
        $this->load->view('template/header', $data);
        $this->load->view('site/' . $slug . '/homepage', $data);
        $this->load->view('template/footer', $data);
    }

    public function queue($slug)
    {
        $data['page_title'] = $slug;
        $data['slug'] = $slug;
        $this->load->view('template/header', $data);
        $this->load->view('site/' . $slug . '/queue', $data);
        $this->load->view('template/footer', $data);
    }

    public function post($slug)
    {
        $data['page_title'] = $slug;
        $data['slug'] = $slug;
        $this->load->view('template/header', $data);
        $this->load->view('site/' . $slug . '/post', $data);
        $this->load->view('template/footer', $data);
    }

}
