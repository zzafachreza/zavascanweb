
<div class="container-fluid">
    
     	    <?php
	  	    $bidangHD = $this->db->query("SELECT * FROM data_bidang WHERE id='$id_bidang'")->row_array();
	  	   
	  	     $sqlKegiatan ="SELECT * FROM data_kegiatan WHERE id_bidang='$id_bidang' AND id='$id'";
	  	    
	  	    
	  	    $kegiatan = $this->db->query($sqlKegiatan)->row_array();
	  	    
	  	    ?>
	  	    

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('bidang/update2') ?>" method="POST" enctype="multipart/form-data">

	<a onClick="window.history.back();"  class="btn bg-kedua hilang"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

	  </div>
	  	<div class="card-body">
	  	    
	  	    <center>
	  	        <h6>PAJAK / PPN</h6>
	  	        <h6><?php echo $kegiatan['nama_kegiatan'] ?></h6>
	  	        <h6>Bulan <?php echo $kegiatan['bulan'] ?> <?php echo $kegiatan['tahun'] ?></h6>
	  	    </center>
	  	    <table class="table table-bordered" style="font-size:small">
	  	        <tr  style="font-weight:bold">
	  	            <td><center>No</center></td>
	  	            <td><center>Tanggal</center></td>
	  	            <td><center>Uraian</center></td>
	  	            <td><center>Kodering</center></td>
	  	            <td><center>PAJAK / PPN</center></td>
	  	        </tr>
	  	        <?php
	  	        $kode = $kegiatan['kode'];
	  	            $no=0;
	  	            $total=0;
	  	            $sqlUraian = "SELECT data_kegiatan_detail.id id,data_kegiatan_detail.foto foto,tanggal_uraian,uraian,data_kegiatan_detail.masuk,data_kegiatan_detail.keluar,data_rekening.kode kode_rekening,data_rekening.nama nama_rekening,masuk,keluar FROM data_kegiatan_detail join data_rekening on data_rekening.id = data_kegiatan_detail.id_rekening WHERE data_kegiatan_detail.kode='$kode' and data_kegiatan_detail.masuk > 0";
	  	            foreach($this->db->query($sqlUraian)->result() as $row){
	  	                $no++;
	  	                $total +=$row->masuk;
	  	        ?>
	  	        
	  	            <tr>
	  	                 <td><?php echo $no ?></td>
    	  	            <td><?php echo Indonesia3Tgl($row->tanggal_uraian) ?></td>
    	  	            <td width="40%"><?php echo $row->uraian ?></td>
    	  	             <td><?php echo $row->kode_rekening ?></td>
    	  	            <td><?php echo number_format($row->masuk) ?></td>
    	  	        
    	  	          
    	  	            </td>
    	  	           
	  	            </tr>
	  	        <?php } ?>
	  	        <tr>
	  	            <td colspan="4" align="center">
	  	                Total Pajak /PPN
	  	             
	  	            
	  	            </td>
	  	            <td>
	  	                <h5><?php echo number_format($total) ?></h5>
	  	             <p class="text-utama"><strong><i><?php  echo angkaTerbilang($total) ?> Rupiah</i></strong></p>
	  	            </td>
	  	        </tr>
	  	    </table>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>