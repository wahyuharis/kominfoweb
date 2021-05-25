<?php

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Auth');
    }

    function index()
    {
        $this->load->view('login');
    }

    function submit()
    {
        $auth = new Auth();

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $error_message = $auth->login($email, $password);

        if (empty(trim($error_message))) {
            redirect('admin');
        }else{
            $this->session->set_flashdata('error_message',$error_message);
            redirect('login');
        }
    }
}
