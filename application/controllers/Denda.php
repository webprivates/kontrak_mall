<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Denda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Denda_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
       

        $data = array(
            'denda_data' => $this->Denda_model->get_all(),
        );
         $data['contents'] = 'denda/denda';
        $this->load->view('templates/index', $data);
    }

    
    public function update($id) 
    {
        $row = $this->Denda_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('denda/update_action'),
		          'id' => set_value('id', $row->id),
                  'jatuh_tempo' => set_value('jatuh_tempo', $row->jatuh_tempo),
		          'denda' => set_value('denda', $row->denda),
	    );
           $data['contents'] = 'denda/update';
            $this->load->view('templates/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('denda'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
              'denda' => $this->input->post('denda',TRUE),
		      'jatuh_tempo' => $this->input->post('jatuh_tempo',TRUE),
	    );

            $this->Denda_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('denda'));
        }
    }

     public function _rules() 
    {
    $this->form_validation->set_rules('denda', 'denda', 'trim|required');
    $this->form_validation->set_rules('jatuh_tempo', 'jatuh_tempo', 'trim|required');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
    
