<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $description = "";
    private $keywords = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->description = "Jl. Dewi Sartika No.54, Kepatihan, Kec. Kaliwates, Kabupaten Jember, Jawa Timur 68131
        Email: diskominfo@jemberkab.go.id
        No. Telp: 0331-123xxx";

        $this->keywords = "Kominfo jember, Dinas kominfo jember, diskominfo jember, dinas komunikasi jember, dinas informatika jember";

        $slider = $this->db->get('sliders')->result_array();

        $berita_kanan = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();



        $berita_tengah = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            // ->where(" feeds.date between '".date('Y-m-01')."' and '".date('Y-m-t')."' ")
            ->select('feeds.*,users.fullname,get_view(feeds.id) as view')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('get_view(feeds.id)', 'desc')
            ->limit(3)
            ->get('feeds')
            ->result_array();

            // header_text();
            // print_r2($berita_tengah);


        $berita_bawah = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(4)
            ->get('feeds')
            ->result_array();

        $link = $this->db->select('*')
            ->get('url')
            ->result_array();

        $content_data['link'] = $link;
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_tengah'] = $berita_tengah;
        $content_data['berita_bawah'] = $berita_bawah;
        $content_data['slider'] = $slider;

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/home', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }
}
