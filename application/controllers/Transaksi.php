	<?php

class Transaksi extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('Transaksi_model');
		$this->load->model('Pelamar_model');
	}

	function index(){

		$data['title']='Data Transaksi';
		$data['transaksi'] = $this->Transaksi_model->getData();
		$this->load->view('header',$data);
		$this->load->view('transaksi/data');
		$this->load->view('footer');
	} //ok 


	function add(){
		$data['title']='Data Transaksi - Add';
		$this->load->view('header',$data);
		$this->load->view('transaksi/add');
		$this->load->view('footer');
	}

	function insert(){
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$passwordCrypt = sha1($password);

		$this->Transaksi_model->insert($nama_lengkap,$username,$passwordCrypt,$level);
		redirect('transaksi');
	}

	function delete(){
		$kode = $this->uri->segment(3);
		$this->Transaksi_model->delete($kode);
		$token = $this->uri->segment(4);
		$tanggal = $this->Indonesia3Tgl($this->uri->segment(5));
		
		
		$dataNotifikasi = array('title'=>'Maaf, Transaksi Anda Dibatalkan','body'=>'Transaksi DIBATALKAN untuk No. Transaksi '.$kode.' pada tanggal '.$tanggal);
		$this->sendInformasi($token,$dataNotifikasi);
		
		redirect('transaksi');
		
		
	}
	
	
	function sendInformasi($to,$data){

    	$apiKey='AAAA6ZQ5iLc:APA91bEpE8FHX1sd5f5xu9bodWS9HGuhtQ8DkcRz0iJoo3G8a7uoYKLCug_IrBn1jGniUVOkeqFBP924Xi7qGJuhuOl085fqz38Npl0JEo3GmtePqNO-jBIIfWHyXy20nS-JSrliJy9z';
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
		$id_member= $this->uri->segment(6);
		$point= $this->uri->segment(7);
			
		$dataNotifikasi = array('title'=>'Selamat, Anda Mendapatkan '.number_format($point).' point','body'=>'Transaksi SELESAI untuk No. Transaksi '.$kode.' pada tanggal '.$tanggal);
		print_r($dataNotifikasi);
		$this->Transaksi_model->updatePoint($id_member,$point);
        $this->sendInformasi($token,$dataNotifikasi);
        $this->Transaksi_model->updateStatus($kode);
		redirect('transaksi');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='Data Transaksi- Edit';
		$hasil = $this->Transaksi_model->getId($id);

		$data['transaksi'] = $hasil->row_array();
	

		$this->load->view('header',$data);
		$this->load->view('transaksi/edit',$data);
		$this->load->view('footer');
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='Data Transaksi- Detail';
		$hasil = $this->Transaksi_model->getId($id);
			$data['transaksiDetail'] = $hasil;

		$data['transaksi'] = $hasil->row_array();


		$this->load->view('header',$data);
		$this->load->view('transaksi/view',$data);
		$this->load->view('footer');
	}



	function update(){
		$id = $this->input->post('id');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$this->Transaksi_model->update($id,$nama_lengkap,$username,$password,$level);
		redirect('transaksi');
	}
}