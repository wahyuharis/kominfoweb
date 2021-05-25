<?php

class Auth
{

    function __construct()
    {
        $ci = &get_instance();
    }

    function login($email, $password)
    {
        $ci = &get_instance();

        $error_message = "";

        //============VALIDASI EMAIL===========================
        $db = $ci->db->where('email', $email)->get('users');

        if ($db->num_rows() < 1) {
            $error_message = "Email Salah";
        }
        //============VALIDASI EMAIL===========================

        //============VALIDASI PASSWORD===========================
        $db = $ci->db->where('email', $email)
            ->where('password', $password)
            ->get('users');

        if ($db->num_rows() < 1) {
            $error_message = "Password Salah";
        } else {
            $user_data = $db->result_array();

            $db = $ci->db->where('id', $user_data['user_level_id'])
                ->get('user_level');
            
                

            $sess = array(
                
            );

            $ci->session->set_userdata($sess);
        }
        //============VALIDASI PASSWORD===========================


        return $error_message;
    }
}
