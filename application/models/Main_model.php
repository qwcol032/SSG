<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main_model extends CI_Model {

   public function __construct() {
        parent::__construct();
        $this->pdo = $this->load->database('pdo',true);

    }

  public function get_post($id){
    $stmt=$this->pdo->query('SELECT * FROM post');
    $result = $stmt->result();
    return $result;
  }


}


?>
