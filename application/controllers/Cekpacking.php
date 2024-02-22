<?php

class Cekpacking extends CI_Controller{

	function __construct(){
		parent::__construct();


	}

	function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Scan Resi';
			$this->load->view('header',$data);
			$this->load->view('cekpacking/data');
			$this->load->view('footer');
		}
	}
	
	
	function get(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		

			$this->load->view('cekpacking/get');
	
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
		    
		      $cek = "SELECT * FROM barcode_$id_member WHERE nama='$key'";
                 $jml = $this->db->query($cek)->num_rows();
                
                if($jml > 0){
                    
                    // cek double = 
                    
                    $cek2 = $this->db->query("SELECT * FROM barcode_$id_member WHERE nama='$key' AND status=1")->num_rows();
                    
                    if($cek2 > 0){
                        echo 'Nomor resi '.$key.' sudah pernah di scan packing !';
                    }else{
                        $this->db->query("UPDATE barcode_$id_member SET status=1,by_packing='$customer',tanggal_packing=CURDATE(),jam_packing=CURTIME() WHERE nama='$key'");
                   
                    echo 200;
                    }
                    
                    
                }else{
                    echo 'Maaf tidak bisa packing Anda belum pernah scan barcode ini !';
                }
		    
   
		    
		    
		   
		    

		
	
		}
	}
}
?>