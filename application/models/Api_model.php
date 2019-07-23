
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Api_model extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->pdo = $this->load->database('pdo',true);

    }

  public function join($userid, $password, $name, $email) {
    $stmt=$this->pdo->query("INSERT into member (userid, userpw, username, email) VALUES ('$userid', '$password', '$name', '$email')");
    return $stmt;
  }

  public function login($userid, $password){
    $stmt=$this->pdo->query("SELECT * from member WHERE userid='$userid' and userpw='$password'");
    $result = $stmt->row();
    return $result;
  }

	public function add_post($title, $description) {
		$stmt=$this->pdo->query("INSERT into post (title, description, created) VALUES ('$title', '$description', now())");
    return $stmt;
	}

	public function edit_post($id, $title, $description) {
		$stmt=$this->pdo->query("UPDATE post SET title='$title', description='$description' where id='$id'");
    return $stmt;
	}

	public function delete_post($id) {
		$stmt=$this->pdo->query("DELETE FROM post where id='$id'");
    return $stmt;
	}
}

?>
