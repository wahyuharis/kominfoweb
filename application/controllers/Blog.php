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

        $berita_kanan = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();


        $page = $this->input->get('page');
        $limit = 3;
        $start = page_to_start($page, $limit);

        $berita_blog_list = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit($limit, intval($start))
            ->get('feeds')
            ->result_array();

        $total_row = $this->db->where('deleted_at', null)
            ->select('feeds.id')
            ->get('feeds')
            ->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('blog/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);


        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_blog_list'] = $berita_blog_list;
        $content_data['pagination'] = $this->pagination->create_links();


        $view_data['content'] = $this->load->view('frontend/blog', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }

    function detail($slug)
    {
        $content_data = [];

        $content_data = [];

        $berita_kanan = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();

        $berita_detail=$this->db
        ->where('slug',$slug)
        ->get('feeds')->row_object();

        $content_data['berita_detail'] = $berita_detail;

        // print_r2($content_data['berita_detail']);

        $content_data['berita_kanan'] = $berita_kanan;

        $view_data['content'] = $this->load->view('frontend/blog_content', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }
}
