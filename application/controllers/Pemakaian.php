<?php

class Pemakaian extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('Pemakaian_model');
	}

	function index(){

		$data['title']='Data Transaksi';
		$data['pemakaian'] = $this->Pemakaian_model->getData();
		$this->load->view('header',$data);
		$this->load->view('pemakaian/data');
		$this->load->view('footer');
	} //ok 


	function add(){
		$data['title']='Data Transaksi - Add';
		$this->load->view('header',$data);
		$this->load->view('pemakaian/add');
		$this->load->view('footer');
	}

	function insert(){
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$passwordCrypt = sha1($password);

		$this->Pemakaian_model->insert($nama_lengkap,$username,$passwordCrypt,$level);
		redirect('pemakaian');
	}

	function delete(){
		$kode = $this->uri->segment(3);
		$this->Pemakaian_model->delete($kode);
		
		redirect('pemakaian');
		
		
	}
	
	
	function sendInformasi($to,$data){

    	$apiKey='AAAAmxWP4ic:APA91bFIrRHdm6aJLcbvtJG0bO11ce_OxsG4ikOn6yK4-Yo1QY9pvPiNDoCejcxkHkZrPjFKp-FV8q4J1AX3B2qnpdREwVFUsN1xT_8BEyBhLaNoz8ZiyZYcAKxCpym68VavHBoeR2P-';
    	$field= array('to'=>$to,'notification'=>$data);
    
    	$header = array('Authorization:key='.$apiKey,'Content-Type:application/json');
    
    	$url = 'https://fcm.googleapis.com/fcm/send';
    
    	$ch = curl_init();
    
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($field));
    
    	$result = curl_exec($ch);
    	curl_close($ch);
    
    	return json_decode($result,true);
    
    }
    
      function Indonesia3Tgl($tanggal){
      $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
               "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
               
      $tgl=substr($tanggal,8,2);
      $bln=substr($tanggal,5,2);
      $thn=substr($tanggal,0,4);
      $tanggal ="$tgl ".$namaBln[$bln]." $thn";
      return $tanggal;
    }



	function done(){
		$kode = $this->uri->segment(3);
		$token = $this->uri->segment(4);
		$tanggal = $this->Indonesia3Tgl($this->uri->segment(5));
			
		$dataNotifikasi = array('title'=>'Selamat, Transaksi Anda Selesai','body'=>'Transaksi SELESAI untuk No. Transaksi '.$kode.' pada tanggal '.$tanggal);
		
        $this->sendInformasi($token,$dataNotifikasi);
        $this->Pemakaian_model->updateStatus($kode);
		redirect('pemakaian');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='Data Transaksi- Edit';
		$hasil = $this->Pemakaian_model->getId($id);

		$data['pemakaian'] = $hasil->row_array();
	

		$this->load->view('header',$data);
		$this->load->view('pemakaian/edit',$data);
		$this->load->view('footer');
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='Data Transaksi- Detail';
		$hasil = $this->Pemakaian_model->getId($id);
			$data['transaksiDetail'] = $hasil;

		$data['pemakaian'] = $hasil->row_array();


		$this->load->view('header',$data);
		$this->load->view('pemakaian/view',$data);
		$this->load->view('footer');
	}



	function update(){
		$id = $this->input->post('id');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$this->Pemakaian_model->update($id,$nama_lengkap,$username,$password,$level);
		redirect('pemakaian');
	}
}