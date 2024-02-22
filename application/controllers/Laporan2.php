<?php


class laporan2 extends CI_Controller{

	function __construct(){
		parent::__construct();


	}
	
		function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Master Kurir';
			$this->load->view('header',$data);
			$this->load->view('scan/laporan22');
			$this->load->view('footer');
		}
	}
	
		function excel(){

    		if (!isset($_SESSION['email'])) {
    			redirect('login');
    		}else{
    	
    			$this->load->view('scan/excel22');
    		
    		}
		}
		
			function hapus(){

                $id = $this->uri->segment(3);
    
                $this->db->query("DELETE FROM barcode2 WHERE id='$id'");
        	    redirect('laporan2');
        		
        	
        	}
        	
        	
        	function delete_all(){

                $id_member = $_SESSION['id'];
                $awal = $this->uri->segment(3);
                $akhir = $this->uri->segment(4);
                
                 $sql="DELETE FROM barcode2 WHERE id_member='$id_member' AND tanggal BETWEEN '$awal' AND '$akhir'";
                
                $this->db->query($sql);
        	    redirect('laporan2');
        		
        	
        	}
	
}