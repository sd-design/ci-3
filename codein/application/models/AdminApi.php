<?php
class AdminApi extends CI_Model {

public function hello(){
    $response = array('Api' => 'Admin', 'version'=>'1.0.1');

$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
exit;
}

public function get_home_slider(){
  $query = $this->db->get('slider');
  return $query->result();
  //$response = $query->result();
  /* $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
          ->_display();
  exit;
  */
}

public function get_slide($id){
  $query = $this->db->get_where('slider', array('ID' => $id),1);
  return $query->result();
}
public function save_slide(){
    $sort='100';
    if(!isset($_POST['sort']) || $_POST['sort']!=''){$sort = $_POST['sort'];}
  $data = array(
    'title' => $_POST['title'],
    'link' => $_POST['link'],
    'image' => $_POST['new_image'],
    'active' => 'on',
    'sort' => $sort
  );
  $this->db->insert('slider', $data);
  //echo "true";
}

public function status_slide($id, $status){
    $this->db->set('active', $status);
    $this->db->where('id', $id);
    $this->db->update('slider');
}

//Delete slide

public function delete_slide($id){
    $this->db->where('id', $id);
    $this->db->delete('slider');
}

public function list_orders(){
    $query = $this->db->get('orders');
    return $query->result();
}

public function get_order($id){
    $this->db->where('ID', $id);
    $query = $this->db->get('orders');
    $row = $query->row();

    $this->db->where('ID', $row->order_status);
    $query2 = $this->db->get('status');
        $payment_status = $query2->row();
        $order = array($query->row(),$payment_status);

        return $order;
    }

public function save_order_comment($id, $note){
    $this->db->set('note', $note);
    $this->db->where('ID', $id);
    $this->db->update('orders');
    $response =array('response'=>true);
    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
        ->_display();
    exit;
}


public function save_order_status($id, $status){
    $this->db->set('order_status', $status);
    $this->db->where('ID', $id);
    $this->db->update('orders');
    $response =array('response'=>true);
    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
        ->_display();
    exit;

}

public function get_status($id){
    $this->db->where('ID', $id);
    $query = $this->db->get('orders', 1);
    $row = $query->row();
    return $row->order_status;
}

public function get_order_status($id){
    $id_trans = $this->get_id_transaction($id);
        $url = "https://test.vr-pay-ecommerce.de/v1/query/".$id_trans;
        $url .= "?entityId=8ac7a4c7729daef00172a757c3fd2779";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjN2E0Yzc3MjlkYWVmMDAxNzJhNzU3MzMwZjI3NzJ8Y2I2OEJqUGN6aA=='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        //return $responseData;

        $response = json_decode($responseData);
        $answer = $response->{'resultDetails'}->{'AcquirerResponse'};
        $date = date_create($response->{'timestamp'});
        $time = date_format($date, 'Y-m-d h:i:s A');
        $amount = $response->{'amount'};
        $result = array ('AcquirerResponse'=>$answer, 'amount'=>$amount, 'time'=> $time);

        return $result;
    }

public function get_id_transaction($id){
    $query = $this->db->get_where('orders', array('ID' => $id), 1);
    $row = $query->row();
    return $row->vr_transaction;
}

    /*
    * List of user shop for admin panel [/admin/Options]
    */
    public function users_list(){
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);
        return $query->result();
    }

    /*
    * Number of news per page
    */
    public function option_qty_news(){
        $sql = "SELECT * FROM options WHERE type = ? LIMIT 1";
        $query = $this->db->query($sql, array('posts_per_page'));
        return $query->row();
    }
 /*
  *
  * Number of news per page
  *
  *
  *
  */
    public function save_qty_news($qty){
        $data = array(
            'primary_value' => $qty
        );
        $this->db->where('type', 'posts_per_page');
        $this->db->update('options', $data);
        return true;

    }
}
