<?php

class Formulir extends CI_Controller{

	function __construct(){
		parent::__construct();


	}

	function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Formulir Client';
			$this->load->view('header',$data);
			$this->load->view('formulir');
			$this->load->view('footer');
		}
	}
	


	
}