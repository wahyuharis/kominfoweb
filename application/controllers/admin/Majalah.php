<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Majalah extends CI_Controller
{

    private $title = "Majalah";

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
        $crud->set_table('majalah');

        $crud->set_subject('Majalah');

        $crud->columns('nama_majalah', 'nomor_majalah', 'tanggal_terbit', 'document');
        $crud->fields('nama_majalah', 'nomor_majalah', 'tanggal_terbit', 'document');
        $crud->set_field_upload('document', 'assets/uploads/files');
        $crud->required_fields();
        // $crud->set_rules('nama majalah', 'nama_majalah', 'trim|max_length[50]|required|is_unique[majalah.nama_majalah]');

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
        $row = $this->db->where('id_majalah', $primary_key)->get('majalah')->row();

        unlink('assets/uploads/files/' . $row->document);

        return true;
    }
}
