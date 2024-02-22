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
$sql="SELECT ekspedisi,nama,tanggal,jam,barcode.id id FROM barcode WHERE id_member='$id_member' ORDER BY barcode.id DESC limit 5";

?>

	<table style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="1">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>Ekspedisi</th>
                <th>Barcode / Resi</th>
                <th>Detail Pesanan Market Place</th>
	  			<th>Tanggal Scan</th>
	            <th>RIT</th>
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
		  			
		  				

                		  <td>
                		      
                		      <?php
                		      
                		      $resi = $row->nama;
                		      
                		      
                		      if($this->db->query("SELECT * FROM data_shopee WHERE kolom_5='$resi'")->num_rows() > 0){
                		            
                		           $header = $this->db->query("SELECT * FROM data_shopee WHERE kolom_5='$resi' limit 1")->row_object();
                		           
                		          ?>
                		     
                		            <div>
                		                 <table style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="0">
                		                     <tr>
                		                
                    		                 <td  style="font-size:10px"> No. Pesanan </td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_1 ?> <span style="background:#FC5A31;color:white;padding-left:2%;padding-right:2%"> SHOPEE </span></td>
                    		            
                    		             </tr>
                    		             <tr>
                		                
                    		                 <td  style="font-size:10px"> Nama Penerima</td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_42 ?> / <?php echo $header->kolom_43 ?></td>
                    		            
                    		             </tr>
                    		             <tr>
                		                
                    		                 <td  style="font-size:10px"> Alamat Pengiriman</td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_44 ?></td>
                    		            
                    		             </tr>
                    		             
                    		              <tr>
                    		                 <td style="font-size:10px">Opsi Pengiriman</td>
                    		                 <td>:</td>
                    		                 <td style="font-size:10px"><?php echo $header->kolom_6 ?></td>
                    		             </tr>
                    		              <tr>
                    		            
                    		                 <td style="font-size:10px" colspan="3">
                    		                      <table  style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="1">
                    		                                    <tr style="background:#FC5A31;color:white">
                    		                                        <td style="font-size:10px" width="50%">Nama Produk</td>
                    		                                        <td style="font-size:10px">Nama Variasi</td>
                    		                                        <td style="font-size:10px">Jumlah</td>
                    		                                    </tr>
                    		                     <?php
                    		                     
                    		                     foreach($this->db->query("SELECT * FROM data_shopee WHERE kolom_5='$resi'")->result() as $detail){
                    		                     
                    		                     ?>
                    		                     
                    		                       
                    		                  
                    		                               
                    		                                    
                    		                                     <tr>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_13 ?></td>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_15 ?></td>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_18 ?></td>
                    		                                    </tr>
                    		                             
                    		                       
                    		                            
                    		                       
                    		                     
                    		                     <?php
                    		                        
                    		                     }
                    		                     
                    		                     ?>
                    		                    </table>
                    		                 </td>
                    		             </tr>
                    		             
                		                 </table>
                		            </div>
                
                		          
                		          
                		          <?php
                		                
                		      } else if($this->db->query("SELECT * FROM data_lazada WHERE kolom_59='$resi'")->num_rows() > 0){
                		            
                		           $header = $this->db->query("SELECT * FROM data_lazada WHERE kolom_59='$resi' limit 1")->row_object();
                		           
                		          ?>
                		     
                		            <div>
                		                 <table style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="0">
                		                     <tr>
                		                
                    		                 <td  style="font-size:10px"> No. Pesanan </td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_13 ?> <span style="background:#006AFF;color:white;padding-left:2%;padding-right:2%"> LAZADA </span></td>
                    		            
                    		             </tr>
                    		             <tr>
                		                
                    		                 <td  style="font-size:10px"> Nama Penerima</td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_17 ?> / <?php echo $header->kolom_38 ?></td>
                    		            
                    		             </tr>
                    		             <tr>
                		                
                    		                 <td  style="font-size:10px"> Alamat Pengiriman</td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_21?></td>
                    		            
                    		             </tr>
                    		             
                    		              <tr>
                    		                 <td style="font-size:10px">Opsi Pengiriman</td>
                    		                 <td>:</td>
                    		                 <td style="font-size:10px"><?php echo $header->kolom_61 ?></td>
                    		             </tr>
                    		              <tr>
                    		            
                    		                 <td style="font-size:10px" colspan="3">
                    		                      <table  style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="1">
                    		                                    <tr style="background:#006AFF;color:white">
                    		                                        <td style="font-size:10px" width="50%">Nama Produk</td>
                    		                                        <td style="font-size:10px">Nama Variasi</td>
                    		                                        <td style="font-size:10px">Jumlah</td>
                    		                                    </tr>
                    		                     <?php
                    		                     
                    		                     foreach($this->db->query("SELECT * FROM data_lazada WHERE kolom_59='$resi'")->result() as $detail){
                    		                     
                    		                     ?>
                    		                     
                    		                       
                    		                  
                    		                               
                    		                                    
                    		                                     <tr>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_52 ?></td>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_53 ?></td>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_18 ?></td>
                    		                                    </tr>
                    		                             
                    		                       
                    		                            
                    		                       
                    		                     
                    		                     <?php
                    		                        
                    		                     }
                    		                     
                    		                     ?>
                    		                    </table>
                    		                 </td>
                    		             </tr>
                    		             
                		                 </table>
                		            </div>
                
                		          
                		          
                		          <?php
                		                
                		      }else if($this->db->query("SELECT * FROM data_tokopedia WHERE kolom_35='$resi'")->num_rows() > 0){
                		            
                		           $header = $this->db->query("SELECT * FROM data_tokopedia WHERE kolom_35='$resi' limit 1")->row_object();
                		           
                		          ?>
                		     
                		            <div>
                		                 <table style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="0">
                		                     <tr>
                		                
                    		                 <td  style="font-size:10px"> No. Pesanan </td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_2 ?> <span style="background:#42B549;color:white;padding-left:2%;padding-right:2%"> TOKOPEDIA </span></td>
                    		            
                    		             </tr>
                    		             <tr>
                		                
                    		                 <td  style="font-size:10px"> Nama Penerima</td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_28 ?> / <?php echo $header->kolom_27 ?></td>
                    		            
                    		             </tr>
                    		             <tr>
                		                
                    		                 <td  style="font-size:10px"> Alamat Pengiriman</td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_30?></td>
                    		            
                    		             </tr>
                    		             
                    		              <tr>
                    		                 <td style="font-size:10px">Opsi Pengiriman</td>
                    		                 <td>:</td>
                    		                 <td style="font-size:10px"><?php echo $header->kolom_33 ?></td>
                    		             </tr>
                    		              <tr>
                    		            
                    		                 <td style="font-size:10px" colspan="3">
                    		                      <table  style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="1">
                    		                                    <tr style="background:#42B549;color:white">
                    		                                        <td style="font-size:10px" width="50%">Nama Produk</td>
                    		                                        <td style="font-size:10px">Nama Variasi</td>
                    		                                        <td style="font-size:10px">Jumlah</td>
                    		                                    </tr>
                    		                     <?php
                    		                     
                    		                     foreach($this->db->query("SELECT * FROM data_tokopedia WHERE kolom_35='$resi'")->result() as $detail){
                    		                     
                    		                     ?>
                    		                     
                    		                       
                    		                  
                    		                               
                    		                                    
                    		                                     <tr>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_9 ?></td>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_11 ?></td>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_14 ?></td>
                    		                                    </tr>
                    		                             
                    		                       
                    		                            
                    		                       
                    		                     
                    		                     <?php
                    		                        
                    		                     }
                    		                     
                    		                     ?>
                    		                    </table>
                    		                 </td>
                    		             </tr>
                    		             
                		                 </table>
                		            </div>
                
                		          
                		          
                		          <?php
                		                
                		      }else if($this->db->query("SELECT * FROM data_tiktok WHERE kolom_34='$resi'")->num_rows() > 0){
                		            
                		           $header = $this->db->query("SELECT * FROM data_tiktok WHERE kolom_34='$resi' limit 1")->row_object();
                		           
                		          ?>
                		     
                		            <div>
                		                 <table style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="0">
                		                     <tr>
                		                
                    		                 <td  style="font-size:10px"> No. Pesanan </td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_1 ?> <span style="background:#ED4CAF;color:white;padding-left:2%;padding-right:2%"> TIKTOK SHOP </span></td>
                    		            
                    		             </tr>
                    		             <tr>
                		                
                    		                 <td  style="font-size:10px"> Nama Penerima</td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_39 ?> / <?php echo $header->kolom_40 ?></td>
                    		            
                    		             </tr>
                    		             <tr>
                		                
                    		                 <td  style="font-size:10px"> Alamat Pengiriman</td>
                    		                 <td>:</td>
                    		                 <td  style="font-size:10px"><?php echo $header->kolom_47 ?></td>
                    		            
                    		             </tr>
                    		             
                    		              <tr>
                    		                 <td style="font-size:10px">Opsi Pengiriman</td>
                    		                 <td>:</td>
                    		                 <td style="font-size:10px"><?php echo $header->kolom_36 ?> <?php echo $header->kolom_49 ?></td>
                    		             </tr>
                    		              <tr>
                    		            
                    		                 <td style="font-size:10px" colspan="3">
                    		                      <table  style="border-collapse: collapse;" cellspacing="0" cellpadding="5" width="100%" border="1">
                    		                                    <tr style="background:#ED4CAF;color:white">
                    		                                        <td style="font-size:10px" width="50%">Nama Produk</td>
                    		                                        <td style="font-size:10px">Nama Variasi</td>
                    		                                        <td style="font-size:10px">Jumlah</td>
                    		                                    </tr>
                    		                     <?php
                    		                     
                    		                     foreach($this->db->query("SELECT * FROM data_tiktok WHERE kolom_34='$resi'")->result() as $detail){
                    		                     
                    		                     ?>
                    		                     
                    		                       
                    		                  
                    		                               
                    		                                    
                    		                                     <tr>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_8 ?></td>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_9 ?></td>
                    		                                        <td style="font-size:10px"><?php echo $detail->kolom_10 ?></td>
                    		                                    </tr>
                    		                             
                    		                       
                    		                            
                    		                       
                    		                     
                    		                     <?php
                    		                        
                    		                     }
                    		                     
                    		                     ?>
                    		                    </table>
                    		                 </td>
                    		             </tr>
                    		             
                		                 </table>
                		            </div>
                
                		          
                		          
                		          <?php
                		                
                		      }else{
                		            if($akun->tipe =='BULANAN'){
                		                 echo 'resi belum di import dari marketplace';
                		              
                		            }else{
                		                echo 'Akun Anda <strong>belum integrasi marketplace</strong> silahkan hubungi admin';
                		            }
                		      }
                		      ?>
    
                		      
                		      
                		  </td>
	    	                <td><?php echo Indonesia3Tgl($row->tanggal)  ?> <?php echo $row->jam ?></td>
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
		  	

		  		

		  					<a onClick="hapusData(<?php echo $row->id ?>,'<?php echo $row->nama ?>','<?php echo $row->ekspedisi ?>')" class="btn btn-danger text-white"><i class="flaticon-delete"></i></a>	


		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>