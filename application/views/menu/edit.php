<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('menu') ?>">menu</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('menu/update') ?>" method="POST" >

	<a href="<?php echo site_url('menu') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
			  <div class="form-group col col-sm-6">
			    <label for="nama" class="AppLabel">Nama Lengkap</label>
			    <i class="flaticon2-user iconInput"></i>
			    <input type="hidden" name="id" value="<?php echo $menu['id'] ?>">
			    <input autocomplete="off" value="<?php echo $menu['nama'] ?>" required="required" type="text" name="nama" class="AppInput" id="nama">
			  </div>

			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



