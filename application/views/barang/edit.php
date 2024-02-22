<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('barang') ?>">barang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('barang/update') ?>" method="POST" enctype="multipart/form-data" >

	<a href="<?php echo site_url('barang') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  	<button class="AppButton-primary" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  			   	<img src="<?php echo site_url().$barang['foto'] ?>" width="100">

			
			  <input type="hidden" name="foto_old" value="<?php echo $barang['foto'] ?>">
			   <input type="hidden" name="id" value="<?php echo $barang['id'] ?>">
		


			   <div class="form-group col col-sm-6">

			    <label for="foto" class="AppLabel" style="color: red">Foto (Kosongkan jika ridak diubah)</label>
			    <input autocomplete="off" type="file" name="foto" >
			  </div>
			  
			   


			   <table class="table">
			        <tr><th>Kategori</th><td>
                         <select class="form-control selectza" name="id_sub_kategori">
                             <?php
                             
                             $sqlBrand = "SELECT data_sub_kategori.id, nama_kategori,nama_sub_kategori,data_sub_kategori.foto,data_kategori.foto foto_kategori FROM data_sub_kategori join data_kategori on data_sub_kategori.id_kategori = data_kategori.id";
                             $hasilBrand = $this->db->query($sqlBrand);
                             
                             foreach($hasilBrand->result() as $rBrand ){
                             ?>
                             <option value="<?php echo $rBrand->id ?>" <?php echo $rBrand->id==$barang['id_sub_kategori']?'selected="selected"':'' ?>><?php echo $rBrand->nama_sub_kategori ?></option>
                             <?php 
                             
                             }
                             ?>
                         </select>
                     </td></td></tr>
			       <tr><th>Nama barang</th><td><input autocomplete='off' type='text' name='nama_barang' class='form-control' value='<?php echo $barang['nama_barang'] ?>'></td></tr>
			       <input autocomplete='off' type='hidden' name='uom' class='form-control' value="UNIT">
			       <tr><th>HPP / Harga Dasar</th><td><input autocomplete='off' type='text' name='hpp' value="<?php echo $barang['hpp'] ?>" class='form-control'></td></tr>
                    <tr><th>Harga</th><td><input autocomplete='off' type='text' name='harga_awal' class='form-control' value='<?php echo $barang['harga_awal'] ?>'></td></tr>
                     <tr><th>Diskon/Potongan</th><td><input autocomplete='off' type='text' name='diskon' class='form-control' value='<?php echo $barang['diskon'] ?>'></td></tr>
                    <tr><th>Keterangan</th><td><input autocomplete='off' type='text' name='keterangan' class='form-control' value='<?php echo $barang['keterangan'] ?>'></td></tr>
  
                    
			   </table>
			 
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



