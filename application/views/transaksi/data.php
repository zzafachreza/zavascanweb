
<style>
    @media print {
       .print {
           display:none;
       }
 }
</style>
<nav aria-label="breadcrumb" class="print">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
	  </ol>
</nav>
<div class="container-fluid">

<?php


	
?>
	<div class="card">
	  <div class="card-header print" >
	  	<a href="<?php echo site_url() ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	  	<a href="#" onClick="window.print()" class="btn btn-success"> <i class="flaticon2-print"></i> Print</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Kode Transaksi</th>
	  			<th>Tanggal</th>
	  			<th>Customer</th>
	  			<th>Email Customer</th>
	  			<th>Telepon Customer</th>
	  			<th>Total</th>
	  			<th>Point</th>
	  			<th>Status</th>
	  			<th class="print">action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				$grand =0;
	  				foreach($transaksi->result() as $row):
	  				$no++;
	  				
	  				$grand += $row->total;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->kode ?></td>
		  				<td><?php echo Indonesia3Tgl($row->tanggal) ?></td>
		  				<td><?php echo $row->nama_pemesan ?></td>
		  				<td><?php echo $row->alamat_pemesan ?></td>
		  				<td><?php echo $row->telepon_pemesan ?></td>
		  			
		  				<td><?php echo number_format($row->total) ?></td>
		  				<td><?php echo number_format($row->point) ?></td>
		  				<td><?php echo $row->status ?></td>
		  				<td class="print">
		  					<a href="<?php echo site_url('transaksi/detail/'.$row->kode) ?>" class="AppButton-primary"><i class="flaticon-eye"></i></a>
		  					<a href="<?php echo site_url('transaksi/delete/'.$row->kode.'/'.$row->token.'/'.$row->tanggal.'/'.$row->id_member) ?>" class="AppButton-dark"><i class="flaticon-delete"></i></a>
		  					<?php if($row->status=="SEDANG DIPROSES"){
		  					    
		  					    ?>
		  					    <a href="<?php echo site_url('transaksi/done/'.$row->kode.'/'.$row->token.'/'.$row->tanggal.'/'.$row->id_member.'/'.$row->point) ?>" class="btn btn-success"><i class="flaticon2-check-mark"></i> Selesai</a>
		  					    
		  					    <?php
		  					}
		  					
		  					?>
		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
		  		<tr>
		  		    <th colspan="6"></th>
		  		    <th><?php echo number_format($grand)  ?></th>
		  		    <th colspan="2"></th>
		  		</tr>
	  		</tbody>
	  	</table>

	  </div>
	</div>


</div>



