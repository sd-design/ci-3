<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    /**
    *  login in Admin part API
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminApi', 'api');
        $this->load->model('admin/Admin', 'Admin');
        $user = $this->session->username;

        if($this->Admin->check_auth($user) == true){

        }
        else{
            redirect('/admin/login/');
        }
    }
public function index()
    {
        $this->api->hello();
    }

public function signin()
    {
        $this->api->signin();
    }

public function create_hash($pwd){

      echo password_hash($pwd, PASSWORD_BCRYPT);

    }
public function check_hash(){
      $old_hash = '$2y$10$gNF1oIrtn5jNIAHv5TE9J.DXuZIJHlSOlRp8uZSGHJcdiLGPl6oXm';

      if (password_verify('rogerthat', $old_hash)) {
          echo 'Password is valid!';
      } else {
          echo 'Invalid password.';
      }

    }

public function list_orders()
    {
        $response = $this->api->list_orders();
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
            ->_display();
        exit;
    }
public function order()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $response = $this->api->get_order($id);
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
                ->_display();
            exit;
        }
        else{
            $response = array("response"=>'no id of order');
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
                ->_display();
            exit;
        }
    }

public function order_status($id){
$response = $this->api->get_order_status($id);
    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
        ->_display();
    exit;
}

public function save_comment(){
        if($_POST){
            $id = $_POST['ID'];
            $note = $_POST['note'];
            $this->api->save_order_comment($id, $note);
        }
        else{
            $response =array('response'=>'no data');
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
                ->_display();
            exit;
        }

}

public function save_status(){
        if($_POST){
            $id = $_POST['ID'];
            $status = $_POST['status'];
            $this->api->save_order_status($id, $status);
        }
        else{
            $response =array('response'=>'no data');
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
                ->_display();
            exit;
        }

    }
    public function get_status($id){
        if($id ){
            $status = $this->api->get_status($id);
            $response =array('response'=>true, 'status'=> $status);
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
                ->_display();
            exit;
        }
        else{
            $response =array('response'=>false);
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
                ->_display();
            exit;
        }

    }
/*
 * USERS api for options part of admin panel  [/admin/Options]
 */
    public function users_list(){
        $response = $this->api->users_list();
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
            ->_display();
        exit;
    }

/*
 * Number of news per page for options part of admin panel  [/admin/Options]
 */
    public function option_qty_news(){
        $response = $this->api->option_qty_news();
        $this->output
            ->set_status_header(200)
            ->set_content_type('text/plain', 'utf-8')
            ->set_output($response->primary_value)
            ->_display();
        exit;
    }

/*
* Save number of news per page for options part of admin panel  [/admin/Options]
*
*/
    public function save_qty_news(){
        $qty = $_POST['qty'];
        $response = $this->api->save_qty_news($qty);
        $output = array('answer'=>$response);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
            ->_display();
        exit;
    }

}
