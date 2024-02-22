<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('pica') ?>">pica</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('pica/insert2') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('pica/detail') ?>/<?php echo $id_pica ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		<button class="AppButton-secondary" type="RESET"><i class="flaticon2-refresh-button"></i> Reset</button>
  	<button  class="AppButton-primary" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  	    
	  	    <?php
	  	    $picaHD = $this->db->query("SELECT * FROM data_pica WHERE id='$id_pica'")->row_array();
	  	    ?>
	  	    
	  	      <table class="table table-hover table-bordered">
	  		        <tr><th>kegiatan</th><td><?php echo $picaHD['kegiatan'] ?></td></tr>
                    <tr><th>tempat</th><td><?php echo $picaHD['tempat'] ?></td></tr>
                    <tr><th>tanggal</th><td><?php echo Indonesia3Tgl($picaHD['tanggal']) ?></td></tr>
	  		    </table>
	  	    
	  	    
	  		<form>
	  		    
	  		


			 <table class="table">
			    <input autocomplete='off' value="<?php echo $id_pica ?>" type='hidden' name='id_pica' class='form-control'>
                <tr><th>Kegiatan utama</th><td><input autocomplete='off' type='text' name='kegiatan_utama' class='form-control'></td></tr>
                <tr><th>Kegiatan tambahan</th><td><input autocomplete='off' type='text' name='kegiatan_tambahan' class='form-control'></td></tr>
                <tr><th>Pic</th><td><input autocomplete='off' type='text' name='pic' class='form-control'></td></tr>
                <tr><th>Status</th><td><input autocomplete='off' type='text' name='status' class='form-control'></td></tr>
                <tr><th>Problem Identification</th><td><input autocomplete='off' type='text' name='masalah' class='form-control'></td></tr>
                <tr><th>Corrective Action</th><td><input autocomplete='off' type='text' name='perbaikan' class='form-control'></td></tr>
                <tr><th>Update</th><td><input autocomplete='off' type='date' name='upd' class='form-control'></td></tr>
                <tr><th>Dokumentas</th><td>
                      
        			    <input autocomplete="off" type="file" name="foto" >
        		

                </tr>
			 </table>
		
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



