<?php
// use Carbon;

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $content_data = [];

        $search = $this->input->get('search');

        $berita_kanan = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();


        $page = $this->input->get('page');
        $limit = 5;
        $start = page_to_start($page, $limit);

        $berita_blog_list = $this->db->where('deleted_at', null)
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


        // print_r2($berita_blog_list);

        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_blog_list'] = $berita_blog_list;
        $content_data['pagination'] = $this->pagination->create_links();


        $view_data['content'] = $this->load->view('frontend/blog', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }

    function detail($slug)
    {
        $content_data = [];


        $berita_kanan = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();

        $berita_detail = $this->db
            ->select('feeds.*,users.fullname')
            ->where('deleted_at', null)
            ->where('slug', $slug)
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->get('feeds')
            ->row_object();

        $berita_detail_next = $this->db
            ->select('feeds.*,users.fullname')
            ->where('deleted_at', null)
            ->where('feeds.id < ', $berita_detail->id)
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('feeds.id', 'desc')
            ->get('feeds')
            ->row_object();

        $berita_detail_prev = $this->db
            ->select('feeds.*,users.fullname')
            ->where('deleted_at', null)
            ->where('feeds.id > ', $berita_detail->id)
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('feeds.id', 'desc')
            ->get('feeds')
            ->row_object();

        $content_data['berita_detail'] = $berita_detail;
        $content_data['berita_detail_next'] = $berita_detail_next;
        $content_data['berita_detail_prev'] = $berita_detail_prev;

        // print_r2($content_data['berita_detail']);

        // header_text();
        // echo $berita_detail->id;
        // echo "\n";
        // echo $berita_detail_prev->id;
        // die();

        $content_data['berita_kanan'] = $berita_kanan;

        $view_data['content'] = $this->load->view('frontend/blog_content', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }
}
