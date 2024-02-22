<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('bidang') ?>">bidang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Tambah - Uraian</li>
	  </ol>
</nav

 	    
	  	    	    <?php
	  	    $bidangHD = $this->db->query("SELECT * FROM data_bidang WHERE id='$id_bidang'")->row_array();
	  	   
	  	     $sqlKegiatan ="SELECT * FROM data_kegiatan WHERE id='$id_kegiatan' AND kode='$kode'";
	  	    
	  	    
	  	    $kegiatan = $this->db->query($sqlKegiatan)->row_array();
	  	    
	  	    ?>
	  	    
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('bidang/insert3') ?>" method="POST" enctype="multipart/form-data">

	<a onClick="window.history.back();"  class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  id="simpan" type="SUBMIT" class="btn bg-utama" ><i class="flaticon2-download-2"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	 
	
	  		 	 <div class="row">
	  		     <div class="col col-sm-6">
	  		         	  <table class="table table-hover table-bordered ">
        	  		        <tr class="bg-utama" style="border-bottom:5px solid #FCBC0F"><th width="40%">Nama Bidang</th>
        	  		                <td><?php echo $bidangHD['nama'] ?></td></tr>
                                    <tr><th>Anggaran</th><td><?php echo number_format($bidangHD['anggaran']) ?></td></tr>
                                    <tr><th>Realisasi</th><td><?php echo number_format($bidangHD['perubahan']) ?></td></tr>
        	  		    </table>
	  		     </div>
	  		      <div class="col col-sm-6">
	  		         	  <table class="table table-hover table-bordered ">
        	  		        <tr class="bg-utama" style="border-bottom:5px solid #FCBC0F"><th width="40%">Nama Kegiatan</th>
        	  		                <td><?php echo $kegiatan['nama_kegiatan'] ?></td></tr>
                            <tr><th>Bulan</th><td><?php echo $kegiatan['bulan'] ?></td></tr>
                             <tr><th>Tahun</th><td><?php echo $kegiatan['tahun'] ?></td></tr>
        	  		    </table>
	  		     </div>
	  		 </div>
	  	    
	  		<form>
	  		    
	  		


			 <table class="table">
			     <tr class="bg-utama" style="border-bottom:5px solid #FCBC0F">
			         <td colspan="2" align="center">
			      
			             Masukan Data Uraian Per Kegiatan
			       
			         </td>
			     </tr>
                
                <input autocomplete='off' value="<?php echo $id_bidang ?>" type='hidden' name='id_bidang' class='form-control'>
			    <input autocomplete='off' value="<?php echo $id_kegiatan ?>" type='hidden' name='id_kegiatan' class='form-control'>
			    <input autocomplete='off' value="<?php echo $kode ?>" type='hidden' name='kode' class='form-control'>
			     <tr>
			        <td>Dokumentasi</td>
			        <td width="80%">
			            <input class='form-control' name="foto" type="file" />
			        </td>
			    </tr>
			     <tr>
			        <td>Tanggal</td>
			        <td width="80%">
			            <input class='form-control' name="tanggal_uraian" type="date" value="<?php echo date('Y-m-d') ?>"/>
			        </td>
			    </tr>
			       <tr>
			        <td>Uraian</td>
			        <td width="80%">
			             <textarea name="uraian" id="summernote" row="4"></textarea>
			        </td>
			    </tr>
			    <tr>
			        <td>Kode Rekening</td>
			        <td width="80%">
			            <select class="form-control selectza col-sm-12" name="id_rekening">
			            
			            	<?php

			            	$sqlRek="SELECT * FROM data_rekening WHERE level='6'";
			            	foreach ($this->db->query($sqlRek)->result() as $row) {
			            		# code...
			            	
			            	?>    
			                <option value="<?php echo $row->id ?>"><?php echo $row->kode ?> - <?php echo $row->nama ?></option>
			            	<?php } ?>
			            </select>
			        </td>
			    </tr>
			     <tr>
			        <td class="bg-kedua">Penerimaan</td>
			        <td width="80%" class="bg-kedua">
			            <input class='form-control' name="masuk" type="text" placeholder="masukan jumlah penerimaan" autocomplete="off" />
			        </td>
			    </tr>
			     <tr>
			        <td class="bg-utama">Pengeluaran</td>
			        <td width="80%" class="bg-utama" >
			            <input class='form-control' name="keluar" type="text" placeholder="masukan jumlah pengeluaran" autocomplete="off" />
			        </td>
			    </tr>
			
              
			 </table>
		
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();

    });
  </script>
