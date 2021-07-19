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
        $content_data['video_list'] = $video_list;
        $content_data['slider'] = $slider;
        $content_data['pagination'] = $this->pagination->create_links();

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
        $content_data['detail_video'] = $thumb;
        $content_data['slider'] = $slider;

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/galery/video_detail', $content_data, true);

        // print_r2($view_data);
        $this->load->view('frontend/template', $view_data);
    }


}
