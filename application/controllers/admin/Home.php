<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    private $title = "Home";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Auth');

        $auth = new Auth();
        $auth->is_logged_in();
    }

    public function index()
    {

        $content = $this->load->view('admin/home', [], true);
        $template_data['box'] = false;
        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;


        $this->load->view('admin/template', $template_data);
    }

    function data(){
        $sql="SELECT count(feeds.id) AS total FROM feeds
        WHERE feeds.deleted_at IS NULL
        AND
        feeds.category='Berita'
        limit 1";
        $db=$this->db->query($sql);
        $berita=$db->row_object()->total;

        $sql="SELECT count(users.id) AS total FROM users";
        $db=$this->db->query($sql);
        $user=$db->row_object()->total;

        $sql="SELECT 
        COUNT(uniq_visitor.id_uniq_visitor) AS visitors
        FROM uniq_visitor
        WHERE DATE_FORMAT(uniq_visitor.time_stamp, '%m-%Y') ='".date('m-Y')."'";
        $db=$this->db->query($sql);
        $visitors=$db->row_object()->visitors;

        $sql="SELECT
        DATE_FORMAT(uniq_visitor.time_stamp, '%Y-%m-%d') AS y,
        COUNT(uniq_visitor.id_uniq_visitor) AS item1
        FROM uniq_visitor
        
        GROUP BY DATE(uniq_visitor.time_stamp);";
        $db=$this->db->query($sql);
        $visitor_arr=$db->result_object();



        $data=array();
        $data['berita']=$berita;
        $data['user']=$user;
        $data['visitors']=$visitors;
        $data['visitor_arr']=$visitor_arr;

        header_json();
        echo json_encode($data);
    }
}
