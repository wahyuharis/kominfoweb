<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Visitor extends CI_Controller
{

    private $title = "Visitor";
    private $table_name='uniq_visitor';

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
        $crud = new grocery_CRUD();
        $crud->unset_bootstrap();
        $crud->unset_jquery();
        $crud->set_theme('bootstrap');
        $crud->set_table($this->table_name);

        $crud->unset_add();
        $crud->unset_edit();
        // $crud->unset_view();
        $crud->unset_delete();

        $crud->set_subject($this->title);

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }
}