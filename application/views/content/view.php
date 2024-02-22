<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('content') ?>">content</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('content') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		  </div>
	  	<div class="card-body">
	  		<div class="form-group">
			    <label for="nama">Menu</label>
			    <h3><?php  echo $content['nama_menu'] ?></h3>
			  </div>
			  <div class="form-group">
			    <label for="nama">content</label>
			    <h3><?php  echo $content['nama_halaman'] ?></h3>
			  </div>
			  <div class="form-group">
			    <label for="nama">Nama content</label>
			    <h3><?php  echo $content['nama_content'] ?></h3>
			  </div>
			  <div class="form-group">
			    <label for="nama">Tipe</label>
			    <h3><?php  echo $content['tipe'] ?></h3>
			  </div>
			    <div class="form-group">
			    <label for="nama">Render</label>
			    <h3><?php  echo $content['render'] ?></h3>
			  </div>
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



