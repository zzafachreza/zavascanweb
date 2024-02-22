<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('rencana') ?>">rencana</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('rencana/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('rencana') ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

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
			     
			  <tr><th>Kegiatan</th><td>
			      
			        <select class="form-control" name="id_kegiatan">
			              <?php
			              
			              foreach($this->db->query("SELECT data_kegiatan_pica.id,data_kegiatan_pica.nama,data_kegiatan_pica.anggaran,data_kegiatan_pica.foto,data_bidang.nama as nama_bidang,id_bidang,data_bidang.anggaran as anggaran_bidang FROM data_kegiatan_pica join data_bidang on data_bidang.id = data_kegiatan_pica.id_bidang")->result() as $kegiatan){
			              ?>
			              <option value="<?php echo $kegiatan->id ?>"><?php echo $kegiatan->nama_bidang ?> - <?php echo $kegiatan->nama ?></option>
			              
			              <?php } ?>
			              </select>
			  </td></tr>
            <tr><th>Rekening</th><td>
                <select class="form-control" name="id_rekening">
			              <?php
			              
			              foreach($this->db->query("SELECT * FROM data_rekening")->result() as $rek){
			              ?>
			              <option value="<?php echo $rek->id ?>"><?php echo $rek->nama ?></option>
			              
			              <?php } ?>
			              </select>
            </td></tr>
            <tr><th>Komponen</th><td><input autocomplete='off' type='text' name='komponen' class='form-control'></td></tr>
            <tr><th>Satuan</th><td><input autocomplete='off' type='text' name='satuan' class='form-control'></td></tr>
            <tr><th>Koefisien</th><td><input autocomplete='off' type='text' name='koefisien' class='form-control'></td></tr>
            <tr><th>Harga</th><td><input autocomplete='off' type='text' name='harga' class='form-control'></td></tr>
            <tr><th>Pajak</th><td><input autocomplete='off' type='text' name='pajak' class='form-control'></td></tr>
            <tr><th>Total</th><td><input autocomplete='off' type='text' name='total' class='form-control'></td></tr>
                     
			 </table>
		
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



