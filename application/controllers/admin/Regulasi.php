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
        $crud->unset_bootstrap();
        $crud->unset_jquery();
        $crud->set_theme('bootstrap');
        $crud->set_table('regulasi');

        $crud->set_subject('Regulasi');

        $crud->columns('id_kategori', 'nama_produk', 'nomor', 'tanggal_terbit', 'document');
        $crud->fields('id_kategori', 'nama_produk', 'nomor', 'tanggal_terbit', 'document');
        $crud->set_field_upload('document', 'assets/uploads/files');
        $crud->required_fields();

        $crud->set_relation('id_kategori', 'regulasi_kategori', 'nama_kategori');

        $crud->callback_before_upload(array($this, '_callback_upload'));
        $crud->callback_before_delete(array($this, 'crud_delete_file'));

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_upload($files_to_upload, $field_info)
    {
        $return = true;

        // print_r2($files_to_upload);

        $type = $files_to_upload[$field_info->encrypted_field_name]['type'];

        if ($type == 'application/pdf') {
            $return = true;
        } else {
            $return = "Maaf File Harap Dalam Format PDF";
        }

        return $return;
    }

    public function crud_delete_file($primary_key)
    {
        $row = $this->db->where('id_regulasi', $primary_key)->get('regulasi')->row();

        unlink('assets/uploads/files/' . $row->document);

        return true;
    }
}
