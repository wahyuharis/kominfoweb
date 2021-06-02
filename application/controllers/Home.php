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
        $slider = $this->db->get('sliders')->result_array();

        $berita_kanan = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();

        $berita_tengah = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('view', 'desc')
            ->limit(3)
            ->get('feeds')
            ->result_array();

        $berita_bawah = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(4)
            ->get('feeds')
            ->result_array();

        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_tengah'] = $berita_tengah;
        $content_data['berita_bawah'] = $berita_bawah;
        $content_data['slider'] = $slider;

        $view_data['content'] = $this->load->view('frontend/home', $content_data, true);


        // print_r2($view_data['slider'] );

        $this->load->view('frontend/template', $view_data);
    }
}
