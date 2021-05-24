<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    private $title="Title";

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $template_data['content']='';
        $template_data['content_title']= $this->title;
        
        $this->load->view('template',$template_data);
    }

}
