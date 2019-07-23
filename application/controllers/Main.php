<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


  public function __construct() {
        parent::__construct();
        $userid = $this->session->userdata('userid');
        if ($userid == null){
          echo "<script>location.href='/'</script>";
          exit();
        }
  }


  public function get($page) {

    $this->load->model('main_model');
    $result = $this->main_model->get_post($page);
    
    $this->load->view('main.php', array('result'=>$result));

  }

}

?>
