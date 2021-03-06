<?php
// use Carbon;

// use \Html2Text\Html2Text;


defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
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

        $dsn = 'mysqli://adminjbrkab:J3mberK@b2019@103.124.69.136/db_jbrkab';
        $db2 = $this->load->database($dsn, TRUE);

        // Select records from 2nd database
        $berita_pemkab =  $db2->where('post_status', 'publish')
            ->where('post_type', 'post')
            ->like('post_content', '<img', 'after')
            ->select('*')
            ->order_by('ID', 'desc')
            ->limit(10)
            ->get('wp_posts')
            ->result_array();

        $page = $this->input->get('page');
        $limit = 5;
        $start = page_to_start($page, $limit);

        $agenda_list = $this->db->where('deleted_at', null)
            // ->where('category', 'Artikel')
            ->group_start()
            ->or_like('title', $search)
            ->or_like('keterangan', $search)
            ->group_end()
            ->select('agenda.*,users.fullname')
            ->join('users', 'users.id=agenda.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit($limit, intval($start))
            ->get('agenda')
            ->result_array();

        // print_r2($berita_blog_list);
        // header_text();
        // $html = getFirstParagraph2($berita_blog_list[]['content']);
        // echo $html;
        // echo $berita_blog_list[1]['content'];
        // die();

        $slider = $this->db->get('sliders')->result_array();


        $total_row = $this->db->where('deleted_at', null)
            // ->where('category', 'Artikel')
            ->group_start()
            ->or_like('title', $search)
            ->or_like('keterangan', $search)
            ->group_end()
            ->get('agenda')
            ->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('agenda/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['berita_pemkab'] = $berita_pemkab;
        $content_data['agenda_list'] = $agenda_list;
        $content_data['slider'] = $slider;
        $content_data['pagination'] = $this->pagination->create_links();
        $content_data['visit'] = $this->data();

        $view_data['content'] = $this->load->view('frontend/agenda', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }

    function detail($slug)
    {
        $content_data = [];


        // print_r2($slug);

        $berita_kanan = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname,get_view(feeds.id) as realview')
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

        $dsn = 'mysqli://adminjbrkab:J3mberK@b2019@103.124.69.136/db_jbrkab';
        $db2 = $this->load->database($dsn, TRUE);

        // Select records from 2nd database
        $berita_pemkab =  $db2->where('post_status', 'publish')
            ->where('post_type', 'post')
            ->like('post_content', '<img', 'after')
            ->select('*')
            ->order_by('ID', 'desc')
            ->limit(10)
            ->get('wp_posts')
            ->result_array();

        $agenda_detail = $this->db
            ->select('agenda.*,users.fullname,get_view(agenda.id) as realview')
            ->where('deleted_at', null)
            // ->where('category', 'agenda')
            ->where('slug', $slug)
            ->join('users', 'users.id=agenda.user_id', 'left')
            ->get('agenda')
            ->row_object();

        $this->description = $agenda_detail->keterangan;
        $this->keywords = $agenda_detail->kata_kunci;

        if (empty(trim($this->description))) {
            $this->description = getFirstParagraph2($agenda_detail->waktu);
        }

        $keywords2 = str_replace(' ', ', ', $agenda_detail->title);
        // print_r2($keywords2);
        if (empty(trim($this->keywords))) {
            $this->keywords = $keywords2;
        }

        $agenda_detail_next = $this->db
            ->select('agenda.*,users.fullname')
            ->where('deleted_at', null)
            // ->where('category', 'agenda')
            ->where('agenda.id < ', $agenda_detail->id)
            ->join('users', 'users.id=agenda.user_id', 'left')
            ->order_by('agenda.id', 'desc')
            ->get('agenda')
            ->row_object();

        $agenda_detail_prev = $this->db
            ->select('agenda.*,users.fullname')
            ->where('deleted_at', null)
            // ->where('category', 'agenda')
            ->where('agenda.id > ', $agenda_detail->id)
            ->join('users', 'users.id=agenda.user_id', 'left')
            ->order_by('agenda.id', 'desc')
            ->get('agenda')
            ->row_object();

        $slider = $this->db->get('sliders')->result_array();

        $content_data['agenda_detail'] = $agenda_detail;
        $content_data['agenda_detail_next'] = $agenda_detail_next;
        $content_data['agenda_detail_prev'] = $agenda_detail_prev;
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['berita_pemkab'] = $berita_pemkab;
        $content_data['slider'] = $slider;
        $content_data['visit'] = $this->data();

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;

        // print_r2($view_data);
        $view_data['content'] = $this->load->view('frontend/agenda_content', $content_data, true);

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
