<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publish_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        // print_r2($this->uri->segment(1));

        if (strtolower($this->uri->segment(1)) == 'admin') {
            //pass
        } else {
            $this->publish();
        }
    }

    public function publish()
    {
        $data = $this->db->where('date_publish <=', date('Y-m-d'))
            ->where('category', 'Draft')
            ->where('deleted_at', null)
            ->get('feeds')
            ->result_array();


        foreach ($data as $row) {
            $set = array('deleted_at' => date('Y-m-d H:i:s'));
            $where = array('id' => $row['id']);
            $this->db->update('feeds', $set, $where);

            unset($row['id']);
            $row['slug'] = $row['slug'] . "-" . uniqid();
            $row['category'] = 'Berita';
            $row['date'] = $row['date_publish'];
            $set2 = $row;

            $this->db->insert('feeds', $set2);
        }
    }
}
