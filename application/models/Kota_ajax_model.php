<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_ajax_model extends CI_Model {
 
 	//nama tabel dari database
    var $table = 'kota'; 

    //field yang ditampilkan
    var $column_order = array(null, 'id_provinsi', 'nama', 'penduduk'); 

    //field yang diizin untuk pencarian 
    var $column_search = array('id_provinsi', 'nama', 'penduduk'); 

    //field pertama yang diurutkan
    var $order = array('nama' => 'asc'); 
 
    public function __construct() {
        parent::__construct();
    }
 
    private function _get_datatables_query() {
        //sql read
        $this->db->select('kota.*');
        $this->db->select('provinsi.nama AS nama_provinsi');
        $this->db->from('kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id');
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
        	$search = $this->input->post('search');
            if($search['value']) 

            // jika datatable mengirimkan pencarian dengan metode POST
            {
                // looping awal 
                if($i===0) {
                    $this->db->group_start(); 
                    $this->db->like($item, $search['value']);
                } else {
                    $this->db->or_like($item, $search['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if($this->input->post('order')) {
        	$order = $this->input->post('order');
            $this->db->order_by($this->column_order[$order['0']['column']], $order['0']['dir']);

        } else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables() {
        $this->_get_datatables_query();
        if($this->input->post('length') != -1)
        	$this->db->limit($this->input->post('length'), $this->input->post('start'));

        $query = $this->db->get();
        return $query->result_array();
    }
 
 	//menghitung tota data sesuai filter/pagination
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
 	//menghitung total data di table
    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
}