<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_foto extends CI_Controller
{
    private $description = "";
    private $keywords = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $content_data = [];
        // $this->description="Jl. Dewi Sartika No.54, Kepatihan, Kec. Kaliwates, Kabupaten Jember, Jawa Timur 68131
        // Email: diskominfo@jemberkab.go.id
        // No. Telp: 0331-123xxx";

        // $this->keywords="Kominfo jember, Dinas kominfo jember, diskominfo jember, dinas komunikasi jember, dinas informatika jember";

        // $slider = $this->db->get('sliders')->result_array();

        $berita_kanan = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();


        $galeri_foto = $this->db->select('caption, image')
            ->get('galleries')
            ->result_array();


        // print_r2($link);


        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['galeri_foto'] = $galeri_foto;

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/galeri_foto', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }
}
