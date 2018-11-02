<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
	}

	public function login() {
		$data = array(
			'title' => 'Login',
			'data'	=> new stdClass()
		);
		$username = $this->input->post('username');
		$pwd = $this->input->post(md5('password'));
		$password = md5($pwd);
		

		//check ke database
		if ($this->user_model->resolve_user_login($username, $password)->num_rows() == 1) {
			# code...
			$ktp = $this->user_model->get_user_id_from_username($username);
			$user = $this->user_model->get_user($ktp);

			// set session user datas
			$_SESSION['ktp']      		= (string)$user->noKtp;
			$_SESSION['username']     	= (string)$user->username;
			
			
			// user login ok
			$this->load->view('templates/header',$data);
			$this->load->view('user/loginsukses');
			$this->session->set_flashdata('message_id', $_SESSION['username']);//message rendered
			$this->session->set_flashdata('seconds_redirect', 5);//time to be redirected (in seconds)
			$this->session->set_flashdata('url_redirect', base_url('user/profile'));
			$this->load->view('templates/footer');
		} else {
				
			// login failed
			
			
			// send error to the view
			$this->load->view('templates/header',$data);
			$this->load->view('user/login');
			$this->load->view('templates/footer');
			
		}

	}

	public function profile() {

		$ktp = $_SESSION['ktp'];
		$query= $this->user_model->get_pelanggan($ktp);
		$sql = $query->result();

		$data = array(
			'nama' 	=> $_SESSION['username'],
			'link1' => 'Dashboard',
			'link2' => 'Profile',
			'page1' => 'Profile',
			'page2' => 'complain',
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
			'nama' 	=> $_SESSION['username'],
			'link1' => 'Dashboard',
			'link2' => 'Complain',
			'page1' => 'Profile',
			'page2' => 'complain',
			'title' => 'Complain',
			'data'	=> $sql
		);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('user/complain');
		$this->load->view('templates/footer');

	}

	public function createcomplain(){

	}

	
	public function logout(){
		$this->session->unset_userdata('ktp');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('user/login','refresh'); 
	}
	
}