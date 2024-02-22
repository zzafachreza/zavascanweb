<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('gambar') ?>">gambar</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('gambar') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		  </div>
	  	<div class="card-body">

	  		 <div class="form-group">
	  		 	
	
				<img src="<?php  echo site_url().$gambar['foto'] ?>" width="100">
			  </div>

	  		  <div class="form-group">
			    <label>tipe</label>
			    <h3><?php  echo $gambar['tipe'] ?></h3>
			  </div>
			  <div class="form-group">
			    <label>Nama</label>
			    <h3><?php  echo $gambar['nama'] ?></h3>
			  </div>
			  <div class="form-group">
			    <label>Keterangan</label>
			    <h3><?php  echo $gambar['ket'] ?></h3>
			  </div>

	


	
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



