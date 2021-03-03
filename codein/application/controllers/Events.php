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
        $this->load->model('Funs', 'fun');
        $prefs = array(
            'start_day'    => 'monday',
            'month_type'   => 'long',
            'day_type'     => 'abr'
        );
        $prefs['template'] = $this->fun->prefCalendar();

        $this->load->library('calendar', $prefs);
    }
	public function index($year =2021)
	{
        $data['switchCal'] = TRUE;
        $data['calendar'] = '';
		$data['title'] = "Events Index";
        $data['calendarYear'] = $this->getYear($year);
        $this->load->view('events', $data);
	}
    public function year(int $year = null)
    {
        $data['title'] = "Events of ".$year." year";
        $data['calendar'] = '';
        $data['switchCal'] = TRUE;
        $data['calendarYear'] = $this->getYear($year);
        $this->load->view('events', $data);
    }
    public function month(int $year = null, int $month = null)
    {
        $data['title'] = "Events of " . $year . " year and ".$month."-th month";
        $data['switchCal'] = FALSE;
        $data['calendar'] = $this->calendar->generate($year, $month);
        $this->load->view('events', $data);
    }
    public function day(int $year = null, string $month = null, string $day = null)
    {
        $dataCal = array(
        intval($day)  => '/events/'.$year.'/'.$month.'/'.$day
        );
        $data['switchCal'] = FALSE;
        $data['calendar'] = $this->calendar->generate($year, $month, $dataCal);
        $data['title'] = "Events of " . $year . " year and " . $month . "-th month by ".$day." day";
        $this->load->view('events', $data);
    }

    private function getYear($year)
    {
        $yearData= array(
            1 => $this->calendar->generate($year, 1),
            2 => $this->calendar->generate($year, 2),
            3 => $this->calendar->generate($year, 3),
            4 => $this->calendar->generate($year, 4),
            5 => $this->calendar->generate($year, 5),
            6 => $this->calendar->generate($year, 6),
            7 => $this->calendar->generate($year, 7),
            8 => $this->calendar->generate($year, 8),
            9 => $this->calendar->generate($year, 9),
            10 => $this->calendar->generate($year, 10),
            11 => $this->calendar->generate($year, 11),
            12 => $this->calendar->generate($year, 12),
            
        );
        return $yearData;
    }
}
