<?php

  function Indonesia3Tgl($tanggal){
  $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
           "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
           
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
  $tanggal ="$tgl ".$namaBln[$bln]." $thn";
  return $tanggal;
}
$akun = $this->db->query("SELECT * FROM member WHERE email='".$_SESSION['email']."'")->row_object();
$id_member = $_POST['id_member'];
$sql="SELECT customer,ekspedisi,nama,tanggal,jam,tanggal_terima,jam_terima,barcode.id id FROM barcode WHERE status_barcode='OUT' AND id_member='$id_member' ORDER BY barcode.id DESC limit 10";

?>

	<table style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="1">
	  		<thead>
	  			<tr class="bg-success text-white">
	  			<th>No</th>
	  			<th>Ekspedisi</th>
                <th>Barcode / Resi</th>
	  			<th>Tanggal Scan</th>
	  			<th>admin / penangung jawab / customer</th>
	  			<th>Tanggal Terima</th>
	            <th>Status</th>
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query($sql)->result() as $row):
	  				$no++;
	  				
	  				$kurir = $this->db->query("SELECT foto FROM data_kurir WHERE nama_kurir='".$row->ekspedisi."'")->row_object();
	  				
	  				
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td>
		  				    <img src="<?php echo $kurir->foto ?>" width="80"/>
		  			
		  				    
		  				</td>
		  				<td><?php echo $row->nama ?></td>
		  			
		  				

                		  
	    	                <td><?php echo Indonesia3Tgl($row->tanggal)  ?> <?php echo $row->jam ?></td>
	    	                <td><?php echo $row->customer ?></td>
		  			  <td><?php echo Indonesia3Tgl($row->tanggal_terima)  ?> <?php echo $row->jam_terima ?></td>
		  					<td>Sudah Serah Terima</td>
		  					
		  				
		  				<td>
		  	

		  		 <?php if( $_SESSION['email'] !='osmanfootwear@gmail.com'){ ?>

		  					<a onClick="hapusData(<?php echo $row->id ?>,'<?php echo $row->nama ?>','<?php echo $row->ekspedisi ?>')" class="btn btn-danger text-white"><i class="flaticon-delete"></i></a>	

 <?php } ?>
		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>