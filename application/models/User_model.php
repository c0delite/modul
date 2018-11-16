<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		
	}
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($username, $email, $password) {
		
		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $this->hash_password($password),
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('user', $data);
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from('user');
		$this->db->where('username', $username);
		
		return $this->db->get();
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('noKtp');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get()->row('noKtp');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($noKtp) {
		
		$this->db->from('user');
		$this->db->where('noKtp', $noKtp);
		return $this->db->get()->row();
		
	}

	public function get_pelanggan($ktp) {
		$this->db->from('pelanggan');
		$this->db->join('unit', 'pelanggan.idUnit = unit.idUnit');
		$this->db->join('tower', 'pelanggan.idTower = tower.idTower');
		$this->db->where('noktp', $ktp);
		return $this->db->get();
	}

	public function get_all_complain() {
		$this->db->from('pelanggan');
		$this->db->join('unit', 'pelanggan.idUnit = unit.idUnit');
		$this->db->join('tower', 'pelanggan.idTower = tower.idTower');
		return $this->db->get();
	}

	public function get_komplain($ktp) {
		$this->db->from('komplain');
		$this->db->where('noktp', $ktp);
		return $this->db->get();
	}
    
    function dataKategori()
    {
        // ambil data dari db
        $this->db->order_by('kategori', 'asc');
        $result = $this->db->get('katKomplain');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->kategori] = $row->kategori;
            }
        }
        return $dd;
    }
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
	
}