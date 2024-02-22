<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('pelamar') ?>">pelamar</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	  <form action="<?php echo site_url('pelamar/insert') ?>" method="POST" enctype="multipart/form-data">

	<a href="<?php echo site_url('pelamar') ?>" class="AppButton-dark"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		<button class="AppButton-secondary" type="RESET"><i class="flaticon2-refresh-button"></i> Reset</button>
  	<button  class="AppButton-primary" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
	  </div>
	  	<div class="card-body">
	  		<form>
	  		   <div class="form-group col col-sm-6">
			    <label for="foto" class="AppLabel">Foto KTP</label>
			    <input autocomplete="off"  type="file" name="foto" >
			  </div>
			  
			   <div class="form-group col col-sm-6">
			    <label for="foto2" class="AppLabel">Foto Wajah</label>
			    <input autocomplete="off"  type="file" name="foto2" >
			  </div>
			  

			  
			  <table class="table table-bordered table-striped">
			      <tr><th>Nama lengkap</th><td><input autocomplete='off' type='text' name='nama_lengkap' class='form-control'></td></tr>
                    <tr><th>Nama panggilan</th><td><input autocomplete='off' type='text' name='nama_panggilan' class='form-control'></td></tr>
                    <tr><th>Email</th><td><input autocomplete='off' type='email' name='email' class='form-control'></td></tr>
                    <tr><th>Tempat lahir</th><td><input autocomplete='off' type='text' name='tempat_lahir' class='form-control'></td></tr>
                    <tr><th>Tanggal lahir</th><td><input autocomplete='off' type='text' name='tanggal_lahir' class='form-control tgl'></td></tr>
                    <tr><th>Nomor ktp</th><td><input autocomplete='off' type='text' name='nomor_ktp' class='form-control'></td></tr>
                    <tr><th>Nomor kk</th><td><input autocomplete='off' type='text' name='nomor_kk' class='form-control'></td></tr>
                    <tr><th>Alamat</th><td><input autocomplete='off' type='text' name='alamat' class='form-control'></td></tr>
                    <tr><th>Alamat sekarang</th><td><input autocomplete='off' type='text' name='alamat_sekarang' class='form-control'></td></tr>
                   
                    <tr><th>Telepon</th><td><input autocomplete='off' type='text' name='telepon' class='form-control'></td></tr>
                    <tr><th>Tinggi badan</th><td><input autocomplete='off' type='text' name='tinggi_badan' class='form-control'></td></tr>
                    <tr><th>Berat badan</th><td><input autocomplete='off' type='text' name='berat_badan' class='form-control'></td></tr>
                    <tr><th>Umur</th><td><input autocomplete='off' type='text' name='umur' class='form-control'></td></tr>
                    <tr><th>Bersedia bekerja di mana ?</th><td><input autocomplete='off' type='text' name='mau_kerja_dimana' class='form-control'></td></tr>
                    <tr><th>Takut anjing ?</th><td><input autocomplete='off' type='text' name='takut_anjing' class='form-control'></td></tr>
                    <tr><th>Pengalaman bekerja di luar negri</th><td><input autocomplete='off' type='text' name='kerja_diluar_negri' class='form-control'></td></tr>
                    <tr><th>Pendidikan</th><td><input autocomplete='off' type='text' name='pendidikan' class='form-control'></td></tr>
                    <tr><th>Pengalaman</th><td><input autocomplete='off' type='text' name='pengalaman' class='form-control'></td></tr>
                    <tr><th>Pernikahan</th><td><input autocomplete='off' type='text' name='pernikahan' class='form-control'></td></tr>
                    <tr><th>Punya anak</th><td><input autocomplete='off' type='text' name='punya_anak' class='form-control'></td></tr>
                    <tr><th>Agama</th><td><input autocomplete='off' type='text' name='agama' class='form-control'></td></tr>
                    <tr><th>Suku</th><td><input autocomplete='off' type='text' name='suku' class='form-control'></td></tr>
                    <tr><th>Bisa bahasa Inggris ?</th><td><input autocomplete='off' type='text' name='inggris' class='form-control'></td></tr>
                    <tr><th>Bisa Naik motor ?</th><td><input autocomplete='off' type='text' name='naik_motor' class='form-control'></td></tr>
                    <tr><th>Bisa masak ?</th><td><input autocomplete='off' type='text' name='bisa_masak' class='form-control'></td></tr>
                    <tr><th>Bisa asuh Bayi/Balita/Anak ?</th><td><input autocomplete='off' type='text' name='bisa_asuh' class='form-control'></td></tr>
                    <tr><th>Mau melamar sebagai apa ?</th><td>
                        
                        <select name="sebagai_apa" class="form-control  selectza" required="required">

        			    	<option>Pembantu</option>
                            <option>Baby Sister</option>
                            <option>Tukang Masak</option>
                            <option>Sopir/Driver</option>
                            <option>Tukang Kebun</option>
                            <option>Tukang Pijat</option>
                            <option>Office Boy</option>
                            <option>Perawat Lansia</option>
                            <option>Cleaning Service</option>
                            <option>Pet Care</option>
                            <option>Penjaga Toko</option>
        
        
        
        		  	
        			    	
        			    
        			    </select>
                        
                    </td></tr>
                     <tr><th>Profesi/Keahlian</th><td><input autocomplete='off' type='text' name='profesi' class='form-control'></td></tr>
                    <tr><th>Nomor Hp yang dapat dihubungi</th><td><input autocomplete='off' type='text' name='hp_dapat_dihubungi' class='form-control'></td></tr>
                    <tr><th>Referral</th><td><input autocomplete='off' type='text' name='referral' class='form-control'></td></tr>
                    <tr><th>Gaji yang di harapkan</th><td><input autocomplete='off' type='text' name='gaji' class='form-control'></td></tr>
			  </table>

			  

			
			   
			   
			
			</form>
		  </div>
		  <div class="card-footer">

		  </div>
	  </form>
	</div>


</div>



