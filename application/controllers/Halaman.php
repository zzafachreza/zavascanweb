<?php

class Halaman extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Halaman_model');
		$this->load->model('Menu_model');

	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Master Halaman';
			$data['halaman'] = $this->Halaman_model->getData();
			$this->load->view('header',$data);
			$this->load->view('halaman/data');
			$this->load->view('footer');
		}
	}


	function add(){
		$data['title']='FM | Master Halaman - Add';
		$data['menu'] = $this->Menu_model->getData();
		$this->load->view('header',$data);
		$this->load->view('halaman/add');
		$this->load->view('footer');
	}

	function insert(){
		$nama = $this->input->post('nama');
		$id_menu = $this->input->post('id_menu');
		$this->Halaman_model->insert($nama,$id_menu);
		redirect('halaman');
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->Halaman_model->delete($id);
		redirect('halaman');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='FM | Master Halaman - Edit';

		$hasil = $this->Halaman_model->getId($id);

		$data['halaman'] = $hasil->row_array();

		$data['menu'] = $this->Menu_model->getData();


		$this->load->view('header',$data);
		$this->load->view('halaman/edit',$data);
		$this->load->view('footer');
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Halaman - Detail';
		$hasil = $this->Halaman_model->getId($id);

		$data['halaman'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('halaman/view',$data);
		$this->load->view('footer');
	}



	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
			$id_menu = $this->input->post('id_menu');
		$this->Halaman_model->update($id,$nama,$id_menu);
		redirect('halaman');
	}
	
}