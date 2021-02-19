<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tech extends CI_Controller
{

    /**
     * Adminpanel Dashboard
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/Admin', 'Admin');
        $this->load->model('admin/Tech_model', 'Tech');
        $user = $this->session->username;

        if ($this->Admin->check_auth($user) == true) {

        } else {
            redirect('/admin/login/');
        }
    }


    public function index()
    {
        $this->load->view('admin/tech');
    }
    public function list_dbs()
    {
        $this->Admin->preOutput($this->Tech->listDbs());
    }
    public function fields_table($table)
    {

        $this->Admin->preOutput($this->Tech->getFieldsTable($table));
    }

    public function list_tables()
    {

        $this->Admin->preOutput($this->Tech->listTables());
    }
}



