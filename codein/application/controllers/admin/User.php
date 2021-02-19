<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    /**
     * Admin part User functions
     */

public function __construct(){
         parent::__construct();
         $this->load->model('admin/Admin', 'Admin');
     }

    public function index()
    {
        $this->Admin->hello();
    }

    public function forgetpassword(){

    }
    public function passwordreset(){

    }
    public function new_user(){
      echo 'new user';
    }
    public function save_user(){
      echo 'save user';
    }
    public function token(){
      //Проверка библиотеки Encryption
      $user = "chessman@yandex.ru";
      $dec = 'fbef62b4f4bb4c6d46e753c9029b59f4e8614435920bf47357766424b0efd1fcca42ecd9cf67316d50e304b9fa877946a88aecd61924c3351ea82fa61abe9011tojms7rm+M/STZvmtez7s14SmS41EIs9gS7E4k8KTLwKAKduSsn4dUyqltUyG0Z2';
      echo $this->Admin->enc($user);
      echo '<br><br>';
      echo $this->Admin->dec($dec);
    }
}
