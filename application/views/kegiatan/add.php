<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('kegiatan') ?>">kegiatan</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('kegiatan/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('kegiatan') ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		<button class="AppButton-secondary" type="RESET"><i class="flaticon2-refresh-button"></i> Reset</button>
  	<button  class="AppButton-primary" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  		    
	  		   <div class="form-group col col-sm-6">
			    <label for="foto" class="AppLabel">Foto</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>


			 <table class="table">
			      <tr><th>Nama Bidang</th><td>
			          <select class="form-control" name="id_bidang">
			              <?php
			              
			              foreach($this->db->query("SELECT * FROM data_bidang")->result() as $bidang){
			              ?>
			              <option value="<?php echo $bidang->id ?>"><?php echo $bidang->nama ?></option>
			              
			              <?php } ?>
			          </select>
			      </td></tr>
			   <tr><th>Nama kegiatan</th><td><input autocomplete='off' type='text' name='nama' class='form-control'></td></tr>
			    <tr><th>Anggran</th><td><input autocomplete='off' type='text' name='anggaran' class='form-control'></td></tr>
                     
			 </table>
		
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



