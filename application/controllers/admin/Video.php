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

        // $data=array('a','n');
        // $this->session->set_userdata('temp_image',$data);
        // $temp_image = $this->session->userdata('temp_image');

        // if(is_array($temp_image)){
        //     echo "true";
        // }

        // die();
    }

    public function index()
    {

        $crud = new grocery_CRUD();
        $this->crud = $crud;

        $crud->unset_bootstrap();
        $crud->unset_jquery();

        $crud->set_theme('bootstrap');
        $crud->set_table('galleries_video');
        $crud->set_subject('Video');
        $crud->required_fields('nama_video');
        $crud->set_rules('nama video', 'nama_video', 'trim|required');
        $crud->set_field_upload('url_video','assets/uploads/files');
        $crud->callback_before_upload(array($this,'_callback_before_upload'));

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
    $file_type_image = array('mp3', 'mkv', 'mp4', 'avi', 'mpg', 'mpeg');
    $name = $files_to_upload[$field_info->encrypted_field_name]['name'];
    $name_arr = explode('.', $name);
    $type = strtolower(trim(end($name_arr)));
    if (in_array($type, $file_type_image)) {
    $return = true;
    } else {
    $return = "tipe file hanya boleh mp3, mkv, mp4, dan avi";
    }
    }
    return $return;
    }
}
