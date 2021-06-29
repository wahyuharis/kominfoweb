<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Visitor_feeds extends CI_Controller
{

    private $title = "Visitor Berita";
    private $table_name = 'uniq_visitor';
    private $url_controller = "admin/visitor_feeds/";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Auth');
        $auth = new Auth();
        $auth->is_logged_in();
    }



    public function index()
    {
        $content_data = array();

        $content_data['table_header'] = $this->table_header();
        $content_data['url_controller'] = $this->url_controller;

        $content = $this->load->view('frontend/visitor_feeds/visitor_feeds', $content_data, true);

        $template_data['content'] = $content;
        // $template_data['box'] = false;
        $template_data['content_title'] = $this->title;

        $this->load->view('admin/template', $template_data);
    }

    private function table_header()
    {
        $table_header = array(
            'aksi',
            'id',
            'id',
            'title',
            'view',
        );

        return $table_header;
    }

    private function orderby()
    {
        $array = array(
            'aksi',
            'feeds.id',
            'feeds.id',
            'feeds.title',
            'COUNT(uniq_visitor_feeds.`view`)'
        );

        return $array;
    }


    private function sql()
    {
        $sql = "SELECT  
        '' as aksi,
        feeds.id,
        feeds.id as id2,
        feeds.title,
        COUNT(uniq_visitor_feeds.`view`) AS vistor
        FROM
        feeds
        LEFT JOIN uniq_visitor_feeds
        ON uniq_visitor_feeds.id_feeds=feeds.id
        
        GROUP BY feeds.id";

        return $sql;
    }

    private function callback_column($key, $col, $row)
    {


        if ($key == 'aksi') {
            $col = "";
        }

        return $col;
    }

    // <editor-fold defaultstate="collapsed" desc="Datatables">
    public function datatables()
    {
        $sql = $this->sql();

        $search_get = $this->input->get('search');
        $cari = $search_get['value'];
        if (strlen(trim($cari)) > 0) {
            $sql .= " and (" . "\n";
            $i = 0;
            foreach ($this->orderby() as $search_key => $search) {
                if ($i > 1) {
                    $sql .= " or ";
                }
                if ($i > 0) {
                    $sql .= " " . $search . " like " . "'%" . $cari . "%' " . "\n";
                }
                $i++;
            }
            $sql .= ")" . "\n";
        }

        foreach ($this->orderby() as $order_key => $order) {
            $order_get = $this->input->get('order');
            if (is_array($order_get) && count($order_get)) {
                if ($order_get[0]['column'] == $order_key) {
                    $sql .= "\n" . " order by " . $order . " " . $order_get[0]['dir'] . " ";
                }
            }
        }

        $total_row = $this->db->query("select count(*) as total from (" . $sql . ") as tb ")->row_array()['total'];


        $sql .= " limit " . intval($this->input->get('start')) . "," . intval($this->input->get('length')) . " ";
        $result = $this->db->query($sql)->result_array();


        $datatables_format = array(
            'data' => array(),
            'recordsTotal' => $total_row,
            'recordsFiltered' => $total_row,
        );

        foreach ($result as $row) {
            $buffer = array();
            foreach ($row as $key => $col) {
                $col = $this->callback_column($key, $col, $row);
                array_push($buffer, $col);
            }
            array_push($datatables_format['data'], $buffer);
        }
        header('Content-Type: application/json');
        echo json_encode($datatables_format);
    }
}
