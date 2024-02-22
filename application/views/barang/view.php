<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('barang') ?>">barang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('barang') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		  </div>
	  	<div class="card-body">

	  		 <div class="form-group">
	  		 	
	
				<img src="<?php  echo site_url().$barang['foto'] ?>" width="100">
			  </div>

	  		  <div class="form-group">
			    <label>Nama Barang</label>
			    <h3><?php  echo $barang['nama_barang'] ?></h3>
			  </div>
			  <div class="form-group">
			    <label>harga</label>
			    <h3><?php  echo $barang['harga'] ?></h3>
			  </div>
			   <div class="form-group">
			    <label>UOM</label>
			    <h3><?php  echo $barang['uom'] ?></h3>
			  </div>
			    <label>Id Sub Kategori</label>
			    <h3><?php  echo $barang['id_sub_kategori'] ?></h3>
			  </div>

	


	
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



