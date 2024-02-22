	<?php

class Redeem extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('Redeem_model');

	}

	function index(){

		$data['title']='Data Redeem';
		$data['redeem'] = $this->Redeem_model->getData();
		$this->load->view('header',$data);
		$this->load->view('redeem/data');
		$this->load->view('footer');
	} //ok 


	function add(){
		$data['title']='Data Redeem - Add';
		$this->load->view('header',$data);
		$this->load->view('redeem/add');
		$this->load->view('footer');
	}



	function delete(){
		$kode = $this->uri->segment(3);
		$this->Redeem_model->delete($kode);
		$token = $this->uri->segment(4);
		$tanggal = $this->Indonesia3Tgl($this->uri->segment(5));
		
		
		$dataNotifikasi = array('title'=>'Maaf, Redeem Anda Dibatalkan','body'=>'Redeem DIBATALKAN untuk No. Transaksi '.$kode.' pada tanggal '.$tanggal);
		$this->sendInformasi($token,$dataNotifikasi);
		
		redirect('redeem');
		
		
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
			
		$dataNotifikasi = array('title'=>'Selamat, Redeem Point Diterima','body'=>'Transaksi SELESAI untuk No. Transaksi '.$kode.' pada tanggal '.$tanggal);
		$this->Redeem_model->updatePoint($id_member,$point);
        $this->sendInformasi($token,$dataNotifikasi);
        $this->Redeem_model->updateStatus($kode);
		redirect('redeem');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='Data Redeem- Edit';
		$hasil = $this->Redeem_model->getId($id);

		$data['redeem'] = $hasil->row_array();
	

		$this->load->view('header',$data);
		$this->load->view('redeem/edit',$data);
		$this->load->view('footer');
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='Data Redeem- Detail';
		$hasil = $this->Redeem_model->getId($id);
			$data['transaksiDetail'] = $hasil;

		$data['redeem'] = $hasil->row_array();


		$this->load->view('header',$data);
		$this->load->view('redeem/view',$data);
		$this->load->view('footer');
	}



	function update(){
		$id = $this->input->post('id');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$this->Redeem_model->update($id,$nama_lengkap,$username,$password,$level);
		redirect('redeem');
	}
}