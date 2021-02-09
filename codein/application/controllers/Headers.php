<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Headers extends CI_Controller {

 public function index()
    {
        $this->output->set_header('X-Powered-By: SD-engine');
        $this->output->set_header('X-Powered-CMS: SD-engine v2');
    }

//END class
}

?>