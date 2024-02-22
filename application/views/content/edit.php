<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('content') ?>">content</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('content/update') ?>" method="POST" >

	<a href="<?php echo site_url('content') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>

			  <div class="form-group col col-sm-6">
			    <label for="nama" class="AppLabel">Judul Content</label>
			    <i class="flaticon2-user iconInput"></i>
			    <input type="hidden" name="id" value="<?php echo $content['id'] ?>">
			    <input autocomplete="off" value="<?php echo $content['nama_content'] ?>" required="required" type="text" name="nama" class="AppInput" id="nama">
			  </div>


			  <div class="form-group col col-sm-6">
			    <label for="id_halaman">Menu / Halaman</label>
			    <select name="id_halaman" class="form-control  selectza" required="required">

			    	<option></option>
			    <?php
	  				$no=0;
	  				foreach($halaman->result() as $row):
	  				$no++;
		  		?>
		  				<option  value="<?php echo $row->id ?>" <?php  echo $content['id_halaman']==$row->id ? 'selected="selected"':'' ?>><?php echo $row->nama_menu ?> / <?php echo $row->nama_halaman ?></option>

		  		<?php 
		  				endforeach;
		  		?>

			    	
			    
			    </select>
			  </div>

			   <div class="form-group col col-sm-6">
			    <label for="tipe">tipe</label>
			    <select name="tipe" class="form-control  selectza" required="required">
			    	<option <?php  echo $content['tipe']=='ARTICLE' ? 'selected="selected"':'' ?>>ARTICLE</option>
			    	<option <?php  echo $content['tipe']=='PRODUCT' ? 'selected="selected"':'' ?>>PRODUCT</option>
			    	<option <?php  echo $content['tipe']=='VOUCHER' ? 'selected="selected"':'' ?>>VOUCHER</option>
			    </select>
			  </div>

			     <div class="form-group col col-sm-6" style="display: none">
			    <label for="nama" class="AppLabel">Render</label>
			    <i class="flaticon-imac iconInput"></i>

			   <textarea class="form-control AppInput" name="render"><?php echo  $content['render'] ?></textarea>
			  </div>
			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



