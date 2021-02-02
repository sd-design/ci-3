<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

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
		$data['title'] = "Events Index";
        $this->load->view('events', $data);
	}
    public function year(int $year = null)
    {
        $data['title'] = "Events of ".$year." year";
        $this->load->view('events', $data);
    }
    public function month(int $year = null, int $month = null)
    {
        $data['title'] = "Events of " . $year . " year and ".$month."-th month";
        $this->load->view('events', $data);
    }
    public function day(int $year = null, int $month = null, int $day = null)
    {
        $data['title'] = "Events of " . $year . " year and " . $month . "-th month by ".$day." day";
        $this->load->view('events', $data);
    }
}
