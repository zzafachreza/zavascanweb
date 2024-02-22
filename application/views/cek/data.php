<div class="container-fluid">
   
 <div class="bg-white row" style="margin-top:2%;margin-bottom:2%">
  <style>
      #imp{
           border:0px solid black;
           height:50px;
           width:100%;
           text-align:center;
           padding-top:2%;
           background:#28a745;
           color:white;
           font-size:x-large;

      }
  </style>
  <div class="col col-sm-2">

         <form id="dataForm" action="<?php echo site_url($modul.'/import') ?>" method="POST" enctype="multipart/form-data">
             	      <input name="fid_member" value="<?php echo $_SESSION['id'] ?>" type="hidden" />
           <label  id="imp">
               <i class="flaticon2-document"></i> IMPORT DARI EXCEL
                 <input style="background-color:#04A15A;color:white;padding:10px;display:none" id="csv" placeholder="IMPORT DARI EXCEL" type="file" name="csv"  />
           </label>
         </form>
     </div>
      <div class="col col-sm-2">
         <a href="<?php echo site_url($modul.'/add') ?>" style=" height:50px;padding-top:2%;font-size:x-large" class="btn bg-utama col col-sm-12"><i class="flaticon-add"></i> TAMBAH MANUAL</a>
        
     </div>
   
    
      <div class="col col-sm-6"></div>
      <div class="col col-sm-1">
         <a onClick="return confirm('Apakah Anda yakin akan posting ini ?')" href="<?php echo site_url($modul.'/posting') ?>" class="btn bg-warning text-black col col-sm-12"><i class="flaticon2-accept"></i> POSTING</a>
     </div>
       <div class="col col-sm-1">
          <a onClick="return confirm('Apakah Anda yakin akan clear ini ?')" href="<?php echo site_url($modul.'/clear') ?>" class="btn bg-danger text-white col col-sm-12"><i class="flaticon-delete"></i> CLEAR</a>
     </div>
     
 </div>
 
 


	  	<table class="table table-bordered table-striped table-hover tabza2 nowrap display"  style="width:100%">
	  		<thead class="bg-utama" style="color:white">
	  			<tr>
    	  			<th>No</th>
    	  		    <th>Nama Toko Di Marketplace</th>
    	  		    <th>Nama Penerima</th>
    	  		    <th>Nomor Resi</th>
    	  			<th>No. Pesanan / Invoice</th>
    	  			<th>Nama Barang</th>
    	  			<th>Jumlah</th>
    	  			<th>Barcode Sudah Scan</th>
    	  			
    	  				<th>Status</th>
    	  					
    	  			<th>Ekspedisi</th>
    	  			<th>Tanggal</th>
    	  			<th>Jam</th>
    	  		
    	  			<th>Action</th>
    	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query("SELECT * FROM data_$modul WHERE fid_member='".$_SESSION['id']."'")->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				
		  				

		  				
		  					<?php
    	  			

    	  			
                	  			foreach($this->db->query("SHOW COLUMNS from `data_$modul` WHERE FIELD NOT IN('id_$modul','fid_member')")->result() as $col):
                	  			    
                	  			   
                	  			 
                	  			         $show = $row->{$col->Field};
                	  			    
                	  			?>
                	  			<td><?php echo $show ?></td>
                	  			
                	  			<?php
                	  			
                	  			endforeach;
                	  			?>
                	  			
                	  			<td>
                	  			    <?php 
                	  			        
                	  			        $barcode=str_replace("'","\'",$row->barcode_oke);
                	  			        $jml = $this->db->query("SELECT * FROM barcode WHERE nama='$barcode' limit 1")->num_rows();
                	  			        
                	  			        if($jml > 0){
                	  			            $cek = $this->db->query("SELECT * FROM barcode WHERE nama='$barcode' limit 1")->row_object();
                	  			            
                	  			          echo $cek->nama;
                	  			           $tanggal= Indonesia3Tgl($cek->tanggal);
                                            $jam=$cek->jam;
                                            $ekspedisi = $cek->ekspedisi;
                                            
                	  			          $icon = '<i class="flaticon2-correct" style="font-size:x-large;color:green"></i>';
                	  			        }else{
                	  			            echo '-';
                	  			                $tanggal= '-';
                	  			                $ekspedisi='-';
                                            $jam='-';
                	  			            $icon = '<i class="flaticon2-cross" style="font-size:large;color:red"></i>';
                	  			        }
                	  			        
                	  			    
                	  			    ?>
                	  			</td>
                	  			<td>
                	  			    <?php echo $icon ?>
                	  			</td>
    	  			
                	  			<td><?php echo $ekspedisi ?></td>
                	  			  			<td><?php echo $tanggal ?></td>
                	  			<td><?php echo $jam ?></td>
                	  			
		  			
		  				<td>
		  				
		  					<a href="<?php echo site_url($modul.'/edit/'.$row->{'id_' . $modul}) ?>" class="btn bg-kedua"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url($modul.'/delete/'.$row->{'id_' . $modul}) ?>" class="btn bg-ketiga"><i class="flaticon-delete"></i></a>	


		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>



</div>

<script type="text/javascript">
$("#csv").change(function(){
   
   $("#dataForm").submit();
    
});
	function copyToClipboard(element) {
	  var $temp = $("<input>");
	  $("body").append($temp);
	  $temp.val($(element).text()).select();
	  document.execCommand("copy");
	  $temp.remove();
	}


	$(".alink").click(function(e){
		e.preventDefault();
		var link = $(this).attr('data-id');
		$("#p1").text(link);
		copyToClipboard("#p1");
		$(this).removeClass('btn-success');
		$(this).addClass('btn-secondary');

		$(this).text('Copied');
	})
	
	$(document).ready(function() {
    $('.tabza2').DataTable( {
        "scrollX": true
    } );
} );
</script>



