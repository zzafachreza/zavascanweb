<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=member_".date('ymdhis').".xls");//ganti nama sesuai keperluan
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
	  			<th>Nama Pengguna / Toko</th>
	  			<th>E - Mail Akun</th>
	  			<th>Telepon</th>
	  			<th>Expired</th>
	  			<th>Tipe Akun</th>
	  			<th>Last</th>

	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query("SELECT * FROM member ORDER BY id DESC")->result() as $row):
	  				$no++;
	  				
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  							<td><?php echo $row->nama_lengkap ?></td>
		  				<td><?php echo $row->email ?></td>
		  	
		  				<td><?php echo $row->tlp ?></td>
		  				<td><?php echo $row->expired ?></td>
		  				<td><?php echo $row->tipe ?></td>
		  				<td>
		  				    <?php
		  				    error_reporting(0);
		  				    $r = $this->db->query("SELECT tanggal FROM barcode WHERE id_member='".$row->id."' ORDER BY id*1 DESC limit 1")->row_object();
		  				    echo $r->tanggal
		  				
		  				?>
		  				</td>
		  			
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>