<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('customer') ?>">customer</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('customer/update') ?>" method="POST" >

	<a href="<?php echo site_url('customer') ?>" class="btn bg-kedua" ><i class="flaticon2-left-arrow-1"></i> Kembali</a>

	
  	<button class="btn bg-utama" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<input type="hidden" name="id" value="<?php echo $customer['id'] ?>">
			 <div class="form-group col col-sm-6">
			    <label for="nama_lengkap">Nama Pengguna / Toko</label>
			    <i class="flaticon2-user iconInput"></i>
			    <input autocomplete="off" required="required" type="text" name="nama_lengkap" class="AppInput" id="nama_lengkap" value="<?php echo $customer['nama_lengkap'] ?>">
			  </div>
			  
			  <!--<div class="form-group col col-sm-6">-->
			  <!--  <label for="tipe">Tipe Akum</label>-->
     <!--           <select class="form-control" name="tipe">-->
     <!--               <option></option>-->
     <!--               <option>BULANAN</option>-->
     <!--               <option>TIDAK AKTIF</option>-->
     <!--           </select>-->
			    
			  <!--</div>-->

			  <div class="form-group col col-sm-6">
			    <label for="email">Email Akun</label>
			      <i class="flaticon2-rocket iconInput"></i>
			    <input autocomplete="off" required="required" type="email" name="email" class="AppInput" id="email" value="<?php echo $customer['email'] ?>">
			  </div>
			  <div class="form-group col col-sm-6">
			    <label for="password">Password</label>
			      <i class="flaticon-lock iconInput"></i>
			    <input autocomplete="off"  type="password" name="password" class="AppInput" id="password"  placeholder="kosongkan password jika tidak diubah">
			  </div>
			  
			   <div class="form-group col col-sm-6">
			    <label for="tlp">Telepon (angka 62 didepan : 62813...)</label>
			      <i class="flaticon2-phone iconInput"></i>
			    <input autocomplete="off" required="required" type="tlp" name="tlp"tlp class="AppInput" id="tlp" maxlength="14" value="<?php echo $customer['tlp'] ?>">
			  </div>
			  
			   <div class="form-group col col-sm-6">
			    <label for="alamat">alamat</label>
			      <i class="flaticon2-map iconInput"></i>
			    <input autocomplete="off" required="required" type="alamat" name="alamat" class="AppInput" id="alamat" value="<?php echo $customer['alamat'] ?>">
			  </div>
			  
			  <div class="form-group col col-sm-6">
			    <label for="alamat">Jumlah Device</label>

			    <input autocomplete="off" required="required" type="number" name="jumlah_device" class="form-control" id="jumlah_device" value="<?php echo $customer['jumlah_device'] ?>">
			  </div>
			  
			   <div class="form-group col col-sm-6">
			    <label for="alamat">Expired</label>
                <i class="flaticon-calendar iconiInput"></i>
			    <input autocomplete="off" required="required" type="date" name="expired" class="form-control" id="expired" value="<?php echo $customer['expired'] ?>">
			  </div>
			
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



