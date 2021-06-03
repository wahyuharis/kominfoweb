<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penghargaan extends CI_Controller
{

    private $title = "Profi Penghargaan";

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
        $crud->set_table('profile_penghargaan');
        $crud->fields('user_id', 'date', 'category', 'slug', 'deskripsi', 'kata_kunci', 'title', 'content', 'image', 'view', 'penanggungjawab', 'jam');

        $crud->columns('user_id', 'date', 'category', 'slug', 'deskripsi', 'kata_kunci', 'title', 'content', 'image', 'view', 'penanggungjawab', 'jam');

        $crud->display_as('user_id', 'Id_User');
        $crud->display_as('date', 'Tanggal');
        $crud->display_as('category', 'Kategori');
        $crud->display_as('slug', 'Slug');
        $crud->display_as('dekripsi', 'Deskripsi');
        $crud->display_as('kata_kunci', 'Kata Kunci');
        $crud->display_as('title', 'Judul');
        $crud->display_as('content', 'Konten');
        $crud->display_as('image', 'Gambar');
        $crud->display_as('view', 'Tampilan');
        $crud->display_as('penanggungjawab', 'Penanggungjawab');
        $crud->display_as('jam', 'Jam');

        $crud->required_fields('date', 'category', 'slug', 'deskripsi', 'kata_kunci', 'title', 'content', 'image', 'penanggungjawab', 'jam');

        $crud->set_field_upload('image', 'assets/uploads/files');

        $crud->set_subject('Profi Penghargaan');

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }
}
