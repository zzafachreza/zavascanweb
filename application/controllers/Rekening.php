<?php

class Rekening extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Rekening_model');

	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Master Rekening';
			$data['rekening'] = $this->Rekening_model->getData();
			$this->load->view('header',$data);
			$this->load->view('rekening/data');
			$this->load->view('footer');
		}
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Rekening - Detail';
		$hasil = $this->Rekening_model->getId($id);

		$data['rekening'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('rekening/view',$data);
		$this->load->view('footer');
	}



	function timeline(){

		$data['title']='FM | Master Rekening - Detail';


		$this->load->view('header',$data);
		$this->load->view('rekening/timeline',$data);
		$this->load->view('footer');
	}




	function add(){
		$data['title']='FM | Master Rekening - Add';

		$this->load->view('header',$data);
		$this->load->view('rekening/add');
		$this->load->view('footer');
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

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
		
		
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
    	$level = $this->input->post('level');
    	$induk = $this->input->post('induk');
		
		
		$foto =  $target_file;
		
		$this->Rekening_model->insert(
		    $kode,
		    $nama,
		    $level,
		    $induk,
            $foto
		    
		    );
		redirect('rekening');
	}

	function delete(){
		$id = $this->uri->segment(3);
		$foto = $this->uri->segment(5);
		unlink('upload/'.$foto);
		$this->Rekening_model->delete($id);
		redirect('rekening');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='FM | Master Rekening - Edit';
		$hasil = $this->Rekening_model->getId($id);

		$data['rekening'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('rekening/edit',$data);
		$this->load->view('footer');
	}

	



	function update(){

		$id = $this->input->post('id');
		$foto_old = $this->input->post('foto_old');
	

		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
    	$level = $this->input->post('level');
    	$induk = $this->input->post('induk');
		
	

		


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

				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				  $uploadOk = 0;
				}

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
	

		$this->Rekening_model->update($id,
		    
		     $kode,
		    $nama,
		    $level,
		    $induk,
		   		
        	
                    
            $foto,
		
		$foto_old);
		redirect('rekening');
	}
	
}