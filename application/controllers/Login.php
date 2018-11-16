<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
        $this->load->model('Login_model');
        $this->output->enable_profiler(TRUE);

	}

	function index(){
        $data = array(
            'title' => 'Login'
        );
		$this->load->view('templates/header',$data);
		$this->load->view('user/login');
		$this->load->view('templates/footer');
	}

	function aksi_login(){
		$username = $this->input->post('username');
        $password = $this->input->post('password');
        $ktp = $this->Login_model->get_user_id_from_username($username);
        $user = $this->Login_model->get_user($ktp);
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->Login_model->cek_login("user",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
                'ktp'  => (string)$user->noKtp,
                'role' => (string)$user->role,
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
            
            if($_SESSION['role'] == 1){
                redirect(base_url("admin"));
            }else{
                redirect(base_url("user/profile"));
            }
			

		}else{
            redirect(base_url("login"));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}