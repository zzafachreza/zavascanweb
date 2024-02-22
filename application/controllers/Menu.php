<?php

class Menu extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Menu_model');

	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Master Menu';
			$data['menu'] = $this->Menu_model->getData();
			$this->load->view('header',$data);
			$this->load->view('menu/data');
			$this->load->view('footer');
		}
	}


	function add(){
		$data['title']='FM | Master Menu - Add';
		$this->load->view('header',$data);
		$this->load->view('menu/add');
		$this->load->view('footer');
	}

	function insert(){
		$nama = $this->input->post('nama');
		$this->Menu_model->insert($nama);
		redirect('menu');
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->Menu_model->delete($id);
		redirect('menu');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='FM | Master Menu - Edit';
		$hasil = $this->Menu_model->getId($id);

		$data['menu'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('menu/edit',$data);
		$this->load->view('footer');
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Menu - Detail';
		$hasil = $this->Menu_model->getId($id);

		$data['menu'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('menu/view',$data);
		$this->load->view('footer');
	}



	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$this->Menu_model->update($id,$nama);
		redirect('menu');
	}
	
}