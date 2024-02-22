<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('kegiatan') ?>">kegiatan</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('kegiatan/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url('kegiatan') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			   	<img src="<?php echo site_url().$kegiatan['foto'] ?>" width="100">

			
			  <input type="hidden" name="foto_old" value="<?php echo $kegiatan['foto'] ?>">
			   <input type="hidden" name="id" value="<?php echo $kegiatan['id'] ?>">
		


			   <div class="form-group col col-sm-6">

			    <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika ridak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>
			  
			   


			   <table class="table">
			       <tr>
			           <th>Bidang</th>
			           <td>
			                <select class="form-control" name="id_bidang">
			              <?php
			              
			              foreach($this->db->query("SELECT * FROM data_bidang")->result() as $bidang){
			              ?>
			              <option <?php echo $bidang->id==$kegiatan['id_bidang']?'selected':'' ?> value="<?php echo $bidang->id ?>"><?php echo $bidang->nama ?></option>
			              
			              <?php } ?>
			          </select>
			           </td>
			       </tr>
			        <tr><th>Nama kegiatan</th><td><input autocomplete='off' type='text' name='nama' class='form-control' value='<?php echo $kegiatan['nama'] ?>'></td></tr>
			          <tr><th>Anggaran</th><td><input autocomplete='off' type='text' name='anggaran' class='form-control' value='<?php echo $kegiatan['anggaran'] ?>'></td></tr>
			     </table>
			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



