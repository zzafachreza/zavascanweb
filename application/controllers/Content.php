<?php

class Content extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Content_model');
		$this->load->model('Menu_model');
		$this->load->model('Halaman_model');

	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Master Content';
			$data['content'] = $this->Content_model->getData();
			$this->load->view('header',$data);
			$this->load->view('content/data');
			$this->load->view('footer');
		}
	}


	function add(){
		$data['title']='FM | Master Content - Add';

		$data['content'] = $this->Menu_model->getData();
		$data['menu'] = $this->Menu_model->getData();
		$data['halaman'] = $this->Halaman_model->getData();

		$this->load->view('header',$data);
		$this->load->view('content/add');
		$this->load->view('footer');
	}

	function insert(){
		$nama = $this->input->post('nama');
		$id_halaman = $this->input->post('id_halaman');
		$tipe = $this->input->post('tipe');
		$render = $this->input->post('render');
		$this->Content_model->insert($nama,$id_halaman,$tipe,$render);
		redirect('Content');
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->Content_model->delete($id);
		redirect('content');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='FM | Master Content - Edit';
		$hasil = $this->Content_model->getId($id);
		$data['halaman'] = $this->Halaman_model->getData();

		$data['content'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('content/edit',$data);
		$this->load->view('footer');
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Content - Detail';
		$hasil = $this->Content_model->getId($id);

		$data['content'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('content/view',$data);
		$this->load->view('footer');
	}



	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$id_halaman = $this->input->post('id_halaman');
		$tipe = $this->input->post('tipe');
		$render = $this->input->post('render');
		$this->Content_model->update($id,$nama,$id_halaman,$tipe,$render);
		redirect('content');
	}
	
}