<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    /**
     * Dashboard Products
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
      $data['list_products'] = $this->Prod->list_products();
        $data['list_type'] = $this->Prod->listType();
        $this->load->view('admin/products', $data);
    }
    public function type($type_id)
    {
        $data['list_products'] = $this->Prod->listProductsByType($type_id);
        $data['list_type'] = $this->Prod->listType();
        $this->load->view('admin/products', $data);
    }

    public function new(){
      $data['list_cat'] = $this->Prod->list_cat();
        $data['list_type'] = $this->Prod->listType();
        $data['list_products'] = $this->Prod->listProductsByType(1);
        $data['list_discounts'] = $this->Prod->list_discounts();
        $this->load->view('admin/product_new', $data);
    }

    public function edit($id){
        $data['list_discounts'] = $this->Prod->list_discounts();
        $data['list_cat'] = $this->Prod->list_cat();
        $data['edit_prod'] = $this->Prod->edit_prod($id);
        $this->load->view('admin/edit_product', $data);
    }

    public function save(){
         $this->Prod->save_product();
        redirect('/admin/products/');//лучше сделать редирект на список продукции
    }

    public function test_upload()
    {
        //$this->load->view('admin/test_upload');//тестовая функция - УДАЛИТЬ НА ПРОДЕ
    }
}
