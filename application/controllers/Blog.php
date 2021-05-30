<?php

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
            ->limit(3)
            ->get('feeds')
            ->result_array();


        $start = $this->input->get('per_page');
        $berita_blog_list = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(5, intval($start))
            ->get('feeds')
            ->result_array();

        $total_row = $this->db->where('deleted_at', null)
            ->select('feeds.id')
            ->get('feeds')
            ->num_rows();

        $this->load->library('pagination');
        $config = $this->pagination_config();
        $config['total_rows'] = $total_row;
        $this->pagination->initialize($config);


        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['berita_blog_list'] = $berita_blog_list;
        $content_data['pagination'] = $this->pagination->create_links();


        $view_data['content'] = $this->load->view('frontend/blog', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }

    function pagination_config()
    {
        $config['base_url'] = base_url('blog/');
        // $config['total_rows'] = $total_row;
        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = true;

        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul>';
        $config['attributes']       = ['class' => 'page-link'];
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';

        return $config;
    }
}
