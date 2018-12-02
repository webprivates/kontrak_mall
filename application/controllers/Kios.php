<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kios extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kios_model');
        $this->load->model('Kontrak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
     

        $data = array(
            'kios_data' => $this->Kios_model->get_all(),
            'jml_kontrak' => $this->Kontrak_model->get_all(),
        );
         $data['contents'] = 'kios/tbl_setting_list';
        $this->load->view('templates/index', $data);
    }

    public function read($id) 
    {
        $row = $this->Kios_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tersedia' => $row->tersedia,
	    );
              $data['contents'] = 'kios/tbl_setting_read';
              $this->load->view('templates/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kios'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kios/create_action'),
	    'id' => set_value('id'),
	    'tersedia' => set_value('tersedia'),
	);
       $data['contents'] = 'kios/tbl_setting_form';
        $this->load->view('templates/index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tersedia' => $this->input->post('tersedia',TRUE),
	    );

            $this->Kios_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kios'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kios_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kios/update_action'),
		'id' => set_value('id', $row->id),
		'tersedia' => set_value('tersedia', $row->tersedia),
	    );
           $data['contents'] = 'kios/tbl_setting_form';
            $this->load->view('templates/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kios'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tersedia' => $this->input->post('tersedia',TRUE),
	    );

            $this->Kios_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kios'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kios_model->get_by_id($id);

        if ($row) {
            $this->Kios_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kios'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kios'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tersedia', 'tersedia', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_setting.xls";
        $judul = "tbl_setting";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Tersedia");

	foreach ($this->Kios_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tersedia);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_setting.doc");

        $data = array(
            'tbl_setting_data' => $this->Kios_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kios/tbl_setting_doc',$data);
    }

}

/* End of file Kios.php */
/* Location: ./application/controllers/Kios.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-02 22:41:45 */
/* http://harviacode.com */