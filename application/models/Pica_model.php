<?php

class Pica_model extends CI_Model{

	function getData(){
		$sql ="SELECT * FROM data_pica";
		$data = $this->db->query($sql);
		return $data;
	}

    function getId($id){
		$sql ="SELECT * FROM data_pica WHERE id='$id'";
		$data = $this->db->query($sql);
		return $data;
	}



    function getId2($id,$id_pica){
		$sql ="SELECT * FROM data_picadetail WHERE id='$id' and id_pica='$id_pica'";
		$data = $this->db->query($sql);
		return $data;
	}


	function insert(
	
	$kegiatan,
    $tempat,
    $tanggal
	
	){

	echo $sql ="INSERT INTO data_pica(
	    
	    kegiatan,
        tempat,
        tanggal
	    ) values(
	        
	    '$kegiatan',
        '$tempat',
        '$tanggal'
            	        
	        )";

	 $this->db->query($sql);
	}

	function update($id,
	
	$kegiatan,
    $tempat,
    $tanggal
    
    ){

	

			echo $sql= "UPDATE data_pica SET 
			
			    kegiatan='$kegiatan',
                tempat='$tempat',
                tanggal='$tanggal'
                			
			WHERE id='$id'";
	
		
		$this->db->query($sql);	
	}


	
	function delete($id){
		$sql="DELETE FROM data_pica WHERE id='$id'";
		 $this->db->query($sql);
	}
	
	
		function deleteAll($id){
		$sql="DELETE FROM data_pica WHERE id='$id'";
		$sql2="DELETE FROM data_picadetail WHERE id_pica='$id'";
		 $this->db->query($sql);
		 $this->db->query($sql2);
	}
	
	
	
		
	function delete2($id,$id_pica){
		$sql="DELETE FROM data_picadetail WHERE id='$id' and id_pica='$id_pica'";
		 $this->db->query($sql);
	}
	
	
	function insert2(
	
	$id_pica,
	$kegiatan_utama,
    $kegiatan_tambahan,
    $pic,
    $status,
    $masalah,
    $perbaikan,
    $upd,
        
    $foto
	
	){

	echo $sql ="INSERT INTO data_picadetail(
	    id_pica,
	    kegiatan_utama,
        kegiatan_tambahan,
        pic,
        status,
        masalah,
        perbaikan,
        upd,
	    
        foto
	    ) values(
	   '$id_pica',
	    '$kegiatan_utama',
        '$kegiatan_tambahan',
        '$pic',
        '$status',
        '$masalah',
        '$perbaikan',
        '$upd',
                    
            '$foto'
            	        
	        )";

	 $this->db->query($sql);
	}
	
	
	
	
		function update2($id,
    	$kegiatan_utama,
        $kegiatan_tambahan,
        $pic,
        $status,
        $masalah,
        $perbaikan,
        $upd,
	
    $foto
	
	,$foto_old){

		if(!empty($foto)){
		echo	 $sql= "UPDATE data_picadetail SET 
			 
		    kegiatan_utama='$kegiatan_utama',
            kegiatan_tambahan='$kegiatan_tambahan',
            pic='$pic',
            status='$status',
            masalah='$masalah',
            perbaikan='$perbaikan',
            upd='$upd',
			 
			 
			 foto='$foto' WHERE id='$id'";
		}else{

			echo $sql= "UPDATE data_picadetail SET 
			    
			    kegiatan_utama='$kegiatan_utama',
                kegiatan_tambahan='$kegiatan_tambahan',
                pic='$pic',
                status='$status',
                masalah='$masalah',
                perbaikan='$perbaikan',
                upd='$upd'
			
			WHERE id='$id'";
		}
		
		$this->db->query($sql);	
	}




	

}