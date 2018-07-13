<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class File extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_login') == FALSE ){redirect('auth');}		
        $this->load->model('File_model');
        $this->load->model('Kontrak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'file/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'file/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'file/index.html';
            $config['first_url'] = base_url() . 'file/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->File_model->total_rows($q);
        $file = $this->File_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'file_data' => $file,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['contents'] = 'file/tbl_file_list';
        $this->load->view('templates/index', $data);
    }

    public function read($id) 
    {
        $row = $this->File_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_file' => $row->id_file,
            'kontrak_id' => $row->kontrak_id,
            'nm_file' => $row->nm_file,
            'created_at' => $row->created_at,
            );
            $data['contents'] = 'file/tbl_file_read';
            $this->load->view('templates/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('file'));
        }
    }

    public function create($error = NULL) 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('file/create_action'),
            'id_file' => set_value('id_file'),
            'kontrak_id' => set_value('kontrak_id'),
            'kontrak_data' => $this->Kontrak_model->get_all(),
            'error' => $error['error'],
        );
        $data['contents'] = 'file/tbl_file_form';
        $this->load->view('templates/index', $data);
    }
    
    public function create_action() 
    {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            
            $this->create();     

        } else {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'png|pdf|doc|xlsx|xls|docx';
            $config['max_size'] = '0';
            $config['encrypt_name'] = TRUE; 
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('nm_file')) {
                // jika validasi file gagal, kirim parameter error ke index
                $error = array('error' => $this->upload->display_errors());
                $this->create($error);
            } else {
                // jika berhasil upload ambil data dan masukkan ke database
                $upload_data = $this->upload->data();
                // print_r($upload_data);exit;
                    $data = array(
                    'kontrak_id' => $this->input->post('kontrak_id',TRUE),
                    'nm_file' => $upload_data['file_name'],
                    );
                $this->File_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('file'));
              
            }
            
        }

        
    }
    
    public function update($id) 
    {
        $row = $this->File_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('file/update_action'),
                'id_file' => set_value('id_file', $row->id_file),
                'kontrak_id' => set_value('kontrak_id', $row->kontrak_id),
                'nm_file' => set_value('nm_file', $row->nm_file),
                );
            $data['contents'] = 'file/tbl_file_form';
            $this->load->view('templates/index', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('file'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_file', TRUE));
        } else {
            $data = array(
            'kontrak_id' => $this->input->post('kontrak_id',TRUE),
            'nm_file' => $this->input->post('nm_file',TRUE),
            );

            $this->File_model->update($this->input->post('id_file', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('file'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->File_model->get_by_id($id);

        if ($row) {
            $this->File_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('file'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('file'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kontrak_id', 'kontrak id', 'trim|required');

	$this->form_validation->set_rules('id_file', 'id_file', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file File.php */
/* Location: ./application/controllers/File.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-10 18:10:41 */
/* http://harviacode.com */