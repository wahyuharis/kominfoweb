<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    private $title = "Profile";

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

        $sess = $this->session->userdata();
        // print_r2($sess);

        // if($sess['id']!=)


        $crud = new grocery_CRUD();
        $crud->unset_bootstrap();
        $crud->unset_jquery();

        // print_r2($crud->getStateInfo());

        if ($crud->getStateInfo()->primary_key !== $sess['id']) {
            $this->session->set_flashdata('message_error', 'Anda tidak memiliki hak akses pada halaman tsb');
            redirect('admin/home');
        }

        $crud->display_as('user_level_id', '');

        $crud->set_theme('bootstrap');
        $crud->set_table('users');
        $crud->unset_add();
        $crud->unset_list();
        $crud->unset_delete();
        $crud->unset_back_to_list();

        $crud->fields('email', 'fullname', 'password');

        $crud->set_relation('user_level_id', 'user_levels', 'user_level');

        // $crud->field_type('password','text','asd');
        $crud->callback_field('password', array($this, '_callback_field_password'));

        $crud->callback_before_update(array($this, '_encrypt_password_callback'));


        $crud->set_subject($this->title);

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_field_password($value = '', $primary_key = null)
    {
        $html = '<input type="password" value="" name="password" class="form-control" >';
        return $html;
    }

    function _encrypt_password_callback($post_array, $primary_key = null)
    {
        if (empty(trim($post_array['password']))) {
            $post_array['password'] = get_column('users',array('id'=>$primary_key),'password');
        } else {
            $post_array['password'] = md5($post_array['password']);
        }

        return $post_array;
    }
}
