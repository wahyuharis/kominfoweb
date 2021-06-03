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

        //##### inisiasi ##################
        $crud = new grocery_CRUD();
        $crud->unset_bootstrap(); 
        $crud->unset_jquery(); 
        $crud->set_theme('bootstrap');
        //##### inisiasi ##################

        $crud->set_table('feeds');
        $crud->columns('id','title', 'slug', 'deskripsi','kata_kunci','image', 'date', 'user_id');
        $crud->fields('title', 'slug','deskripsi','kata_kunci', 'image', 'content',  'date', 'user_id');
        $crud->display_as('category', 'Kategori');
        $crud->display_as('title', 'Judul');
        $crud->display_as('content', 'Konten');
        $crud->display_as('image', 'Image');
        $crud->display_as('date', 'Tanggal');
        $crud->display_as('user_id', 'User');

        $crud->set_relation('user_id', 'users', 'email');
        $crud->callback_field('user_id',array($this,'_callback_user_id'));

        $crud->set_subject('Blog');
        $crud->set_field_upload('image', 'assets/uploads/files');
        $crud->required_fields('title', 'slug','image', 'date');


        if ($crud->getstate() == 'insert_validation') {
            $crud->set_rules('slug','Slug','trim|required|is_unique[feeds.slug]');
        }

        $crud->callback_before_update(array($this, '_callback_before_update'));
        $crud->callback_before_insert(array($this, '_callback_before_update'));

        // $crud->unset_texteditor('content');

        $output = $crud->render();

        // print_r2($output);

        $view_data['output'] = $output->output;
        $content = $this->load->view('admin/blog/blog', $view_data, true);

        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;
        $template_data['box'] = False;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_user_id($value = '', $primary_key = null){
        $field='<input type="hidden" value="'.$this->session->userdata('id').'" name="user_id" >';
        $field='<input type="text" value="'.$this->session->userdata('email').'" readonly="" class="form-control" >';
        // $field.='<p>'.$this->session->userdata('email').'</p>';
        // $field.='<p>'.$this->session->userdata('fullname').'</p>';
        return $field;
    }

    function _callback_before_update($post_array, $primary_key = null)
    {

        return $post_array;
    }

}
