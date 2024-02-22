<?php

class Expired extends CI_Controller{

	function __construct(){
		parent::__construct();


	}

	function index(){

	
			$data['title']='Akun Anda Sudah Expired !';
			$this->load->view('expired');
		}
	}
	
