<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{

    private $title = "Galery";

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
        $crud->unset_bootstrap(); /*wajib ada karena boostrap grocery bentrok dengan boodtrap adminlte*/
        $crud->unset_jquery(); /*wajib ada karena boostrap grocery bentrok dengan jquery adminlte*/

        $crud->set_theme('bootstrap');
        $crud->set_table('galleries');
        // $crud->unset_add();
        // $crud->unset_edit();

        // $crud->add_action('edit', '', 'admin/galery/edit/', 'fa fa-pencil');

        $crud->columns('caption', 'image');
        $crud->fields('caption', 'image');

        $crud->display_as('caption', 'Caption');
        $crud->display_as('image', 'Foto Grub');
        $crud->display_as('image2', 'Tambah Foto');

        $crud->required_fields('category', 'caption', 'image');

        $crud->set_field_upload('image', 'assets/uploads/files');

        $crud->set_subject('Galeri');

        $output = $crud->render();

        $content_data['output'] = $output->output;
        $content_data['state'] = $crud->getState();

        // print_r2($crud->getState());

        $content = $this->load->view('admin/galery/galery', $content_data, true);

        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;
        $template_data['box'] = false;

        $this->load->view('admin/template', $template_data);
    }

    // function add(){
        
    // }
}
