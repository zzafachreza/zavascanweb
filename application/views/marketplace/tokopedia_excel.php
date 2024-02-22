<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=tokopedia_".date('ymdhis').".xls");//ganti nama sesuai keperluan
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
	  			$sql = "SELECT * FROM data_tokopedia JOIN barcode on data_tokopedia.kolom_35 =  barcode.nama WHERE kolom_35 !='' AND fid_member='$fid_member' AND barcode.tanggal between '$awal' AND '$akhir' ORDER BY barcode.id ASC";
	  				$no=0;
	  				foreach($this->db->query($sql)->result() as $row):
	  				$no++;
	  				
	  				
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->ekspedisi ?></td>
		  				
                        <td><?php echo $row->kolom_2 ?></td>
                        <td><?php echo $row->kolom_35 ?></td>
                        <td><?php echo $row->kolom_28 ?> / <?php echo $row->kolom_27 ?></td>
                        <td><?php echo $row->kolom_9 ?></td>
                        <td><?php echo $row->kolom_11 ?></td>
                        <td><?php echo $row->kolom_14 ?></td>
                       
                        <td><?php echo $row->tanggal ?> <?php echo $row->jam ?></td>
             

		  
	
		  				
		  	
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>