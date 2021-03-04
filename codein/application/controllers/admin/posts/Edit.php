<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {


    /**
     * Adminpanel Edititng posts (blog, news, pages)
     */

     public function __construct(){
                        parent::__construct();
                        $this->load->helper('form');
                        $this->load->model('admin/Admin', 'Admin');
                        $this->load->model('admin/Posts_model', 'Posts');
                        $user = $this->session->username;

        if($this->Admin->check_auth($user) == true){

        }
        else{
          redirect('/admin/login/');
        }
                      }

public function index(){
    $data['listPosts'] = $this->Posts->get_posts();
    echo "liST of POSTs";

}
//END
}