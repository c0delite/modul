<?php 

class Login_model extends CI_Model{	

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
    }

    public function get_user_id_from_username($username) {
		
		$this->db->select('noKtp');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get()->row('noKtp');
    }
    
    public function get_user($ktp) {
		
		$this->db->from('user');
		$this->db->where('noKtp', $ktp);
		return $this->db->get()->row();
		
	}
}