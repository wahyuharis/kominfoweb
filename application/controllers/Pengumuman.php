<?php
// use Carbon;

// use \Html2Text\Html2Text;


defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
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


        $page = $this->input->get('page');
        $limit = 5;
        $start = page_to_start($page, $limit);

        $pengumuman_list = $this->db->where('deleted_at', null)
            ->where('category', 'Pengumuman')
            ->group_start()
            ->or_like('title', $search)
            ->or_like('content', $search)
            ->group_end()
            ->select('pengumuman.*,users.fullname')
            ->join('users', 'users.id=pengumuman.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit($limit, intval($start))
            ->get('pengumuman')
            ->result_array();

        // print_r2($berita_blog_list);
        // header_text();
        // $html = getFirstParagraph2($berita_blog_list[]['content']);
        // echo $html;
        // echo $berita_blog_list[1]['content'];
        // die();

        $slider = $this->db->get('sliders')->result_array();


        $total_row = $this->db->where('deleted_at', null)
            ->where('category', 'Pengumuman')
            ->group_start()
            ->or_like('title', $search)
            ->or_like('content', $search)
            ->group_end()
            ->get('pengumuman')
            ->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('pengumuman/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['pengumuman_list'] = $pengumuman_list;
        $content_data['slider'] = $slider;
        $content_data['pagination'] = $this->pagination->create_links();

        $view_data['content'] = $this->load->view('frontend/pengumuman', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }

    function detail($slug)
    {
        $content_data = [];


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

        $pengumuman_detail = $this->db
            ->select('pengumuman.*,users.fullname')
            ->where('deleted_at', null)
            ->where('category', 'Pengumuman')
            ->where('slug', $slug)
            ->join('users', 'users.id=pengumuman.user_id', 'left')
            ->get('pengumuman')
            ->row_object();
        $slider = $this->db->get('sliders')->result_array();

        $this->description = $pengumuman_detail->deskripsi;
        $this->keywords = $pengumuman_detail->kata_kunci;

        if (empty(trim($this->description))) {
            $this->description = getFirstParagraph2($pengumuman_detail->content);
        }

        $keywords2 = str_replace(' ', ', ', $pengumuman_detail->title);
        // print_r2($keywords2);
        if (empty(trim($this->keywords))) {
            $this->keywords = $keywords2;
        }

        $pengumuman_detail_next = $this->db
            ->select('pengumuman.*,users.fullname')
            ->where('deleted_at', null)
            ->where('category', 'Pengumuman')
            ->where('pengumuman.id < ', $pengumuman_detail->id)
            ->join('users', 'users.id=pengumuman.user_id', 'left')
            ->order_by('pengumuman.id', 'desc')
            ->get('pengumuman')
            ->row_object();

        $pengumuman_detail_prev = $this->db
            ->select('pengumuman.*,users.fullname')
            ->where('deleted_at', null)
            ->where('category', 'Pengumuman')
            ->where('pengumuman.id > ', $pengumuman_detail->id)
            ->join('users', 'users.id=pengumuman.user_id', 'left')
            ->order_by('pengumuman.id', 'desc')
            ->get('pengumuman')
            ->row_object();

        $content_data['pengumuman_detail'] = $pengumuman_detail;
        $content_data['pengumuman_detail_next'] = $pengumuman_detail_next;
        $content_data['pengumuman_detail_prev'] = $pengumuman_detail_prev;
        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_ppid'] = $hasil;
        $content_data['slider'] = $slider;

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;

        // print_r2($view_data);
        $view_data['content'] = $this->load->view('frontend/pengumuman_content', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }
}
