<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_".$modul."_".date('ymd').".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");

 function Indonesia3Tgl($tanggal){
  $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", 
           "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
           
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
  $tanggal ="$tgl ".$namaBln[$bln]." $thn";
  return $tanggal;
}

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
                 <?php
    	  			

    	  			
    	  			foreach($this->db->query("SHOW COLUMNS from `data_$modul` WHERE FIELD !='id_$modul'")->result() as $col):
    	  			?>
    	  			<th><?php echo ucfirst(str_replace("_"," ",$col->Field)) ?></th>
    	  			
    	  			<?php
    	  			
    	  			endforeach;
    	  			?>
    	  	    
                 </tr>
                </thead>
                <tbody>
                  <?php
	  				$no=0;
	  				foreach($this->db->query("SELECT * FROM data_$modul")->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				
		  				

		  				
		  					<?php
    	  			

    	  			
                	  			foreach($this->db->query("SHOW COLUMNS from `data_$modul` WHERE FIELD !='id_$modul'")->result() as $col):
                	  			    
                	  			   
                	  			    
                	  			    if($col->Field=="foto_customer"){
                	  			         $show = '<img src="'.site_url().$row->{$col->Field}.'" width="100" />';
                	  			    }else{
                	  			         $show = $row->{$col->Field};
                	  			    }
                	  			?>
                	  			<td><?php echo $show ?></td>
                	  			
                	  			<?php
                	  			
                	  			endforeach;
                	  			?>
                	  			
    	  			
		  			
		  			
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
                    
                </tbody>
            </table>