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
        $this->load->model('Berita_model');
        $berita_model=new Berita_model();


        $this->description = "Jl. Dewi Sartika No.54, Kepatihan, Kec. Kaliwates, Kabupaten Jember, Jawa Timur 68131
        Email: diskominfo@jemberkab.go.id
        No. Telp: (0331) 5102507";

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
        
        $url_ppid="https://ppid.jemberkab.go.id/api/berita";
        $get_url = file_get_contents($url_ppid);
        //mengubah standar encoding
        $content=utf8_encode($get_url);
    
        //mengubah data json menjadi data array asosiatif
        $hasil=json_decode($content,true);

        $dsn = 'mysqli://root:@localhost/anmedia';
        $db2 = $this->load->database($dsn, TRUE);

        // Select records from 2nd database
       $berita_pemkab =  $db2->where('post_status', 'publish')
            ->select('*')
            ->order_by('ID', 'desc')
            ->limit(10)
            ->get('jk_posts')
            ->result_array();


        $berita_tengah = $berita_model->berita_terpopuler();
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
        $content_data['berita_ppid'] = $hasil;
        $content_data['berita_pemkab'] = $berita_pemkab;
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
