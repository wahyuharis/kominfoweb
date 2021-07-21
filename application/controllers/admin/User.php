<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    private $title = "User";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');

        $this->load->library('Auth');
        $auth = new Auth();
        $auth->is_logged_in()->is_administrator();
    }

    public function index()
    {

        $crud = new grocery_CRUD();
        $crud->unset_bootstrap(); /*wajib ada karena boostrap grocery bentrok dengan boodtrap adminlte*/
        $crud->unset_jquery(); /*wajib ada karena boostrap grocery bentrok dengan jquery adminlte*/

        $crud->set_theme('bootstrap');
        $crud->set_table('users');
        $crud->fields('email', 'password', 'fullname', 'user_level_id');
        $crud->display_as('user_level_id', 'User Level');

        $crud->required_fields('user_level_id', 'email', 'password');
        $crud->set_rules('email', 'Email', 'trim|required|valid_email');

        $column = array( /*kolom yang ditampilkan */
            'email',
            'fullname',
            'user_level_id'
        );

        $crud->columns($column); /*menampilkan kolom*/

        $crud->set_relation('user_level_id', 'user_levels', 'user_level');

        $crud->set_subject('Users');

        $crud->callback_before_update(array($this, '_encrypt_password_callback'));
        $crud->callback_before_insert(array($this, '_encrypt_password_callback'));
        $crud->callback_field('password', array($this, '_field_password'));


        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }

    function _encrypt_password_callback($post_array, $primary_key = null)
    {
        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }

    function _field_password($value = '', $primary_key = null)
    {
        return '<input type="password" value="" name="password" class="form-control">';
    }
}
