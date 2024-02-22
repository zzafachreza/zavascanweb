<?php

class Scan extends CI_Controller{

	function __construct(){
		parent::__construct();


	}

	function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Scan Resi';
			$this->load->view('header',$data);
			$this->load->view('scan/data');
			$this->load->view('footer');
		}
	}
	
	
	function get(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		

			$this->load->view('scan/get');
	
		}
	}
	
	
		function delete(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		    

	       	$id = $_POST['id'];
		    $id_member = $_POST['id_member'];
		     $sql="DELETE FROM barcode2 WHERE id='$id'";
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
		    
		    $key = $_POST['key'];
		    $id_member = $_POST['id_member'];
		    
		    
		     if(substr($key,0,4)=="TJNT"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,4)."%'";
		    }elseif(substr($key,0,4)=="TKSC"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,4)."%'";
		    }elseif(substr($key,0,5)=="TKP01"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,5)."%'";
		    }elseif(substr($key,0,3)=="TKP"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,3)."%'";
		    }elseif(substr($key,0,3)=="JXP"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,3)."%'";
		    }elseif(substr($key,0,3)=="TJX"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,3)."%'";
		    }elseif(substr($key,0,4)=="TKNX"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,4)."%'";
		    }elseif(substr($key,0,4)=="TKAA"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,4)."%'";
		    }elseif(substr($key,0,4)=="TKLP"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,4)."%'";
		    }elseif(substr($key,0,3)=="TJ1"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,3)."%'";
		    }elseif(substr($key,0,5)=="BLAPK"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,5)."%'";
		    }elseif(substr($key,0,5)=="TPXL-"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,5)."%'";
		    }elseif(substr($key,0,4)=="SHPE"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,4)."%'";
		    }else{
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,2)."%'";
		    }
		    
		    
		 
		    
		      $kurir = $this->db->query($sqlEks)->row_object();
		      
		      
		      
		      if($this->db->query($sqlEks)->num_rows()>0){
		          $ekspedisi = $kurir->nama_kurir;
		      }else{
		          $ekspedisi = "TANPA KURIR";
		      }
		        
		  
		    
		    
		    
		      $sqlCek="SELECT * FROM barcode2 WHERE nama='$key'";
                $hasil =$this->db->query($sqlCek);
                $cek  =$this->db->query($sqlCek)->row_object();
        
                if ($hasil->num_rows()>0) {
                    # code...

                     
                              
                    echo "Maaf barcode Anda sudah di Scan Pada Tanggal ".$this->Indonesia3Tgl($cek->tanggal)." pukul ".$cek->jam."";
                }
                else{
                    $sql="INSERT INTO barcode2(ekspedisi,nama,tanggal,jam,id_member) VALUES('$ekspedisi','$key',NOW(),NOW(),'$id_member')";
                    $this->db->query($sql);
                    echo 200;
                }
		    
		    
		    
		   
		    

		
	
		}
	}
}
?>