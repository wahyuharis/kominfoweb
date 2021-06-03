<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Visi_Misi extends CI_Controller
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
        $crud->required_fields('kategori', 'judul', 'konten', 'gambar');

        $crud->columns('kategori', 'judul', 'konten', 'gambar');

        $crud->display_as('kategori', 'Kategori');
        $crud->display_as('judul', 'Judul');
        $crud->display_as('konten', 'Konten');
        $crud->display_as('gambar', 'Gambar');

        $crud->required_fields('kategori', 'judul', 'konten', 'gambar');

        $crud->set_field_upload('gambar', 'assets/uploads/files');

        $crud->set_subject('Visi Misi');

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }
}
