<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('company') ?>">company</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('company/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url('company') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			   	<img src="<?php echo site_url().$company['foto'] ?>" width="100">

			  <div class="form-group col col-sm-6">
			    <label for="nama" class="AppLabel">Nama company</label>
			    <i class="flaticon2-user iconInput"></i>
			    <input type="hidden" name="id" value="<?php echo $company['id'] ?>">
			    <input autocomplete="off" value="<?php echo $company['nama'] ?>" required="required" type="text" name="nama" class="AppInput" id="nama">
			  </div>

			  <input type="hidden" name="foto_old" value="<?php echo $company['foto'] ?>">
			 

			   <div class="form-group col col-sm-6">

			    <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika ridak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>


			   <div class="form-group col col-sm-6">
			    <label for="deskripsi" class="AppLabel">deskripsi</label>
			    <i class="flaticon-imac iconInput"></i>
			   <textarea class="form-control AppInput" name="deskripsi"><?php echo  $company['deskripsi'] ?></textarea>
			  </div>

			     <div class="form-group col col-sm-6">
			    <label for="alamat" class="AppLabel">alamat</label>
			    <i class="flaticon-map iconInput"></i>
			   <textarea class="form-control AppInput" name="alamat"><?php echo  $company['alamat'] ?></textarea>
			  </div>

			   <div class="form-group col col-sm-6">
			    <label for="tlp" class="AppLabel">Telepon / WA</label>
			    <i class="flaticon2-phone iconInput"></i>
			    <input autocomplete="off" value="<?php echo $company['tlp'] ?>" required="required" type="text" name="tlp" class="AppInput" id="tlp">
			  </div>

			    <div class="form-group col col-sm-6">
			    <label for="email" class="AppLabel">E - mail</label>
			    <i class="flaticon2-mail iconInput"></i>
			    <input autocomplete="off" value="<?php echo $company['email'] ?>" required="required" type="text" name="email" class="AppInput" id="email">
			  </div>


			    <div class="form-group col col-sm-6">
			    <label for="fb" class="AppLabel">Facebook</label>
			    <input autocomplete="off" value="<?php echo $company['fb'] ?>" required="required" type="text" name="fb" class="AppInput" id="fb">
			  </div>


			    <div class="form-group col col-sm-6">
			    <label for="ig" class="AppLabel">Instagram</label>
			    <input autocomplete="off" value="<?php echo $company['ig'] ?>" required="required" type="text" name="ig" class="AppInput" id="ig">
			  </div>


			    <div class="form-group col col-sm-6">
			    <label for="tw" class="AppLabel">Rekening</label>
			    <input autocomplete="off" value="<?php echo $company['rek'] ?>" required="required" type="text" name="rek" class="AppInput" id="tw">
			  </div>


			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



