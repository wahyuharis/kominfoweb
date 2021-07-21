<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Summernote extends CI_Controller
{
    function upload()
    {

        // print_r2($_FILES);
        $success = false;
        $message = "";
        $data = array();

        $config['upload_path']          = './assets/uploads/files';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

            $upload_data=$this->upload->data();

            $success = true;
            $data = json_encode($this->upload->data());
        } else {
            $success = false;
            $message = $this->upload->display_errors();
        }

        $response['success'] = $success;
        $response['message'] = $message;
        $response['data'] = $data;
        header_json();
        echo json_encode($response);
    }

    function delete(){
        $success = false;
        $message = "";
        $data = array();

        $src=$this->input->post('src');
        $src_array= explode('/',$src);

        $file=end($src_array);

        unlink('./assets/uploads/files/'.$file);

        $response['success'] = $success;
        $response['message'] = $message;
        $response['data'] = $data;
        header_json();
        echo json_encode($response);
    }
}
