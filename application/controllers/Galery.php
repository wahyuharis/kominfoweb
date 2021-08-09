<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
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
        $content_data = [];

        $berita_kanan = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
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

        $slider = $this->db->get('sliders')->result_array();


        $page = $this->input->get('page');
        $limit = 6;
        $start = page_to_start($page, $limit);

        $galeri_foto = $this->db->select('*')
            ->limit($limit, intval($start))
            ->get('galleries')
            ->result_array();

        $total_row = $this->db->select('*')
            ->get('galleries')
            ->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('galery/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        // print_r2($galeri_foto);


        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['galeri_foto'] = $galeri_foto;
        $content_data['pagination'] = $this->pagination->create_links();
        $content_data['slider'] = $slider;
        $content_data['visit'] = $this->data();

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/galery/galery', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }

    function detail($id)
    {
        $content_data = [];

        $berita_kanan = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
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

        $galeri_foto_header = $this->db->select('*')
            ->where('id', $id)
            ->get('galleries')
            ->row_object()->image;

        $galeri_foto_detail = $this->db->select('*')
            ->where('id_galeries', $id)
            ->get('galleries_child')
            ->result_array();

        $slider = $this->db->get('sliders')->result_array();

        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['galeri_foto_detal'] = $galeri_foto_detail;
        $content_data['galeri_foto_header'] = $galeri_foto_header;
        $content_data['slider'] = $slider;
        $content_data['visit'] = $this->data();

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/galery/galery_detail', $content_data, true);

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
