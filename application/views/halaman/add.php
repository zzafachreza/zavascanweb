<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('halaman') ?>">halaman</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('halaman/insert') ?>" method="POST" >

	<a href="<?php echo site_url('halaman') ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		<button class="AppButton-secondary" type="RESET"><i class="flaticon2-refresh-button"></i> Reset</button>
  	<button  class="AppButton-primary" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>

	  			<div class="form-group col col-sm-6">
			    <label for="menu">Menu</label>
			    <select name="id_menu" class="form-control  selectza" required="required">

			    	<option></option>
			    <?php
	  				$no=0;
	  				foreach($menu->result() as $row):
	  				$no++;
		  		?>
		  				<option  value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>

		  		<?php 
		  				endforeach;
		  		?>

			    	
			    
			    </select>
			  </div>


			  <div class="form-group col col-sm-6">
			    <label for="nama" class="AppLabel">Nama halaman</label>
			    <i class="flaticon2-file iconInput"></i>
			    <input autocomplete="off" required="required" type="text" name="nama" class="AppInput" id="nama" autofocus="autofocus">
			  </div>
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



