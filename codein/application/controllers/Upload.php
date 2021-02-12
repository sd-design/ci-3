<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    /**
     * Upload CI example
     */

    public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }


    public function index(){
        $this->load->view('upload_form');
    }

    public function multi(){
        $this->load->view('upload_multi');
    }
    

    public function do_upload()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            //$config['max_size']             = 100;
            $config['max_width']            = 5000;
            $config['max_height']           = 2650;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('upload_success', $data);
            }
    }
    public function do_upload_multi()
    {
        $count = count($_FILES['files']['name']);
    
        for($i=0;$i<$count;$i++){
      
          if(!empty($_FILES['files']['name'][$i])){

                
            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
            $_FILES['file']['size'] = $_FILES['files']['size'][$i];
    
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '5000';
            $config['file_name'] = md5(time());
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
     
              $data['totalFiles'][] = array('name'=>$filename);
            }
          }
     
        }
        foreach($data['totalFiles'] as $file){
            echo '<img src="'.base_url().'uploads/'.$file['name'].'" style="height: 150px;
            width: auto;
            display: inline-block;margin-right:10px" />';

        }
    }

//END class
}