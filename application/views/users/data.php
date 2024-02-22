<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Users</li>
	  </ol>
</nav>
<div class="container-fluid">

<?php


	
?>
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	    <a href="<?php echo site_url('Users/add') ?>" class="btn bg-utama" ><i class="flaticon-add"></i> Tambah</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr class="bg-utama" style="color:#FFF;font-size:small">
	  			<th>No</th>
	  			<th>username</th>
	  			<th>password</th>
	  			<th>Nama Lengkap</th>
	  			<th>Level</th>
	  			<th>action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($users->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->username ?></td>
		  				<td><?php echo "******" ?></td>
		  				<td><?php echo $row->nama_lengkap ?></td>
		  				<td><?php echo $row->level ?></td>
		  				<td>
		  				
		  					<a href="<?php echo site_url('users/edit/'.$row->id) ?>" class="btn bg-kedua"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('users/delete/'.$row->id) ?>" class="btn" style="background-color:red;color:#FFF"><i class="flaticon-delete"></i></a>	
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



