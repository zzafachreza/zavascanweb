<?php

class Timeline extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Kegiatan_model');

	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Timeline & Progress Kegiatan ';
			$this->load->view('header',$data);
			$this->load->view('kegiatan/timeline');
			$this->load->view('footer');
		}
	}


}
