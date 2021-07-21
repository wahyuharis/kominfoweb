<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function berita_terpopuler()
    {
        $db = $this->db->where('deleted_at', null)
            ->where('category', 'Berita')
            ->where("MONTH(feeds.date)=".date('m')." AND YEAR(feeds.date)=".date('Y')." ")
            ->select('feeds.*,users.fullname,get_view(feeds.id) as view')
            ->join('users', 'users.id=feeds.user_id')
            ->order_by('get_view(feeds.id)', 'desc')
            ->limit(3)
            ->get('feeds');

        if ($db->num_rows() < 1) {
            $db = $this->db->where('deleted_at', null)
                ->where('category', 'Berita')
                ->where("YEAR(feeds.date)=".date('Y')." ")
                ->select('feeds.*,users.fullname,get_view(feeds.id) as view')
                ->join('users', 'users.id=feeds.user_id')
                ->order_by('get_view(feeds.id)', 'desc')
                ->limit(3)
                ->get('feeds');
        }

        // echo $this->db->last_query();
        // die();

        return $db->result_array();
    }
}
