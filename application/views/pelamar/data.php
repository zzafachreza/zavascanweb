<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Pelamar</li>
	  </ol>
</nav>
<div class="container-fluid">

<?php


	
?>
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	  	<a href="<?php echo site_url('pelamar/add') ?>" class="AppButton-primary"><i class="flaticon-add"></i> Tambah</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th></th>
	  			<th>Nama Lengkap</th>
	  			<th>Nama Pangilan</th>
	  			<th>Kategori</th>
	  			<th>Telepon</th>
	  			<th>Alamat</th>
	  			<th>action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($pelamar->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
                        <td><img src="<?php echo site_url().'upload/'.str_replace('upload/','',$row->foto2); ?>" width="50"/></td>
		  				<td><?php echo $row->nama_lengkap ?></td>
		  				<td><?php echo $row->nama_panggilan ?></td>
		  				<td><?php echo $row->sebagai_apa ?></td>
		  				<td><?php echo $row->telepon ?></td>
		  				<td><?php echo $row->alamat ?></td>
		  				<td>
		  					<a href="<?php echo site_url('pelamar/detail/'.$row->id) ?>" class="AppButton-primary"><i class="flaticon-eye"></i></a>
		  					<a href="<?php echo site_url('pelamar/delete/'.$row->id.'/'.str_replace("upload/","",$row->foto1).'/'.str_replace("upload/","",$row->foto2)) ?>" class="AppButton-dark"><i class="flaticon-delete"></i></a>
		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>

	  </div>
	</div>


</div>



