<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Index Page for this controller.

	 */
	 public function __construct()
			 {
				 parent::__construct();
							 $this->load->model('Funs');
			 }

	public function index()
	{
		$response = array('Api'=> 'version 1.0.1','status' => 'OK');

$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
exit;
	}


public function add_user()
{
$response = $this->Funs->add_user();
$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
exit;
}

}
