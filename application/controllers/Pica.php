<?php

class Pica extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Pica_model');

	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Master Pica';
			$data['pica'] = $this->Pica_model->getData();
			$this->load->view('header',$data);
			$this->load->view('pica/data');
			$this->load->view('footer');
		}
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Pica - Detail';
		$hasil = $this->Pica_model->getId($id);

		$data['pica'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('pica/view',$data);
		$this->load->view('footer');
	}
	
	
	
	function report(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Pica - Detail';
		$hasil = $this->Pica_model->getId($id);

		$data['pica'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('pica/report',$data);
		$this->load->view('footer');
	}






	function add(){
		$data['title']='FM | Master Pica - Add';

		$this->load->view('header',$data);
		$this->load->view('pica/add');
		$this->load->view('footer');
	}
	
    function add2(){
		$data['title']='FM | Master Pica - Add';
        $data['id_pica'] = $this->uri->segment(3);
		$this->load->view('header',$data);
		$this->load->view('pica/add2');
		$this->load->view('footer');
	}

	function insert(){

		

		$kegiatan = $this->input->post('kegiatan');
        $tempat = $this->input->post('tempat');
        $tanggal = $this->input->post('tanggal');
		

		
		$this->Pica_model->insert(
		    
		    $kegiatan,
            $tempat,
            $tanggal
		    
		    );
		redirect('pica');
	}

	function delete(){
		$id = $this->uri->segment(3);
		$foto = $this->uri->segment(5);
		unlink('upload/'.$foto);
		$this->Pica_model->delete($id);
		$this->Pica_model->deleteAll($id);
		redirect('pica');
	}
	
	function delete2(){
		$id = $this->uri->segment(3);
		$id_pica = $this->uri->segment(4);
		$foto = $this->uri->segment(5);
		unlink('upload/'.$foto);
		$this->Pica_model->delete2($id,	$id_pica );
		redirect('pica/detail/'.$id_pica);
	}


	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='FM | Master Pica - Edit';
		$hasil = $this->Pica_model->getId($id);

		$data['pica'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('pica/edit',$data);
		$this->load->view('footer');
	}
	
	
	function edit2(){

		$id	= $this->uri->segment(3);
		$id_pica	= $this->uri->segment(4);

		$data['title']='FM | Master Pica - Edit';
		$hasil = $this->Pica_model->getId2($id,$id_pica);
        $data['id_pica']  = $id_pica;
		$data['pica'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('pica/edit2',$data);
		$this->load->view('footer');
	}

	



	function update(){

		$id = $this->input->post('id');
	    $kegiatan = $this->input->post('kegiatan');
        $tempat = $this->input->post('tempat');
        $tanggal = $this->input->post('tanggal');
		



		$this->Pica_model->update($id,
		    
		    $kegiatan,
            $tempat,
            $tanggal
            );
		redirect('pica');
	}
	
	function insert2(){

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
    $id_pica = $this->input->post('id_pica');
	$kegiatan_utama = $this->input->post('kegiatan_utama');
    $kegiatan_tambahan = $this->input->post('kegiatan_tambahan');
    $pic = $this->input->post('pic');
    $status = $this->input->post('status');
    $masalah = $this->input->post('masalah');
    $perbaikan = $this->input->post('perbaikan');
    $upd = $this->input->post('upd');
		
		
		$foto =  $target_file;
		
		$this->Pica_model->insert2(
		    $id_pica ,
		    $kegiatan_utama,
            $kegiatan_tambahan,
            $pic,
            $status,
            $masalah,
            $perbaikan,
            $upd,
            
            
            $foto
		    
		    );
		redirect('pica/detail/'.$id_pica);
	}
	
	
	function update2(){

		$id = $this->input->post('id');
		$id_pica = $this->input->post('id_pica');
		$foto_old = $this->input->post('foto_old');
		
		$kegiatan_utama = $this->input->post('kegiatan_utama');
        $kegiatan_tambahan = $this->input->post('kegiatan_tambahan');
        $pic = $this->input->post('pic');
        $status = $this->input->post('status');
        $masalah = $this->input->post('masalah');
        $perbaikan = $this->input->post('perbaikan');
        $upd = $this->input->post('upd');

		


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
	

		$this->Pica_model->update2($id,
		    
		    	$kegiatan_utama,
                $kegiatan_tambahan,
                $pic,
                $status,
                $masalah,
                $perbaikan,
                $upd,
            
            $foto,
		
		$foto_old);
		redirect('pica/detail/'.$id_pica);
	}
	
}