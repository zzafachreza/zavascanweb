<?php

class Client extends CI_Controller{

    

	function __construct(){
		parent::__construct();
		
	    
	}
	
    
    function modul(){
        return 'client';
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


function add_kontrak(){
    	if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']=$this->modul();
			$data['modul'] = $this->modul();
			$this->load->view('header',$data);
			$this->load->view($this->modul().'/add_kontrak');
			$this->load->view('footer');
		}
}

function kontrak_edit(){
    	if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']=$this->modul();
			$data['modul'] = $this->modul();
			$this->load->view('header',$data);
			$this->load->view($this->modul().'/kontrak_edit');
			$this->load->view('footer');
		}
}
function delete_kontrak(){
    
      $fid_client = $this->uri->segment(3);
    $id_kontrak =  $this->uri->segment(4);
      $sql="DELETE FROM data_kontrak WHERE id_kontrak='$id_kontrak'";
            
            if($this->db->query($sql)){
                redirect($this->modul().'/tracking/'.$fid_client); 
            }
    
}
function update_kontrak(){
    
    $fid_client = $_POST['fid_client'];
    $id_kontrak = $_POST['id_kontrak'];
    $menu = $_POST['menu'];
    $keterangan = $_POST['keterangan'];
    $fitur = $_POST['fitur'];
    
    
    $sql="UPDATE data_kontrak SET
        menu='$menu',
        keterangan='$keterangan',
        fitur='$fitur'
        
        WHERE id_kontrak='$id_kontrak';
    ";
            
            if($this->db->query($sql)){
                redirect($this->modul().'/tracking/'.$fid_client); 
            }
            
    
}


function done_kontrak(){
    
     $fid_client = $this->uri->segment(3);
    $id_kontrak =  $this->uri->segment(4);

    
    
    $sql="UPDATE data_kontrak SET
        status=1 WHERE id_kontrak='$id_kontrak';
    ";
            
            if($this->db->query($sql)){
                redirect($this->modul().'/tracking/'.$fid_client); 
            }
            
    
}
function insert_kontrak(){

    $fid_client = $_POST['fid_client'];
    $menu = $_POST['menu'];
    $keterangan = $_POST['keterangan'];
    $fitur = $_POST['fitur'];
    
    
    $sql="INSERT INTO data_kontrak(
            
            fid_client,
            menu,
            keterangan,
            fitur
        ) VALUES(
            '$fid_client',
            '$menu',
            '$keterangan',
            '$fitur'
            
            );";
            
            if($this->db->query($sql)){
                redirect($this->modul().'/tracking/'.$fid_client); 
            }
}


	function detail(){
		$data['title']=$this->modul().' - Detail';
		$data['modul'] = $this->modul();

		$this->load->view('header',$data);
		$this->load->view($this->modul().'/view');
		$this->load->view('footer');
	}
	
	
	function tracking(){
		$data['title']=$this->modul().' - Tracking';
		$data['modul'] = $this->modul();

		$this->load->view('header_track',$data);
		$this->load->view($this->modul().'/tracking');
		$this->load->view('footer_track');
	}
	
	
	
	function tracking_update(){
	    
	    $fid_client = $this->uri->segment(3);
	    
	    $sqlA="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Order Masuk','$fid_client','ON')";
        $sqlB="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Requirement','$fid_client','BELUM')";
        $sqlC="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Konten Aplikasi','$fid_client','BELUM')";
        $sqlE="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Develop','$fid_client','BELUM')";
        $sqlF="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Quality Control','$fid_client','BELUM')";
        $sqlG="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Finishing','$fid_client','BELUM')";
        $sqlH="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Revisi 1','$fid_client','BELUM')";
        $sqlI="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Revisi 2','$fid_client','BELUM')";
        $sqlJ="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Revisi 3','$fid_client','BELUM')";
        $sqlK="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Selesai','$fid_client','BELUM')";
        
        
        $this->db->query($sqlA);
        $this->db->query($sqlB);
        $this->db->query($sqlC);
        $this->db->query($sqlE);
        $this->db->query($sqlF);
        $this->db->query($sqlG);
        $this->db->query($sqlH);
        $this->db->query($sqlI);
        $this->db->query($sqlJ);
        $this->db->query($sqlK);
        
         redirect($this->modul()); 
		
	    
	}
	

	function add(){
		$data['title']=$this->modul().' - Tambah';
		$data['modul'] = $this->modul();

		$this->load->view('header',$data);
		$this->load->view($this->modul().'/add');
		$this->load->view('footer');
	}
	
	
	function add_invoice(){
		$data['title']=$this->modul().' - Tambah';
		$data['modul'] = $this->modul();

		$this->load->view('header',$data);
		$this->load->view($this->modul().'/add_invoice');
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
	    
	    

           $myFoto = $this->uploadFoto('foto_'.$this->modul(),date('ymdhis'));
   
        
        
        $sql="INSERT INTO data_".$this->modul()."
        
                (";
                
                
            $no=1;
                 
            $jml =$this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->num_rows();
        foreach($this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->result() as $col){
        	    
        	   
        	   
        	   if($jml==$no){
        	       $sql .= str_replace(",","",$col->Field);
        	   }else{
        	       $sql .= str_replace(",","",$col->Field).",";
        	   }
        	   
        	   
        	   $no++;
        	    
        	}
                
                
                
                    
          $sql .=") VALUES(";
          
          $no2=1;
          
           foreach($this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->result() as $col){
        	    
        	    
        	    $data_field = $col->Field;
        	    
        	    
        	   
        	    
        	    
        	    
        	    if($data_field=="foto_".$this->modul()){
        	        $data_field = $myFoto;
        	    }else{
        	         if($data_field=="harga_".$this->modul()){
        	             $data_field = str_replace(",","",$this->input->post($col->Field));
        	           
            	    }else{
            	        $data_field = $this->input->post($col->Field);
            	    }
        	    }
        	    
        	      
        	    
        	    
        	    
        	    
        	     if($jml==$no2){
        	       $sql .= "'".$data_field."'";
        	   }else{
        	       $sql .= "'".$data_field."',";
        	   }
        	   
        	   
        	   $no2++;
        	   
        	   
        	   
        	    
        	}
        	
                
            
                
          $sql .=");";
            
      
            
        // echo $sql;
            if($this->db->query($sql)){
              
            
            $cek = $this->db->query("SELECT id_client FROM data_client ORDER BY id_client*1 DESC limit 1")->row_object();
            $fid_client = $cek->id_client;
                    $sqlA="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Order Masuk','$fid_client','ON')";
                    $sqlB="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Requirement','$fid_client','BELUM')";
                    $sqlC="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Konten Aplikasi','$fid_client','BELUM')";
                    $sqlE="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Develop','$fid_client','BELUM')";
                    $sqlF="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Quality Control','$fid_client','BELUM')";
                    $sqlG="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Finishing','$fid_client','BELUM')";
                    $sqlH="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Revisi 1','$fid_client','BELUM')";
                    $sqlI="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Revisi 2','$fid_client','BELUM')";
                    $sqlJ="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Revisi 3','$fid_client','BELUM')";
                    $sqlK="INSERT INTO data_tracking(status,fid_client,jenis) VALUES('Selesai','$fid_client','BELUM')";
                    
                    
                    $this->db->query($sqlA);
                    $this->db->query($sqlB);
                    $this->db->query($sqlC);
                    $this->db->query($sqlE);
                    $this->db->query($sqlF);
                    $this->db->query($sqlG);
                    $this->db->query($sqlH);
                    $this->db->query($sqlI);
                    $this->db->query($sqlJ);
                    $this->db->query($sqlK);
                    redirect($this->modul()); 
            }
		
	}
	
	function download(){
	    	$data['modul'] = $this->modul();
	    $this->load->view($this->modul().'/download',$data);
	    
	}

	function delete(){
		$id = $this->uri->segment(3);
		
		
// 		$sqlFoto = "SELECT foto_".$this->modul()." FROM data_".$this->modul()." WHERE id_".$this->modul()."='$id'";
// 		$fotoDelete = $this->db->query($sqlFoto)->row_object();

		     
		      $sql="DELETE FROM data_".$this->modul()." WHERE id_".$this->modul()."='$id'";
                if($this->db->query($sql)){
                    // unlink($fotoDelete->foto_laptop);
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
	    
	      $foto_old = $_POST['foto_'.$this->modul().'_old'];

      
      if(!empty($_FILES['foto_'.$this->modul()]['name'])){
        
          $myFoto = $this->uploadFoto('foto_'.$this->modul(),date('ymdhis'));
          unlink($foto_old);
           
      }else{
          
           $myFoto =$foto_old;
      }
      

      
      

		$id = $this->input->post('id_'.$this->modul());

        $sql="UPDATE data_".$this->modul()." SET ";
        
        
        	
        	
        	
        	        
            $jml =$this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->num_rows();
 
        	$no=1;
          
           foreach($this->db->query("SHOW COLUMNS from `data_".$this->modul()."` WHERE FIELD !='id_".$this->modul()."'")->result() as $col){
        	    
        	    
        	     $data_field = $col->Field;
  
        	    
        	   	    
        	    if($data_field=='foto_'.$this->modul()){
        	        $data_field = $myFoto;
        	    }else{
        	         if($data_field=="harga_".$this->modul()){
        	             $data_field = str_replace(",","",$this->input->post($col->Field));
        	           
            	    }else{
            	        $data_field = $this->input->post($col->Field);
            	    }
        	    }
        	    
        	    
        	    
        	    
        	    
        	    
        	     if($jml==$no){
        	        $sql .= "".$col->Field."='".$data_field."'";
        	   }else{
        	      $sql .= "".$col->Field."='".$data_field."',";
        	   }
        	   
        	   
        	   $no++;
        	   
        	   
        	   
        	    
        	}
        	
                
                
    echo    $sql .=" WHERE id_".$this->modul()."='$id'";
        
        
              
        
            
            if($this->db->query($sql)){
              redirect($this->modul()); 
            }
	    
	    
	}
	
	function insert_invoice(){
	    
	    $status_invoice = $_POST['status_invoice'];
        $tanggal_invoice = $_POST['tanggal_invoice'];
        $nomor_invoice = $_POST['nomor_invoice'];
        $harga = str_replace(",","",$_POST['harga']);
        $diskon = str_replace(",","",$_POST['diskon']);
        $hosting_domain = str_replace(",","",$_POST['hosting_domain']);
        $harga_total = $harga-$diskon;
        
        $fid_client = $_POST['fid_client'];
        
        $ringkasan =urlencode($_POST['ringkasan']);
        
        $sisa = $harga_total;
    
        
        $keterangan = urlencode($_POST['keterangan']);
        
        $sql="INSERT INTO data_invoice(
        
        status_invoice,
        tanggal_invoice,
        nomor_invoice,
        harga,
        diskon,
        harga_total,
        fid_client,
        hosting_domain,
        keterangan,
        sisa,
        ringkasan
            
            ) VALUES(
                
                '$status_invoice',
                '$tanggal_invoice',
                '$nomor_invoice',
                '$harga',
                '$diskon',
                '$harga_total',
                '$fid_client',
                '$hosting_domain',
                '$keterangan',
                '$sisa',
                '$ringkasan'
                
                )";
                
                
                if($this->db->query($sql)){
                        redirect($this->modul().'/detail/'.$fid_client); 
                }
	    
	    
	}
	
		function edit_invoice(){
		$data['title']=$this->modul().' - Edit';
		$data['modul'] = $this->modul();

		$this->load->view('header',$data);
		$this->load->view($this->modul().'/edit_invoice');
		$this->load->view('footer');
	}
	
	function update_invoice(){
	    	    $status_invoice = $_POST['status_invoice'];
                $tanggal_invoice = $_POST['tanggal_invoice'];
                $nomor_invoice = $_POST['nomor_invoice'];
                $harga = str_replace(",","",$_POST['harga']);
                $diskon = str_replace(",","",$_POST['diskon']);
                $harga_total = str_replace(",","",$_POST['harga_total']);
                 $hosting_domain = str_replace(",","",$_POST['hosting_domain']);
                $fid_client = $_POST['fid_client'];
                
                $ringkasan =urlencode($_POST['ringkasan']);
            
                
                $keterangan = urlencode($_POST['keterangan']);
                
                $sql="UPDATE data_invoice SET 
                    status_invoice='$status_invoice',
                    tanggal_invoice='$tanggal_invoice',
                    harga='$harga',
                    diskon='$diskon',
                    harga_total='$harga_total',
                    hosting_domain='$hosting_domain',
                    keterangan='$keterangan',
                    ringkasan='$ringkasan'
                    WHERE nomor_invoice='$nomor_invoice';
                
                ";
                
                 if($this->db->query($sql)){
                        redirect($this->modul().'/detail/'.$fid_client); 
                }
                
                
	}
	
	function dp(){
		$data['title']=$this->modul().' - Edit';
		$data['modul'] = $this->modul();

		$this->load->view('header',$data);
		$this->load->view($this->modul().'/edit_dp');
		$this->load->view('footer');
	}
	
	
		function termin(){
		$data['title']=$this->modul().' - Edit';
		$data['modul'] = $this->modul();

		$this->load->view('header',$data);
		$this->load->view($this->modul().'/edit_termin');
		$this->load->view('footer');
	}
	
		function lunas(){
		$data['title']=$this->modul().' - Edit';
		$data['modul'] = $this->modul();

		$this->load->view('header',$data);
		$this->load->view($this->modul().'/edit_lunas');
		$this->load->view('footer');
	}
	
	function update_invoice_dp(){
	    $nomor_invoice = $_POST['nomor_invoice'];
	    $status_invoice=$_POST['status_invoice'];
        $fid_client = $_POST['fid_client'];
        $tanggal_1 = $_POST['tanggal_1'];
        $bayar_1 = str_replace(",","",$_POST['bayar_1']);
        $sisa = str_replace(",","",$_POST['sisa']);
        
        $sql="UPDATE data_invoice SET
            status_invoice='$status_invoice',
            tanggal_1='$tanggal_1',
            bayar_1='$bayar_1',
            sisa='$sisa'
            WHERE nomor_invoice='$nomor_invoice';
        ";
        
         if($this->db->query($sql)){
                        redirect($this->modul().'/detail/'.$fid_client); 
                }
        
        
	    
	}
	
	
	function update_invoice_termin(){
	    $nomor_invoice = $_POST['nomor_invoice'];
	    $status_invoice=$_POST['status_invoice'];
        $fid_client = $_POST['fid_client'];
        $tanggal_2 = $_POST['tanggal_2'];
        $bayar_2 = str_replace(",","",$_POST['bayar_2']);
        $sisa = str_replace(",","",$_POST['sisa']);
        
        $sql="UPDATE data_invoice SET
            status_invoice='$status_invoice',
            tanggal_2='$tanggal_2',
            bayar_2='$bayar_2',
            sisa='$sisa'
            WHERE nomor_invoice='$nomor_invoice';
        ";
        
         if($this->db->query($sql)){
                        redirect($this->modul().'/detail/'.$fid_client); 
                }
        
        
	    
	}
	
	function print(){
	    	$this->load->view($this->modul().'/print');
	}
	
	function print_termin(){
	    $this->load->view($this->modul().'/print_termin');
	}
	
	function print_dp(){
	    $this->load->view($this->modul().'/print_dp');
	}
	
	function print_penawaran(){
	    $this->load->view($this->modul().'/print_penawaran');
	}
	
	function delete_invoice(){
	    $nomor_invoice = $this->uri->segment(3);
	    $fid_client = $this->uri->segment(4);
	    
	    $sql="DELETE FROM data_invoice WHERE nomor_invoice='$nomor_invoice'";
	    
	     if($this->db->query($sql)){
                        redirect($this->modul().'/detail/'.$fid_client); 
                }
	}
	
	function update_invoice_lunas(){
	    $nomor_invoice = $_POST['nomor_invoice'];
	    $status_invoice=$_POST['status_invoice'];
        $fid_client = $_POST['fid_client'];
        $tanggal_3 = $_POST['tanggal_3'];
        $bayar_3 = str_replace(",","",$_POST['bayar_3']);
        $sisa = str_replace(",","",$_POST['sisa']);
        
        $sql="UPDATE data_invoice SET
            status_invoice='$status_invoice',
            tanggal_3='$tanggal_3',
            bayar_3='$bayar_3',
            sisa='$sisa'
            WHERE nomor_invoice='$nomor_invoice';
        ";
        
         if($this->db->query($sql)){
                        redirect($this->modul().'/detail/'.$fid_client); 
                }
        
        
	    
	}
	
}