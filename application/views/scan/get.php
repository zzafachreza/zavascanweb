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

$id_member = $_POST['id_member'];
$sql="SELECT ekspedisi,nama,tanggal,jam,barcode2.id id FROM barcode2 WHERE id_member='$id_member' ORDER BY barcode2.id DESC limit 5";

?>

	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr class="bg-secondary text-white">
	  			<th>No</th>
	  			<th>Ekspedisi</th>
                <th>barcode2</th>
	  			<th>Tanggal</th>
	  			<td>RIT</td>
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
		  				    <img src="<?php echo $kurir->foto ?>" width="150"/>
		  			
		  				    
		  				</td>
		  				<td><?php echo $row->nama ?></td>
		  				<td><?php echo Indonesia3Tgl($row->tanggal)  ?><br/> <?php echo $row->jam ?></td>
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