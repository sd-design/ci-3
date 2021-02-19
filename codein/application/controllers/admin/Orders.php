<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    /**
     * Dashboard Category
     */

     public function __construct(){
                        parent::__construct();
                        $this->load->helper('form');
                        $this->load->model('admin/Admin', 'Admin');
                        $this->load->model('admin/Products_model', 'Prod');
                        $user = $this->session->username;

        if($this->Admin->check_auth($user) == true){

        }
        else{
          redirect('/admin/login/');
        }
                      }


    public function index()
    {
        $data['select_list'] = $this->Admin->list_status();
          $this->load->view('admin/orders', $data);
    }

    public function get($id){
         echo $id;
    }

    public function put($id){
        echo "Put ".$id;
    }

    public function delete($id){
        echo "Delete ".$id;
    }


}
