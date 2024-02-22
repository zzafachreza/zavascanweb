<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('halaman') ?>">halaman</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('halaman/update') ?>" method="POST" >

	<a href="<?php echo site_url('halaman') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			<select name="id_menu" class="form-control  selectza" required="required">
			    <?php
	  				$no=0;
	  				foreach($menu->result() as $row):
	  				$no++;
		  		?>
		  				<option  value="<?php echo $row->id ?>" <?php  echo $halaman['id_menu']==$row->id ? 'selected="selected"':'' ?>><?php echo $row->nama ?></option>

		  		<?php 
		  				endforeach;
		  		?>

			    	
			    
			    </select>
			  <div class="form-group col col-sm-6">
			    <label for="nama" class="AppLabel">Nama Lengkap</label>
			    <i class="flaticon2-user iconInput"></i>
			    <input type="hidden" name="id" value="<?php echo $halaman['id'] ?>">
			    <input autocomplete="off" value="<?php echo $halaman['nama'] ?>" required="required" type="text" name="nama" class="AppInput" id="nama">
			  </div>

			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



