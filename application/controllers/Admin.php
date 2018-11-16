<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Admin extends CI_Controller {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('user_model');
		$this->output->enable_profiler(TRUE);
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		
	}

	public function index() {

		

		$ktp = $_SESSION['ktp'];
		$query= $this->admin_model->getAllcomplain();
        $sql = $query->result();

		$data = array(
			'nama' 	=> $_SESSION['nama'],
			'link1' => 'Dashboard',
			'link2' => 'Dashboard',
			'pages'	=> 'admin',
			'page1' => 'komplain',
			'page2' => 'laporan',
			'title' => 'Admin Page',
            'data'	=> $sql,
            'pie_data' => $query
		);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('admin/admin');
        $this->load->view('templates/footer');
    }

	
	public function logout(){
		$this->session->unset_userdata('ktp');
		$this->session->unset_userdata('nama');
		$this->session->sess_destroy();
		redirect('login','refresh'); 
	}
	
	public function exportPDF($id){
		//$id = $this->session->unset_userdata('ktp');
		$query = $this->admin_model->getcomplainby($id);
		$sql = $query->result();
		$data = array(
			'data' 	=> $sql
		);
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Print.pdf";
		$this->pdf->load_view('pdfview', $data);
	
	
	}

	public function komplain(){
		$ktp = $_SESSION['ktp'];
		$query= $this->admin_model->getAllcomplain();
        $sql = $query->result();

		$data = array(
			'nama' 	=> $_SESSION['nama'],
			'link1' => 'Dashboard',
			'link2' => 'komplain',
			'pages'	=> 'admin',
			'page1' => 'komplain',
			'page2' => 'laporan',
			'title' => 'Admin Page',
            'data'	=> $sql,
            'pie_data' => $query
		);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('admin/komplain');
        $this->load->view('templates/footer');
	}

	public function laporan(){
		$ktp = $_SESSION['ktp'];
		$query= $this->admin_model->getAllcomplain();
        $sql = $query->result();

		$data = array(
			'nama' 	=> $_SESSION['nama'],
			'link1' => 'Dashboard',
			'link2' => 'laporan',
			'pages'	=> 'admin',
			'page1' => 'komplain',
			'page2' => 'laporan',
			'title' => 'Admin Page',
            'data'	=> $sql,
            'pie_data' => $query
		);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('admin/laporan');
        $this->load->view('templates/footer');
	}

	public function pie(){
		$query = $this->admin_model->getAllcomplain();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $d) {
				# code...
				$hasil[] = $d;
			}
			# code...
			return $hasil;
		}
	$this->load->view('admin/chart',$hasil);
	}
}