<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kontrak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_login') == FALSE ){redirect('auth');}		
        $this->load->model('Kontrak_model');
        $this->load->model('Jenis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kontrak?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kontrak?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kontrak';
            $config['first_url'] = base_url() . 'kontrak';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kontrak_model->total_rows($q);
        $kontrak = $this->Kontrak_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kontrak_data' => $kontrak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $data['contents'] = 'kontrak/tbl_kontrak_list';
        $this->load->view('templates/index', $data);
    }

    public function read($id) 
    {
        $row = $this->Kontrak_model->get_by_id($id);
        if ($row) {
            $data = array(
                        'id_kontrak' => $row->id_kontrak,
                        'jenis_id' => $row->jenis_id,
                        'nm_kontrak' => $row->nm_kontrak,
                        'nm_jenis' => $row->nm_jenis,
                        'nm_toko' => $row->nm_toko,
                        'tgl_masuk' => $row->tgl_masuk,
                        'cp' => $row->cp,
                        'jml_dana' => $row->jml_dana,
                    );
        $data['contents'] = 'kontrak/tbl_kontrak_read';
        $this->load->view('templates/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontrak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kontrak/create_action'),
            'id_kontrak' => set_value('id_kontrak'),
            'jenis_id' => set_value('jenis_id'),
            'nm_kontrak' =>  set_value('nm_kontrak'),      
            'nm_jenis' =>  set_value('nm_jenis'),      
            'nm_toko' => set_value('nm_toko'),
            'tgl_masuk' => set_value('tgl_masuk'),
            'cp' => set_value('cp'),
            'jml_dana' => set_value('jml_dana'),
            'jenis_data' => $this->Jenis_model->get_all(),
        );
    $data['contents'] = 'kontrak/tbl_kontrak_form';
    $this->load->view('templates/index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'jenis_id' => $this->input->post('jenis_id',TRUE),
            'nm_kontrak' => $this->input->post('nm_kontrak',TRUE),
            'nm_toko' => $this->input->post('nm_toko',TRUE),
            'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
            'cp' => $this->input->post('cp',TRUE),
            'jml_dana' => $this->input->post('jml_dana',TRUE),
            );

            $this->Kontrak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kontrak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kontrak_model->get_by_id($id);

        if ($row) {
            $data = array(
                    'button' => 'Update',
                    'action' => site_url('kontrak/update_action'),
                    'id_kontrak' => set_value('id_kontrak', $row->id_kontrak),
                    'jenis_id' => set_value('jenis_id', $row->jenis_id),
                    'nm_kontrak' =>  $row->nm_kontrak,
                    'nm_jenis' =>  $row->nm_jenis,
                    'nm_toko' => set_value('nm_toko', $row->nm_toko),
                    'tgl_masuk' => set_value('tgl_masuk', $row->tgl_masuk),
                    'cp' => set_value('cp', $row->cp),
                    'jml_dana' => set_value('jml_dana', $row->jml_dana),
                    'jenis_data' => $this->Jenis_model->get_all(),
                );
        $data['contents'] = 'kontrak/tbl_kontrak_form';
        $this->load->view('templates/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontrak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kontrak', TRUE));
        } else {
            $data = array(
                        'jenis_id' => $this->input->post('jenis_id',TRUE),
                        'nm_kontrak' => $this->input->post('nm_kontrak',TRUE),
                        'nm_toko' => $this->input->post('nm_toko',TRUE),
                        'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
                        'cp' => $this->input->post('cp',TRUE),
                        'jml_dana' => $this->input->post('jml_dana',TRUE),
                        );

            $this->Kontrak_model->update($this->input->post('id_kontrak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kontrak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kontrak_model->get_by_id($id);

        if ($row) {
            $this->Kontrak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kontrak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontrak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_kontrak', 'nm kontrak', 'trim|required');
	$this->form_validation->set_rules('nm_toko', 'nm toko', 'trim|required');
	$this->form_validation->set_rules('tgl_masuk', 'tgl masuk', 'trim|required');
	$this->form_validation->set_rules('cp', 'cp', 'trim|required');
	$this->form_validation->set_rules('jml_dana', 'jml dana', 'trim|required|numeric');

	$this->form_validation->set_rules('id_kontrak', 'id_kontrak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_kontrak.xls";
        $judul = "tbl_kontrak";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Kontrak");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kontrak");
        xlsWriteLabel($tablehead, $kolomhead++, "Nam Toko");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Masuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Contact");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Dana");


	foreach ($this->Kontrak_model->getData() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_kontrak);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_jenis);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_toko);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
            xlsWriteLabel($tablebody, $kolombody++, $data->cp);
            xlsWriteNumber($tablebody, $kolombody++, $data->jml_dana);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_kontrak.doc");

        $data = array(
            'kontrak_data' => $this->Kontrak_model->getData(),
            'start' => 0
        );
        
        $this->load->view('kontrak/tbl_kontrak_doc',$data);
    }

}

/* End of file Kontrak.php */
/* Location: ./application/controllers/Kontrak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-07 20:12:38 */
/* http://harviacode.com */