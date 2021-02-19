<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     *login in Admin part
     */
public function __construct(){
                   parent::__construct();
                   $this->load->helper('form');
                   $this->load->model('admin/Admin', 'Admin');
                 }

    public function index()
    {
        $this->load->view('admin/login');
    }
    //function of Sign in
    public function signin()
    {
      $user = $_POST['inputEmail'];
      $pwd = $_POST['inputPassword'];
      $check_user = $this->Admin->check_user($user);
      if($check_user == true){
        $check_pwd = $this->Admin->check_pwd($user, $pwd);
        if($check_pwd == true){
          $this->Admin->save_loggin($user);
          $response = array('response'=>true, 'status'=>'loggin', 'url'=>'dashboard', 'username'=> $user, 'token' => $this->session->token);
          $this->output
                  ->set_status_header(200)
                  ->set_content_type('application/json', 'utf-8')
                  ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                  ->_display();
          exit;
        }
        else{
          $response = array('response'=>false, 'error'=>'403');
          $this->output
                  ->set_status_header(200)
                  ->set_content_type('application/json', 'utf-8')
                  ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                  ->_display();
          exit;
        }
      }
        else{
          $response = array('response'=>false, 'error'=>'404');
          $this->output
                  ->set_status_header(200)
                  ->set_content_type('application/json', 'utf-8')
                  ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                  ->_display();
          exit;
        }
}
      //function of Logout

      public function out(){
        $this->session->sess_destroy();
        redirect('/admin/login/');
      }





}
