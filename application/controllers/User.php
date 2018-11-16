<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->model('user_model');
		$this->output->enable_profiler(TRUE);
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		
	}

	public function profile() {

		

		$ktp = $_SESSION['ktp'];
		$query= $this->user_model->get_pelanggan($ktp);
		$sql = $query->result();

		$data = array(
			'nama' 	=> $_SESSION['nama'],
			'link1' => 'Dashboard',
			'link2' => 'Profile',
			'pages'	=> 'User',
			'page1' => 'Profile',
			'page2' => 'Complain',
			'title' => 'Profile',
			'data'	=> $sql
		);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('user/profile');
		$this->load->view('templates/footer');
	}

	public function complain(){
		$ktp = $_SESSION['ktp'];
		$query= $this->user_model->get_komplain($ktp);
		$sql = $query->result();


		$data = array(
			'nama' 	=> $_SESSION['nama'],
			'link1' => 'Dashboard',
			'link2' => 'Complain',
			'pages'	=> 'user',
			'page1' => 'Profile',
			'page2' => 'complain',
			'title' => 'Complain',
			'data'	=> $sql,
            'kategori' => $this->user_model->dataKategori(),
            'katSelected' => $this->input->post('kat') ? $this->input->post('kat') : '',
		);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('user/complain');
		$this->load->view('templates/footer');

	}

	public function tambahKomplain(){
        $kat    =$this->input->post('kategori');
        $detail =$this->input->post('detail');
        $ktp    =$_SESSION['ktp'];
        $status ='outstanding';
        $data=$this->db->query("insert into komplain (katKomplain, detail, noktp,status) VALUES ('$kat','$detail','$ktp','$status');");
 
        echo json_encode($data);
	}

	
	public function logout(){
		$this->session->unset_userdata('ktp');
		$this->session->unset_userdata('nama');
		$this->session->sess_destroy();
		redirect('login','refresh'); 
	}
	
}