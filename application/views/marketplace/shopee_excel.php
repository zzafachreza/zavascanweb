<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=shopee_".date('ymdhis').".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
error_reporting(0);

$fid_member = $_SESSION['id'];

  function tglSql($tgl){
	$tgl = explode("/", $tgl);
	return $tgl[2]."-".$tgl[1]."-".$tgl[0];
}

  $awal = tglSql($_POST['awal']);
	   $akhir = tglSql($_POST['akhir']);


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
	  			<th>Ekspedisi</th>
	  			<th>No. Pesanan</th>
	  		    <th>Nomor Resi</th>
	  		    <th>Nama Penerima</th>
	  		    <th>Nama Produk</th>
	  		    <th>Nama Variasi</th>
	  		    <th>Jumlah</th>
	  			<th>Waktu Scan</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  			$sql = "SELECT * FROM data_shopee JOIN barcode on data_shopee.kolom_5 =  barcode.nama WHERE kolom_5 !='' AND fid_member='$fid_member' AND barcode.tanggal between '$awal' AND '$akhir' ORDER BY barcode.id ASC";
	  				$no=0;
	  				foreach($this->db->query($sql)->result() as $row):
	  				$no++;
	  				
	  				
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->ekspedisi ?></td>
		  				
                        <td><?php echo $row->kolom_1 ?></td>
                        <td><?php echo $row->kolom_5 ?></td>
                        <td><?php echo $row->kolom_42 ?></td>
                        <td><?php echo $row->kolom_13 ?></td>
                        <td><?php echo $row->kolom_15 ?></td>
                        <td><?php echo $row->kolom_18 ?></td>
                       
                        <td><?php echo $row->tanggal ?> <?php echo $row->jam ?></td>
             

		  
	
		  				
		  	
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>