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
        } else {

            //============VALIDASI PASSWORD===========================
            $db = $ci->db->where('email', $email)
                ->where('password', md5($password))
                ->get('users');

            if ($db->num_rows() < 1) {
                $error_message = "Password Salah";
            } else {
                $sess = array();

                $db = $ci->db->where('email', $email)
                    ->where('password', md5($password))
                    ->join('user_levels', 'user_levels.id=users.user_level_id', 'left')
                    ->get('users');

                $sess = $db->row_array();


                $ci->session->set_userdata($sess);
            }
            //============VALIDASI PASSWORD===========================

        }
        //============VALIDASI EMAIL===========================




        return $error_message;
    }


    function is_login()
    {

        return $this;
    }
}
