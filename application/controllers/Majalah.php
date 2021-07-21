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
        $content_data['berita_ppid'] = $hasil;
        $content_data['majalah_list'] = $majalah_list;
        $content_data['slider'] = $slider;
        $content_data['pagination'] = $this->pagination->create_links();

        $view_data['content'] = $this->load->view('frontend/majalah', $content_data, true);

        $this->load->view('frontend/template', $view_data);
    }

   
}
