<?php

class Login extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Auth');
    }

    function index(){
        $this->load->view('login');
    }

    function submit(){
        $auth=new Auth();

        $email=$this->input->post('email');
        $password=$this->input->post('password');

        $auth->login($email,$password);

        print_r2($_POST);
    }

}