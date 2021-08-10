<?php
// use Carbon;

// use \Html2Text\Html2Text;


defined('BASEPATH') or exit('No direct script access allowed');

class Infografis extends CI_Controller
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

        $search = $this->input->get('search');

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
        $limit = 5;
        $start = page_to_start($page, $limit);

        $infografis_list = $this->db->where('deleted_at', null)
            ->group_start()
            ->or_like('title', $search)
            ->or_like('content', $search)
            ->group_end()
            ->select('infografis.*,users.fullname')
            ->join('users', 'users.id=infografis.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit($limit, intval($start))
            ->get('infografis')
            ->result_array();

        // print_r2($berita_blog_list);
        // header_text();
        // $html = getFirstParagraph2($berita_blog_list[]['content']);
        // echo $html;
        // echo $berita_blog_list[1]['content'];
        // die();


        $slider = $this->db->get('sliders')->result_array();

        $total_row = $this->db->where('deleted_at', null)
            ->group_start()
            ->or_like('title', $search)
            ->or_like('content', $search)
            ->group_end()
            ->get('infografis')
            ->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('infografis/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['infografis_list'] = $infografis_list;
        $content_data['slider'] = $slider;
        $content_data['pagination'] = $this->pagination->create_links();
        $content_data['visit'] = $this->data();

        $view_data['content'] = $this->load->view('frontend/infografis', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }

    function detail($slug)
    {
        $content_data = [];


        // print_r2($slug);

        $berita_kanan = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname,get_view(feeds.id) as realview')
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

        $infografis_detail = $this->db
            ->select('infografis.*,users.fullname,get_view(infografis.id) as realview')
            ->where('deleted_at', null)
            ->where('slug', $slug)
            ->join('users', 'users.id=infografis.user_id', 'left')
            ->get('infografis')
            ->row_object();
        $slider = $this->db->get('sliders')->result_array();
        $this->description = $infografis_detail->deskripsi;
        $this->keywords = $infografis_detail->kata_kunci;

        if (empty(trim($this->description))) {
            $this->description = getFirstParagraph2($infografis_detail->content);
        }

        $keywords2 = str_replace(' ', ', ', $infografis_detail->title);
        // print_r2($keywords2);
        if (empty(trim($this->keywords))) {
            $this->keywords = $keywords2;
        }

        $infografis_detail_next = $this->db
            ->select('infografis.*,users.fullname')
            ->where('deleted_at', null)
            ->where('infografis.id < ', $infografis_detail->id)
            ->join('users', 'users.id=infografis.user_id', 'left')
            ->order_by('infografis.id', 'desc')
            ->get('infografis')
            ->row_object();

        $infografis_detail_prev = $this->db
            ->select('infografis.*,users.fullname')
            ->where('deleted_at', null)
            ->where('infografis.id > ', $infografis_detail->id)
            ->join('users', 'users.id=infografis.user_id', 'left')
            ->order_by('infografis.id', 'desc')
            ->get('infografis')
            ->row_object();

        $content_data['infografis_detail'] = $infografis_detail;
        $content_data['infografis_detail_next'] = $infografis_detail_next;
        $content_data['infografis_detail_prev'] = $infografis_detail_prev;
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['slider'] = $slider;
        $content_data['visit'] = $this->data();

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;

        // print_r2($view_data);
        $view_data['content'] = $this->load->view('frontend/infografis_content', $content_data, true);

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
