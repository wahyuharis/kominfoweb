<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Visi_misi extends CI_Controller
{

    private $title = "Visi Misi";

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
        $crud->set_table('profile_visi_misi');

        $crud->fields( 'judul', 'konten', 'gambar');

        $crud->columns('judul', 'konten', 'gambar');

        $crud->display_as( 'Kategori');
        $crud->display_as('judul', 'Judul');
        $crud->display_as('konten', 'Konten');
        $crud->display_as('gambar', 'Gambar');

        $crud->required_fields( 'judul', 'konten', 'gambar');

        $crud->set_field_upload('gambar', 'assets/uploads/files');

        $crud->set_subject($this->title);

        
        $crud->unset_list();
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_back_to_list();


        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }
}
