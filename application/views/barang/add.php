<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('barang') ?>">barang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('barang/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('barang') ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

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
			      <tr><th>Kategori</th><td>
                         <select class="form-control selectza" name="id_sub_kategori">
                             <?php
                             
                             $sqlBrand = "SELECT data_sub_kategori.id, nama_kategori,nama_sub_kategori,data_sub_kategori.foto,data_kategori.foto foto_kategori FROM data_sub_kategori join data_kategori on data_sub_kategori.id_kategori = data_kategori.id";
                             $hasilBrand = $this->db->query($sqlBrand);
                             
                             foreach($hasilBrand->result() as $rBrand ){
                             ?>
                             <option value="<?php echo $rBrand->id ?>"><?php echo $rBrand->nama_kategori ?> / <?php echo $rBrand->nama_sub_kategori ?></option>
                             <?php 
                             
                             }
                             ?>
                         </select>
                     </td></td></tr>
			     <tr><th>Nama barang</th><td><input autocomplete='off' type='text' name='nama_barang' class='form-control'></td></tr>
			     <input autocomplete='off' type='hidden' name='uom' class='form-control' value="UNIT">
			     <tr><th>HPP/Harga Dasar</th><td><input autocomplete='off' type='text' name='hpp' class='form-control'></td></tr>
                 <tr><th>Harga</th><td><input autocomplete='off' type='text' name='harga_awal' class='form-control'></td></tr>
                 <tr><th>Diskon/Potongan</th><td><input autocomplete='off' type='text' name='diskon' class='form-control'></td></tr>
                 <tr><th>Keterangan</th><td><input autocomplete='off' type='text' name='keterangan' class='form-control'></td></tr>
           
                 
			 </table>
		
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



