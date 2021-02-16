<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fun{
    public $name;
    function __construct($name){
        $this->name = $name;
    }
    public function hello(){
        $hello = "Hello ".$this->name;
        return $hello;
    }
}
class Test extends CI_Controller {

     function __construct(){
         $this->setName = new Fun('Sergey');
     }

     public function index(){

         $hello = $this->setName->hello("Alex");
         echo $hello;
     }


}