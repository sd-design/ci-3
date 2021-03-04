<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funs extends CI_Model {

//Funs model
public function __construct()
			 {
							 $this->load->database();
			 }

public function add_user()
{
	$digits =rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9);
	$email = $digits.'@mail.ru';

	$this->db->trans_begin();
	$data = array(
		'name' => 'Alex',
		'lname' => 'Naghtigall',
		'descript' => 'Shabat Shalom',
		'email' => $email,
		'pwd' => 'fkd25555&jlkf323',
		'restore_key' => 'fkd25555&jlkf323'
	);

$query = $this->db->insert('front_users', $data);

$id_call = $this->db->query("SELECT LAST_INSERT_ID()");
$answer = $id_call->result_array();
//print_r($answer[0]); exit();

	if ($this->db->trans_status() === FALSE)
	{
	        return "error: ".$this->db->trans_rollback();
	}
	else
	{
	        return $answer[0]['LAST_INSERT_ID()'].": ".$this->db->trans_commit();
	}

}

public function prefCalendar(){
	$pref = '
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

	{table_close}</table>{/table_close}';
	return $pref;
}


}
