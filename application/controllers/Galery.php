<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
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

        $berita_kanan = $this->db->where('deleted_at', null)
            ->select('feeds.*,users.fullname')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('id', 'desc')
            ->limit(10)
            ->get('feeds')
            ->result_array();



        $page = $this->input->get('page');
        $limit = 6;
        $start = page_to_start($page, $limit);

        $galeri_foto = $this->db->select('caption, image')
            ->limit($limit, intval($start))
            ->get('galleries')
            ->result_array();

        $total_row = $this->db->select('caption, image')
        ->get('galleries')
        ->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url('galery/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        // print_r2($galeri_foto);


        $content_data['berita_kanan'] = $berita_kanan;
        $content_data['galeri_foto'] = $galeri_foto;
        $content_data['pagination'] = $this->pagination->create_links();


        $view_data['description'] = $this->description;
        $view_data['keywords'] = $this->keywords;
        $view_data['content'] = $this->load->view('frontend/galery/galery', $content_data, true);

        // print_r2($view_data);

        $this->load->view('frontend/template', $view_data);
    }
}
