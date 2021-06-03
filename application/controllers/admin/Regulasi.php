<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Regulasi extends CI_Controller
{

    private $title = "Regulasi";

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
        $crud->fields('kategori', 'nama_produk', 'nomor', 'tanggal_terbit', 'upload_file');

        $crud->display_as('kategori', 'Kategori');
        $crud->display_as('nama_produk', 'Nama Produk Hukum');
        $crud->display_as('nomor', 'Nomor');
        $crud->display_as('tanggal_terbit', 'Tanggal Terbit');
        $crud->display_as('upload_file', 'Upload File');

        $crud->required_fields('kategori', 'nama_produk', 'nomor', 'tanggal_terbit', 'upload_file');
        $crud->set_rules('upload_file', 'Upload File', 'trim|required|pdf');

        $crud->set_field_upload('upload_file', 'assets/uploads/files');

        // $crud->display_as('email', 'Email'); untuk membuat display sendiri" /fields


        // $COLUMN = array( /*kolom yang ditampilkan */
        //     'user_level_id',
        //     'email',
        //     'fullname'

        // );

        // $crud->columns($COLUMN); /*menampilkan kolom*/


        // $crud->set_relation('user_level_id', 'user_levels', 'user_level');


        $crud->set_subject('Regulasi');

        // $crud->required_fields('lastName');

        // $crud->set_field_upload('file_url', 'assets/uploads/files');

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }
}
