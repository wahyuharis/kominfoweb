<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{

    private $title = "Link Terkait";

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
        $crud->set_table('url');
        // $crud->fields('user_level');
        $crud->display_as('title', 'Judul');
        $crud->display_as('url', 'Link URL');
        $crud->display_as('icon', 'Ikon');

        $crud->required_fields('title', 'url', 'icon');

        $crud->set_field_upload('icon', 'assets/uploads/files');
        $crud->callback_before_delete(array($this, 'crud_delete_file'));

        $crud->set_subject('Link');
        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }

    public function crud_delete_file($primary_key)
    {
        $row = $this->db->where('id_link', $primary_key)->get('url')->row();

        unlink('assets/uploads/files/' . $row->icon);

        return true;
    }
}
