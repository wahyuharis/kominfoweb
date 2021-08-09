<?php
// use Carbon;

defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
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

        $search = $this->input->get('search_video');

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

        $page = $this->input->get('page');
        $limit = 6;
        $start = page_to_start($page, $limit);


        $where = "galleries_video.nama_video LIKE '%" . $this->db->escape_str($search) . "%'";


        $video_list = $this->db
            ->where($where)
            ->select('*')
            ->order_by('id_galleries_video', 'desc')
            ->limit($limit, intval($start))
            ->get('galleries_video')
            ->result_array();


        $total_row = $this->db->group_start()
            ->or_like('nama_video', $search)
            ->group_end()
            ->get('galleries_video')
            ->num_rows();
        $slider = $this->db->get('sliders')->result_array();
        $this->load->library('pagination');
        $config['base_url'] = base_url('video/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);



        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['video_list'] = $video_list;
        $content_data['slider'] = $slider;
        $content_data['pagination'] = $this->pagination->create_links();
        $content_data['visit'] = $this->data();

        $view_data['content'] = $this->load->view('frontend/galery/video', $content_data, true);

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

        $thumb = $this->db->select('*')
            ->where('id_galleries_video', $id)
            ->get('galleries_video')
            ->row_object();

        $detail_video = $this->db->select('*')
            ->where('id_galleries_video', $id)
            ->get('galleries_video')
            ->result_array();
        $slider = $this->db->get('sliders')->result_array();
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['detail_video'] = $thumb;
        $content_data['slider'] = $slider;
        $content_data['visit'] = $this->data();

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/galery/video_detail', $content_data, true);

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
