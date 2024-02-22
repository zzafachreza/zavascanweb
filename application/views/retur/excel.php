<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".date('ymdhis').".xls");//ganti nama sesuai keperluan
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
	  			<th>Ekspedisi</th>
	  	
                <th>Barcode</th>
	  			<th>Tanggal</th>
	  			<th>jam</th>
	  			<th>Notes</th>
	  			<th>RIT</th>
	  			<th>admin / penangung jawab / customer</th>
	  					<th>Status</th>

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
		  		
		  				<td><?php echo $row->ekspedisi ?></td>
		  				<td class="text"><?php echo $row->nama ?></td>
		  				<td><?php echo $row->tanggal  ?></td>
		  				<td><?php echo $row->jam ?></td>
		  				<td><?php echo $row->nama_lengkap ?></td>
		  					<td>
		  				
		  				    
		  				    <?php 
		  				    
		  				        $jam = (int)substr($row->jam,0,2); 
		  				        
		  				        if($jam >=13 && $jam <= 16){
		  				            echo "RIT 1";
		  				        }else if($jam >=18 && $jam <= 21){
		  				            echo "RIT 2";
		  				        }else if($jam >=22 && $jam <= 24){
		  				            echo "RIT 3";
		  				        }else{
		  				            echo "-";
		  				        }
		  				    
		  				    
		  				    ?>
		  				
		  				</td>
		  				<td><?php echo $row->customer ?></td>
		  					<td><?php echo $row->status_barcode=="OUT"?"SUDAH SERAH TERIMA":"" ?></td>

		  
	
		  				
		  	
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>