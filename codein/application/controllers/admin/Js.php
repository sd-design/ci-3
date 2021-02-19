<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Js extends CI_Controller {

    /**
     * Admin Javascripts
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
        $this->Admin->hello();
    }

public function orders(){
    $response = $this->get_code('orders');
    $this->output
            ->set_status_header(200)
            ->set_content_type('text/javascript')
            ->set_output($response)
            ->_display();
        exit;
    }

    public function get_code($template){
        $this->load->library('parser');
        $data = array();
        $page = $this->parser->parse('js/'.$template, $data, TRUE);
        return $page;

    }

}
