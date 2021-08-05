<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
{

    private $title = "Video";
    private $crud = null;

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
        $this->crud = $crud;
        //@die(var_export($this->crud));
        $crud->unset_bootstrap();
        $crud->unset_jquery();

        $crud->set_theme('bootstrap');
        $crud->set_table('galleries_video');
        $crud->set_subject('Video');
        $crud->columns('nama_video', 'thumbnail_video', 'url_video');
        $crud->fields('nama_video', 'thumbnail_video', 'url_video');
        $crud->required_fields('nama_video', 'thumbnail_video', 'url_video');
        $crud->set_rules('nama video', 'nama_video', 'trim|required');
        $crud->set_rules('thumbnail video', 'thumbnail_video', 'required');
        $crud->set_rules('url video', 'url_video', 'required');
        $crud->set_field_upload('url_video', 'assets/uploads/files', 'mp3|mkv|mp4|avi|mpg|mpeg|webm');
        $crud->set_field_upload('thumbnail_video', 'assets/uploads/files', 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG');
        $crud->callback_before_upload(array($this, '_callback_before_upload'));
        $crud->callback_before_delete(array($this, 'crud_delete_file'));
        //$crud->callback_before_upload(array($this, '_callback_before_upload_img'));

        $crud->display_as('url_video', 'File Video');

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_before_upload($files_to_upload, $field_info)
    {

        $return = false;
        if ($field_info->field_name == 'url_video') {
            $file_type_image = array('mp3', 'mkv', 'mp4', 'avi', 'mpg', 'mpeg', 'webm');
            $name = $files_to_upload[$field_info->encrypted_field_name]['name'];
            $name_arr = explode('.', $name);
            $type = strtolower(trim(end($name_arr)));
            if (in_array($type, $file_type_image)) {
                $return = true;
            } else {
                $return = "tipe file hanya boleh mp3, mkv, mp4, dan avi";
            }
        } else if ($field_info->field_name == 'thumbnail_video') {
            $file_type_image = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG');
            $name = $files_to_upload[$field_info->encrypted_field_name]['name'];
            $name_arr = explode('.', $name);
            $type = strtolower(trim(end($name_arr)));
            if (in_array($type, $file_type_image)) {
                $return = true;
            } else {
                $return = "tipe file hanya boleh jpg, jpeg, gif, dan png";
            }
        }
        return $return;
    }

    public function crud_delete_file($primary_key)
    {
        $row = $this->db->where('id_galleries_video', $primary_key)->get('galleries_video')->row();

        unlink('assets/uploads/files/' . $row->thumbnail_video);
        unlink('assets/uploads/files/' . $row->url_video);

        return true;
    }
}
