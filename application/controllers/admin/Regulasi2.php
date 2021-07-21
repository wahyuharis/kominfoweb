<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{

    private $title = "Galery";

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
        $crud->set_table('regulasi');

        $crud->fields('kategori','nama_produk','nomor','tanggal_terbit','document');

        $crud->set_field_upload('document', 'assets/uploads/files');

        $crud->set_subject('$egulasi');

        $output = $crud->render();

        $content_data['output'] = $output->output;

        $content = $this->load->view('admin/galery/galery', $content_data, true);

        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;
        $template_data['box'] = false;

        $this->load->view('admin/template', $template_data);
    }


}
