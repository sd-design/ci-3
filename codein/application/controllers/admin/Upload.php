<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('admin/Admin', 'Admin');
    $user = $this->session->username;
    if($this->Admin->check_auth($user) == true){

    }
    else{
      redirect('/admin/login/');
    }
  }

  public function index(){

    // Check form submit or not
    if($this->input->post('upload') != NULL ){

        $data = [];

        $count = count($_FILES['files']['name']);

        for($i=0;$i<$count;$i++){

            if(!empty($_FILES['files']['name'][$i])){

                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                $config['upload_path'] = 'upload/iblock/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '7000';
                $config['file_name'] = $_FILES['files']['name'][$i];

                $this->load->library('upload');
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];

                    $data['totalFiles'][] = $filename;
                    //echo $_FILES['files']['name'][$i]."<br>";
                }
            }

        }
      //phpinfo(); exit;
      $response = array('response'=> true, 'status'=>'true', 'files'=> $data['totalFiles']);
   $this->output
              ->set_status_header(200)
              ->set_content_type('application/json', 'utf-8')
              ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
              ->_display();
      exit;
    }
    else{
        $response = array('response'=> false, 'status'=>'failed');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

  }

  public function slider(){

    if($this->input->post('upload') != NULL ){
            if(!empty($_FILES['file']['name'][0])){
                $config['upload_path'] = 'upload/slider/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '1000';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    $filename = $this->upload->data('file_name');
                }



  $response = array('response'=> true, 'status'=>'true', 'filename'=> $filename);
   $this->output
              ->set_status_header(200)
              ->set_content_type('application/json', 'utf-8')
              ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
              ->_display();
      exit;
    }
    }
    else{
        $response = array('response'=> false, 'status'=>'failed', 'filename'=> $_FILES['file']['name']);
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }
  }

// END class
}
