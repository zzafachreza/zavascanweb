<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('users') ?>">Users</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('users/update') ?>" method="POST" >

	<a href="<?php echo site_url('users') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

  	<button  class="btn bg-utama" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
			  <div class="form-group col col-sm-6">
			    <label for="nama_lengkap" class="AppLabel">Nama Lengkap</label>
			    <i class="flaticon2-user iconInput"></i>
			    <input type="hidden" name="id" value="<?php echo $users['id'] ?>">
			    <input autocomplete="off" value="<?php echo $users['nama_lengkap'] ?>" autofocus="autofocus" required="required" type="text" name="nama_lengkap" class="AppInput" id="nama_lengkap">
			  </div>

			  <div class="form-group col col-sm-6">
			    <label for="username" class="AppLabel">Username</label>
			      <i class="flaticon2-rocket iconInput"></i>
			    <input autocomplete="off" required="required" value="<?php echo $users['username'] ?>"  type="text" name="username" class="AppInput" id="username">
			  </div>
			  <div class="form-group col col-sm-6">
			    <label for="password" class="AppLabel">Password</label>
			      <i class="flaticon2-console iconInput"></i>
			    <input autocomplete="off" type="password" name="password" class="AppInput" id="password">
			  </div>

			    <div class="form-group col col-sm-6">
			    <label for="Level">Hak Akses </label>
			    <select name="level" class="form-control  selectza" style="outline: none;">
			    	<option <?php echo $users['level']=='ADMIN' ? 'selected="selected"':'' ?>>ADMIN</option>
                
			    	<?php
			    	    
			    	    foreach($this->db->query("SELECT nama FROM  data_bidang")->result() as $row){
			    	        
			    	        ?>
			    	        
			    	        <option><?php echo $row->nama ?></option>
			    	        <?php
			    	    }
			    	
			    	?>
			    </select>
			  </div>
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



