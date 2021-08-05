<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penghargaan extends CI_Controller
{

    private $title = "Penghargaan";

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

        $crud->set_table('profile_penghargaan');
        $crud->columns('id', 'title', 'slug', 'deskripsi', 'kata_kunci', 'image', 'date', 'user_id');
        $crud->fields('title', 'slug', 'deskripsi', 'kata_kunci', 'image', 'content',  'date', 'user_id');
        $crud->display_as('category', 'Kategori');
        $crud->display_as('title', 'Judul');
        $crud->display_as('content', 'Konten');
        $crud->display_as('image', 'Image');
        $crud->display_as('date', 'Tanggal');
        $crud->display_as('user_id', 'User');

        $crud->set_relation('user_id', 'users', 'email');
        $crud->callback_field('user_id', array($this, '_callback_user_id'));

        $crud->set_subject($this->title);
        $crud->set_field_upload('image', 'assets/uploads/files');
        $crud->required_fields('title', 'slug', 'image', 'date');


        if ($crud->getstate() == 'insert_validation') {
            $crud->set_rules('slug', 'Slug', 'trim|required|is_unique[feeds.slug]');
        }

        $crud->callback_before_update(array($this, '_callback_before_update'));
        $crud->callback_before_insert(array($this, '_callback_before_update'));
        $crud->callback_before_delete(array($this, 'crud_delete_file'));

        // $crud->unset_texteditor('content');

        $output = $crud->render();

        // print_r2($output);

        $view_data['output'] = $output->output;
        $content = $this->load->view('admin/penghargaan/penghargaan', $view_data, true);

        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;
        $template_data['box'] = false;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_user_id($value = '', $primary_key = null)
    {
        $field = '<input type="hidden" value="' . $this->session->userdata('id') . '" name="user_id" >';
        // $field = '<input type="text" value="' . $this->session->userdata('email') . '" readonly="" class="form-control" >';
        $field .= '<label style="margin-top:7px" >' . $this->session->userdata('email') . '</label>';
        // $field.='<p>'.$this->session->userdata('fullname').'</p>';
        return $field;
    }

    function _callback_before_update($post_array, $primary_key = null)
    {

        return $post_array;
    }

    function crud_delete_file($primary_key)
    {
        $row = $this->db->where('id_penghargaan', $primary_key)->get('profile_penghargaan')->row();

        unlink('assets/uploads/files/' . $row->image);

        return true;
    }
}
