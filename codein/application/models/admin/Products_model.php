<?php
class Products_model extends CI_Model {
  public function __construct(){
                     parent::__construct();

  }
public function list_cat(){
  $query = $this->db->get('category');
  return $query->result();

}
public function list_products(){
  $query = $this->db->get('products');
  return $query->result();
}

public function listProductsByType($type_id){
    $query = $this->db->get_where('products', array('type_id' => $type_id));
    return $query->result();
    }
public function listType(){
        $query = $this->db->get('products_type');
        return $query->result();

    }
    public function edit_prod($id){
        $sql = "SELECT * FROM products WHERE ID = ? LIMIT 1";
        $query = $this->db->query($sql, array($id));
        return $query->result();
        return $query->result();

    }

    public function list_discounts(){
        $query = $this->db->get('discounts');
        return $query->result();

    }

  }
