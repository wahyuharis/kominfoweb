<?php
// use Carbon;

defined('BASEPATH') or exit('No direct script access allowed');

class Majalah extends CI_Controller
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

        $search = $this->input->get('search_majalah');

        $berita_kanan = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();


        $page = $this->input->get('page');
        $limit = 5;
        $start = page_to_start($page, $limit);


        $where = " ISNULL( majalah.deleted_at )
        AND (
        majalah.nama_majalah LIKE '%" . $this->db->escape_str($search) . "%'
        or
        majalah.nomor_majalah LIKE '%" . $this->db->escape_str($search) . "%'
        )
         ";


        $majalah_list = $this->db
            ->where($where)
            ->select('*')
            ->order_by('id_majalah', 'desc')
            ->limit($limit, intval($start))
            ->get('majalah')
            ->result_array();


        $total_row = $this->db->where('deleted_at', null)
            // ->where('regulasi_kategori.slug', $slug)
            ->group_start()
            ->or_like('nama_majalah', $search)
            ->or_like('nomor_majalah', $search)
            ->group_end()
            ->get('majalah')
            ->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('majalah/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);



        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['majalah_list'] = $majalah_list;
        $content_data['pagination'] = $this->pagination->create_links();

        $view_data['content'] = $this->load->view('frontend/majalah', $content_data, true);

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

        $this->description = $berita_detail->deskripsi;
        $this->keywords = $berita_detail->kata_kunci;

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
        $content_data['berita_kanan'] = $berita_kanan;

        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;

        // print_r2($view_data);
        $view_data['content'] = $this->load->view('frontend/blog_content', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }
}
