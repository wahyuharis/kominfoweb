<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['use_page_numbers'] = TRUE;
$config['query_string_segment'] = 'page';
$config['page_query_string'] = TRUE;
$config['reuse_query_string'] = true;

$config['next_link']        = 'Next';
$config['prev_link']        = 'Prev';
$config['first_link']       = 'First';
$config['last_link']        = 'Last';
$config['full_tag_open']    = '<ul class="pagination justify-content-center">';
$config['full_tag_close']   = '</ul>';
$config['attributes']       = ['class' => 'page-link'];
$config['first_tag_open']   = '<li class="page-item">';
$config['first_tag_close']  = '</li>';
$config['prev_tag_open']    = '<li class="page-item">';
$config['prev_tag_close']   = '</li>';
$config['next_tag_open']    = '<li class="page-item">';
$config['next_tag_close']   = '</li>';
$config['last_tag_open']    = '<li class="page-item">';
$config['last_tag_close']   = '</li>';
$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
$config['num_tag_open']     = '<li class="page-item">';
$config['num_tag_close']    = '</li>';
