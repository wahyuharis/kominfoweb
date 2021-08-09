<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kunjungan extends CI_Model
{
    public function bulan()
    {
        $sql = "SELECT 
        COUNT(uniq_visitor.id_uniq_visitor) AS visitors
        FROM uniq_visitor
        WHERE ( MONTH(uniq_visitor.time_stamp) =MONTH(now()) and YEAR(uniq_visitor.time_stamp) =YEAR(now())  ) ";
        return $this->db->query($sql)->row()->visitors;
    }
    public function week()
    {
        $sql = "SELECT 
        COUNT(uniq_visitor.id_uniq_visitor) AS visitors
        FROM uniq_visitor 
        WHERE ( WEEK(uniq_visitor.time_stamp) =WEEK(now()) ) ";
        return $this->db->query($sql)->row()->visitors;
    }
    public function now()
    {
        $sql = "SELECT 
        COUNT(uniq_visitor.id_uniq_visitor) AS visitors
        FROM uniq_visitor
        WHERE DATE_FORMAT(uniq_visitor.time_stamp, '%d-%m-%Y')= '" . date('d-m-Y') . "'  ";
        return $this->db->query($sql)->row()->visitors;
    }
    public function total()
    {
        $sql = "SELECT 
        COUNT(uniq_visitor.id_uniq_visitor) AS visitors
        FROM uniq_visitor";
        return $this->db->query($sql)->row()->visitors;
    }
}
