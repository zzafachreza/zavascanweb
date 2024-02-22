<?php

require APPPATH.'libraries/REST_Controller.php';

class Scan extends REST_Controller{

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
    
    if(!empty($_GET['key'])){
        $key = $_GET['key'];
        $sql="select *,(SELECT foto FROM data_kurir WHERE nama_kurir=a.ekspedisi LIMIT 1) kurir from barcode_$id_member a WHERE nama like '%$key%' order by tanggal_scan DESC, jam_scan DESC limit 10";
    }else{
        $sql="select *,(SELECT foto FROM data_kurir WHERE nama_kurir=a.ekspedisi LIMIT 1) kurir from barcode_$id_member a order by tanggal_scan DESC, jam_scan DESC limit 10";
    }
    // list data method
    //echo "This is GET Method";
    // SELECT * from tbl_students;
    
   
    $member = $this->db->query($sql)->result();

    //print_r($query->result());

    if(count($member) > 0){

      $this->response(array(
        "status" => 1,
        "message" => "Resi found",
        "data" => $member
      ), REST_Controller::HTTP_OK);
    }else{

      $this->response(array(
        "status" => 0,
        "message" => "No Resi found",
        "data" => $member
      ), REST_Controller::HTTP_NOT_FOUND);
    }



  }
  

  public function index_post(){
    // list data method
    //echo "This is GET Method";
    // SELECT * from tbl_students;
    
    $data = json_decode(file_get_contents('php://input'), true);

    $key = $data['key'];
    $id_member = $data['id_member'];
    $customer = $data['customer'];
    
    
    $cek = $this->db->query("SELECT nama FROM barcode_$id_member WHERE nama='$key'")->num_rows();
          
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

           $sqlCek="SELECT * FROM barcode_$id_member WHERE nama='$key' limit 1";
                $hasil =$this->db->query($sqlCek);
                $cek  =$this->db->query($sqlCek)->row_object();
        
                if ($hasil->num_rows()>0) {
                    # code...

                     
                              
                    echo "Maaf barcode Anda ".$key." sudah di Scan Pada Tanggal ".$this->Indonesia3Tgl($cek->tanggal_scan)." pukul ".$cek->jam_scan."";
                }
                else{
                    $sql="INSERT INTO barcode_$id_member(ekspedisi,nama,tanggal_scan,jam_scan,by_scan) VALUES('$ekspedisi','$key',NOW(),NOW(),'$customer')";

                    $this->db->query("UPDATE member SET perangkat='WEB' WHERE id='$id_member'");
                    $this->db->query($sql);
                      $arr = array("status"=>200,"message"=>"Resi berhasil di scan !");
         
            
               
                    
                 echo json_encode($arr);
                }
              
              
          }

            
          



  }
  
  public function index_delete(){
      $data = json_decode(file_get_contents('php://input'), true);


        $key = $_GET['key'];
        $id_member = $_GET['id_member'];
        
        $sql ="DELETE FROM barcode_$id_member WHERE nama='$key'";
        
        
        try {
             $this->db->query($sql);
           
             $arr = array("status"=>200,"message"=>"Resi berhasil di hapus !");
                    
                 echo json_encode($arr);
        }
        catch(PDOException $e) {
            
             $arr = array("status"=>404,"message"=>$e->getMessage());
                    
                 echo json_encode($arr);
           
        }
  }
  
  
  public function hapus(){
      $data = json_decode(file_get_contents('php://input'), true);
      print_r($data);
  }
  
}

 ?>
