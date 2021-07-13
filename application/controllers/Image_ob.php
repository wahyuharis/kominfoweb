<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Image_ob extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    

    public function index()
    {
    }

    function show($image_name)
    {
        $path = "./assets/uploads/files/" . $image_name;
        // $this->show_image($path,300,300);


        $this->load->library('Image_moo');

        $this->image_moo
            ->load($path)
            ->resize(100, 100)
            ->save('./assets/buff.jpeg');

        $filename = "./assets/buff.jpeg";
        $handle = fopen($filename, "rb");
        $contents = fread($handle, filesize($filename));
        fclose($handle);


        header('Content-Type: image/jpeg');
        echo $contents;

    }
}
