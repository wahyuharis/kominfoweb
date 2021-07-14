<?php
// use Carbon;

// use \Html2Text\Html2Text;


defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    private $description = "";
    private $keywords = "";
    private $meta_img = "";

    public function __construct()
    {
        parent::__construct();
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
        
        $url_ppid="https://ppid.jemberkab.go.id/api/berita";
        $get_url = file_get_contents($url_ppid);
        //mengubah standar encoding
        $content=utf8_encode($get_url);
    
        //mengubah data json menjadi data array asosiatif
        $hasil=json_decode($content,true);

        $slider = $this->db->get('sliders')->result_array();

        $page = $this->input->get('page');
        $limit = 5;
        $start = page_to_start($page, $limit);

        $berita_blog_list = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->group_start()
            ->or_like('title', $search)
            ->or_like('content', $search)
            ->group_end()
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit($limit, intval($start))
            ->get('feeds')
            ->result_array();


        $total_row = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->group_start()
            ->or_like('title', $search)
            ->or_like('content', $search)
            ->group_end()
            ->get('feeds')
            ->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('blog/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['berita_blog_list'] = $berita_blog_list;
        $content_data['pagination'] = $this->pagination->create_links();
        $content_data['slider'] = $slider;

        $view_data['content'] = $this->load->view('frontend/blog', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }

    function detail($slug)
    {
        $content_data = [];

        $slider = $this->db->get('sliders')->result_array();
        // print_r2($slug);

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


        $db = $this->db
            ->select('feeds.*,users.fullname')
            ->where('deleted_at', null)
            ->where('category', 'Berita')
            ->where('slug', $slug)
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->get('feeds');

        if($db->num_rows() < 1){
            show_404();
            die();
        }

        $berita_detail = $db->row_object();

        // print_r2($berita_detail);

        $this->description = $berita_detail->deskripsi;
        $this->keywords = $berita_detail->kata_kunci;
        $this->meta_img = $berita_detail->image;

        if (empty(trim($this->description))) {
            $this->description = getFirstParagraph2($berita_detail->content);
        }

        $keywords2 = str_replace(' ', ', ', $berita_detail->title);
        // print_r2($keywords2);
        if (empty(trim($this->keywords))) {
            $this->keywords = $keywords2;
        }

        $berita_detail_next = $this->db
            ->select('feeds.*,users.fullname')
            ->where('deleted_at', null)
            ->where('category', 'Berita')
            ->where('feeds.id < ', $berita_detail->id)
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('feeds.id', 'desc')
            ->get('feeds')
            ->row_object();

        $berita_detail_prev = $this->db
            ->select('feeds.*,users.fullname')
            ->where('deleted_at', null)
            ->where('category', 'Berita')
            ->where('feeds.id > ', $berita_detail->id)
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('feeds.id', 'desc')
            ->get('feeds')
            ->row_object();

        $content_data['berita_detail'] = $berita_detail;
        $content_data['berita_detail_next'] = $berita_detail_next;
        $content_data['berita_detail_prev'] = $berita_detail_prev;
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['slider'] = $slider;

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;
        $view_data['meta_img'] = $this->meta_img;

        // print_r2($view_data);
        $view_data['content'] = $this->load->view('frontend/blog_content', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }
}
