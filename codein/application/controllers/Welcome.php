<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *	 GENERAL controller class
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funs');
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
