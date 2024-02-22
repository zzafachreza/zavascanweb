<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('pelamar') ?>">pelamar</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('pelamar') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		  </div>
	  	<div class="card-body">
	  	    
			<table class="table table-bordered">
			    <tr><th>Pas Foto</th><td><img src="<?php echo site_url().'upload/'.str_replace('upload/','',$pelamar['foto2']); ?>" width="300"/></td></tr>
			    <tr><th>KTP</th><td><img src="<?php echo site_url().'upload/'.str_replace('upload/','',$pelamar['foto1']); ?>" width="400" height="250"/></td></tr>
			    <tr><th>nama_lengkap</th><td><?php echo $pelamar['nama_lengkap'] ?></td></tr>
                <tr><th>nama_panggilan</th><td><?php echo $pelamar['nama_panggilan'] ?></td></tr>
                <tr><th>email</th><td><?php echo $pelamar['email'] ?></td></tr>
                <tr><th>tempat_lahir</th><td><?php echo $pelamar['tempat_lahir'] ?></td></tr>
                <tr><th>tanggal_lahir</th><td><?php echo $pelamar['tanggal_lahir'] ?></td></tr>
                <tr><th>nomor_ktp</th><td><?php echo $pelamar['nomor_ktp'] ?></td></tr>
                <tr><th>nomor_kk</th><td><?php echo $pelamar['nomor_kk'] ?></td></tr>
                <tr><th>alamat</th><td><?php echo $pelamar['alamat'] ?></td></tr>
                <tr><th>alamat_sekarang</th><td><?php echo $pelamar['alamat_sekarang'] ?></td></tr>
                <tr><th>profesi</th><td><?php echo $pelamar['profesi'] ?></td></tr>
                <tr><th>telepon</th><td><?php echo $pelamar['telepon'] ?></td></tr>
                <tr><th>tinggi_badan</th><td><?php echo $pelamar['tinggi_badan'] ?></td></tr>
                <tr><th>berat_badan</th><td><?php echo $pelamar['berat_badan'] ?></td></tr>
                <tr><th>umur</th><td><?php echo $pelamar['umur'] ?></td></tr>
                <tr><th>mau_kerja_dimana</th><td><?php echo $pelamar['mau_kerja_dimana'] ?></td></tr>
                <tr><th>takut_anjing</th><td><?php echo $pelamar['takut_anjing'] ?></td></tr>
                <tr><th>kerja_diluar_negri</th><td><?php echo $pelamar['kerja_diluar_negri'] ?></td></tr>
                <tr><th>pendidikan</th><td><?php echo $pelamar['pendidikan'] ?></td></tr>
                <tr><th>pengalaman</th><td><?php echo $pelamar['pengalaman'] ?></td></tr>
                <tr><th>pernikahan</th><td><?php echo $pelamar['pernikahan'] ?></td></tr>
                <tr><th>punya_anak</th><td><?php echo $pelamar['punya_anak'] ?></td></tr>
                <tr><th>agama</th><td><?php echo $pelamar['agama'] ?></td></tr>
                <tr><th>suku</th><td><?php echo $pelamar['suku'] ?></td></tr>
                <tr><th>inggris</th><td><?php echo $pelamar['inggris'] ?></td></tr>
                <tr><th>naik_motor</th><td><?php echo $pelamar['naik_motor'] ?></td></tr>
                <tr><th>bisa_masak</th><td><?php echo $pelamar['bisa_masak'] ?></td></tr>
                <tr><th>bisa_asuh</th><td><?php echo $pelamar['bisa_asuh'] ?></td></tr>
                <tr><th>sebagai_apa</th><td><?php echo $pelamar['sebagai_apa'] ?></td></tr>
                <tr><th>hp_dapat_dihubungi</th><td><?php echo $pelamar['hp_dapat_dihubungi'] ?></td></tr>
                <tr><th>referral</th><td><?php echo $pelamar['referral'] ?></td></tr>
                <tr><th>gaji</th><td><?php echo $pelamar['gaji'] ?></td></tr>
                <tr><th>foto1</th><td><?php echo $pelamar['foto1'] ?></td></tr>
                <tr><th>foto2</th><td><?php echo $pelamar['foto2'] ?></td></tr>
			</table>
			  
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



