<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dropzone extends CI_Controller
{
    function upload()
    {

        $success = false;
        $message = "";
        $data = array();

        $config['upload_path']          = './assets/uploads/files';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';


        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {

            $upload_data=$this->upload->data();

            if($upload_data['image_width'] > 1500 || $upload_data['image_height'] > 1500   ){
                $config['image_library'] = 'gd2';
                $config['source_image'] = $upload_data['full_path'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 1500;
                $config['height']       = 1500;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->image_lib->clear();
            }


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

    function delete()
    {
        $success = false;
        $message = "";
        $data = array();

        // print_r2($_POST);
        // unlink()
        $src = $this->input->post('src');
        $src_array = explode('/', $src);

        $file = end($src_array);

        unlink('./assets/uploads/files/' . $file);

        $response['success'] = $success;
        $response['message'] = $message;
        $response['data'] = $data;
        header_json();
        echo json_encode($response);
    }

    function delete_image($file)
    {
        if (!empty(trim($file))) {
            unlink("./assets/uploads/files/" . $file);
            unlink("./assets/uploads/thumbnail/" . $file);
        }
    }
}
