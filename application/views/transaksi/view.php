<style>
    @media print{
        .hilang{
            display:none;
        }
    }
</style>

<?php


$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->result();


?>
<nav aria-label="breadcrumb">
	  <ol class="breadcrumb hilang">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('transaksi') ?>">transaksi</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('transaksi') ?>" class="hilang AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	<a href="#" onClick="window.print()" class="btn btn-success hilang"><i class="flaticon2-print"></i> Print Nota</a>

		  </div>
	  	<div class="card-body">
	  	    <img src="<?php echo site_url() ?><?php echo $comp[0]->foto ?>" width="100" style="float:right" />
	  	    <table class="table table-bordered">
	  	        <tr>
	  	            <th>
	  	                No Transaksi
	  	            </th>
	  	            <td><?php echo $transaksi['kode'] ?></td>
	  	            
	  	        </tr>
	  	        <tr>
	  	            <th>
	  	                Tanggal
	  	            </th>
	  	            <td><?php echo Indonesia3Tgl($transaksi['tanggal']) ?></td>
	  	        </tr>
	  
	  	        <tr>
	  	            <th>
	  	                Nama Member/Customer
	  	            </th>
	  	            <td><?php echo $transaksi['nama_pemesan'] ?></td>
	  	        </tr>
	  	        <tr>
	  	            <th>
	  	                Telepon Member/Customer
	  	            </th>
	  	            <td><?php echo $transaksi['telepon_pemesan']?></td>
	  	        </tr>
	  	     
	  	         <th>
	  	                Alamat Member/Customer
	  	            </th>
	  	            <td><?php echo $transaksi['alamat_pemesan']?></td>
	  	        </tr>
	  	     
	  	        
	  	    </table>
	  	    <hr/>
	  	    <table class="table table-bordered table-striped">
	  	        <tr>
	  	            <th>No</th>
	  	            <th>Nama Layanan</th>
	  	            <th>Harga</th>
	  	            <th>Qty</th>
	  	            <th>UOM</th>
	  	            <th>Subtotal</th>
	  	        </tr>
	  	        
	  	        	<?php
	  				$no=0;
	  				foreach($transaksiDetail->result() as $r){
	  				$no++;
		  		?>
	  	        
	  	        <tr>
	  	            <td><?php echo $no ?></td>
	  	            <td><?php echo $r->nama_barang ?></td>
	  	             <td><?php echo number_format($r->harga) ?></td>
	  	             <td><?php echo $r->qty ?></td>
	  	             <td><?php echo $r->uom ?></td>
	  	             <td><?php echo number_format($r->subtotal) ?></td>
	  	        </tr>
	  	        
	  	        
	  	        <?php } ?>
	  	        
	  	        <tr>
	  	            <th colspan="5">
	  	                <center>
	  	                    Total Bayar
	  	                </center>
	  	            </th>
	  	            <th>
	  	                <h3><?php echo number_format($transaksi['total']) ?></h3>
	  	            </th>
	  	        </tr>
	  	        <tr>
	  	            <th colspan="5">
	  	                <center>
	  	                    Total Point
	  	                </center>
	  	            </th>
	  	            <th>
	  	                <h3><?php echo number_format($transaksi['point']) ?></h3>
	  	            </th>
	  	        </tr>
	  	         
	  	        
	  	    </table>
		
			  
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



