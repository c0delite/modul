<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complain extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('');
    }

	public function index()
	{
		$data['judul'] = "Complain";
		$this->load->view('complain/complaindashboard',$data);
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
