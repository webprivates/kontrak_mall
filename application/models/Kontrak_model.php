<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kontrak_model extends CI_Model
{

    public $table = 'tbl_kontrak';
    public $id = 'id_kontrak';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function getData()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('tbl_jenis', 'tbl_jenis.id_jenis = tbl_kontrak.jenis_id');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('tbl_jenis', 'tbl_jenis.id_jenis = tbl_kontrak.jenis_id');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kontrak', $q);
        $this->db->or_like('nm_kontrak', $q);
        $this->db->or_like('jenis_id', $q);
        $this->db->or_like('nm_toko', $q);
        $this->db->or_like('tgl_masuk', $q);
        $this->db->or_like('tgl_berakhir', $q);
        $this->db->or_like('cp', $q);
        $this->db->or_like('jml_dana', $q);
        $this->db->or_like('dp', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->join('tbl_jenis', 'tbl_jenis.id_jenis = tbl_kontrak.jenis_id');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kontrak', $q);
        $this->db->or_like('nm_kontrak', $q);
        $this->db->or_like('jenis_id', $q);
        $this->db->or_like('nm_toko', $q);
        $this->db->or_like('tgl_masuk', $q);
        $this->db->or_like('tgl_berakhir', $q);
        $this->db->or_like('cp', $q);
        $this->db->or_like('jml_dana', $q);
        $this->db->or_like('dp', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Kontrak_model.php */
/* Location: ./application/models/Kontrak_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-07 20:12:38 */
/* http://harviacode.com */