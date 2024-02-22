<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Customer</li>
	  </ol>
</nav>
<div class="container-fluid">

<?php

$jumlah_playstore = $this->db->query("SELECT id FROM member WHERE tipe='PLAYSTORE'")->num_rows();
$jumlah_member = $this->db->query("SELECT id FROM member WHERE tipe!='PLAYSTORE'")->num_rows();
	
?>
	<div class="card">
     <div class="card-header">
         	<a href="<?php echo site_url('customer/add') ?>" class="btn bg-utama "><i class="flaticon-add"></i> Tambah Customer Baru</a>
         	<!--<a href="<?php echo site_url('customer/download') ?>" class="btn bg-success text-white "><i class="flaticon-download"></i> Tambah Customer Baru</a>-->
         	<span class="bdage badge-success" style="padding:2px">Jumlah Playstore : <?php echo $jumlah_playstore ?></span>
         	
         	<span class="bdage badge-warning" style="padding:2px">Jumlah Langganan : <?php echo $jumlah_member ?></span>
     </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Nama Pengguna / Toko</th>
	  			<th>E - Mail Akun</th>
	  			<th>Telepon</th>
	  			<th class="bg bg-success text-white">PERANGKAT</th>
	  			<th>Expired</th>
                <th>Jumlah Device</th>
                <th>Tipe</th>
                <th>Status</th>
	  			<th>action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query("SELECT * FROM member a ORDER BY id DESC")->result() as $row):
	  				$no++;
	  				
	  				$text="Hallo ".$row->nama_lengkap." Terima kasih telah order Zava Scan Silahkan Download Aplikasinya disini : https://zavalabs.com/download/";
	  				
	  				if($row->expired <= date('Y-m-d')){
	  				    $exp ='<span class="badge badge-danger">Expired</span>';
	  				}else{
	  				    $exp ='<span class="badge badge-success">Aktif</span>';
	  				}
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  							<td><?php echo $row->nama_lengkap ?></td>
		  				<td><?php echo $row->email ?></td>
	
	  		
		  				<td><?php echo $row->tlp ?></td>
		  					  	<th class="bg bg-success text-white"><?php echo $row->perangkat ?></th>
		  				<td><?php echo Indonesia3Tgl($row->expired) ?></td>
		  	            <td><?php echo number_format($row->jumlah_device) ?></td>
		  		        <td><?php echo $row->tipe ?></td>
		  		        <td><?php echo $exp ?></td>
		  				<td>
		  					<a href="<?php echo site_url('customer/detail/'.$row->id) ?>" class="btn bg-utama "><i class="flaticon-eye"></i></a>
		  					<a href="<?php echo site_url('customer/edit/'.$row->id) ?>" class="btn bg-kedua"><i class="flaticon-edit"></i></a>	
		  					<a href="<?php echo site_url('customer/delete/'.$row->id) ?>" class="btn btn-danger"><i class="flaticon-delete"></i></a>	
		  						<a href="https://web.whatsapp.com/send?phone=<?php echo $row->tlp ?>&text=<?php echo $text ?>" class="btn btn-success"><i class="flaticon2-phone"></i> Info</a>
		  						
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



