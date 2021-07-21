<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ftp extends CI_Controller
{
    private $password="harits2021";

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $this->load->library('ftp');

        $config['hostname'] = 'ftp.example.com';
        $config['username'] = 'your-username';
        $config['password'] = 'your-password';
        $config['debug']        = TRUE;

        $this->ftp->connect($config);

        $list = $this->ftp->list_files('/public_html/');

        print_r($list);

        $this->ftp->close();
    }
}
