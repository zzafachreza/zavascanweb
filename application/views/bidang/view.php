<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('bidang') ?>">bidang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('bidang') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	
		<a href="<?php echo site_url('bidang/add2/') ?><?php echo $bidang['id'] ?>" class="btn bg-utama" ><i class="flaticon2-add"></i> Tambah Kegiatan Baru</a>
		
		<a href="<?php echo site_url('bidang/curva/') ?><?php echo $bidang['id'] ?>" class="btn bg-secondary" style="border-radius:0px;color:#FFF" ><i class="flaticon2-chart"></i> Curva S <?php echo $bidang['nama'] ?></a>
		
	
		  </div>
	  	<div class="card-body">

	  		 	  <table class="table table-hover table-bordered ">
	  		        <tr><th width="40%">Nama Bidang</th><td><?php echo $bidang['nama'] ?></td></tr>
                    <tr><th class="bg-utama" >Anggaran</th><td><h3 class="text-utama"><?php echo number_format($bidang['anggaran']) ?></h3></td></tr>
                     <tr><th class="bg-kedua" >Realisasi</th><td><h3 class="text-kedua"><?php echo number_format($bidang['perubahan']) ?></h3></td></tr>
	  		    </table>
	  		    
	  		 
	  		        <table class="table table-bordered table-hover tabza">
	  	            	<thead>
	  	            <tr class="bg-utama" style="font-size:small">
	  	                <th>No</th>
	  	                <th>Nama Kegiatan/BKU</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Total Penerimaan</th>
                        <th>Total Pengeluaran</th>
                        <th>Action</th>
	  	                
	  	            </tr>
	  	            </thead>
	  	            <tbody>
	  	            <?php
	  	            
	  	                $id_bidang = $bidang['id']; 
	  	                $no=1;
	  	                foreach($this->db->query("SELECT id,id_bidang, nama_kegiatan,bulan,tahun,kode FROM data_kegiatan WHERE id_bidang='$id_bidang'")->result() as $row){
	  	                    
	  	                    $penerimaan = $this->db->query("SELECT sum(masuk) jml FROM data_kegiatan_detail WHERE kode='".$row->kode."'")->row_object();
	  	                     $pengeluaran = $this->db->query("SELECT sum(keluar) jml FROM data_kegiatan_detail WHERE kode='".$row->kode."'")->row_object();
	  	            ?>
	  	            <tr>
	  	                <td><?php echo $no ?></td>
	  	                <td><?php echo $row->nama_kegiatan ?></td>
	  	                <td><?php echo $row->bulan ?></td>
	  	                <td><?php echo $row->tahun ?></td>
	  	                <td><?php echo number_format($penerimaan->jml) ?></td>
	  	                <td><?php echo number_format($pengeluaran->jml) ?></td>

       

                        <td>
                            
                              <a href="<?php echo site_url('bidang/view2/'.$row->id.'/'.$row->id_bidang) ?>" class="btn bg-utama"><i class="flaticon2-layers-1"></i> Uraian</a>

		  				
                             <a href="<?php echo site_url('bidang/edit2/'.$row->id.'/'.$row->id_bidang) ?>" class="btn bg-kedua"><i class="flaticon-edit"></i> Edit</a>

		  					<a href="<?php echo site_url('bidang/delete2/'.$row->id.'/'.$row->id_bidang) ?>"  class="btn btn-danger" style="border-radius:0px"><i class="flaticon-delete"></i> Hapus</a>	
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
