<?php

class Barang_model extends CI_Model{

	function getData(){
		$sql ="SELECT data_barang.id,nama_barang,uom,hpp,harga_awal,diskon,data_barang.foto,harga,keterangan,id_sub_kategori,nama_kategori,nama_sub_kategori FROM data_barang join data_sub_kategori on data_sub_kategori.id = data_barang.id_sub_kategori join data_kategori on data_kategori.id = data_sub_kategori.id_kategori";
		$data = $this->db->query($sql);
		return $data;
	}

    function getId($id){
		$sql ="SELECT * FROM data_barang WHERE id='$id'";
		$data = $this->db->query($sql);
		return $data;
	}


	function insert(
	
	$nama_barang,
    $uom,
    $hpp,
    $harga_awal,
    $diskon,
    $harga,
    $keterangan,
    $id_sub_kategori,
    $foto
	
	){

	echo $sql ="INSERT INTO data_barang(
	    nama_barang,
        uom,
        hpp,
        harga_awal,
        diskon,
        harga,
        keterangan,
        id_sub_kategori,
        foto
	    ) values(
	        
	        '$nama_barang',
            '$uom',
            '$hpp',
            '$harga_awal',
            '$diskon',
            '$harga',
            '$keterangan',
            '$id_sub_kategori',
            '$foto'
            	        
	        )";

	 $this->db->query($sql);
	}

	function update($id,
	
	$nama_barang,
    $uom,
    $hpp,
    $harga_awal,
    $diskon,
    $harga,
    $keterangan,
    $id_sub_kategori,
    $foto
	
	,$foto_old){

		if(!empty($foto)){
			 $sql= "UPDATE data_barang SET 
			 
			nama_barang='$nama_barang',
            uom='$uom',
            hpp='$hpp',
            harga_awal='$harga_awal',
            diskon='$diskon',
            harga='$harga',
            keterangan='$keterangan',
            id_sub_kategori='$id_sub_kategori',
      
			 
			 
			 foto='$foto' WHERE id='$id'";
		}else{

			echo $sql= "UPDATE data_barang SET 
			
			    	nama_barang='$nama_barang',
                    uom='$uom',
                    hpp='$hpp',
                     harga_awal='$harga_awal',
                    diskon='$diskon',
                    harga='$harga',
         
                     id_sub_kategori='$id_sub_kategori'
                
			
			WHERE id='$id'";
		}
		
		$this->db->query($sql);	
	}


	
	function delete($id){
		$sql="DELETE FROM data_barang WHERE id='$id'";
		 $this->db->query($sql);
	}



	

}