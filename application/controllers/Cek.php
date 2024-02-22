<?php

class Cek extends CI_Controller{

    

	function __construct(){
		parent::__construct();
		$this->load->library('excel');
	    
	}
	
    
    function modul(){
        return 'cek';
    }

	function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']=$this->modul();
			$data['modul'] = $this->modul();
			$this->load->view('header',$data);
			$this->load->view($this->modul().'/data');
			$this->load->view('footer');
		}
	}





	function add(){
		$data['title']=$this->modul().' - Tambah';
		$data['modul'] = $this->modul();

		$this->load->view('header',$data);
		$this->load->view($this->modul().'/add');
		$this->load->view('footer');
	}
	
	public function uploadFoto($name_data,$ref_user){
		    $target_dir = "datafoto/";
    		$target_file = $target_dir .sha1(md5(date('ymdhis').$ref_user.$name_data)).'.png';
    		$ext = $target_dir .date('ymdhis').basename($_FILES[$name_data]["name"]);
    		$uploadOk = 1;
    		$imageFileType = strtolower(pathinfo($ext,PATHINFO_EXTENSION));
    
    		// Check if image file is a actual image or fake image
    		if(isset($_POST["submit"])) {
    		  $check = getimagesize($_FILES[$name_data]["tmp_name"]);
    		  if($check !== false) {
    		    echo "File is an image - " . $check["mime"] . ".";
    		    $uploadOk = 1;
    		  } else {
    		    echo "File is not an image.";
    		    $uploadOk = 0;
    		  }
    		}
    
    		// Check if file already exists
    		if (file_exists($target_file)) {
    		  echo "Sorry, file already exists.";
    		  $uploadOk = 0;
    		}
    
    		// Check file size
    		if ($_FILES[$name_data]["size"] > 12000000) {
    		  echo "Sorry, your file is too large.";
    		  $uploadOk = 0;
    		}
    
    		// Allow certain file formats
    		if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
    		  echo "Maaf File Anda harus berupa gambar";
    		  $uploadOk = 0;
    		}
    
    		// Check if $uploadOk is set to 0 by an error
    		if ($uploadOk == 0) {
    		  echo "Sorry, your file was not uploaded.";
    		// if everything is ok, try to upload file
    		} else {
    		  if (move_uploaded_file($_FILES[$name_data]["tmp_name"], $target_file)) {
    		  //  echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
    		    return $target_file;
    		  } else {
    		    echo "Sorry, there was an error uploading your file.";
    		  }
    		}
		}
		

	function insert(){
	    
	    

           $foto_medsos = $this->uploadFoto('foto_medsos',date('ymdhis'));
   
        
        
        $sql="INSERT INTO data_".$this->modul()."
        
                (";
                
                
            $no=1;
                 
            $jml =$this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->num_rows();
        foreach($this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->result() as $col){
        	    
        	   
        	   
        	   if($jml==$no){
        	       $sql .= $col->Field;
        	   }else{
        	       $sql .= $col->Field.",";
        	   }
        	   
        	   
        	   $no++;
        	    
        	}
                
                
                
                    
          $sql .=") VALUES(";
          
          $no2=1;
          
           foreach($this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->result() as $col){
        	    
        	    
        	    $data_field = $col->Field;
        	    
        	    if($data_field=="foto_medsos"){
        	        $data_field = $foto_medsos;
        	    }else{
        	        $data_field = $this->input->post($col->Field);
        	    }
        	    
        	     if($jml==$no2){
        	       $sql .= "'".$data_field."'";
        	   }else{
        	       $sql .= "'".$data_field."',";
        	   }
        	   
        	   
        	   $no2++;
        	   
        	   
        	   
        	    
        	}
        	
                
            
                
          $sql .=");";
            
      
            
        
            if($this->db->query($sql)){
              redirect($this->modul()); 
           
            }
		
	}
	
	function download(){
	    	$data['modul'] = $this->modul();
	    $this->load->view($this->modul().'/download',$data);
	    
	}

	function delete(){
		$id = $this->uri->segment(3);
	
		     
		      $sql="DELETE FROM data_".$this->modul()." WHERE id_".$this->modul()."='$id'";
                if($this->db->query($sql)){
                   redirect($this->modul()); 
                }
                
                
	
        
      
	}

	function edit(){

		$id	= $this->uri->segment(3);
		$data['title']=$this->modul().' - Edit';
		$data['id'] = $id;
		$data['modul'] = $this->modul();
		$this->load->view('header',$data);
		$this->load->view($this->modul().'/edit',$data);
		$this->load->view('footer');
	}

	



	function update(){
	    
	      $foto_old = $_POST['foto_medsos_old'];

      
      if(!empty($_FILES['foto_medsos']['name'])){
        
          $foto_medsos = $this->uploadFoto('foto_medsos',date('ymdhis'));
          unlink($foto_old);
           
      }else{
          
           $foto_medsos =$foto_old;
      }
      

      
      

		$id = $this->input->post('id_'.$this->modul());

        $sql="UPDATE data_".$this->modul()." SET ";
        
        
        	
        	
        	
        	        
            $jml =$this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->num_rows();
 
        	$no=1;
          
           foreach($this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->result() as $col){
        	    
        	    
        	     $data_field = $col->Field;
        	    
        	    if($data_field=="foto_medsos"){
        	        $data_field = $foto_medsos;
        	    }else{
        	        $data_field = $this->input->post($col->Field);
        	    }
        	    
        	    
        	    
        	     if($jml==$no){
        	        $sql .= "".$col->Field."='".$data_field."'";
        	   }else{
        	      $sql .= "".$col->Field."='".$data_field."',";
        	   }
        	   
        	   
        	   $no++;
        	   
        	   
        	   
        	    
        	}
        	
                
                
        $sql .=" WHERE id_".$this->modul()."='$id'";
        
        
              
        
            
            if($this->db->query($sql)){
              redirect($this->modul()); 
            }
	    
	    
	}
	
	function clear(){
	    $sql="DELETE FROM data_cek WHERE fid_member='".$_SESSION['id']."'";
	    if($this->db->query($sql)){
	         redirect($this->modul()); 
	    }
	    
	}
	
	function import(){
	    
	    	if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
		    
		    error_reporting(0);

	$values = end(explode(".", $_FILES["csv"]["name"])); // Mendapatkan semua value yang ada di tag input file excel
    $format = array("xls", "xlsx", "csv"); //pilihan format file
    if(in_array($values, $format)) {//mengecek format file yang di import
    $file = $_FILES["csv"]["tmp_name"]; // mendapatkan temporary source dari file excel
    $objPHPExcel = PHPExcel_IOFactory::load($file); // membuat objek dari library PHPExcel menggunakan metode load() untuk menemukan path dari file yang dipilih
    // Looping worksheet
 


                foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){
                  $totalrow = $worksheet->getHighestRow();
                  for($row=1; $row<=$totalrow; $row++){
            
                                 echo  $q = "INSERT IGNORE INTO data_cek( nama_toko, nama_penerima, barcode_oke,nomor_pesanan,nama_barang,jumlah,fid_member) 
                                     VALUES ( 
                                     '".str_replace("'","\'",$worksheet->getCellByColumnAndRow(0, $row)->getValue())."', 
                                     '".str_replace("'","\'",$worksheet->getCellByColumnAndRow(1, $row)->getValue())."', 
                                     '".str_replace("'","\'",$worksheet->getCellByColumnAndRow(2, $row)->getValue())."', 
                                     '".str_replace("'","\'",$worksheet->getCellByColumnAndRow(3, $row)->getValue())."', 
                                     '".str_replace("'","\'",$worksheet->getCellByColumnAndRow(4, $row)->getValue())."', 
                                     '".str_replace("'","\'",$worksheet->getCellByColumnAndRow(5, $row)->getValue())."', 
                                     '".$_SESSION['id']."'
                                     );";
                                     
                                     
                                      $this->db->query($q);
            
                  }
            
                }
   
	    
    	}
    	
    	 redirect($this->modul()); 
		    
		}
	 
           
	}
	
	function posting(){
	    
        	    foreach($this->db->query("SELECT * FROM data_cek WHERE fid_member='".$_SESSION['id']."'")->result() as $r ){
        	        
        	        
        	        
                	        $marketplace = $r->nama_toko;
                	        $penerima = $r->nama_penerima;
                	        $nomor_resi = $r->barcode_oke;
                	        $fid_member = $r->fid_member;
                	        
                	        $nomor_pesanan = $r->nomor_pesanan;
                	        $nama_barang = $r->nama_barang;
                	        $jumlah = $r->jumlah;
                
                  	        $jml = $this->db->query("SELECT * FROM barcode WHERE nama='$nomor_resi' limit 1")->num_rows();
                  	        
                  	        if($jml > 0){
                  	            $cek = $this->db->query("SELECT * FROM barcode WHERE nama='$nomor_resi' limit 1")->row_object();
                  	            
                  	           $nomor_barcode =  $cek->nama;
                  	           $tanggal= $cek->tanggal;
                                $jam=$cek->jam;
                                $ekspedisi = $cek->ekspedisi;
                                
                                
                
                  	        }else{
                  	               $nomor_barcode = '-';
                  	               $tanggal= '-';
                  	               $ekspedisi='-';
                                   $jam='-';
                
                  	        }
                  	        
                  	        
                  	        if($ekspedisi!='-'){
                  	            
                  	         $sql="INSERT INTO data_laporan(marketplace,penerima,nomor_resi,nomor_barcode,ekspedisi,tanggal,jam,fid_member,nomor_pesanan,nama_barang,jumlah) VALUES(
                  	                
                  	                
                  	                '$marketplace',
                                    '$penerima',
                                    '$nomor_resi',
                                    '$nomor_barcode',
                                    '$ekspedisi',
                                    '$tanggal',
                                    '$jam',
                                    '$fid_member',
                                    '$nomor_pesanan',
                                    '$nama_barang',
                                    '$jumlah'
                                    
                                   
                                                      	                
                  	            
                  	            )";
                  	            
                  	            	  $this->db->query("DELETE FROM data_cek WHERE id_cek='".$r->id_cek."'");
                  	                   $this->db->query($sql);
                  	        }
                  	        
                  	       
          	        
        	        
        	        
        	    }
        	    
        	    
        
        	   
        		    redirect('cek');
        	
	    
	    
	    
	    
	    
	}
	
}