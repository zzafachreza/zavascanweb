<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('customer') ?>">customer</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	
	<a href="<?php echo site_url('customer') ?>" class="AppButton-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>

		  </div>
	  	<div class="card-body">
			  
			  <div class="row">
			      <div class="col col-sm-6">
			          
			          <table class="table table-bordered">
			              <tr>
			                  <td>Nama Lengkap</td>
			                  <td><?php  echo $customer['nama_lengkap'] ?></td>
			              </tr>
			              <tr>
			                  <td>Email</td>
			                  <td><?php  echo $customer['email'] ?></td>
			              </tr>
			               <tr>
			                  <td>Telepon</td>
			                  <td><?php  echo $customer['tlp'] ?></td>
			              </tr>
			               <tr>
			                  <td>Alamat</td>
			                  <td><?php  echo $customer['alamat'] ?></td>
			              </tr>
			          </table>
			               
            			   
            			   <div class="form-group">
            			    <label for="nama">Terakhir Scan</label>
            			    <h4 class="text-danger"><?php   
            			            error_reporting(0);
            			 
            		  				  
            		  				    $r = $this->db->query("SELECT tanggal,jam FROM barcode WHERE id_member='".$customer['id']."' ORDER BY id*1 DESC limit 1")->row_object();
            		  				    echo Indonesia3Tgl($r->tanggal).' '.$r->jam;
            		  		
            			                ?></h4>
            			  </div>
            			  <div class="form-group">
            			    <label for="nama">Total resi yang di scan</label>
            			    <h4 class="text-success"><?php   $jml =  $this->db->query("SELECT COUNT(id) total FROM barcode WHERE id_member='".$customer['id']."'")->row_object();
            			                
            			                echo number_format($jml->total);
            			    
            			                ?></h4>
            			  </div>
			      </div>
			      <div class="col col-sm-6">
			            <div class="form-group">
            			    <label for="nama">Jumlah Device</label>
            			    <h4 class="text-primary">
            			                <?php
            			                
            			                echo number_format( $customer['jumlah_device']);
            			    
            			                ?></h4>
            			  </div>
            			  <table class="table table-bordered">
            			      <tr class="bg-success text-white">
            			          <th>No</th>
            			          <th>Device ID</th>
            			          <th>Device Name</th>
            			          <th>Action</th>
            			      </tr>
            			      <?php
            			      
            			      $no=1;
            			      
            			      foreach($this->db->query("SELECT * FROM data_device WHERE fid_member='".$customer['id']."'")->result() as $d){
            			      ?>
            			      <tr>
            			          <td><?php echo $no ?></td>
            			          <td><?php echo $d->deviceID ?></td>
            			          <td><?php echo $d->deviceName ?></td>
            			          <td><a onclick="return confirm('Apakah Anda akan hapus device <?php echo $d->deviceName ?>')" href="<?php echo site_url('customer') ?>/delete_device/<?php echo $d->id_device ?>/<?php echo $d->fid_member ?>" class="btn btn-danger"><i class="flaticon-delete"></i></a></td>
            			      </tr>
            			      
            			      <?php
            			       $no++; }
            			      ?>
            			  </table>
			      </div>
			  </div>
			  
			  
			  
			 
			  
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



