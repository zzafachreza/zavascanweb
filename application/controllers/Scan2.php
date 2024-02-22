<?php

class Scan2 extends CI_Controller{

	function __construct(){
		parent::__construct();


	}
	
	        function tglSql($tgl){
	$tgl = explode("/", $tgl);
	return $tgl[2]."-".$tgl[1]."-".$tgl[0];
}
    
    function hapus_resi(){
        	if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Hapus Resi';
			$this->load->view('header',$data);
			$this->load->view('scan2/hapus');
			$this->load->view('footer');
		}
    }
    
    function hapus_resi_delete(){
        if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		    
		     if(!empty($_POST)){
        
    

            	   $awal = $this->tglSql($_POST['awal']);
            	   $akhir = $this->tglSql($_POST['akhir']);
            	   $id_member = $_POST['id_member'];
            	   $ekspedisi = $_POST['ekspedisi'];
            	   
            	   if($ekspedisi=='SEMUA'){
            	       $sql="SELECT * FROM barcode_$id_member WHERE tanggal BETWEEN '$awal' AND '$akhir'";
            	     
            	   }else{
            	       $sql="SELECT * FROM barcode_$id_member WHERE tanggal BETWEEN '$awal' AND '$akhir' AND ekspedisi='$ekspedisi'";
            	      
            	   }
            	   
            	    
            	   
            	     if($this->db->query($sql)){
            	
                    	    $this->session->set_flashdata('msg', 'Sebanyak <strong>'.$jml.'</strong> resi berhasil di hapus !');
                    	   redirect('scan2/hapus_resi');
            	     }
            	   
            	   
                }
	   
		    
		    
		    
		}
        
    }
    
	function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Scan Resi';
			$this->load->view('header',$data);
			$this->load->view('scan2/data');
			$this->load->view('footer');
		}
	}
	
	
	function get(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		

			$this->load->view('scan2/get');
	
		}
	}
	
	function cron(){
	    $sql="DELETE FROM beton WHERE id='21'";
	    $this->db->query($sql);
	    echo 'delete data beton 21';
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
		    
		    $sqlMember ="SELECT id_device FROM data_device WHERE fid_member='$id_member'";
            $cekDEVICE =  $this->db->query($sqlMember)->num_rows();
 
         if($cekDEVICE >=0){
             
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
		    }elseif(substr($key,0,3)=="221"){
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
		        
		  
		    
		    
		    
		      $sqlCek="SELECT * FROM barcode_$id_member WHERE nama='$key' limit 1";
                $hasil =$this->db->query($sqlCek);
                $cek  =$this->db->query($sqlCek)->row_object();
        
                if ($hasil->num_rows()>0) {
                    # code...

                     
                              
                    echo "Maaf barcode Anda ".$key." sudah di Scan Pada Tanggal ".$this->Indonesia3Tgl($cek->tanggal_scan)." pukul ".$cek->jam_scan."";
                }
                else{
                    $sql="INSERT INTO barcode_$id_member(ekspedisi,nama,tanggal_scan,jam_scan,by_scan) VALUES('$ekspedisi','$key',NOW(),NOW(),'$customer')";

                    $this->db->query("UPDATE member SET perangkat='WEB' WHERE id='$id_member'");
                    $this->db->query($sql);
                    echo 200;
                }
        		    
         }else{
             echo "Silahkan hubungi admin untuk upgrade";
             die();
         }
		    
		    
		    
		   
		    

		
	
		}
	}
}
?>