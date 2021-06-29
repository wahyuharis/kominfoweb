<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Visitor extends CI_Controller
{

    private $title = "Visitor";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');

        $this->load->library('Auth');
        $auth = new Auth();
        $auth->is_logged_in();
    }



    public function index()
    {

        

        $view_data['output'] = '';
        $content = $this->load->view('admin/visitor/visitor', $view_data, true);

        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;
        $template_data['box'] = False;

        $this->load->view('admin/template', $template_data);
    }
}