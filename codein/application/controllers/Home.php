<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funs', 'fun');
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
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<a href="{content}" target="_blank">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

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
        $this->load->view('welcome_message');
    }

public function calendar($year = 2021, $month = 1)
{
    $this->load->library('calendar');
    if(!isset($year)){

echo $this->calendar->generate();
}
else{

    $data = array(
        3  => 'http://example.com/news/article/2006/06/03/',
        7  => 'http://example.com/news/article/2006/06/07/',
        13 => 'http://example.com/news/article/2006/06/13/',
        26 => 'http://example.com/news/article/2006/06/26/'
);
            $data['calendar'] = $this->calendar->generate($year, $month, $data);
            $this->load->view('calendar', $data);
}
}

//END Class
}

