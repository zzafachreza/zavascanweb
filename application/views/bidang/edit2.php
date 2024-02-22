<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('bidang') ?>">bidang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('bidang/update2') ?>" method="POST" enctype="multipart/form-data">

	<a onClick="window.history.back();"  class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  id="simpan" type="SUBMIT" class="btn bg-utama" ><i class="flaticon2-download-2"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  	    
	  	    <?php
	  	    $bidangHD = $this->db->query("SELECT * FROM data_bidang WHERE id='$id_bidang'")->row_array();
	  	   
	  	     $sqlKegiatan ="SELECT * FROM data_kegiatan WHERE id_bidang='$id_bidang' AND id='$id'";
	  	    
	  	    
	  	    $kegiatan = $this->db->query($sqlKegiatan)->row_array();
	  	    ?>
	  	 
	
	  		 	  <table class="table table-hover table-bordered ">
	  		        <tr><th width="40%">Nama Bidang</th><td><?php echo $bidangHD['nama'] ?></td></tr>
                    <tr><th class="bg-utama" >Anggaran</th><td><h3 class="text-utama"><?php echo number_format($bidangHD['anggaran']) ?></h3></td></tr>
                     <tr><th class="bg-kedua" >Realisasi</th><td><h3 class="text-kedua"><?php echo number_format($bidangHD['perubahan']) ?></h3></td></tr>
	  		    </table>
	  	    
	  		<form>
	  		    
	  		


			 <table class="table">
			    <input autocomplete='off' value="<?php echo $id_bidang ?>" type='hidden' name='id_bidang' class='form-control'>
			     <input autocomplete='off' value="<?php echo $id ?>" type='hidden' name='id' class='form-control'>
                <tr><th width="40%">Nama Kegiatan / BKU</th><td><input autofocus="autofocus" autocomplete='off' type='text' name='nama_kegiatan' class='form-control' value="<?php echo $kegiatan['nama_kegiatan'] ?>" ></td></tr>
                   <tr><th>Bulan</th><td>
                    <select class="form-control" name="bulan">
                            
                        <option <?php echo $kegiatan['bulan']=="Januari"?'selected':'' ?> >Januari</option>
                        <option <?php echo $kegiatan['bulan']=="Februari"?'selected':'' ?> >Februari</option>
                        <option <?php echo $kegiatan['bulan']=="Maret"?'selected':'' ?> >Maret</option>
                        <option <?php echo $kegiatan['bulan']=="April"?'selected':'' ?> >April</option>
                        <option <?php echo $kegiatan['bulan']=="Mei"?'selected':'' ?> >Mei</option>
                        <option <?php echo $kegiatan['bulan']=="Juni"?'selected':'' ?> >Juni</option>
                        <option <?php echo $kegiatan['bulan']=="Juli"?'selected':'' ?> >Juli</option>
                        <option <?php echo $kegiatan['bulan']=="Agustus"?'selected':'' ?> >Agustus</option>
                        <option <?php echo $kegiatan['bulan']=="September"?'selected':'' ?> >September</option>
                        <option <?php echo $kegiatan['bulan']=="Oktber"?'selected':'' ?> >Oktber</option>
                        <option <?php echo $kegiatan['bulan']=="November"?'selected':'' ?> >November</option>
                        <option <?php echo $kegiatan['bulan']=="Desember"?'selected':'' ?> >Desember</option>
                    </select>
                    </select>
                </td></tr>
                <tr><th>Tahun</th><td>
                    <select class="form-control" name="tahun">
                        <?php
                        
                        for($tahun=date('Y');$tahun < date('Y')+2;$tahun++){
                        
                        ?>
                            <option <?php echo $kegiatan['tahun']==$tahun?'selected':'' ?>><?php echo $tahun ?></option>
                        
                        <?php } ?>
                    </select>
                </td></tr>
             
        		

                </tr>
			 </table>
		
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>