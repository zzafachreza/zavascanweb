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
$id_member = $_SESSION['id'];
$sql="SELECT * FROM barcode_$id_member a WHERE status=1 ORDER BY tanggal_packing DESC, jam_packing DESC limit 10";

?>

	<table class="table p-datatable-table ng-star-inserted">
	  		<thead class="bg-light">
	  			<tr>
	  			<th>No</th>
	  			<th>Waybill</th>
	  			<th>Courir</th>
	            <th>Scan at</th>
	            <th>Scanned by</th>
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query($sql)->result() as $row):
	  				$no++;
	  				
	  			
	  				
	  				
		  		?>
		  			<tr>
		  			<td><?php echo $no ?></td>
		  				<td><?php echo $row->nama ?></td>
		  		
		  			      <td><?php echo $row->ekspedisi ?></td>
		
	    	  
	    	                
		  			  <td><?php echo $row->tanggal_packing  ?> <?php echo $row->jam_packing ?></td>
		  			<td><?php echo $row->by_packing ?></td>
		  					
		  				
		  				<td>
		  	


		  					<a onClick="hapusData(<?php echo $row->id ?>,'<?php echo $row->nama ?>','<?php echo $row->ekspedisi ?>')" class="btn btn-danger text-white"><i class="flaticon-delete"></i></a>	

              
		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>