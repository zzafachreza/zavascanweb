<?php

require APPPATH.'libraries/REST_Controller.php';

class Login extends REST_Controller{

  public function __construct(){

    parent::__construct();
    //load database
    $this->load->database();
    $this->load->library(array("form_validation"));
    $this->load->helper("security");
  }



  // GET: <project_url>/index.php/student
  public function index_get(){
      
      
        $member=1;
    //print_r($query->result());

    if($member > 0){

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

$email = $data['email'];
$password = sha1($data['password']);

$deviceID = trim($data['deviceID']);
$deviceName = trim($data['deviceName']);




  $sql = "SELECT * FROM member WHERE email='$email' AND password='$password' limit 1";

 $cek = $this->db->query($sql)->row_array();
 
 
 $jml = $this->db->query($sql)->num_rows();
 
 
 
 if($jml > 0 ){
     $hasil =  $this->db->query($sql)->row_array();
     
      $jml_device =  $this->db->query("SELECT * FROM data_device WHERE fid_member='".$hasil['id']."'")->num_rows();
     
      $jml_batas = $hasil['jumlah_device'];
     
      $fid_member = $hasil['id'];
      
      
            $jml_device_aktif = $this->db->query("SELECT * FROM data_device WHERE fid_member='$fid_member' and deviceID='$deviceID' AND deviceName='$deviceName'")->num_rows();
            
            if($jml_device_aktif>0){
                
                 $hasil  += ['kode' => 200];
                 echo json_encode($hasil);
                
            }else{
                
                     if($jml_device < $jml_batas){
                        
                        
                         $sqlDevice="INSERT INTO data_device(fid_member,deviceID,deviceName) VALUES('$fid_member','$deviceID','$deviceName')";
                            
                            if($deviceID==""){
                                  $arr =  array("kode"=>50,"msg"=>"Silahkan update aplikasi Anda");
                                  echo json_encode($arr);
                            }else{
                                 if($this->db->query($sqlDevice)){
                                         $hasil  += ['kode' => 200];
                                         echo json_encode($hasil);
                                 }
                            }
                        
                         
                     }else{
                         
                             $arr =  array("kode"=>50,"msg"=>"Maaf, akun anda hanya bisa ".$jml_batas." device. Silahkan hubungi admin untuk menambahkan device.");
                     
                                 echo json_encode($arr);
                          
                     }
                
            }
     

 }else{
     
     $arr =  array("kode"=>50,"msg"=>"Maaf Username Atau Password Anda Salah !");
     
     echo json_encode($arr);
     
 }




  }
  
  public function index_delete(){
      $data = json_decode(file_get_contents('php://input'), true);


        $key = $_GET['key'];
        $id_member = $_GET['id_member'];
        
        $sql ="DELETE FROM barcode WHERE nama='$key' and id_member='$id_member'";
         $sql2 ="DELETE FROM barcode_temp WHERE nama='$key' and id_member='$id_member'";
        
        try {
             $this->db->query($sql);
            $this->db->query($sql2);
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
