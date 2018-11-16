<?php

class Admin_model extends CI_Model{

	public function __construct() {
		
		parent::__construct();
		
	}

	public function getAllcomplain(){
		$this->db->from('pelanggan');
		$this->db->join('unit', 'pelanggan.idUnit = unit.idUnit');
		$this->db->join('tower', 'pelanggan.idTower = tower.idTower');
		$this->db->join('komplain', 'pelanggan.noktp = komplain.noktp');
		return $this->db->get();
	}

	public function getcomplainby($id){
		$this->db->from('pelanggan');
		$this->db->join('unit', 'pelanggan.idUnit = unit.idUnit');
		$this->db->join('tower', 'pelanggan.idTower = tower.idTower');
		$this->db->join('komplain', 'pelanggan.noktp = komplain.noktp');
		$this->db->where($id = 'pelanggan.noktp');
		return $this->db->get();
	}

	public function save(){
		$post = $this->input->post();
	}
}