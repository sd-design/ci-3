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

$query = $this->db->insert('sd_users', $data);

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


}
