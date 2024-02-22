<?php

class Bidang extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Bidang_model');

	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Master Kegiatan';
			$data['bidang'] = $this->Bidang_model->getData();
			$this->load->view('header',$data);
			$this->load->view('bidang/data');
			$this->load->view('footer');
		}
	}
	
	function pica(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Master Kegiatan';
			$data['bidang'] = $this->Bidang_model->getData();
			$this->load->view('header',$data);
			$this->load->view('bidang/data_pica');
			$this->load->view('footer');
		}
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Kegiatan - Detail';
		$hasil = $this->Bidang_model->getId($id);

		$data['bidang'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('bidang/view',$data);
		$this->load->view('footer');
	}


	function anggaran(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Kegiatan - Detail';
		$hasil = $this->Bidang_model->getId($id);

		$data['bidang'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('bidang/anggaran',$data);
		$this->load->view('footer');
	}
	
	
		function curva(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Kegiatan - Detail';
		$hasil = $this->Bidang_model->getId($id);

		$data['bidang'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('bidang/curva',$data);
		$this->load->view('footer');
	}




	function timeline(){

		$data['title']='FM | Master Kegiatan - Detail';


		$this->load->view('header',$data);
		$this->load->view('bidang/timeline',$data);
		$this->load->view('footer');
	}




	function add(){
		$data['title']='FM | Master Kegiatan - Add';

		$this->load->view('header',$data);
		$this->load->view('bidang/add');
		$this->load->view('footer');
	}
	
	    function add2(){
		$data['title']='FM | Master Bidang - Add';
        $data['id_bidang'] = $this->uri->segment(3);
		$this->load->view('header',$data);
		$this->load->view('bidang/add2');
		$this->load->view('footer');
	}
	
		
	    function add3(){
		$data['title']='FM | Master Bidang - Add';
		$data['id_bidang'] = $this->uri->segment(3);
        $data['id_kegiatan'] = $this->uri->segment(4);
        $data['kode'] = $this->uri->segment(5);
		$this->load->view('header',$data);
		$this->load->view('bidang/add3');
		$this->load->view('footer');
	}
	
	
	 function edit3(){
		$data['title']='FM | Master Bidang - Add';
		$data['id'] = $this->uri->segment(3);
		$data['id_bidang'] = $this->uri->segment(4);
        $data['id_kegiatan'] = $this->uri->segment(5);
        $data['kode'] = $this->uri->segment(6);
		$this->load->view('header',$data);
		$this->load->view('bidang/edit3');
		$this->load->view('footer');
	}
	
	
	
	
		    function edit2(){
		$data['title']='FM | Master Bidang - Add';
        $data['id'] = $this->uri->segment(3);
        $data['id_bidang'] = $this->uri->segment(4);
		$this->load->view('header',$data);
		$this->load->view('bidang/edit2');
		$this->load->view('footer');    
	}
	
	
	function edit_anggaran(){
		$data['title']='FM | Master Bidang - Add';
        $data['id'] = $this->uri->segment(3);
        $data['id_bidang'] = $this->uri->segment(4);
		$this->load->view('header',$data);
		$this->load->view('bidang/edit_anggaran');
		$this->load->view('footer');    
	}
	
	
	
	function view2(){
		$data['title']='FM | Master Bidang - Add';
        $data['id'] = $this->uri->segment(3);
        $data['id_bidang'] = $this->uri->segment(4);
		$this->load->view('header',$data);
		$this->load->view('bidang/view2');
		$this->load->view('footer');    
	}
	
	
		function cetak_uraian(){
		$data['title']='FM | Master Bidang - Add';
        $data['id'] = $this->uri->segment(3);
        $data['id_bidang'] = $this->uri->segment(4);
		$this->load->view('header',$data);
		$this->load->view('bidang/cetak');
		$this->load->view('footer');    
	}
	
		function cetak_pajak(){
		$data['title']='FM | Master Bidang - Add';
        $data['id'] = $this->uri->segment(3);
        $data['id_bidang'] = $this->uri->segment(4);
		$this->load->view('header',$data);
		$this->load->view('bidang/pajak');
		$this->load->view('footer');    
	}
	
	
	function tambah_anggaran(){
	    $anggaran = $this->input->post('anggaran');
		 $tahun = $this->input->post('tahun');
		 $bulan= $this->input->post('bulan');
		$id_bidang =$this->input->post('id_bidang');
		
		$sql="INSERT INTO data_anggaran(bulan,tahun,anggaran,id_bidang) VALUES('$bulan','$tahun','$anggaran','$id_bidang')";
		
			
	    if($this->db->query($sql)){
	        	$sql2="UPDATE data_bidang SET anggaran=anggaran+$anggaran WHERE id='$id_bidang'";
		        $this->db->query($sql2);
	    }
	
        
        redirect('bidang/anggaran/'.$id_bidang);
	    
	}
	
		function update_anggaran(){
		    $id = $this->input->post('id');
	    $anggaran = $this->input->post('anggaran');
		 $tahun = $this->input->post('tahun');
		 $bulan= $this->input->post('bulan');
		$id_bidang =$this->input->post('id_bidang');
		
		$sql="UPDATE data_anggaran SET anggaran='$anggaran',tahun='$tahun',bulan='$bulan' WHERE id='$id'";
		if($this->db->query($sql)){
		    $sql2="UPDATE data_bidang SET anggaran=(select sum(anggaran) from data_anggaran WHERE id_bidang='$id_bidang' ) WHERE id='$id_bidang'";
		        $this->db->query($sql2);
		}
        
        redirect('bidang/anggaran/'.$id_bidang);
	    
	}
	
	
	function hapus_anggaran(){
	     $id= $this->uri->segment(3);
	     $id_bidang =$this->uri->segment(4);
	     $anggaran =$this->uri->segment(5);
		
	     $sql="DELETE FROM data_anggaran WHERE id='$id'";
	
		if($this->db->query($sql)){
		    $sql2="UPDATE data_bidang SET anggaran=anggaran-$anggaran WHERE id='$id_bidang'";
		        $this->db->query($sql2);
		}
        
        redirect('bidang/anggaran/'.$id_bidang);
	    
	}
	
	
	
	function insert2(){
	    $nama_kegiatan = $this->input->post('nama_kegiatan');
		 $tahun = $this->input->post('tahun');
		 $bulan= $this->input->post('bulan');
		$id_bidang =$this->input->post('id_bidang');
		$kode = 'SIM'.date('ymdhis');
		
	

		
		$sql="INSERT INTO data_kegiatan(kode,nama_kegiatan,tahun,bulan,id_bidang,tanggal) VALUES('$kode','$nama_kegiatan','$tahun','$bulan','$id_bidang',NOW())";
		
		
		$this->db->query($sql);
        
        
        redirect('bidang/detail/'.$id_bidang);
	    
	}
	
	
	function insert3(){
	    




            
         $id_bidang = $this->input->post('id_bidang');
	     $id_kegiatan = $this->input->post('id_kegiatan');
		$kode = $this->input->post('kode');
		$id_rekening = $this->input->post('id_rekening');
		$tanggal_uraian= $this->input->post('tanggal_uraian');
		$uraian =$this->input->post('uraian');
		$masuk =$this->input->post('masuk');
		$keluar =$this->input->post('keluar');
		
		
		
			
	
		
		
		if($masuk > 0){
		    $sql2="UPDATE data_bidang SET perubahan=perubahan-$masuk WHERE id='$id_bidang'";
		    	$this->db->query($sql2);
		}elseif($keluar > 0){
		    $sql2="UPDATE data_bidang SET perubahan=perubahan+$keluar WHERE id='$id_bidang'";
		    	$this->db->query($sql2);
		}
		
		
		if(empty($_FILES['foto']['name'])){
		    $sql="INSERT INTO data_kegiatan_detail(kode,tanggal_uraian,uraian,id_rekening,masuk,keluar,status) VALUES('$kode','$tanggal_uraian','$uraian','$id_rekening','$masuk','$keluar','TIDAK LENGKAP')";
	        $this->db->query($sql);
			}else{
			    	$target_dir = "upload/";
            		$target_file = $target_dir .date('ymdhis').basename($_FILES["foto"]["name"]);
            		$uploadOk = 1;
            		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            		move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
            		$foto =  $target_file;
			    $sql="INSERT INTO data_kegiatan_detail(kode,tanggal_uraian,uraian,id_rekening,masuk,keluar,foto,status) VALUES('$kode','$tanggal_uraian','$uraian','$id_rekening','$masuk','$keluar','$foto','TIDAK LENGKAP')";
		        $this->db->query($sql);
			}
			
			
		
       
        
        redirect('bidang/view2/'.$id_kegiatan.'/'.$id_bidang);
	    
	}
	
	
		function update3(){
		    
	



        $id = $this->input->post('id'); 
        $id_bidang = $this->input->post('id_bidang');
	    $id_kegiatan = $this->input->post('id_kegiatan');
		$kode = $this->input->post('kode');
		$id_rekening = $this->input->post('id_rekening');
		$tanggal_uraian= $this->input->post('tanggal_uraian');
		$uraian =$this->input->post('uraian');
		$masuk =$this->input->post('masuk');
		$keluar =$this->input->post('keluar');
		$status = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');
		$foto_old =  $this->input->post('foto_old');
		
		if(empty($_FILES['foto']['name'])){
		    echo "ada tidak foto;";
		    

		
			    	$sql="UPDATE data_kegiatan_detail SET tanggal_uraian='$tanggal_uraian',uraian='$uraian',masuk='$masuk',keluar='$keluar',id_rekening='$id_rekening',status='$status',keterangan='$keterangan' WHERE id='$id'";
		}else{
		    echo "ada foto;";
		    	$target_dir = "upload/";
        		$target_file = $target_dir .date('ymdhis').basename($_FILES["foto"]["name"]);
        		$uploadOk = 1;
        		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        		move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
        		 unlink($foto_old);
        		$foto =  $target_file;
        		
			    	$sql="UPDATE data_kegiatan_detail SET tanggal_uraian='$tanggal_uraian',uraian='$uraian',masuk='$masuk',keluar='$keluar',id_rekening='$id_rekening',foto='$foto',status='$status',keterangan='$keterangan'  WHERE id='$id'";
		}
		
		
		if($this->db->query($sql)){
		  
		   $sql2="UPDATE data_bidang SET perubahan=(select sum(keluar-masuk) jml from data_kegiatan_detail join data_kegiatan on data_kegiatan.kode = data_kegiatan_detail.kode WHERE id_bidang='$id_bidang') WHERE id='$id_bidang'";
		   $this->db->query($sql2);
		}
		
	
	
		
        
        
        redirect('bidang/view2/'.$id_kegiatan.'/'.$id_bidang);
	    
	}
	
		function update2(){
	    $nama_kegiatan = $this->input->post('nama_kegiatan');
	    $id = $this->input->post('id');
	    $id_bidang = $this->input->post('id_bidang');
		$tahun = $this->input->post('tahun');
		$bulan =$this->input->post('bulan');
		 
		echo $sql="UPDATE data_kegiatan SET nama_kegiatan='$nama_kegiatan',tahun='$tahun',bulan='$bulan' WHERE id_bidang='$id_bidang' AND id='$id'";
		
	
		
		if($this->db->query($sql)){
		     redirect('bidang/detail/'.$id_bidang);
		    
		}
        
        
       
	    
	}

	function insert(){

		$target_dir = "upload/";
		$target_file = $target_dir .date('ymdhis').basename($_FILES["foto"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["foto"]["tmp_name"]);
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
		if ($_FILES["foto"]["size"] > 12000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}


		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
		    echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}

		$nama = $this->input->post('nama');
		$anggaran = $this->input->post('anggaran');
		
		
		$foto =  $target_file;
		
		$this->Bidang_model->insert(
		    
		    $nama,
            $anggaran,
            
            
            $foto
		    
		    );
		redirect('bidang');
	}

	function delete(){
		$id = $this->uri->segment(3);
		$foto = $this->uri->segment(5);
		unlink('upload/'.$foto);
		$this->Bidang_model->delete($id);
		redirect('bidang');
	}
	
	
	function delete3(){
	    $id = $this->uri->segment(3);
		$id_bidang = $this->uri->segment(4);
        $id_kegiatan = $this->uri->segment(5);
        $kode = $this->uri->segment(6);
        $masuk = $this->uri->segment(7);
        $keluar = $this->uri->segment(8);
		$sql="DELETE FROM data_kegiatan_detail WHERE id='$id'";
		
			if($masuk > 0){
		    $sql2="UPDATE data_bidang SET perubahan=perubahan+$masuk WHERE id='$id_bidang'";
		    	$this->db->query($sql2);
		}elseif($keluar > 0){
		    $sql2="UPDATE data_bidang SET perubahan=perubahan-$keluar WHERE id='$id_bidang'";
		    	$this->db->query($sql2);
		}
		
		
		$this->db->query($sql);
		redirect('bidang/view2/'.$id_kegiatan.'/'.$id_bidang);
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='FM | Master Kegiatan - Edit';
		$hasil = $this->Bidang_model->getId($id);

		$data['bidang'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('bidang/edit',$data);
		$this->load->view('footer');
	}
	
	
	function delete2(){
		$id = $this->uri->segment(3);
		$id_bidang = $this->uri->segment(4);

	    
	    	$sql="DELETE FROM data_kegiatan WHERE id='$id' AND id_bidang='$id_bidang'";
	    	
	   
		$this->db->query($sql);
	
		redirect('bidang/detail/'.$id_bidang);
	}

	



	function update(){

		$id = $this->input->post('id');
		$foto_old = $this->input->post('foto_old');
	
		$nama = $this->input->post('nama');
		$anggaran = $this->input->post('anggaran');
		$perubahan = $this->input->post('perubahan');

		


		if(empty($_FILES['foto']['name'])){
				
				echo "tidak ada foto";
				$foto="";
				  	
					
		}else{

			echo "ada foto";
				 $target_dir = "upload/";
				$target_file = $target_dir .date('ymdhis').basename($_FILES["foto"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				  $check = getimagesize($_FILES["foto"]["tmp_name"]);
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
				if ($_FILES["foto"]["size"] > 12000000) {
				  echo "Sorry, your file is too large.";
				  $uploadOk = 0;
				  die();
				}

				// // Allow certain file formats
				// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				// && $imageFileType != "gif" ) {
				//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				//   $uploadOk = 0;
				// }

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				  echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				  if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
				 
				    echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
				    unlink($foto_old);	
				  } else {
				    echo "Sorry, there was an error uploading your file.";
				  }
				}
				 $foto = $target_file;
		}
	

		$this->Bidang_model->update($id,
		    
		   		$nama,
        		$anggaran,
        		$perubahan,
                    
            $foto,
		
		$foto_old);
		redirect('bidang');
	}
	
}