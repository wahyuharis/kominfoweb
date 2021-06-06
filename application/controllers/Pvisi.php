<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pvisi extends CI_Controller
{
    private $description = "";
    private $keywords = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $profil = $this->db->select('*')
            ->get('profile_visi_misi')
            ->result_array();

        // print_r2($link);


        $content_data['pvisi'] = $profil;

        // $view_data['description'] = $this->description;
        // $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/profile/Pvisi', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }
}
