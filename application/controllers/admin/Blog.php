<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    private $title = "Blog";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        //    print_r2(  $this->session->userdata() );
        //    die();

        $this->load->library('Auth');
        $auth = new Auth();
        $auth->is_logged_in();
    }

    public function index()
    {

        $search_field = $this->input->post('search_field');
        $search_text = $this->input->post('search_text');

        $tanggal = "";
        if (is_array($search_field)) {
            $key = '';
            foreach ($search_field as $kf => $f) {
                if ($f == 'date') {
                    $key = $kf;
                }
            }
            if (strlen($key) > 0) {
                $tanggal = $search_text[$key];
                unset($_POST['search_field'][$key]);
                unset($_POST['search_text'][$key]);
            }
            if (count($_POST['search_field']) < 1) {
                unset($_POST['search_field']);
                unset($_POST['search_text']);
            }
        }


        //##### inisiasi ##################
        $crud = new grocery_CRUD();
        $crud->unset_bootstrap();
        $crud->unset_jquery();
        // $crud->unset_texteditor('content');

        // $crud->unset_jquery_ui();
        $crud->set_theme('bootstrap');
        //##### inisiasi ##################

        $crud->set_table('feeds');

        $crud->where('deleted_at', null);
        if (strlen($tanggal) > 0) {
            $crud->like("date_format(date,'%d/%m/%Y')", $tanggal);
        }

        $crud->columns('actions', 'id', 'category', 'title', 'date', 'date_publish','user_id');
        $crud->fields('title', 'slug', 'deskripsi', 'kata_kunci', 'image', 'content',  'date', 'user_id');
        $crud->display_as('category', 'Type');
        $crud->display_as('title', 'Judul');
        $crud->display_as('content', 'Konten');
        $crud->display_as('image', 'Image');
        $crud->display_as('date', 'Tanggal');
        $crud->display_as('date_publish', 'Jadwal Publikasi');
        $crud->display_as('user_id', 'User');
        // $crud->unset_operations();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();

        $crud->set_relation('user_id', 'users', 'email');
        $crud->callback_field('user_id', array($this, '_callback_user_id'));
        $crud->callback_column('actions', array($this, '_callback_actions'));
        $crud->callback_column('category', array($this, '_callback_category'));

        $crud->set_subject('Blog');
        $crud->set_field_upload('image', 'assets/uploads/files');
        $crud->required_fields('title', 'slug', 'image', 'date');


        if ($crud->getstate() == 'insert_validation') {
            $crud->set_rules('slug', 'Slug', 'trim|required|is_unique[feeds.slug]');
        }

        $crud->callback_before_update(array($this, '_callback_before_update'));
        $crud->callback_before_insert(array($this, '_callback_before_update'));


        $output = $crud->render();

        // print_r2($output);

        $view_data['output'] = $output->output;
        $content = $this->load->view('admin/blog/blog', $view_data, true);

        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;
        $template_data['box'] = False;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_category($value, $row){
        $html="";

        if(trim($value)=='Berita'){
            $html.='<span class="label label-primary" >'.$value.'</span>';
        }else{
            $html.='<span class="label label-warning" >'.$value.'</span>';

        }

        return $html;

    }

    function _callback_user_id($value = '', $primary_key = null)
    {
        $field = '<input type="hidden" value="' . $this->session->userdata('id') . '" name="user_id" >';
        // $field = '<input type="text" value="' . $this->session->userdata('email') . '" readonly="" class="form-control" >';
        $field .= '<label style="margin-top:7px" >' . $this->session->userdata('email') . '</label>';
        // $field.='<p>'.$this->session->userdata('fullname').'</p>';
        return $field;
    }

    function _callback_before_update($post_array, $primary_key = null)
    {

        return $post_array;
    }

    public function _callback_actions($value, $row)
    {

        $html = '<div style="width:120px" >';
        $html .= "<a class='btn btn-xs btn-warning' href='" . base_url('admin/blog/edit/' . $row->id) . "'>
        <i class='fa fa-pencil'></i>
        edit</a> ";

        $html .= "<a class='btn btn-xs btn-danger'  " .
            ' href="#" onclick="delete_validation(' . $row->id . ')" > ' .
            "<i class='fa fa-trash'></i>" .
            "delete</a>";
        $html .= '</div>';

        return $html;
    }
    function delete($id)
    {
        $this->db
            ->set(['deleted_at' => date('Y-m-d H:i:s')])
            ->where('id', $id)
            ->update('feeds');
    }

    function add()
    {
        $this->edit();
    }
    function edit($id = "")
    {
        $title_act = "Tambah";
        if ($id) {
            $title_act = "Edit";
        }

        $content = "";
        $content_data = array();
        $content_data['primary_id'] = $id;
        $content_data['date'] = date('d/m/Y');
        $content_data['date_publish'] ='';
        $content_data['category'] = 'Berita';
        $content_data['title'] = '';
        $content_data['slug'] = '';
        $content_data['deskripsi'] = '';
        $content_data['kata_kunci'] = '';
        $content_data['content'] = '';
        $content_data['image'] = '';
        $content_data['category'] = '';
        $content_data['category_opt'] = array('Berita' => 'Berita', 'Draft' => 'Draft');

        if (!empty(trim($id))) {
            $db =  $this->db
                ->where('feeds.id', $id)
                ->get('feeds');

            if ($db->num_rows() > 0) {
                $content_data['date'] = waktu_ymd_to_dmy($db->row_object()->date);
                $content_data['date_publish'] =waktu_ymd_to_dmy($db->row_object()->date_publish);
                $content_data['category'] = $db->row_object()->category;

                $content_data['title'] = $db->row_object()->title;
                $content_data['slug'] = $db->row_object()->slug;
                $content_data['deskripsi'] = $db->row_object()->deskripsi;
                $content_data['kata_kunci'] = $db->row_object()->kata_kunci;
                $content_data['image'] = $db->row_object()->image;
                $content_data['content'] = $db->row_object()->content;
            }
        }

        $content = $this->load->view('admin/blog/blog_edit', $content_data, true);


        $template_data['content'] = $content;
        $template_data['content_title'] = $title_act . " " . $this->title;
        $template_data['box'] = false;

        $this->load->view('admin/template', $template_data);
    }

    function submit()
    {
        $message = '';
        $succes = true;
        $data = array();
        $error = array();
        $post = $this->input->post();

        // print_r2($post);

        $primary_id = trim($this->input->post('primary_id'));

        $this->load->library('form_validation');
        $this->form_validation->set_data($post);

        $this->form_validation->set_rules('title', ucwords('title'), 'trim|required');
        $this->form_validation->set_rules('date', ucwords('date'), 'callback_date_check');
        $this->form_validation->set_rules('image', ucwords('image'), 'trim|required');
        $this->form_validation->set_rules('slug', ucwords('slug'), 'callback_slug_check');
        $this->form_validation->set_rules('content', ucwords('content'), 'trim|required');

        if ($this->input->post('category') == 'Draft') {
            $this->form_validation->set_rules('date_publish', ucwords('Jadwal Publikasi'), 'trim|required');
        }

        if ($this->form_validation->run() == FALSE) {
            $message = validation_errors();
            $error = $this->form_validation->error_array();
            $succes = false;
        }

        if ($succes) {
            $insert['title'] = $post['title'];
            $insert['date'] = waktu_dmy_to_ymd($post['date']);
            $insert['date_publish'] = waktu_dmy_to_ymd($post['date_publish']);
            $insert['image'] = $post['image'];
            $insert['slug'] = trim($post['slug']);
            $insert['content'] = $post['content'];
            $insert['deskripsi'] = $post['deskripsi'];
            $insert['kata_kunci'] = $post['kata_kunci'];
            $insert['category'] = $post['category'];

            if (empty(trim($primary_id))) {
                $insert['user_id'] = $this->session->userdata('id');

                $this->db->insert('feeds', $insert);
                $insert_id = $this->db->insert_id();
            } else {
                $insert_id = $primary_id;
                $this->db->where('id', $primary_id);
                $this->db->set($insert);
                $this->db->update('feeds');
            }
        }


        $this->session->set_flashdata('message_succes', $message);

        $result = array(
            'error' => $error,
            'message' => $message,
            'succes' => $succes,
            'data' => $data,
        );

        header_json();
        echo json_encode($result);
    }
    public function slug_check($str)
    {
        $return = false;
        $primary_id = trim($this->input->post('primary_id'));
        $slug = '';
        $this->db->where('slug', trim($str));
        if (strlen($primary_id) > 0) {
            $this->db->where('id!=', $primary_id);
        }
        $db = $this->db->get('feeds');

        if ($db->num_rows() > 0) {
            $slug = $db->row_object()->slug;
        }

        if (empty(trim($str))) {
            $this->form_validation->set_message('slug_check', 'Field {field} kosong');
        } elseif (trim($slug) == trim($str)) {
            $this->form_validation->set_message('slug_check', 'Field {field} harus bernilai unik');
        } else {
            $return = true;
        }
        return $return;
    }

    function date_check($str)
    {
        $return = false;

        if (is_date_dmy($str)) {
            $return = true;
        } else {
            $this->form_validation->set_message('date_check', 'Field {field} Tidak Valid');
        }

        return $return;
    }
}
