<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_level extends CI_Controller
{

    private $title = "User Level";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');

        $this->load->library('Auth');
        $auth=new Auth();
        $auth->is_logged_in()->is_administrator();
    }

    public function index()
    {

        $crud = new grocery_CRUD();
        $crud->unset_bootstrap(); /*wajib ada karena boostrap grocery bentrok dengan boodtrap adminlte*/
        $crud->unset_jquery(); /*wajib ada karena boostrap grocery bentrok dengan jquery adminlte*/

        $crud->set_theme('bootstrap');
        $crud->set_table('user_levels');
        $crud->fields('user_level');
        $crud->required_fields('user_level');

        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();

        $columns=array('user_level');
        $crud->columns($columns);

        $crud->set_subject('User Level');

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }
}
