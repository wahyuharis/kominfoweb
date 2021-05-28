<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $view_data['slider']=$this->db->get('sliders')->result_array();

        // print_r2($view_data['slider'] );

        $this->load->view('frontend/template',$view_data);
    }


}
