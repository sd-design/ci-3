<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funs', 'fun');
    }
    public function index()
    {
        echo $this->input->user_agent();
        $this->load->view('welcome_message');
    }


//END Class
}

