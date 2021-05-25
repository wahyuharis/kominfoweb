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


    function is_logged_in()
    {
        $ci = &get_instance();

        $email = $ci->session->userdata('email');
        $password = $ci->session->userdata('password');

        $db = $ci->db->where('email', $email)
            ->where('password', $password)
            ->get('users');

        if ($db->num_rows() < 1) {
            $ci->session->set_flashdata('error_message', "Maaf Anda Belum Login");
            redirect('login');
        }

        return $this;
    }

    function is_administrator()
    {
        //Administrator //user_level

        $ci = &get_instance();
        $user_level=$ci->session->userdata('user_level');

        if (!(strtolower($user_level) == strtolower('administrator'))) {
            //pass
            redirect('home');
        }
        
    }
    function is_editing()
    {
        //Administrator //user_level

        $ci = &get_instance();
        $user_level=$ci->session->userdata('user_level');

        if (!(strtolower($user_level) == strtolower('editing'))) {
            //pass
            redirect('home');
        }
    }
}
