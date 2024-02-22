<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('nama_gambar') ?>">gambar</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('gambar/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url('gambar') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			   	<img src="<?php echo site_url().$gambar['foto'] ?>" width="100">

			  <div class="form-group col col-sm-6">
			    <label for="nama" class="AppLabel">Nama gambar</label>
			    <i class="flaticon2-user iconInput"></i>
			    <input type="hidden" name="id" value="<?php echo $gambar['id'] ?>">
			    <input autocomplete="off" value="<?php echo $gambar['nama'] ?>" required="required" type="text" name="nama" class="AppInput" id="nama">
			  </div>

			  <input type="hidden" name="foto_old" value="<?php echo $gambar['foto'] ?>">
			  <div class="form-group col col-sm-6">
			    <label for="tipe">Menu / Halaman</label>
			    <select name="tipe" class="form-control  selectza" required="required">

			    	<option <?php echo $gambar['tipe']=='BACKGROUND'?'selected="selected"':'' ?>>BACKGROUND</option>
			    	<option <?php echo $gambar['tipe']=='TOP'?'selected="selected"':'' ?>>TOP</option>
			    	<option <?php echo $gambar['tipe']=='PAKET'?'selected="selected"':'' ?>>PAKET</option>
					<option <?php echo $gambar['tipe']=='SOLUTION'?'selected="selected"':'' ?>>SOLUTION</option>
					<option <?php echo $gambar['tipe']=='TESTIMONIAL'?'selected="selected"':'' ?>>TESTIMONIAL</option>

					<option <?php echo $gambar['tipe']=='BANNER'?'selected="selected"':'' ?>>BANNER</option>
					<option <?php echo $gambar['tipe']=='YOUTUBE'?'selected="selected"':'' ?>>YOUTUBE</option>
					<option <?php echo $gambar['tipe']=='ARTIKEL'?'selected="selected"':'' ?>>ARTIKEL</option>
						<option <?php echo $gambar['tipe']=='VOUCHER'?'selected="selected"':'' ?>>VOUCHER</option>
			
			

			    	
			    
			    </select>
			  </div>


			   <div class="form-group col col-sm-6">

			    <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika ridak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>


			     <div class="form-group col col-sm-6">
			    <label for="ket" class="AppLabel">keterangan</label>
			    <i class="flaticon-imac iconInput"></i>
			   <textarea class="form-control AppInput" name="ket"><?php echo  $gambar['ket'] ?></textarea>
			  </div>
			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



