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
	    <li class="breadcrumb-item active" aria-current="page">pemakaian</li>
	  </ol>
</nav>
<div class="container-fluid">

<?php


	
?>
	<div class="card" >
	  <div class="card-header" >
	  	<a href="<?php echo site_url() ?>" class="AppButton-secondary print"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	  	<a href="#" onClick="window.print()" class="btn btn-success print"> <i class="flaticon2-print"></i> Print</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Tanggal</th>
	  			<th>Barang</th>
	  			<th>Harga</th>
	  			<th>Qty</th>
	  			<th>Uom</th>
	  			<th>Total</th>
	  			<th class="print">action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				$grand=0;
	  				foreach($pemakaian->result() as $row):
	  				$no++;
	  				$grand +=$row->total;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		 
		  				<td><?php echo Indonesia3Tgl($row->tanggal) ?></td>
		  				<td><?php echo $row->nama_barang ?></td>
		  				<td><?php echo $row->harga ?></td>
		  				<td><?php echo $row->qty ?></td>
		  			<td><?php echo $row->uom ?></td>
		  				<td><?php echo number_format($row->total) ?></td>
		  		
		  				<td class="print">
		  				
		  					<a href="<?php echo site_url('pemakaian/delete/'.$row->id) ?>" class="AppButton-dark"><i class="flaticon-delete"></i></a>
		  					
		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
		  		<th colspan="6"></th>
		  		<th> <?php echo number_format($grand) ?> </th>
		  		<th></th>
	  		</tbody>
	  	</table>

	  </div>
	</div>


</div>



