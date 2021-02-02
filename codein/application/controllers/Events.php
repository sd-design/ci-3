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
        $prefs = array(
            'start_day'    => 'monday',
            'month_type'   => 'long',
            'day_type'     => 'abr'
        );
        $prefs['template'] = '

        {table_open}<table class="table table-sm">{/table_open}

        {heading_row_start}<thead class="table-light"><tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr></thead>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td class="text-center">{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td class="border text-center">{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<div class="highlight text-center bg-info gray-100"><a href="{content}" target="_blank" class="text-white stretched-link">{day}</a></div>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight text-center bg-info gray-100"><a href="{content}" class="text-white stretched-link">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight text-center bg-light gray-100">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
';

        $this->load->library('calendar', $prefs);
    }
	public function index()
	{
		$data['title'] = "Events Index";
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
