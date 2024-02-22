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
	  		
	  <form action="<?php echo site_url('bidang/insert2') ?>" method="POST" enctype="multipart/form-data">

	<a onClick="window.history.back();"  class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  id="simpan" type="SUBMIT" class="btn bg-utama" ><i class="flaticon2-download-2"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  	    
	  	    <?php
	  	    $bidangHD = $this->db->query("SELECT * FROM data_bidang WHERE id='$id_bidang'")->row_array();
	  	    ?>
	  	    
	
	  		 	  <table class="table table-hover table-bordered ">
	  		        <tr><th width="40%">Nama Bidang</th><td><?php echo $bidangHD['nama'] ?></td></tr>
                    <tr><th class="bg-utama" >Anggaran</th><td><h3 class="text-utama"><?php echo number_format($bidangHD['anggaran']) ?></h3></td></tr>
                     <tr><th class="bg-kedua" >Realisasi</th><td><h3 class="text-kedua"><?php echo number_format($bidangHD['perubahan']) ?></h3></td></tr>
	  		    </table>
	  	    
	  		<form>
	  		    
	  		


			 <table class="table">
			    <input autocomplete='off' value="<?php echo $id_bidang ?>" type='hidden' name='id_bidang' class='form-control'>
                <tr><th width="40%">Nama Kegiatan / BKU</th><td><input autofocus="autofocus" autocomplete='off' type='text' name='nama_kegiatan' class='form-control'></td></tr>
                   <tr><th>Bulan</th><td>
                    <select class="form-control" name="bulan">
                            
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option>September</option>
                        <option>Oktber</option>
                        <option>November</option>
                        <option>Desember</option>
                    </select>
                    </select>
                </td></tr>
                <tr><th>Tahun</th><td>
                    <select class="form-control" name="tahun">
                        <?php
                        
                        for($tahun=date('Y');$tahun < date('Y')+2;$tahun++){
                        
                        ?>
                            <option><?php echo $tahun ?></option>
                        
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