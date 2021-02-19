<?php
class Option_model extends CI_Model {
  public function __construct(){
      parent::__construct();
      $this->load->library('form_validation');

  }
public function list_meta(){
  $query = $this->db->get('meta_tags');
  return $query->result();

}

    public function opt_edit($id){
        $sql = "SELECT * FROM meta_tags WHERE ID = ? LIMIT 1";
        $query = $this->db->query($sql, array($id));
        return $query->result();
    }

    public function cat_save(){
      $data = array(
        'title' => $_POST['title'],
        'link' => $_POST['link'],
        'active' => $_POST[''],
        'sort' => $_POST['sort']
      );
      $this->db->insert('category', $data);
      echo "true";
    }
/*
 * Edit user of admin panel
 */
public function user_edit($id){
    $sql = "SELECT * FROM users WHERE ID = ? LIMIT 1";
    $query = $this->db->query($sql, array($id));
    return $query->result();
}

    /* save new user after validation*/
public function save_new_user(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
    $this->form_validation->set_rules('access', 'Access level', 'required');
    if ($this->form_validation->run() == FALSE)
    {

        $data['accessLevels'] = $this->access_list();
        $this->load->view('admin/new_user', $data);
    }
    else
    {
        $dataIN = array(
            'login'=> $_POST['email'],
            'pwd' => $this->pwd_hash($_POST['password']),
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'restore_key'=>'',
            'user_level' => $_POST['access']
        );
        $this->db->insert('users', $dataIN);
        $data['message'] = "New user was created";
        $this->load->view('admin/action', $data);
    }



}

    /* save edit data of user after validation*/
public function save_user(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        //$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        //$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('access', 'Access level', 'required');
        if ($this->form_validation->run() == FALSE)
        {

            $data['accessLevels'] = $this->access_list();
            $this->load->view('admin/save_user', $data);
        }
        else
        {
            if(empty($_POST['password']) or empty($_POST['passconf'])){
                $dataIN = array(
                    'login'=> $_POST['email'],
                    'name' => $_POST['name'],
                    'lastname' => $_POST['lastname'],
                    'user_level' => $_POST['access']
                );

            }
            else{
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
                if ($this->form_validation->run() == FALSE)
                {

                    $data['accessLevels'] = $this->access_list();
                    $this->load->view('admin/save_user', $data);
                }
                else {

                    $dataIN = array(
                        'login' => $_POST['email'],
                        'pwd' => $this->pwd_hash($_POST['password']),
                        'name' => $_POST['name'],
                        'lastname' => $_POST['lastname'],
                        'restore_key' => '',
                        'user_level' => $_POST['access']
                    );
                }
            }

            $this->db->replace('users', $dataIN);
            $data['message'] = "User data was updated";
            $this->load->view('admin/action', $data);
        }



    }

/*
 * Create hash pwd from password input
 */
    private function pwd_hash($pwd){

        return password_hash($pwd, PASSWORD_BCRYPT);

    }

    /*
     * Access level is define level of access for user
     */

    public function access_list(){
        $sql = "SELECT * FROM access_levels";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function check_access($id){
        $sql = "SELECT * FROM access_levels WHERE ID = ? LIMIT 1";
        $query = $this->db->query($sql, array($id));
        return $query->row();
    }


  }
