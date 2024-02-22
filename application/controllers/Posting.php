<?php


class Posting extends CI_Controller{

	function __construct(){
		parent::__construct();


	}
	
		function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Laporan Data Posting';
			$this->load->view('header',$data);
			$this->load->view('cek/posting');
			$this->load->view('footer');
		}
	}
	
		function excel(){

    		if (!isset($_SESSION['email'])) {
    			redirect('login');
    		}else{
    	
    			$this->load->view('cek/excel');
    		
    		}
		}
		
		
		
		function excel2(){

    		if (!isset($_SESSION['email'])) {
    			redirect('login');
    		}else{
    	
    			$this->load->view('cek/excel2');
    		
    		}
		}
		
		function reset(){
            
            $fid_member= $_SESSION['id'];
            $sql="DELETE FROM data_laporan WHERE fid_member='$fid_member'";
            if($this->db->query($sql)){
                $this->session->set_flashdata('msg', 'Data Harian Berhasil di Reset !');
                redirect('./');
            }
                	
		}

	
}