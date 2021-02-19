<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    /**
     * Dashboard Category
     */

     public function __construct(){
                        parent::__construct();
                        $this->load->helper('form');
                        $this->load->model('admin/Admin', 'Admin');
                        $this->load->model('admin/Category_model', 'Cat');
                        $user = $this->session->username;

        if($this->Admin->check_auth($user) == true){

        }
        else{
          redirect('/admin/login/');
        }
                      }


    public function index()
    {
      $data['list_cat'] = $this->Cat->list_cat();
        $this->load->view('admin/category', $data);
    }

    public function new(){
        $this->load->view('admin/category_new');
    }
    public function save(){
        $data['answer'] = $this->Cat->cat_save();
    }
    public function edit($id){
        $data['edit_cat'] = $this->Cat->edit_cat($id);
        $this->load->view('admin/edit_category', $data);
    }
}
