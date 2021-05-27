<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    private $title = "Blog";

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

        // print_r2($_SESSION);

        $crud = new grocery_CRUD();
        $crud->unset_bootstrap(); /*wajib ada karena boostrap grocery bentrok dengan boodtrap adminlte*/
        $crud->unset_jquery(); /*wajib ada karena boostrap grocery bentrok dengan jquery adminlte*/

        $crud->set_theme('bootstrap');
        $crud->set_table('feeds');
        $crud->columns('title', 'slug', 'image', 'date', 'user_id');
        $crud->fields('title', 'slug', 'image', 'content',  'date', 'user_id');
        $crud->display_as('category', 'Kategori');
        $crud->display_as('title', 'Judul');
        $crud->display_as('content', 'Konten');
        $crud->display_as('image', 'Image');
        $crud->display_as('date', 'Tanggal');
        $crud->display_as('user_id', 'User');

        if ($crud->getstate() == 'list') {
            $crud->set_relation('user_id', 'users', 'email');
        } else {
            $crud->field_type('user_id', 'hidden', $this->session->userdata('id'));
        }

       
        $crud->set_subject('Blog');
        $crud->set_field_upload('image', 'assets/uploads/files');
        $crud->required_fields('title', 'slug','image', 'date');

        // print_r2($crud->getstate());

        if ($crud->getstate() == 'insert_validation') {
            $crud->set_rules('slug','Slug','trim|required|is_unique[feeds.slug]');
        }


        $crud->callback_before_update(array($this, '_callback_before_update'));
        $crud->callback_before_insert(array($this, '_callback_before_update'));

        $output = $crud->render();

        $view_data['output'] = $output->output;
        $content = $this->load->view('admin/blog/blog', $view_data, true);

        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;
        $template_data['box'] = False;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_before_update($post_array, $primary_key = null)
    {
        // $post_array['slug'] = url_title($post_array['title']);

        return $post_array;
    }

}
