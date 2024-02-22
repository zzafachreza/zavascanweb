<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('pica') ?>">pica</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('pica') ?>" class="btn" style="background-color:#F98D1B;color:#FFF"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	
		<a href="<?php echo site_url('pica/add2/') ?><?php echo $pica['id'] ?>" class="btn" style="background-color:#6B63FF;color:#FFF" ><i class="flaticon2-add"></i> Tambah Detail Kegiatan</a>
		
		<a href="<?php echo site_url('pica/report/') ?><?php echo $pica['id'] ?>" class="btn btn-success"><i class="flaticon2-line-chart"></i> Activity Report</a>

		  </div>
	  	<div class="card-body">

	  		 	  <table class="table table-hover table-bordered ">
	  		        <tr><th>kegiatan</th><td><?php echo $pica['kegiatan'] ?></td></tr>
                    <tr><th>tempat</th><td><?php echo $pica['tempat'] ?></td></tr>
                    <tr><th>tanggal</th><td><?php echo Indonesia3Tgl($pica['tanggal']) ?></td></tr>
	  		    </table>
	  	        
	  	        <table class="table table-bordered table-hover tabza">
	  	            	<thead>
	  	            <tr style="background-color:#6B63FF;color:#FFF;font-size:small">
	  	                <th>No</th>
	  	                <th>Kegiatan utama</th>
                        <th>Kegiatan tambahan</th>
                        <th>Pic</th>
                        <th>Status</th>
                        <th>Problem Identification</th>
                        <th>Corrective Action</th>
                        <th>Update</th>
                        <th>Evidence</th>
                        <th>Action</th>
	  	                
	  	            </tr>
	  	            </thead>
	  	            <tbody>
	  	            <?php
	  	            
	  	                $id_pica = $pica['id']; 
	  	                $no=1;
	  	                foreach($this->db->query("SELECT * FROM data_picadetail WHERE id_pica='$id_pica'")->result() as $row){
	  	            ?>
	  	            <tr>
	  	                <td><?php echo $no ?></td>
	  	                <td><?php echo $row->kegiatan_utama ?></td>
                        <td><?php echo $row->kegiatan_tambahan ?></td>
                        <td><?php echo $row->pic ?></td>
                        <td><?php echo $row->status ?></td>
                        <td><?php echo $row->masalah ?></td>
                        <td><?php echo $row->perbaikan ?></td>
                        <td><?php echo $row->upd=="0000-00-00"?"": $row->upd ?></td>
                        <td>
                            <a class="btn" style="background-color:#F98D1B;color:#FFF" href="<?php echo site_url() ?><?php echo $row->foto ?>" > <i class="flaticon-attachment"></i> Lampiran</a>
                        </td>
                        <td>
                             <a href="<?php echo site_url('pica/edit2/'.$row->id.'/'.$row->id_pica) ?>" class="btn" class="btn" style="background-color:#6B63FF;color:#FFF"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('pica/delete2/'.$row->id.'/'.$row->id_pica.'/'.$row->foto) ?>" class="btn" class="btn" style="background-color:red;color:#FFF"><i class="flaticon-delete"></i></a>	
                        </td>
	  	            </tr>
	  	            
	  	            
	  	            <?php $no++;} ?>
	  	            </tbody>
	  	        </table>


	
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



