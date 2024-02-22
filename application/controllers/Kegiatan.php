<?php

class Kegiatan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Kegiatan_model');

	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Master Kegiatan';
			$data['kegiatan'] = $this->Kegiatan_model->getData();
			$this->load->view('header',$data);
			$this->load->view('kegiatan/data');
			$this->load->view('footer');
		}
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Kegiatan - Detail';
		$hasil = $this->Kegiatan_model->getId($id);

		$data['kegiatan'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('kegiatan/view',$data);
		$this->load->view('footer');
	}



	function timeline(){

		$data['title']='FM | Master Kegiatan - Detail';


		$this->load->view('header',$data);
		$this->load->view('kegiatan/timeline',$data);
		$this->load->view('footer');
	}




	function add(){
		$data['title']='FM | Master Kegiatan - Add';

		$this->load->view('header',$data);
		$this->load->view('kegiatan/add');
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
        
        $id_bidang = $this->input->post('id_bidang');    
		$nama = $this->input->post('nama');
		$anggaran = $this->input->post('anggaran');
		
		
		$foto =  $target_file;
		
		$this->Kegiatan_model->insert(
		    $id_bidang,
		    $nama,
            $anggaran,
            
            
            $foto
		    
		    );
		redirect('kegiatan');
	}

	function delete(){
		$id = $this->uri->segment(3);
		$foto = $this->uri->segment(5);
		unlink('upload/'.$foto);
		$this->Kegiatan_model->delete($id);
		redirect('kegiatan');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='FM | Master Kegiatan - Edit';
		$hasil = $this->Kegiatan_model->getId($id);

		$data['kegiatan'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('kegiatan/edit',$data);
		$this->load->view('footer');
	}

	



	function update(){

		$id = $this->input->post('id');
		$foto_old = $this->input->post('foto_old');
	 $id_bidang = $this->input->post('id_bidang');   
		$nama = $this->input->post('nama');
		$anggaran = $this->input->post('anggaran');

		


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
	

		$this->Kegiatan_model->update($id,
		        $id_bidang,
		   		$nama,
        		$anggaran,
                    
            $foto,
		
		$foto_old);
		redirect('kegiatan');
	}
	
}