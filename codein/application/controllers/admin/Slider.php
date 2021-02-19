<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

    /**
     * Dashboard Category
     */

     public function __construct(){
                        parent::__construct();
                        $this->load->helper('form');
                        $this->load->model('admin/Admin', 'Admin');
                        $this->load->model('AdminApi', 'Api');
                        $user = $this->session->username;

        if($this->Admin->check_auth($user) == true){

        }
        else{
          redirect('/admin/login/');
        }
                      }


    public function index()
    {
      $data['slider'] = $this->Api->get_home_slider();
        $this->load->view('admin/slider', $data);
    }

    public function new(){
      $this->load->view('admin/slider_new');
    }
    public function save(){
      $data['answer'] = $this->Api->save_slide();
        redirect('/admin/slider/');
    }
    public function edit($id){
      $data['slide'] = $this->Api->get_slide($id);
      $this->load->view('admin/slider_edit',$data);
    }
    public function update(){

    }
    public function status_change(){
        $ID = $_POST['id'];
        $status = $_POST['status'];
        $this->Api->status_slide($ID, $status);
        $response = array('response'=>true);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }
    public function delete($id)
    {
        $this->Api->delete_slide($id);
        redirect('/admin/slider/');
    }
    public function active()
    {

    }
}
