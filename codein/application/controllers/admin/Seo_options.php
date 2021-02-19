<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_options extends CI_Controller {

    /**
     * Dashboard Category
     */

     public function __construct(){
                        parent::__construct();
                        $this->load->helper('form');
                        $this->load->model('admin/Admin', 'Admin');
                        $this->load->model('admin/Option_model', 'opt');
                        $user = $this->session->username;

        if($this->Admin->check_auth($user) == true){

        }
        else{
          redirect('/admin/login/');
        }
                      }


    public function index()
    {
      $data['list_meta'] = $this->opt->list_meta();
        $this->load->view('admin/seo_options', $data);
    }

    public function new(){
        $this->load->view('admin/category_new');
    }
    public function save(){
        $data['answer'] = $this->opt->opt_save();
    }
    public function edit($id){
        $data['edit_cat'] = $this->opt->opt_edit($id);
        $this->load->view('admin/opt_edit', $data);
    }
}
