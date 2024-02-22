<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('customer') ?>">member</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('customer/insert') ?>" method="POST" >

	<a href="<?php echo site_url('customer') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  class="btn bg-utama" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
			  <div class="form-group col col-sm-6">
			    <label for="nama_lengkap">Nama Pengguna / Toko</label>
			    <i class="flaticon2-user iconInput"></i>
			    <input autocomplete="off" required="required" type="text" name="nama_lengkap" class="AppInput" id="nama_lengkap">
			  </div>

			  <div class="form-group col col-sm-6">
			    <label for="email">Email Akun</label>
			      <i class="flaticon2-rocket iconInput"></i>
			    <input autocomplete="off" required="required" type="email" name="email" class="AppInput" id="email">
			  </div>
			  
			   <div class="form-group col col-sm-6">
			    <label for="email">Tipe Langganan</label>

			    <select name="tipe" class="form-control">
			        <option>TAHUNAN</option>
			        <option>BULANAN</option>
			    </select>
			  </div>
			  
			  
			  <div class="form-group col col-sm-6">
			    <label for="password">Password</label>
			      <i class="flaticon-lock iconInput"></i>
			    <input autocomplete="off" required="required" type="password" name="password" class="AppInput" id="password">
			  </div>
			  
			   <div class="form-group col col-sm-6">
			    <label for="tlp">Telepon (angka 62 didepan : 62813...)</label>
			      <i class="flaticon2-phone iconInput"></i>
			    <input autocomplete="off" required="required" type="tlp" name="tlp"tlp class="AppInput" id="tlp" maxlength="14">
			  </div>
			  
			   <div class="form-group col col-sm-6">
			    <label for="alamat">alamat</label>
			      <i class="flaticon2-map iconInput"></i>
			    <input autocomplete="off" required="required" type="alamat" name="alamat" class="AppInput" id="alamat">
			  </div>

			 
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



