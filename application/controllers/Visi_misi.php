<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Visi_misi extends CI_Controller
{
    private $description = "";
    private $keywords = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $visi_misi = $this->db->select('*')
            ->get('profile_visi_misi')
            ->row_object();

        $berita_kanan = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();
            
        $url_ppid="https://ppid.jemberkab.go.id/api/berita";
        $get_url = file_get_contents($url_ppid);
        //mengubah standar encoding
        $content=utf8_encode($get_url);
                
        //mengubah data json menjadi data array asosiatif
        $hasil=json_decode($content,true);

        $slider = $this->db->get('sliders')->result_array();
        // print_r2($visi_misi);


        $content_data['visi_misi'] = $visi_misi;
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['slider'] = $slider;

        // $view_data['description'] = $this->description;
        // $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/profile/visi_misi', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }
}
