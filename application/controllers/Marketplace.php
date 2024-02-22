<?php

class Marketplace extends CI_Controller{

    

	function __construct(){
		parent::__construct();
		
	    
	}
	
    
    function modul(){
        return 'marketplace';
    }


// shopeeeeeeeeeeeeeeeeeeee


	function shopee(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']=$this->modul();
			$data['modul'] = $this->modul();
			$this->load->view('header',$data);
			$this->load->view($this->modul().'/shopee_data');
			$this->load->view('footer');
		}
	}
	function shopee_get(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		
	
			$this->load->view($this->modul().'/shopee_get');

		}
	}
	
	
	function shopee_excel(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		
	
			$this->load->view($this->modul().'/shopee_excel');

		}
	}
	
	
	
	function shopee_delete(){
		$id = $this->uri->segment(3);
	
		     
		      $sql="DELETE FROM data_shopee WHERE id_shopee='$id'";
                if($this->db->query($sql)){
                   redirect($this->modul().'/shopee'); 
                }
      
	}
	
	function shopee_clear(){
		$id = $this->uri->segment(3);
	
		     
		    echo $sql="DELETE FROM data_shopee WHERE fid_member='$id'";
                if($this->db->query($sql)){
                  redirect($this->modul().'/shopee'); 
                }
      
	}
	
	
	// LAZADA
	
	function lazada(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']=$this->modul();
			$data['modul'] = $this->modul();
			$this->load->view('header',$data);
			$this->load->view($this->modul().'/lazada_data');
			$this->load->view('footer');
		}
	}
	function lazada_get(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		
	
			$this->load->view($this->modul().'/lazada_get');

		}
	}
	
	
	function lazada_excel(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		
	
			$this->load->view($this->modul().'/lazada_excel');

		}
	}
	
	
	
	function lazada_delete(){
		$id = $this->uri->segment(3);
	
		     
		      $sql="DELETE FROM data_lazada WHERE id_lazada='$id'";
                if($this->db->query($sql)){
                   redirect($this->modul().'/lazada'); 
                }
      
	}
	
	
		function lazada_clear(){
		$id = $this->uri->segment(3);
	
		     
		    echo $sql="DELETE FROM data_lazada WHERE fid_member='$id'";
                if($this->db->query($sql)){
                  redirect($this->modul().'/lazada'); 
                }
      
	}
	
	// LAZADA
	
	
	
	
	
	



	// TOKOPEDIA
	
	function tokopedia(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']=$this->modul();
			$data['modul'] = $this->modul();
			$this->load->view('header',$data);
			$this->load->view($this->modul().'/tokopedia_data');
			$this->load->view('footer');
		}
	}
	function tokopedia_get(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		
	
			$this->load->view($this->modul().'/tokopedia_get');

		}
	}
	
	
	function tokopedia_excel(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		
	
			$this->load->view($this->modul().'/tokopedia_excel');

		}
	}
	
	
	
	function tokopedia_delete(){
		$id = $this->uri->segment(3);
	
		     
		      $sql="DELETE FROM data_tokopedia WHERE id_tokopedia='$id'";
                if($this->db->query($sql)){
                   redirect($this->modul().'/lazada'); 
                }
      
	}
	
	
		function tokopedia_clear(){
		$id = $this->uri->segment(3);
	
		     
		    echo $sql="DELETE FROM data_tokopedia WHERE fid_member='$id'";
                if($this->db->query($sql)){
                  redirect($this->modul().'/lazada'); 
                }
      
	}
	
	// TOKOPEDIA
	
	
	// TIKTOK
	
	function tiktok(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']=$this->modul();
			$data['modul'] = $this->modul();
			$this->load->view('header',$data);
			$this->load->view($this->modul().'/tiktok_data');
			$this->load->view('footer');
		}
	}
	function tiktok_get(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		
	
			$this->load->view($this->modul().'/tiktok_get');

		}
	}
	
	
	function tiktok_excel(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		
	
			$this->load->view($this->modul().'/tiktok_excel');

		}
	}
	
	
	
	function tiktok_delete(){
		$id = $this->uri->segment(3);
	
		     
		      $sql="DELETE FROM data_tiktok WHERE id_tiktok='$id'";
                if($this->db->query($sql)){
                   redirect($this->modul().'/lazada'); 
                }
      
	}
	
	
		function tiktok_clear(){
		$id = $this->uri->segment(3);
	
		     
		    echo $sql="DELETE FROM data_tiktok WHERE fid_member='$id'";
                if($this->db->query($sql)){
                  redirect($this->modul().'/lazada'); 
                }
      
	}
	
	// TIKTOK
	


	
	
}


?>