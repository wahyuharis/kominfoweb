<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sejarah_dinas extends CI_Controller
{
    private $description = "";
    private $keywords = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kunjungan');
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

        $url_ppid = "https://ppid.jemberkab.go.id/api/berita";
        $get_url = file_get_contents($url_ppid);
        //mengubah standar encoding
        $content = utf8_encode($get_url);

        //mengubah data json menjadi data array asosiatif
        $hasil = json_decode($content, true);
        // print_r2($sejarah_dinas);

        $slider = $this->db->get('sliders')->result_array();

        $content_data['sejarah_dinas'] = $sejarah_dinas;
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['slider'] = $slider;
        $content_data['visit'] = $this->data();



        // $view_data['description'] = $this->description;
        // $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/profile/sejarah_dinas', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }

    function data()
    {
        $sql = "SELECT count(users.id) AS total FROM users";
        $db = $this->db->query($sql);
        $user = $db->row_object()->total;


        $visitors['month'] = $this->kunjungan->bulan(); //$db->row_object()->visitors;


        $visitors['week'] = $this->kunjungan->week(); //$db->row_object()->visitors;


        $visitors['now'] = $this->kunjungan->now(); //$db->row_object()->visitors;

        // $sql = "SELECT 
        // COUNT(uniq_visitor.id_uniq_visitor) AS visitors
        // FROM uniq_visitor";
        // $db = $this->db->query($sql);
        $visitors['all'] = $this->kunjungan->total(); //$db->row_object()->visitors;

        $sql = "SELECT
        DATE_FORMAT(uniq_visitor.time_stamp, '%Y-%m-%d') AS y,
        COUNT(uniq_visitor.id_uniq_visitor) AS item1
        FROM uniq_visitor
        
        GROUP BY DATE(uniq_visitor.time_stamp);";
        $db = $this->db->query($sql);
        $visitor_arr = $db->result_object();



        $data = array();
        $data['user'] = $user;
        $data['visitors'] = $visitors;
        $data['visitor_arr'] = $visitor_arr;

        //header_json();
        //echo json_encode($data);
        return $data;
    }
}
