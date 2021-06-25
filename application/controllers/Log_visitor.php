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

    function count($slug)
    {
        $this->db->where('slug', $slug);
        $db =  $this->db->get('feeds');

        // print_r2($this->db->last_query());


        if ($db->num_rows() > 0) {

            $view = intval($db->row_object()->view) + 1;

            $this->db->where('slug', $slug);
            $this->db->set('view', $view);
            $this->db->update('feeds');

            // print_r2($this->db->last_query());
        }
    }
}
