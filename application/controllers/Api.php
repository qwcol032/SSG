<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

  public function __construct() {
        parent::__construct();
  }


  public function edit() {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $this->load->model('api_model');
    $result = $this->api_model->edit_post($id, $title, $description);

    if ($result == TRUE) {
      $arr = array ('status'=>'success');
      echo json_encode($arr);
    } else {
      $arr = array ('status'=>'fail','reason'=>'sry...');
      echo json_encode($arr);
    }
  }

  public function add() {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $this->load->model('api_model');
    $result = $this->api_model->add_post($title, $description);

    if ($result == TRUE) {
      $arr = array ('status'=>'success');
      echo json_encode($arr);
    } else {
      $arr = array ('status'=>'fail','reason'=>'sry...');
      echo json_encode($arr);
    }
  }

  public function delete() {
      $id = $_POST['id'];
      $this->load->model('api_model');
      $result = $this->api_model->delete_post($id);
      if ($result == TRUE) {
        $arr = array ('status'=>'success');
        echo json_encode($arr);
      } else {
        $arr = array ('status'=>'fail','reason'=>'sry...');
        echo json_encode($arr);
      }

  }

  public function login() {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $this->load->model('api_model');
    $result = $this->api_model->login($userid, $password);
    if (empty($result)) {
      $arr = array ('status'=>'fail','reason'=>'아이디 또는 패스워드가 일치하지 않습니다.');
      echo json_encode($arr);
    } else {

      $username = $result->username;
      $session_data = array(
          "userid"	=>	$userid,
          "username" => $username,
			);
      $this->session->set_userdata($session_data);

      $arr = array ('status'=>'success');
      echo json_encode($arr);
    }
	}

  public function logout(){
    session_destroy();
    echo "<script>location.href='/'</script>";
    exit();
  }

  public function join() {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $pw_check = $_POST['pw_check'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    #pw == pw_check?
    if ($password != $pw_check) {
      $arr = array ('status'=>'fail','reason'=>'password incorrect');
      echo json_encode($arr);
      exit();
    }

    $this->load->model('api_model');
    $result = $this->api_model->join($userid, $password, $name, $email);

    if ($result == TRUE) {
      $arr = array ('status'=>'success');
      echo json_encode($arr);
    } else {
      $arr = array ('status'=>'fail','reason'=>'sry...');
      echo json_encode($arr);
    }
  }
}

?>
