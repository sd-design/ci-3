<?php
class Posts_model extends CI_Model {

   private $table = 'posts';
    


    public function create_post(){

    }


    public function update_post(){
        
    }

     public function delete_post(){
        
    }


     public function get_posts(){
        $query = $this->db->get($this->table);
        return $query->result();
    }

}