<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Options extends CI_Controller {

    /**
     * Dashboard Options of Shop:
     * Users and etc.
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
        $this->load->view('admin/options', $data);
    }

    public function new_user(){
         $data['accessLevels'] = $this->opt->access_list();
        $this->load->view('admin/new_user', $data);
    }
    public function save_new_user(){
        $data['answer'] = $this->opt->save_new_user();
    }
    //Save edit data of user
    public function save_user(){
        $data['answer'] = $this->opt->save_user();
    }
    public function save(){
        $data['answer'] = $this->opt->opt_save();
    }

    public function edit_user($id){
        $data['user'] = $this->opt->user_edit($id);
        $data['accessLevels'] = $this->opt->access_list();
        $this->load->view('admin/edit_user', $data);
    }

    /*
     * Check access by ID
     */
    public function check_access($id){
        $access = $this->opt->check_access($id);
$options = json_decode($access->options);
echo $options->options;
    }
}
