	<?php

class Customer extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('Customer_model');
	}

	function index(){

		$data['title']='Data Customer';
		$data['customer'] = $this->Customer_model->getData();
		$this->load->view('header',$data);
		$this->load->view('customer/data');
		$this->load->view('footer');
	} //ok 
	
	
		function download(){



		$this->load->view('customer/download');

	} //ok 


	function add(){
		$data['title']='Data Customer - Add';
		$this->load->view('header',$data);
		$this->load->view('customer/add');
		$this->load->view('footer');
	}

	function insert(){
		$nama_lengkap = $this->input->post('nama_lengkap');
		$email = $this->input->post('email');
		$password = sha1($this->input->post('password'));
		$tlp = $this->input->post('tlp');
		
		$tipe = $this->input->post('tipe');
		
		
		$alamat = $this->input->post('alamat');
		
		if($tipe=="BULANAN"){
		    $expired= date('Y-m-d', strtotime('+1 month'));
		     $biaya = 49000;
		}else{
		    $expired= date('Y-m-d', strtotime('+1 year'));
		     $biaya = 249000;
		}
		


		$sql="INSERT INTO member(nama_lengkap,email,password,tlp,alamat,status,tanggal,expired,tipe) VALUES('$nama_lengkap','$email','$password','$tlp','$alamat','AKTIF',NOW(),'$expired','$tipe')";
		
		
		
		
		if($this->db->query($sql)){
		        
		        
		        		  
		        		    
		        		      
		        		      
		                    $member = $this->db->query("SELECT id,email FROM member WHERE email='$email'")->row_object();
		                    $fid_member = $member->id;
		                    
		                    
		                  //  CREATE TABLE
		                  
		                    $this->db->query("CREATE TABLE `barcode_$fid_member` (
                              `id` int(11) NOT NULL AUTO_INCREMENT,
                              `ekspedisi` varchar(400) NOT NULL,
                              `nama` varchar(159) NOT NULL,
                              `tanggal_scan` date NOT NULL DEFAULT current_timestamp(),
                              `jam_scan` time NOT NULL DEFAULT current_timestamp(),
                              `by_scan` varchar(100) NOT NULL,
                              `tanggal_packing` date NOT NULL,
                              `jam_packing` time NOT NULL,
                              `by_packing` varchar(100) NOT NULL,
                              `tanggal_ekspedisi` date NOT NULL,
                              `jam_ekspedisi` time NOT NULL,
                              `by_ekspedisi` varchar(100) NOT NULL,
                              `tanggal_retur` date NOT NULL,
                              `jam_retur` time NOT NULL,
                              `by_retur` varchar(100) NOT NULL,
                              `status` int(11) NOT NULL,
                              PRIMARY KEY (id)
                            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;");
		                 
		                    
		                    $sql2="INSERT INTO data_bulanan(fid_member,biaya,tanggal_bulanan,jatuh_tempo,status) VALUE('$fid_member','$biaya',NOW(),'$expired','BELUM BAYAR')";
		                    
		                    if($this->db->query($sql2)){
		                        	redirect('customer');
		                    }
	
		    
		        

		}

	
		

	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->Customer_model->delete($id);
		redirect('customer');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='Data Customer- Edit';
		$hasil = $this->Customer_model->getId($id);

		$data['customer'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('customer/edit',$data);
		$this->load->view('footer');
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='Data Customer- Detail';
		$hasil = $this->Customer_model->getId($id);

		$data['customer'] = $hasil->row_array();

		$this->load->view('header',$data);
		$this->load->view('customer/view',$data);
		$this->load->view('footer');
	}
	
	function delete_device(){
	    	$id_device	= $this->uri->segment(3);
	    		$fid_member	= $this->uri->segment(4);
	    		
	    		echo $sql="DELETE FROM data_device WHERE fid_member='$fid_member' AND id_device='$id_device'";
	    		
	        if($this->db->query($sql)){
	            redirect('customer/detail/'.$fid_member);
	        }
	    		
	    	
	}



	function update(){
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$tlp = $this->input->post('tlp');
		$alamat = $this->input->post('alamat');
		$tipe = $this->input->post('tipe');
		$expired = $this->input->post('expired');
		$jumlah_device = $this->input->post('jumlah_device');
		

	
        
        if(strlen($this->input->post('password')) > 0){
            $password = sha1($this->input->post('password'));
            $sql="UPDATE member SET nama_lengkap='$nama_lengkap',jumlah_device='$jumlah_device',password='$password',email='$email',tlp='$tlp',alamat='$alamat',expired='$expired',tipe='$tipe' WHERE id='$id'";
         
        }else{
            $sql="UPDATE member SET nama_lengkap='$nama_lengkap',jumlah_device='$jumlah_device',email='$email',tlp='$tlp',alamat='$alamat',expired='$expired',tipe='$tipe' WHERE id='$id'";
          
        }
        
		  $this->db->query($sql);

		redirect('customer');
	}
}