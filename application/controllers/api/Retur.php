<?php

require APPPATH.'libraries/REST_Controller.php';

class Retur extends REST_Controller{

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
        $sql="select *,(SELECT foto FROM data_kurir WHERE nama_kurir=a.ekspedisi LIMIT 1) kurir from barcode_$id_member a WHERE nama like '%$key%' order by tanggal_retur DESC, jam_retur DESC limit 10";
    }else{
        $sql="select *,(SELECT foto FROM data_kurir WHERE nama_kurir=a.ekspedisi LIMIT 1) kurir from barcode_$id_member a  order by tanggal_retur DESC, jam_retur DESC limit 10";
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
    
    
   $cek = "SELECT * FROM barcode_$id_member WHERE nama='$key'";
                 $jml = $this->db->query($cek)->num_rows();
                
                if($jml > 0){
                    
                    // cek double = 
                    
                    $cek2 = $this->db->query("SELECT * FROM barcode_$id_member WHERE nama='$key' AND status=3")->num_rows();
                    
                    if($cek2 > 0){
                         $arr = array("status"=>404,"message"=> 'Nomor resi '.$key.' sudah pernah di scan retur !');
                       
                         echo json_encode($arr);
                 
                      
                    }else{
                       $this->db->query("UPDATE barcode_$id_member SET status=3,by_retur='$customer',tanggal_retur=CURDATE(),jam_retur=CURTIME() WHERE nama='$key'");
                   
                    $arr = array("status"=>200,"message"=>"Resi berhasil di scan !");
         
            
               
                    
                 echo json_encode($arr);
                    }
                    
                    
                }else{
                   
                      $arr = array("status"=>404,"message"=> 'Maaf tidak bisa retur Anda belum pernah scan barcode ini !');
                       
                         echo json_encode($arr);
                    
                    
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
  
  

  
}

 ?>
