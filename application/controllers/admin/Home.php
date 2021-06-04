<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    private $title = "Home";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Auth');

        $this->load->library('Auth');
        $auth = new Auth();
        $auth->is_logged_in();
    }

    public function index()
    {

        $content = $this->load->view('admin/home', [], true);
        $template_data['box'] = false;
        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;


        $this->load->view('admin/template', $template_data);
    }
}
