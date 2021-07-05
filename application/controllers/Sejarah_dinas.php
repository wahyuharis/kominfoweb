<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sejarah_dinas extends CI_Controller
{
    private $description = "";
    private $keywords = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $sejarah_dinas = $this->db->select('*')
            ->get('profile_sejarah_dinas')
            ->row_object();

        $berita_kanan = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();

        // print_r2($sejarah_dinas);

        $slider = $this->db->get('sliders')->result_array();

        $content_data['sejarah_dinas'] = $sejarah_dinas;
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['slider'] = $slider;



        // $view_data['description'] = $this->description;
        // $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/profile/sejarah_dinas', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }
}
