<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=posted_".date('ymdhis').".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
error_reporting(0);


?>
<style type="text/css">
  
.num {
  mso-number-format:General;
}
.text{
  mso-number-format:"\@";/*force text*/
}
</style>

 <table style="border-collapse: collapse;" cellspacing="0" width="100%" border="1">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Nama Toko Di Marketplace</th>
	  		    <th>Nama Penerima</th>
	  		    <th>No. Pesanan/Invoice</th>
	  		    <th>Nama Barang</th>
	  		    <th>Jumlah</th>
	  		    <th>Nomor Resi</th>
	  			<th>Barcode Sudah Scan</th>
	  			<th>Ekspedisi</th>
	  			<th>Tanggal</th>
    	  		<th>Jam</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  			$sql = $_POST['sql'];
	  				$no=0;
	  				foreach($this->db->query($sql)->result() as $row):
	  				$no++;
	  				
	  				
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
                        <td><?php echo $row->marketplace ?></td>
                        <td><?php echo $row->penerima ?></td>
                         <td><?php echo $row->nomor_pesanan ?></td>
                          <td><?php echo $row->nama_barang ?></td>
                           <td><?php echo $row->jumlah ?></td>
                        <td><?php echo $row->nomor_resi ?></td>
                        <td><?php echo $row->nomor_barcode ?></td>
                        <td><?php echo $row->ekspedisi ?></td>
                        <td><?php echo $row->tanggal ?></td>
                        <td><?php echo $row->jam ?></td>

		  
	
		  				
		  	
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>