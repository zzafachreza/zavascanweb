<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('company') ?>">company</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('company') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		  </div>
	  	<div class="card-body">

	  		 <div class="form-group">
				<img src="<?php  echo site_url().$company['foto'] ?>" width="100">
			  </div>
			    <div class="form-group">
			    <label>Nama</label>
			    <h3><?php  echo $company['nama'] ?></h3>
			  </div>
			   <div class="form-group">
			    <label>Deskripsi</label>
			    <h3><?php  echo $company['deskripsi'] ?></h3>
			  </div>

	  		  <div class="form-group">
			    <label>Alamat</label>
			    <h3><?php  echo $company['alamat'] ?></h3>
			  </div>
			
			  <div class="form-group">
			    <label>telepon</label>
			    <h3><?php  echo $company['tlp'] ?></h3>
			  </div>
			   <div class="form-group">
			    <label>E-mail</label>
			    <h3><?php  echo $company['email'] ?></h3>
			  </div>
			   <div class="form-group">
			    <label>Facebook</label>
			    <h3><?php  echo $company['fb'] ?></h3>
			  </div>
			   <div class="form-group">
			    <label>Instagram</label>
			    <h3><?php  echo $company['ig'] ?></h3>
			  </div>
			   <div class="form-group">
			    <label>Twitter</label>
			    <h3><?php  echo $company['tw'] ?></h3>
			  </div>
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



