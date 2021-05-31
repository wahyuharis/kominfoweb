<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $content_data = [];


        $view_data['content'] = $this->load->view('frontend/content', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }
}
