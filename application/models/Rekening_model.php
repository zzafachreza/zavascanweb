<?php

class Rekening_model extends CI_Model{

	function getData(){
		$sql ="SELECT * FROM data_rekening";
		$data = $this->db->query($sql);
		return $data;
	}

    function getId($id){
		$sql ="SELECT * FROM data_rekening WHERE id='$id'";
		$data = $this->db->query($sql);
		return $data;
	}


	function insert(
	
	         $kode,
		    $nama,
		    $level,
		    $induk,
        
    $foto
	
	){

	echo $sql ="INSERT INTO data_rekening(
	    
	    		   kode,
        		    nama,
        		    level,
        		    induk,
        	
	    
        foto
	    ) values(
	        
		    '$kode',
		    '$nama',
		    '$level',
		    '$induk',
     
                    
            '$foto'
            	        
	        )";

	 $this->db->query($sql);
	}

	function update($id,
	
		    $kode,
		    $nama,
		    $level,
		    $induk,
    
	
    $foto
	
	,$foto_old){

		if(!empty($foto)){
			 $sql= "UPDATE data_rekening SET 
			 
		    kode='$kode',
		    nama='$nama',
		    level='$level',
		    induk='$induk',
			 
			 
			 foto='$foto' WHERE id='$id'";
		}else{

			echo $sql= "UPDATE data_rekening SET 
			
			 kode='$kode',
		    nama='$nama',
		    level='$level',
		    induk='$induk'
			
			WHERE id='$id'";
		}
		
		$this->db->query($sql);	
	}


	
	function delete($id){
		$sql="DELETE FROM data_rekening WHERE id='$id'";
		 $this->db->query($sql);
	}



	

}