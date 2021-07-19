<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tupoksi extends CI_Controller
{
    private $description = "";
    private $keywords = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function index($id = null)
    {
        // $coba = $this->db->query('SELECT pt.*, kt.kategori_tupoksi FROM `profile_tupoksi` AS pt JOIN profile_tupoksi_kategori AS kt ON pt.tupoksi_kategori = kt.id_tupoksi_kategori WHERE pt.id_tupoksi=3')->row();
        $tupoksi = $this->db->where('profile_tupoksi.tupoksi_kategori', $id)
            ->select('profile_tupoksi.*,profile_tupoksi_kategori.kategori_tupoksi')
            ->join('profile_tupoksi_kategori', 'profile_tupoksi_kategori.id_tupoksi_kategori=profile_tupoksi.id_tupoksi', 'left')
            ->get('profile_tupoksi')
            ->row_object();

        // $bawahan = $this->db->select('*')
        //     ->where('atasan', $id)
        //     ->get('profile_tupoksi_kategori')
        //     ->result_array();



        $berita_kanan = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();

        $slider = $this->db->get('sliders')->result_array();

        $content_data['tupoksi'] = $tupoksi;
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['slider'] = $slider;
        // $content_data['bawahan'] = $bawahan;

        $view_data['content'] = $this->load->view('frontend/profile/tupoksi', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }
}
