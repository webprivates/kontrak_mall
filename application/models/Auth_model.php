<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {


	public function checkLogin($username, $password){
		return $this->db->query(" SELECT * FROM tbl_users WHERE username='$username' AND password='$password' ")->row();
	}


}
