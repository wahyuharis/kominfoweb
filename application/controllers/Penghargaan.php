<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penghargaan extends CI_Controller
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

        $berita_kanan = $this->db->where('deleted_at', null) //berita di sebelah kanan
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();


        $page = $this->input->get('page');
        $limit = 3;
        $start = page_to_start($page, $limit);

        $penghargaan_list = $this->db->where('deleted_at', null)
            ->group_start()
            ->or_like('title', $search)
            ->or_like('kata_kunci', $search)
            ->group_end()
            ->select('profile_penghargaan.*,users.fullname')
            ->join('users', 'users.id=profile_penghargaan.user_id', 'left')
            ->order_by('id_penghargaan', 'desc')
            ->limit($limit, intval($start))
            ->get('profile_penghargaan')
            ->result_array();



        $total_row = $this->db->where('deleted_at', null)
            ->group_start()
            ->or_like('title', $search)
            ->or_like('content', $search)
            ->group_end()
            ->get('profile_penghargaan')
            ->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('penghargaan/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);


        // print_r2($penghargaan_list);

        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['penghargaan_list'] = $penghargaan_list;
        $content_data['pagination'] = $this->pagination->create_links();

        $view_data['content'] = $this->load->view('frontend/profile/penghargaan', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }
    public function detail($slug)
    {
        $content_data = [];

        $penghargaan = $this->db
            ->select('profile_penghargaan.*,users.fullname')
            ->where('deleted_at', null)
            ->where('slug', $slug)
            ->join('users', 'users.id=profile_penghargaan.user_id', 'left')
            ->get('profile_penghargaan')
            ->row_object();

        $penghargaan_next = $this->db
            ->select('profile_penghargaan.*,users.fullname')
            ->where('deleted_at', null)
            ->where('profile_penghargaan.id_penghargaan <', $penghargaan->id_penghargaan)
            ->join('users', 'users.id=profile_penghargaan.user_id', 'left')
            ->order_by('profile_penghargaan.id_penghargaan', 'desc')
            ->get('profile_penghargaan')
            ->row_object();

        $penghargaan_prev = $this->db
            ->select('profile_penghargaan.*,users.fullname')
            ->where('deleted_at', null)
            ->where('profile_penghargaan.id_penghargaan >', $penghargaan->id_penghargaan)
            ->join('users', 'users.id=profile_penghargaan.user_id', 'left')
            ->order_by('profile_penghargaan.id_penghargaan', 'desc')
            ->get('profile_penghargaan')
            ->row_object();

        $this->description = $penghargaan->deskripsi;
        $this->keywords = $penghargaan->kata_kunci;
        // $penghargaan = $this->db->select('*')
        //     ->get('profile_penghargaan')
        //     ->row_object();

        $berita_kanan = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id', 'left')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();

        // print_r2($penghargaan);

        $content_data['penghargaan'] = $penghargaan;
        $content_data['penghargaan_next'] = $penghargaan_next;
        $content_data['penghargaan_prev'] = $penghargaan_prev;
        $content_data['berita_kanan'] = $berita_kanan;

        // $view_data['description'] = $this->description;
        // $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/profile/penghargaan_detail', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }
}
