<?php

require APPPATH.'libraries/REST_Controller.php';

class Rekap extends REST_Controller{

  public function __construct(){

    parent::__construct();
    //load database
    $this->load->database();
    $this->load->library(array("form_validation"));
    $this->load->helper("security");
  }



  // GET: <project_url>/index.php/student
  public function index_get(){
      
      $data = json_decode(file_get_contents("php://input"));
      
    $id_member = $_GET['id_member'];
    
    $d1 = $this->db->query("SELECT nama FROM barcode_$id_member WHERE tanggal_scan=CURDATE() AND status=0")->num_rows();
    $d2 = $this->db->query("SELECT nama FROM barcode_$id_member WHERE tanggal_packing=CURDATE() AND status=1")->num_rows();
    $d3 = $this->db->query("SELECT nama FROM barcode_$id_member WHERE tanggal_retur=CURDATE() AND status=3")->num_rows();

                $arr = array("resi"=>$d1,"packing"=>$d2,"retur"=>$d3);
                  
                 echo json_encode($arr);


  }
  

  public function index_post(){
    // list data method
    //echo "This is GET Method";
    // SELECT * from tbl_students;
    
    $data = json_decode(file_get_contents('php://input'), true);

    $key = $data['key'];
    $id_member = $data['id_member'];
    $customer = $data['customer'];
    
    
    $cek = $this->db->query("SELECT nama FROM barcode3 WHERE nama='$key'")->num_rows();
          
          if($cek > 0 ){
              $arr = array("status"=>404,"message"=>"Resi $key sudah pernah di scan !");
                  
                 echo json_encode($arr);
          }else{
              
              
              if(substr($key,0,4)=="TJNT"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,4)."%' limit 1";
		    }elseif(substr($key,0,4)=="TKSC"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,4)."%' limit 1";
		    }elseif(substr($key,0,5)=="TKP01"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,5)."%' limit 1";
		    }elseif(substr($key,0,3)=="TKP"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,3)."%' limit 1";
		    }elseif(substr($key,0,3)=="JXP"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,3)."%' limit 1";
		    }elseif(substr($key,0,3)=="TJX"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,3)."%' limit 1";
		    }elseif(substr($key,0,4)=="TKNX"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,4)."%' limit 1";
		    }elseif(substr($key,0,4)=="TKAA"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,4)."%' limit 1";
		    }elseif(substr($key,0,4)=="TKLP"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,4)."%' limit 1";
		    }elseif(substr($key,0,3)=="TJ1"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,3)."%' limit 1";
		    }elseif(substr($key,0,3)=="221"){
		           $sqlEks = "SELECT kode,nama_kurir FROM data_kurir WHERE kode like '".substr($key,0,3)."%' limit 1";
		    }elseif(substr($key,0,5)=="BLAPK"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,5)."%' limit 1";
		    }elseif(substr($key,0,5)=="TPXL-"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,5)."%' limit 1";
		    }elseif(substr($key,0,4)=="SHPE"){
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,4)."%' limit 1";
		    }else{
		           $sqlEks = "SELECT kode,nama_kurir,foto FROM data_kurir WHERE kode like '".substr($key,0,2)."%' limit 1";
		    }
		    
		    $kurir = $this->db->query($sqlEks)->row_object();
   
		      if($this->db->query($sqlEks)->num_rows()>0){
		          $ekspedisi = $kurir->nama_kurir;
		      }else{
		          $ekspedisi = "TANPA KURIR";
		      }

           $sql = "INSERT INTO barcode3(nama,tanggal,jam,ekspedisi,id_member,customer) VALUES('$key',NOW(),NOW(),'$ekspedisi','$id_member','$customer')";
           
            
          
    
               $this->db->query($sql);
            
                
                $arr = array("status"=>200,"message"=>"Resi berhasil di scan !");
         
            
               
                    
                 echo json_encode($arr);
              
              
          }

            
          



  }
  
  public function index_delete(){
      $data = json_decode(file_get_contents('php://input'), true);


        $key = $_GET['key'];
        $id_member = $_GET['id_member'];
        
        $sql ="DELETE FROM barcode3 WHERE nama='$key' and id_member='$id_member'";
        
        
     
             $this->db->query($sql);
             $arr = array("status"=>200,"message"=>"Resi berhasil di hapus !");
             echo json_encode($arr);
       
  }
  
  

  
}

 ?>
