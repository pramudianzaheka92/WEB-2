<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table provinsi di database
	public function read() {

		//sql read
		$this->db->select('*');
		$this->db->from('provinsi');
		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function export berfungsi merubah data ke table yang ada di excel
	public function export_kota($id){
		//sql read
		$this->db->select('*');
		$this->db->select('b.nama_kota AS nama_kota, b.id_kota AS id_kota');
		$this->db->from('provinsi a');
		$this->db->join('kota b', 'a.id = b.id_provinsi');
		$this->db->where('a.id', $id);
				
		//$id = id data yang dari controller (sebagai filter data yang dihapus)
		$query = $this->db->get();
		
		//query->row_array = mengirim data ke controller dalam bentuk 1 data
		return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table provinsi di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('provinsi');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table provinsi di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('provinsi', $input);
	}

	//function update berfungsi merubah data ke table provinsi di database
	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('provinsi', $input);
	}

	//function delete berfungsi menghapus data dari table provinsi di database
	public function delete($id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('provinsi');
	}
}