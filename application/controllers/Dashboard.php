<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('');
    }

	public function index()
	{
		$data['judul'] = "Index";
		$this->load->view('dashboard.php',$data);
    }

    public function create(){

    }

    public function read(){

    }

    public function update(){

    }

    public function delete(){

    }
}
