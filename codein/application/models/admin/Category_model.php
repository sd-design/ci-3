<?php
class Category_model extends CI_Model {
  public function __construct(){
                     parent::__construct();

  }
public function list_cat(){
  $query = $this->db->get('category');
  return $query->result();

}

    public function edit_cat($id){
        $sql = "SELECT * FROM category WHERE ID = ? LIMIT 1";
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
  }
