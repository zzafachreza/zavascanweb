<?php

class Pelamar extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Pelamar_model');

	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Data Pelamar';
			$data['pelamar'] = $this->Pelamar_model->getData();
			$this->load->view('header',$data);
			$this->load->view('pelamar/data');
			$this->load->view('footer');
		}
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='FM | Master Gambar - Detail';
		$hasil = $this->Pelamar_model->getId($id);

		$data['pelamar'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('pelamar/view',$data);
		$this->load->view('footer');
	}




	function add(){
		$data['title']='FM | Master Gambar - Add';

		$this->load->view('header',$data);
		$this->load->view('pelamar/add');
		$this->load->view('footer');
	}
	
 function tglSql($tgl){
	$tgl = explode("/", $tgl);
	return $tgl[2]."-".$tgl[1]."-".$tgl[0];
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
		
		
// 		foto 2


        $target_dir2 = "upload/";
		$target_file2 = $target_dir2 .date('ymdhis').'2'.basename($_FILES["foto2"]["name"]);
		$uploadOk2 = 1;
		$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check2 = getimagesize($_FILES["foto2"]["tmp_name"]);
		  if($check2 !== false) {
		    echo "File is an image - " . $check2["mime"] . ".";
		    $uploadOk2 = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk2 = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file2)) {
		  echo "Sorry, file already exists.";
		  $uploadOk2 = 0;
		}

		// Check file size
		if ($_FILES["foto2"]["size"] > 12000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk2 = 0;
		}

		// Allow certain file formats
		if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
		&& $imageFileType2 != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk2 = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk2 == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["foto2"]["tmp_name"], $target_file2)) {
		    echo "The file ". basename( $_FILES["foto2"]["name"]). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}

		$nama_lengkap = $this->input->post('nama_lengkap');
        $nama_panggilan = $this->input->post('nama_panggilan');
        $email = $this->input->post('email');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->tglSql($this->input->post('tanggal_lahir'));
        $nomor_ktp = $this->input->post('nomor_ktp');
        $nomor_kk = $this->input->post('nomor_kk');
        $alamat = $this->input->post('alamat');
        $alamat_sekarang = $this->input->post('alamat_sekarang');
        $profesi = $this->input->post('profesi');
        $telepon = $this->input->post('telepon');
        $tinggi_badan = $this->input->post('tinggi_badan');
        $berat_badan = $this->input->post('berat_badan');
        $umur = $this->input->post('umur');
        $mau_kerja_dimana = $this->input->post('mau_kerja_dimana');
        $takut_anjing = $this->input->post('takut_anjing');
        $kerja_diluar_negri = $this->input->post('kerja_diluar_negri');
        $pendidikan = $this->input->post('pendidikan');
        $pengalaman = $this->input->post('pengalaman');
        $pernikahan = $this->input->post('pernikahan');
        $punya_anak = $this->input->post('punya_anak');
        $agama = $this->input->post('agama');
        $suku = $this->input->post('suku');
        $inggris = $this->input->post('inggris');
        $naik_motor = $this->input->post('naik_motor');
        $bisa_masak = $this->input->post('bisa_masak');
        $bisa_asuh = $this->input->post('bisa_asuh');
        $sebagai_apa = $this->input->post('sebagai_apa');
        $hp_dapat_dihubungi = $this->input->post('hp_dapat_dihubungi');
        $referral = $this->input->post('referral');
        $gaji = $this->input->post('gaji');
        
		$foto =  $target_file;
		$foto2 =  $target_file2;

		$this->Pelamar_model->insert(
		    
		    
		    $nama_lengkap,
            $nama_panggilan,
            $email,
            $tempat_lahir,
            $tanggal_lahir,
            $nomor_ktp,
            $nomor_kk,
            $alamat,
            $alamat_sekarang,
            $profesi,
            $telepon,
            $tinggi_badan,
            $berat_badan,
            $umur,
            $mau_kerja_dimana,
            $takut_anjing,
            $kerja_diluar_negri,
            $pendidikan,
            $pengalaman,
            $pernikahan,
            $punya_anak,
            $agama,
            $suku,
            $inggris,
            $naik_motor,
            $bisa_masak,
            $bisa_asuh,
            $sebagai_apa,
            $hp_dapat_dihubungi,
            $referral,
            $gaji,
            $foto,
            $foto2
		    
		    );
		redirect('pelamar');
	}

	function delete(){
		$id = $this->uri->segment(3);
		$foto1 = $this->uri->segment(4);
		$foto2 = $this->uri->segment(5);
		unlink('upload/'.$foto1);
		unlink('upload/'.$foto2);
		$this->Pelamar_model->delete($id);
		redirect('pelamar');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='FM | Master Content - Edit';
		$hasil = $this->Pelamar_model->getId($id);

		$data['pelamar'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('pelamar/edit',$data);
		$this->load->view('footer');
	}

	



	function update(){

		print_r($_FILES);

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$ket = $this->input->post('ket');
		$foto_old = $this->input->post('foto_old');

		$tipe = $this->input->post('tipe');

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
	

		$this->Pelamar_model->update($id,$nama,$foto,$ket,$tipe,$foto_old);
		redirect('pelamar');
	}
	
}