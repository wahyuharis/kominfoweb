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
        $tupoksi = $this->db->select('profile_tupoksi.*,profile_tupoksi_kategori.kategori_tupoksi')
            ->where('profile_tupoksi_kategori.id_tupoksi_kategori', $id)
            ->join('profile_tupoksi_kategori', 'profile_tupoksi_kategori.id_tupoksi_kategori=profile_tupoksi.id_tupoksi')
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
