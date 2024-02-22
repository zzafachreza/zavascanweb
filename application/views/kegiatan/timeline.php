<div class="container-fluid">
    <div class="card">
    	    <div class="card-header">
        	  	<a href="<?php echo site_url() ?>" class="btn" style="background-color:#F98D1B;color:#FFF"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
        	    <!--<a href="<?php echo site_url('kegiatan/add') ?>" class="btn" style="background-color:#6B63FF;color:#FFF"><i class="flaticon-add"></i> Tambah</a>-->
        	    <!--<a href="<?php echo site_url('kegiatan/timeline') ?>" class="btn btn-success" ><i class="flaticon-notes"></i> TIMELINE PROGRESS</a>-->
        	    <center>
        	        <span><h2>TIMELINE DAN PROGRESS</h2></span>
        	    </center>
        	  </div>
    	   	<div class="card-body">
    	   	    	<table class="table table-bordered table-striped table-hover">
            	  		<thead>
            	  			<tr style="background-color:#6B63FF;color:#FFF">
            	  			    
            	  			<th>No</th>
            	  			
            	  			
            	  			<th>Nama Kegiatan</th>
            	  			<th>Anggaran</th>
            	  			
            	  			<?php
            	  			    
            	  			    for($i=1;$i<=12;$i++){
            	  			        
            	  			        
            	  			
            	  			?>
                            <th>
                                <?php 
                                    echo $i;
                                ?>
                            </th>
                            	  			
            	  		<?php
            	  			    }
            	  		?>
            	  		<th>Progress</th>
            	  		</tr>
            	  		</thead>
            	  		<tbody>
            	  			<?php
            	  			
            	  			$kegiatan ="";
            	  			$totalPersenKegiatan="";
            	  				$no=0;
            	  				foreach($this->db->query("SELECT *FROM data_kegiatan_pica")->result() as $row):
            	  				$no++;
            	  				
            	  				$kegiatan .="'".$row->nama."',"
            	  				
            		  		?>
            		  			<tr>
            		  				<td><?php echo $no ?></td>
            		  				<td><?php echo $nama_kegiatan = $row->nama ?></td>
            		  				<td><?php echo number_format($row->anggaran) ?></td>
            		  					<?php
            	  			    
            	  			    $progress=0;
            	  			    $totalPersen=0;
            	  			    for($i=1;$i<=12;$i++){
            	  			        
            	  			        
            	  			        
            	  			 $sqlAll = "SELECT COUNT(id) jml FROM data_picadetail WHERE  id_pica IN (SELECT id FROM data_pica WHERE kegiatan='$nama_kegiatan' AND MONTH(tanggal)='$i')";
                            $sqlDone = "SELECT COUNT(id) jml FROM data_picadetail WHERE  status='DONE' AND id_pica IN (SELECT id FROM data_pica WHERE kegiatan='$nama_kegiatan' AND MONTH(tanggal)='$i')";
                            $sqlYet = "SELECT COUNT(id) jml FROM data_picadetail WHERE  status='OUTSTANDING' AND  id_pica IN (SELECT id FROM data_pica WHERE kegiatan='$nama_kegiatan' AND MONTH(tanggal)='$i')";
                            
                            $All = $this->db->query($sqlAll)->result();
                             $Done = $this->db->query($sqlDone)->result();
                              $Yet = $this->db->query($sqlYet)->result();
                              
                            //  $totalPencapaian= ((100/$All[0]->jml)*$Done[0]->jml)*(100/100);
                                
                                if($All[0]->jml > 0){
                                     $persen = ((100/$All[0]->jml)*$Done[0]->jml)*(100/100);
                                    $warna='style="background-color:#F98D1B"';
                                    $progress += 1;
                                    $totalPersen += $persen;
                                      $persenText = $persen."%";
                                }else{
                                     $persen = "";
                                     $warna="";
                                       $persenText="";
                                }
                            
            	  			
            	  			?>
                            <td <?php echo $warna; ?> width="4%"><?php 
                            
                            echo $persenText;
                           
                             ?></td>
                            	  			
            	  		<?php
            	  			    }
            	  		?>
            	  		
            	  		<td><?php echo  number_format($totalPersen/$progress,0)."%";
            	  		        $dataProgress= round($totalPersen/$progress,0);
            	  	        $totalPersenKegiatan .= $dataProgress.",";
            	  		
            	  		?></td>
            		  				
            		  		
            	
            		  				
            		  				
            		  			
            		  			</tr>
            
            		  		<?php 
            		  				endforeach;
            		  		?>
            	  		</tbody>
            	  	</table>
            	  	
            	  	<hr/>
                    <div style="padding:10%">
                        <canvas id="myChart"></canvas>   
                    </div> 
        	   	 </div>
    </div>
</div>


<script>
    var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
                
                <?php echo $kegiatan ?>

                
            ],
        datasets: [{
            label: 'Percentage Progress Kegiatan',
            data: [
                    <?php echo $totalPersenKegiatan; ?>
   
                ],
            backgroundColor: [
                '#1abc9c',
                '#9b59b6',
'#8e44ad',
'#16a085',
'#f1c40f',
'#f39c12',
'#2ecc71',
'#27ae60',
'#e67e22',
'#d35400',
'#3498db',
'#2980b9',
'#e74c3c',
'#c0392b',

'#ecf0f1',
'#bdc3c7',
'#34495e',
'#2c3e50',
'#95a5a6',
'#ff5700',
'#f57d00',
'#1ab7ea',
'#410093',
'#cd201f',
'#000642',
'#df2029',
'#25D366'
                
     
            ],
            
        }]
    },
    options: {
       legend: {
            fontColor: "white"
        },
        scales: { 
            yAxes: [{
                ticks: {
                    fontColor: "white",
                    stepSize: 1,
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>