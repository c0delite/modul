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
			$_SESSION['logged_in']   	= (bool)true;
			
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
		$data = array(
			'nama' => $_SESSION['username']
		);
		$ktp = $_SESSION['ktp'];
		$query = $this->user_model->get_user_detail($ktp);

		$this->load->view('templates/header');
		$this->load->view('user/profile',$data);
		$this->load->view('templates/footer');
	}
	
	
}