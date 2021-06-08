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


        $berita_kanan = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();

        // print_r2($tupoksi);


        $content_data['tupoksi'] = $tupoksi;
        $content_data['berita_kanan'] = $berita_kanan;

        // $view_data['description'] = $this->description;
        // $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/profile/tupoksi', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }
}