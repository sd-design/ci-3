<?php
class Admin extends CI_Model {
  public function __construct(){
                     parent::__construct();
                     $this->load->database();
                     $this->load->library('session');
                     $this->load->helper('language');
                     $this->lang->load('admin');
  }

public function hello(){
    $response = array('Model' => 'Admin', 'version'=>'1.0.1');

$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
exit;
}
public function enc($data){
  $this->load->library('encryption');
  return $this->encryption->encrypt($data);
}
public function dec($data){
  $this->load->library('encryption');
  return $this->encryption->decrypt($data);
}
public function check_user($login){
  if (!$this->db->simple_query('SELECT login FROM users WHERE login="'.$login.'" LIMIT 1')){
    $error = $this->db->error();
    return false;
}
else{
$query = $this->db->query('SELECT login FROM users WHERE login="'.$login.'" LIMIT 1');
if ($query->result() == null)
{
  return false;
}else{
  $row = $query->row();
 $user = $row->login;
if($user === $login){
  return true;
}
else{return false;}
}

}

}

public function check_pwd($login, $pwd){
  $db_hash = $this->get_hash($login);
  if (password_verify($pwd, $db_hash)) {
      return true;
  } else {
      return false;
  }
}

public function get_hash($login){
  $query = $this->db->query('SELECT pwd FROM users WHERE login="'.$login.'" LIMIT 1');

foreach ($query->result() as $row)
{
        $hash = $row->pwd;
}
return $hash;
}

//Save in session logIn user
public function save_loggin($user){
  $token = $this->enc($user.";loggedIN");
  $newdata = array(
        'username'  => $user,
        'token'     => $token,
        'logged_in' => TRUE
);
$this->session->set_userdata($newdata);

}
public function check_auth($user){
if($this->session->logged_in == TRUE){

  $user = $this->session->username;
  $token = explode(";", $this->dec($this->session->token));
  if($token[0] === $user && $token[1]==='loggedIN'){
return true;
  }
}
else{
   redirect('/admin/login/');
}

}

public function list_status(){
    $query = $this->db->get('status');
    return $query->result();
}

public function preOutput($data){

      echo "<pre>";
      print_r($data);
      echo "</pre>";

}

}
