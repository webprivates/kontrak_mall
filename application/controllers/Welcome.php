<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
        if($this->session->userdata('is_login') == false ){redirect('auth');}				
        $this->load->model(array('Auth_model', 'Kontrak_model', 'File_model', 'Jenis_model', 'Users_model'));
    }

	public function index()
	{
		$data['total_kontrak'] = $this->Kontrak_model->get_all();
		$data['total_users'] = $this->Users_model->get_all();
		$data['total_file'] = $this->File_model->get_all();
		$data['total_jenis'] = $this->Jenis_model->get_all();
		$data['contents'] = 'admin/dashboard' ;
		$this->load->view('templates/index', $data);
	}

	public function tentang(){
		$data['contents'] = 'admin/tentang';
		$this->load->view('templates/index', $data);
	}


}
