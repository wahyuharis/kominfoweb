<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{

    private $title = "Galery";
    private $crud = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');


        $this->load->library('Auth');
        $auth = new Auth();
        $auth->is_logged_in();

        // $data=array('a','n');
        // $this->session->set_userdata('temp_image',$data);
        // $temp_image = $this->session->userdata('temp_image');

        // if(is_array($temp_image)){
        //     echo "true";
        // }

        // die();
    }

    public function index()
    {

        $crud = new grocery_CRUD();
        $this->crud = $crud;

        $crud->unset_bootstrap();
        $crud->unset_jquery();

        $crud->set_theme('bootstrap');
        $crud->set_table('galleries');


        $crud->columns('actions', 'id', 'caption', 'image');
        $crud->fields('caption', 'image');

        $crud->display_as('caption', 'Caption');
        $crud->display_as('image', 'Foto Grub');
        $crud->unset_operations();


        $crud->callback_column('image', array($this, '_callback_image'));
        $crud->callback_column('actions', array($this, '_callback_actions'));

        $crud->set_subject('Galeri');

        $output = $crud->render();

        $content_data['output'] = $output->output;
        $content_data['state'] = $crud->getState();


        $content = $this->load->view('admin/galery/galery', $content_data, true);

        $template_data['content'] = $content;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;
        $template_data['box'] = false;

        $this->load->view('admin/template', $template_data);
    }

    public function _callback_image($value, $row)
    {

        $html = '<img src="' . base_url('/assets/uploads/files/' . $value) . '" width="50" height="50" >';

        return $html;
    }


    public function _callback_actions($value, $row)
    {
        $edit = "<a class='btn btn-xs btn-warning' href='" . base_url('admin/galery/edit/' . $row->id) . "'>
        <i class='fa fa-pencil'></i>
        edit</a>";

        $delete = " <a class='btn btn-xs btn-danger' href='" . base_url('admin/galery/delete/' . $row->id) . "'>
        <i class='fa fa-trash'></i>
        delete</a>";

        return $edit . " " . $delete;
    }


    function upload()
    {
        $success = false;
        $message = "";
        $data = array();

        $config['upload_path']          = './assets/uploads/files';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $success = true;
            $data = json_encode($this->upload->data());
        } else {
            $success = false;
            $message = $this->upload->display_errors();
        }

        $response['success'] = $success;
        $response['message'] = $message;
        $response['data'] = $data;
        header_json();
        echo json_encode($response);
    }

    function upload2()
    {
        $success = false;
        $message = "";
        $data = array();

        $config['upload_path']          = './assets/uploads/files';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $success = true;
            $data = json_encode($this->upload->data());
        } else {
            $success = false;
            $message = $this->upload->display_errors();
        }

        $response['success'] = $success;
        $response['message'] = $message;
        $response['data'] = $data;
        header_json();
        echo json_encode($response);
    }

    function delete_image($file)
    {
        unlink("./assets/uploads/files/" . $file);
    }

    function add()
    {
        $this->edit(null);
    }
    function edit($id = null)
    {

        $title_act = "Tambah";
        if ($id) {
            $title_act = "Edit";
        }

        $content = "";
        $content_data = array();
        $content_data['primary_id'] = $id;
        $content_data['caption'] = '';
        $content_data['image'] = '';
        $content_data['image2'] = '[]';

        if (!empty(trim($id))) {
            $db = $this->db->where('galleries.id', $id)
                ->get('galleries');

            $db2 = $this->db->select('image')->where('id_galeries', $id)
                ->get('galleries_child');

            $image2 = array();
            foreach ($db2->result_array() as $row) {
                array_push($image2, $row['image']);
            }

            $image2 = json_encode($image2);

            // print_r2($image2);

            if ($db->num_rows() > 0) {
                $result = $db->row_object();

                $content_data['caption'] = $result->caption;
                $content_data['image'] = $result->image;
                $content_data['image2'] = $image2;
            }
        }



        $content = $this->load->view('admin/galery/galery_edit', $content_data, true);


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

        $primary_id = ($post['primary_id']);

        $this->load->library('form_validation');
        $this->form_validation->set_data($post);

        $this->form_validation->set_rules('caption', ucwords('caption'), 'trim|required');
        $this->form_validation->set_rules('image', ucwords('image'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $message = validation_errors();
            $error = $this->form_validation->error_array();
            $succes = false;
        }




        if ($succes) {
            $insert['caption'] = $post['caption'];
            $insert['image'] = $post['image'];
            $image2 = json_decode($post['image2']);

            // print_r2($image2);

            if (empty(trim($primary_id))) {


                $this->db->insert('galleries', $insert);
                $insert_id=$this->db->insert_id();

                $insert2 = array();
                foreach ($image2 as $row) {
                    $insert2['id_galeries'] = $insert_id;
                    $insert2['image'] = $row;
                    $this->db->insert('galleries_child', $insert2);
                }

                $message = "Data Berhasil disimpan";
            } else {
                $this->db->where('id', $primary_id);
                $this->db->set($insert);
                $this->db->update('galleries');

                $this->db->delete('galleries_child', ['id_galeries' => $primary_id]);
                $insert2 = array();
                foreach ($image2 as $row) {
                    $insert2['id_galeries'] = $primary_id;
                    $insert2['image'] = $row;
                    $this->db->insert('galleries_child', $insert2);
                }
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
}
