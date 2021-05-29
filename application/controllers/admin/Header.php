<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Header extends CI_Controller
{

    private $title = "Header";

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
        $crud->set_table('header');
        $crud->unset_delete();
        
        $crud->columns('header_name', 'content', 'image','description');
        $crud->fields('header_name', 'content', 'image','description');

        $crud->display_as('header_name', 'Nama Header');
        $crud->display_as('content', 'Konten');
        $crud->display_as('Image', 'File Upload');
        $crud->display_as('description', 'Deskripsi');

        $crud->set_field_upload('image', 'assets/uploads/files');

        $crud->callback_before_insert(array($this,'_callback_before_save'));
        $crud->callback_before_update(array($this,'_callback_before_save'));

        $crud->set_subject($this->title);

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_before_save($post_array, $primary_key=null){
        if($post_array['content']){
            $post_array['content']=preg_replace('/(<[^>]+) style=".*?"/i', '$1', $post_array['content']);
        }
    }
}
