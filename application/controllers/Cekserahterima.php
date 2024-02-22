<?php

class Cekserahterima extends CI_Controller{

	function __construct(){
		parent::__construct();


	}

	function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Scan Resi';
			$this->load->view('header',$data);
			$this->load->view('cekserahterima/data');
			$this->load->view('footer');
		}
	}
	
	
	function get(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		

			$this->load->view('cekserahterima/get');
	
		}
	}
	
	
		function delete(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		    

	       	$id = $_POST['id'];
		    $id_member = $_POST['id_member'];
		     $sql="DELETE FROM barcode_$id_member WHERE id='$id'";
		 
                    $this->db->query($sql);
                    echo 200;
	
		}
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


	
	function post(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		    
		    $key = strtoupper($_POST['key']);
		    $id_member = $_POST['id_member'];
		    $customer = $_POST['customer'];
		    
		      $cek = "SELECT * FROM barcode_$id_member WHERE nama='$key' AND status=1";
                 $jml = $this->db->query($cek)->num_rows();
                
                if($jml > 0){
                    
                    // cek double = 
                    
                    $cek2 = $this->db->query("SELECT * FROM barcode_$id_member WHERE nama='$key' AND status=2")->num_rows();
                    
                    if($cek2 > 0){
                        echo 'Nomor resi '.$key.' sudah pernah di scan ekspedisi !';
                    }else{
                        $this->db->query("UPDATE barcode_$id_member SET status=2,by_ekspedisi='$customer',tanggal_ekspedisi=CURDATE(),jam_ekspedisi=CURTIME() WHERE nama='$key'");
                    
                    echo 200;
                    }
                    
                    
                }else{
                    
                    $cek2 = $this->db->query("SELECT * FROM barcode_$id_member WHERE nama='$key' AND status=2")->num_rows();
                    if($cek2 > 0){
                        echo 'Nomor resi '.$key.' sudah pernah di scan ekspedisi !';
                    }else{
                      echo 'Maaf tidak bisa scan ekspedisi karena Anda belum pernah scan packing barcode ini !';  
                    }
                    
                }
		    
   
		    
		    
		   
		    

		
	
		}
	}
}
?>