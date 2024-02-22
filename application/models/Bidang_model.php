<?php

class Bidang_model extends CI_Model{

	function getData(){
		$sql ="SELECT * FROM data_bidang";
		$data = $this->db->query($sql);
		return $data;
	}

    function getId($id){
		$sql ="SELECT * FROM data_bidang WHERE id='$id'";
		$data = $this->db->query($sql);
		return $data;
	}


	function insert(
	
		$nama,
        $anggaran,
        
    $foto
	
	){

	echo $sql ="INSERT INTO data_bidang(
	    
	    		nama,
        		anggaran,
	    
        foto
	    ) values(
	        
		        '$nama',
        		'$anggaran',
                    
            '$foto'
            	        
	        )";

	 $this->db->query($sql);
	}

	function update($id,
	
		$nama,
        $anggaran,
        $perubahan,
	
    $foto
	
	,$foto_old){

		if(!empty($foto)){
			 $sql= "UPDATE data_bidang SET 
			 
		    nama='$nama',
		    anggaran='$anggaran',
			 perubahan='$perubahan',
			 
			 foto='$foto' WHERE id='$id'";
		}else{

			echo $sql= "UPDATE data_bidang SET 
			
			       nama='$nama',
		    anggaran='$anggaran',
		    	 perubahan='$perubahan'
			
			WHERE id='$id'";
		}
		
		$this->db->query($sql);	
	}


	
	function delete($id){
		$sql="DELETE FROM data_bidang WHERE id='$id'";
		 $this->db->query($sql);
	}
	
			
	function delete2($id,$id_bidang){
		$sql="DELETE FROM data_seksi WHERE id='$id' and id_bidang='$id_pica'";
		 $this->db->query($sql);
	}



	

}