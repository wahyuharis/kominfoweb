<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Log_visitor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($id_visitor = null)
    {
        $insert = array('cookies_token' => $id_visitor);
        $this->db->insert('uniq_visitor', $insert);
    }

    function count($slug, $cookies_token)
    {

        $this->db->where('cookies_token', $cookies_token);
        $db2 = $this->db->get('uniq_visitor');


        $this->db->where('slug', $slug);
        $db =  $this->db->get('feeds');

        // print_r2($this->db->last_query());

        if ($db->num_rows() > 0 && $db2->num_rows() > 0) {

            $id_feeds = $db->row_object()->id;
            $id_uniq_visitor=$db2->row_object()->id_uniq_visitor;


            $this->db->where('uniq_visitor_feeds.id_feeds', $id_feeds);
            $this->db->where('uniq_visitor.id_uniq_visitor', $id_uniq_visitor);
            $this->db->join('uniq_visitor', 'uniq_visitor.id_uniq_visitor=uniq_visitor_feeds.id_uniq_visitor');
            $db3 = $this->db->get('uniq_visitor_feeds');
            // $res = $db->result_array();

            $view = 0;
            if ($db3->num_rows() < 1) {
                $view = $db3->row_object()->view;
                $insert = array();
                $insert['view'] = $view + 1;
                $insert['id_feeds'] = $id_feeds;
                $insert['id_uniq_visitor'] = $id_uniq_visitor;
    
                $this->db->insert('uniq_visitor_feeds', $insert);
            }

           

            // print_r2($res);
        }
    }
}
