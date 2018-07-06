<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
        if($this->session->userdata('is_login') == false ){redirect('auth');}				
        $this->load->model('Auth_model');
    }

	public function index()
	{
		$data['contents'] = 'admin/dashboard' ;
		$this->load->view('templates/index', $data);
	}


}
