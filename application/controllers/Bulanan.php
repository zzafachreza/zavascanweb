<?php

class Bulanan extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	function index(){

		if (!isset($_SESSION['email']) && $_SESSION['email']=="zavalabsofficial@gmail.com") {
			redirect('login');
		}else{
			$data['title']='Data Broadcast';
			$this->load->view('header',$data);
			$this->load->view('bulanan/data');
			$this->load->view('footer');
		}
	}


    function next(){
        $id_bulanan = $this->uri->segment(3);
        $fid_member = $this->uri->segment(4);
        
        $bulanan = $this->db->query("SELECT * FROM data_bulanan WHERE id_bulanan='$id_bulanan'")->row_object();
        
    print_r($bulanan);

        
        $tgl_bulanan = new DateTime($bulanan->tanggal_bulanan);
        $tgl_today = new DateTime(date('Y-m-d'));
       
        $jarak =$tgl_today->diff($tgl_bulanan);
      
        
         $jatuh_tempo = $bulanan->jatuh_tempo;
        
         $expired =  date("Y-m-d", strtotime("+1 year", strtotime($bulanan->jatuh_tempo)));
        
        
          $jumlah_hari = $jarak->days;
         

        
         $jumlah_resi = $this->db->query("SELECT id FROM barcode WHERE id_member='$fid_member'")->num_rows();
        
         $rata2 = round($jumlah_resi/$jumlah_hari);
         $biaya = 249000;
                        //       if($rata2<=250){
		                  //      $biaya = 300000;
		                  //  }else if($rata2 > 250 && $rata2 <= 500){
		                  //      $biaya = 500000;
		                  //  }else if($rata2 > 500 && $rata2 <= 750){
		                  //      $biaya = 750000;
		                  //  }else if($rata2 > 740 && $rata2 <= 1500){
		                  //      $biaya = 1000000;
		                  //  }else if($rata2 > 1500 && $rata2 <= 3000){
		                  //      $biaya = 1500000;
		                  //  }else if($rata2 > 3000){
		                  //      $biaya = 2000000;
		                  //  }
		                    
		                echo    $sql2="INSERT INTO data_bulanan(fid_member,jumlah_resi,biaya,tanggal_bulanan,jatuh_tempo,status,jumlah_hari,jumlah_rata) VALUE('$fid_member','$jumlah_resi','$biaya','$jatuh_tempo','$expired','BELUM BAYAR','$jumlah_hari','$rata2')";
		                    
		                    if($this->db->query($sql2)){
		                        	redirect('bulanan');
		                    }
        

        
        
        
    }



	function edit(){


		$data['title']='Bulanan - Edit';
		$this->load->view('header',$data);
		$this->load->view('bulanan/edit',$data);
		$this->load->view('footer');
	}
	
	function add(){


		$data['title']='Bulanan - Add';
		$this->load->view('header',$data);
		$this->load->view('bulanan/add',$data);
		$this->load->view('footer');
	}
	
	
	
	function view(){



		$this->load->view('bulanan/view');
	}

	



	function insert(){

		    $fid_member = $_POST['fid_member'];
            $tanggal_bulanan = $_POST['tanggal_bulanan'];
            $jatuh_tempo = $_POST['jatuh_tempo'];
            $jumlah_resi = $_POST['jumlah_resi'];
            $biaya = $_POST['biaya'];
            $status = $_POST['status'];


		$sql="INSERT INTO data_bulanan(
		    fid_member,
            tanggal_bulanan,
            jatuh_tempo,
            jumlah_resi,
            biaya,
            status
		    ) VALUES(
		        '$fid_member',
                '$tanggal_bulanan',
                '$jatuh_tempo',
                '$jumlah_resi',
                '$biaya',
                '$status'
		        
		        
		        
		        )";
		
		if($this->db->query($sql)){
		    	redirect('bulanan');
		}
		
        
	}
	
	
	function buat_tagihan(){

		$fid_company = $this->uri->segment(3);
            
            $jumlah_pegawai = $this->db->query("SELECT * FROM data_user WHERE fid_company='$fid_company'")->num_rows();
            
            $biaya = $jumlah_pegawai*10000;
            
             $jatuh_tempo = date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 year'));
		
	echo	$sql="INSERT INTO data_bulanan(fid_company,jumlah_pegawai,biaya,jatuh_tempo) VALUES('$fid_company','$jumlah_pegawai','$biaya','$jatuh_tempo')";
		
		if($this->db->query($sql)){
		    	redirect('bulanan');
		}
		
        
	}
	
	
		function update(){

		    $id_bulanan = $this->uri->segment(3);
		    
		    $sql="UPDATE data_bulanan SET status='LUNAS' WHERE id_bulanan='$id_bulanan'";
		    
		
		if($this->db->query($sql)){
		    

		    
		    	redirect('bulanan');
		}
		
        
	}
	
	
	function delete(){

		$id_bulanan = $this->uri->segment(3);

		
		$sql="DELETE FROM data_bulanan WHERE id_bulanan='$id_bulanan'";
		
		if($this->db->query($sql)){
		    	redirect('bulanan');
		}
		
        
	
	}
	
		function sendInformasi($to,$data){

    	$apiKey='AAAApEZkyfk:APA91bE8vnsalxsDSwVQLjUwSbTUWx88Q6PSItflxiJd3UadLymaDCyIhQVAXlLRi054OnYeyxFHZBBe3XcYw3ozGhgC8dFo7F6ffNkSA4sN3DT4foOvA5WyZywwP27q1dr-W1FZTflV';
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
    
    	echo $result = curl_exec($ch);
    	curl_close($ch);
    
    	return json_decode($result,true);
    	
    
    
    }
    
	
		function kirim(){
		    
		  $sqlUser = "SELECT * FROM data_user WHERE token !=''";
		  
		  $br = $this->db->query("SELECT * FROM data_broadcast limit 1")->row_object();
		  
		  
		     $dataNotifikasi = array('title'=>$br->title,'body'=>$br->body);
		  	     
		  
		  foreach($this->db->query($sqlUser)->result() as $usr){
		     $usr->token;
		     $this->sendInformasi($usr->token,$dataNotifikasi);
		  }

	
		
// 		$sql="UPDATE data_broadcast SET last_update=NOW()";
		
// 		if($this->db->query($sql)){
		    	redirect('broadcast');
// 		}
		
        
	
	}
	
}