<?php

class Kurir extends CI_Controller{

	function __construct(){
		parent::__construct();


	}

	function index(){

		if (!isset($_SESSION['email'])) {
			redirect('login');
		}else{
			$data['title']='Master Kurir';
			$this->load->view('header',$data);
			$this->load->view('kurir/data');
			$this->load->view('footer');
		}
	}
	




	function add(){
		$data['title']='FM | Master Kegiatan - Add';

		$this->load->view('header',$data);
		$this->load->view('kurir/add');
		$this->load->view('footer');
	}
	
	


	function insert(){

	

		$nama_kurir = $this->input->post('nama_kurir');
		$kode = $this->input->post('kode');
		
        $target_dir = "upload/";
            		$target_file = $target_dir .$_FILES["foto"]["name"];
            		$uploadOk = 1;
            		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            		move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
            		$foto =  $target_file;

            		
        $sql="INSERT INTO data_kurir(nama_kurir,kode,foto) VALUES('$nama_kurir','$kode','$foto')";
           
         if($this->db->query($sql)){
             
		    redirect('kurir');
         } 		

		
	
		
	}

	function delete(){
		$id = $this->uri->segment(3);
		$foto = $this->uri->segment(5);
        $this->db->query("DELETE FROM data_kurir WHERE id='$id'");
		unlink('upload/'.$foto);
		redirect('kurir');
	}
	
	


	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='FM | Master Kegiatan - Edit';
		$hasil = $this->db->query("SELECT * FROM data_kurir WHERE id='$id'");

		$data['kurir'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('kurir/edit',$data);
		$this->load->view('footer');
	}
	
	
		function detail(){

		$id	= $this->uri->segment(3);

		$data['id'] = $id;

		$this->load->view('header',$data);
		$this->load->view('library/view',$data);
		$this->load->view('footer');
	}
	
	

	



	function update(){

		$id = $this->input->post('id');
		$foto_old = $this->input->post('foto_old');
	
		$nama_kurir = $this->input->post('nama_kurir');
		$kode = $this->input->post('kode');



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
	

	    
	    
	    	if(!empty($foto)){
			 $sql= "UPDATE data_kurir SET 
			 
			nama_kurir='$nama_kurir',
            kode='$kode',

			 foto='$foto' WHERE id='$id'";
		}else{

			 $sql= "UPDATE data_kurir SET 
			
			    	nama_kurir='$nama_kurir',
                    kode='$kode'
                
			
			WHERE id='$id'";
		}
		
		if($this->db->query($sql)){
		    	redirect('kurir');
		}
	
	
	
	
	}
	
}