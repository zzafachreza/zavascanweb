<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('bidang') ?>">bidang</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail - Anggaran</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('bidang') ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	
		<a class="btn bg-utama text-white" data-toggle="modal" data-target="#exampleModal" ><i class="flaticon2-add"></i> Tambah Anggaran</a>
		
	
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
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Anggaran</th>
                        <th>Action</th>
	  	                
	  	            </tr>
	  	            </thead>
	  	            <tbody>
	  	            <?php
	  	            
	  	                $id_bidang = $bidang['id']; 
	  	                $no=1;
	  	                foreach($this->db->query("SELECT * FROM data_anggaran WHERE id_bidang='$id_bidang'")->result() as $row){
	  	                    
	  	                   	  	            ?>
	  	            <tr>
	  	                <td><?php echo $no ?></td>
	  	                <td><?php echo $row->bulan ?></td>
	  	                <td><?php echo $row->tahun ?></td>
	  	                <td><?php echo number_format($row->anggaran) ?></td>

       

                        <td>
                            
		  				
                             <a href="<?php echo site_url('bidang/edit_anggaran/'.$row->id.'/'.$row->id_bidang) ?>" class="btn bg-kedua"><i class="flaticon-edit"></i> Edit</a>

		  					<a href="<?php echo site_url('bidang/hapus_anggaran/'.$row->id.'/'.$row->id_bidang.'/'.$row->anggaran) ?>"  class="btn btn-danger" style="border-radius:0px"><i class="flaticon-delete"></i> Hapus</a>	
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?php echo site_url() ?>bidang/tambah_anggaran" method="POST">

			 <table class="table">
			    <input autocomplete='off' value="<?php echo $id_bidang ?>" type='hidden' name='id_bidang' class='form-control'>
               
                   <tr><th>Bulan</th><td>
                    <select class="form-control" name="bulan">
                            
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option>September</option>
                        <option>Oktber</option>
                        <option>November</option>
                        <option>Desember</option>
                    </select>
                    </select>
                </td></tr>
                <tr><th>Tahun</th><td>
                    <select class="form-control" name="tahun">
                        <?php
                        
                        for($tahun=date('Y');$tahun < date('Y')+2;$tahun++){
                        
                        ?>
                            <option><?php echo $tahun ?></option>
                        
                        <?php } ?>
                    </select>
                </td></tr>
                
                 <tr><th width="40%">Anggaran</th><td><input autofocus="autofocus" autocomplete='off' type='text' name='anggaran' class='form-control'></td></tr>
             
        		

                </tr>
			 </table>
		
			   
			   
			
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-kedua" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-utama">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>