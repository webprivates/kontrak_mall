<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct(){
		parent::__construct();
        $this->load->model('Auth_model');
    }


	public function index()
	{
        if($this->session->userdata('is_login') == TRUE ){redirect('/');}		
		$this->load->view('admin/login');
    }
    
    public function login(){
		if($this->session->userdata('is_login') == TRUE ){redirect('/');}
        if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$check = $this->Auth_model->checkLogin($username, $password);

			if (!$check) {
				redirect('auth');
			}else{
				$data = array(
					'username' => $username,
					'password' => $password,
					'is_login' => TRUE,
					'nama' =>$check->nama,
				);
				$this->session->set_userdata($data);
				redirect('/');
			}
		}
    }

    public function logout(){
		$data = array('username', 'password', 'is_login');
		$this->session->unset_userdata($data);
		redirect('auth');
	}

}
