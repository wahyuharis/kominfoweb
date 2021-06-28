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
            $success = true;
            $data = json_encode($this->upload->data());
            $hasil = json_decode($data);
            $lebar = $hasil->image_width;
            $tinggi = $hasil->image_height;
            
            if($lebar > "1500" || $tinggi > "1500") { // You can add your logic
                $config_manip = array(
                    'image_library' => 'gd2',
                    'source_image' => './assets/uploads/files/'.$hasil->file_name,
                    'new_image' => './assets/uploads/thumbnail/',
                    'maintain_ratio' => TRUE,
                    'create_thumb' => FALSE,
                    'quality' => '80%',
                    'width' => 1500,
                    'height' => 1500
                );
                $this->load->library('image_lib', $config_manip);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
    
                $this->image_lib->clear();
            }
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

        // print_r2($_POST);
        // unlink()
        $src=$this->input->post('src');
        $src_array= explode('/',$src);

        $file=end($src_array);

        unlink('./assets/uploads/files/'.$file);
        unlink("./assets/uploads/thumbnail/" . $file);

        $response['success'] = $success;
        $response['message'] = $message;
        $response['data'] = $data;
        header_json();
        echo json_encode($response);
    }
}
