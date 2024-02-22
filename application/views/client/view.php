<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?php echo site_url('client') ?>">Client</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Detail</li>
	  </ol>
</nav>
<div class="container-fluid">

	<div class="card">
	  <div class="card-header">
	  		
	<?php
	
	
	$id_client = $this->uri->segment(3);
	
	$sql="SELECT * FROM data_client WHERE id_client='$id_client'";
	
	$c = $this->db->query($sql)->row_object();
	
	if($c->status_client=='DEAL'){
	    $warna = 'success';
	}elseif($c->status_client=='PROSPEK'){
	    $warna = 'primary';
	}elseif($c->status_client=='BATAL'){
	    $warna = 'danger';
	}
	
	?>
	<a href="<?php echo site_url('client') ?>" class="btn bg-ketiga"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
    <img src="<?php echo site_url().'/'.$c->foto_client ?>" width="50" style="float:right" />
		  </div>
	  	<div class="card-body">
       
	  		<table class="table table-bordered">
	  		    <tr>
	  		        <th>Nama Client</th>
	  		        <td><?php echo $c->nama_client ?> <span class="badge badge-<?php echo $warna ?>"><?php echo $c->status_client ?></span></td>
	  		        <th>Tanggal Daftar Client</th>
	  		        <td><?php echo Indonesia3Tgl($c->tanggal_daftar) ?></td>
	  		        <th>Tanggal Deadline</th>
	  		        <td><?php echo Indonesia3Tgl($c->deadline) ?></td>
	  		    </tr>
	  		     <tr>
	  		        <th>Telepon Client</th>
	  		        <td><?php echo $c->telepon_client ?></td>
	  		        <th>Nama Aplikasi</th>
	  		        <td><?php echo $c->nama_aplikasi ?></td>
	  		        <th>Harga Project</th>
	  		        <td><h4 class="text-success"><?php echo number_format($c->harga_client) ?></h4></td>
	  		        
	  		    </tr>
	  		     <tr>
	  		        <th>Alamat Client</th>
	  		        <td><?php echo $c->alamat_client ?></td>
	  		       
	  		    </tr>
	  		</table>
	  		
	  	
	  		    <a href="<?php echo site_url('client/add_invoice/'.$id_client) ?>" class="btn bg-utama"><i class="flaticon-add"></i> Buat Invoice / Penawaran</a>
	  		    

	  		
	        <table class="table" style="font-size:small">
	            <tr>
	                <th>Status Invoice</th>
	                <th>Nomor Invoice</th>
	                <th>Tanggal Buat</th>
	                <th>Harga</th>
	                <th>Diskon</th>
	                <th>Total Project</th>
	                <th>Sisa / Piutang</th>
	                <th>Action</th>
	            </tr>
	            <?php
	                error_reporting(0);
	                foreach($this->db->query("SELECT * FROM data_invoice WHERE fid_client='$id_client'")->result() as $r){
	            ?>
	            
	                <tr>
	                    <td><?php echo $r->status_invoice ?></td>
	                    <td><?php echo $r->nomor_invoice ?></td>
	                    <td><?php echo Indonesia3Tgl($r->tanggal_invoice) ?></td>
	                    
	                    <!--<td><?php echo Indonesia3Tgl($r->tanggal_1) ?></td>-->
	                    <!--<td><?php echo Indonesia3Tgl($r->tanggal_2) ?></td>-->
	                    <!--<td><?php echo Indonesia3Tgl($r->tanggal_3) ?></td>-->
	                    
	                    
	                    <td><?php echo number_format($r->harga) ?></td>
	                    <td><?php echo number_format($r->diskon) ?></td>
	                    <td><h4><?php echo number_format($r->harga_total) ?></h4></td>
	                    <td><h4><?php echo number_format($r->sisa) ?></h4></td>
	           
	                    <td>
	                        
	                           <a style="font-size:x-small" class="btn btn-warning" href="<?php echo site_url('client/edit_invoice/'.$r->nomor_invoice) ?>"><i class="flaticon-edit"></i></a>
	                           <a style="font-size:x-small" class="btn btn-secondary" href="<?php echo site_url('client/delete_invoice/'.$r->nomor_invoice.'/'.$r->fid_client) ?>"><i class="flaticon-delete"></i></a>
	                           <a style="font-size:x-small" class="btn btn-danger" href="<?php echo site_url('client/print_penawaran/'.$r->nomor_invoice) ?>"><i class="flaticon2-print"></i> Print Penawaran</a>
	                       
	                     
	                        
	                        
	                        
	                        
	                    </td>
	                </tr>
	                <tr>
	                    <td colspan="5"></td>
	                    <td colspan="1">
	                                <?php  if($r->status_invoice=="PENAWARAN"){ ?>
	                                <a class="btn" style="font-size:small;background:blue;color:white;padding:5px" href="<?php echo site_url('client/dp/'.$r->nomor_invoice) ?>">BAYAR DP</a>
	                                <?php } ?>
	                                
	                                <?php  if($r->status_invoice=="SUDAH BAYAR DP"){ ?>
                                    <a class="btn" style="font-size:small;background:brown;color:white;padding:5px" href="<?php echo site_url('client/termin/'.$r->nomor_invoice) ?>">BAYAR TERMIN 1</a>
                                    <?php } ?>
                                    
                                     <?php  if($r->status_invoice=="SUDAH BAYAR DP" || $r->status_invoice=="SUDAH BAYAR TERMIN"){ ?>
                                   <a class="btn" style="font-size:small;background:green;color:white;padding:5px" href="<?php echo site_url('client/lunas/'.$r->nomor_invoice) ?>">BAYAR PELUNASAN</a>
                                    <?php } ?>
                                    
                        </td>
	                </tr>
	                <tr>
	                    <th>Hosting dan Domain</th>
	                    <td><h6><?php echo number_format($r->hosting_domain) ?><sub>/tahun</sub></h6</td>
	                </tr>
	                <?php  if($r->status_invoice=="SUDAH BAYAR DP" || $r->status_invoice=="SUDAH BAYAR TERMIN" || $r->status_invoice=="SUDAH BAYAR PELUNASAN"){ ?>
	                <tr>
	                    <th>Tanggal DP</th>
	                    <td><?php echo Indonesia3Tgl($r->tanggal_1) ?></td>
	                      
	                </tr>
	                <tr>
	                    <th>Total DP</th>
	                    
	                    <td><?php echo number_format($r->bayar_1) ?></td>
	                    <td> <a class="btn btn-primary" style="font-size:x-small" href="<?php echo site_url('client/print_dp/'.$r->nomor_invoice.'/'.$r->nomor_invoice.'_DP') ?>"><i class="flaticon2-print"></i> Print Sudah DP</a></td>
	                  
	                </tr>
	                <?php } ?>
	                
	                
	                <?php  if($r->status_invoice=="SUDAH BAYAR TERMIN" || $r->status_invoice=="SUDAH BAYAR PELUNASAN"){ ?>
	                <tr>
	                    <td colspan="2"></td>
	                    <th>Tanggal Termin 1</th>
	                    <td><?php echo Indonesia3Tgl($r->tanggal_2) ?></td>
	                      
	                </tr>
	                <tr>
	                    <td colspan="2"></td>
	                    <th>Total Termin 1</th>
	                    <td><?php echo number_format($r->bayar_2) ?></td>
	                    <td> <a class="btn btn-warning" style="font-size:x-small" href="<?php echo site_url('client/print_termin/'.$r->nomor_invoice.'/'.$r->nomor_invoice.'_TERMIN') ?>"><i class="flaticon2-print"></i> Print Sudah Termin</a></td>
	                </tr>
	                <?php } ?>
	                
	                         <?php  if($r->status_invoice=="SUDAH BAYAR PELUNASAN"){ ?>
        	                  <tr>
        	                    <td colspan="4"></td>
        	                    <th>Tanggal Pelunasan</th>
        	                    <td><?php echo Indonesia3Tgl($r->tanggal_3) ?></td>
        	                    
        	                       
        	                </tr>
        	                <tr>
        	                    <td colspan="4"></td>
        	                    <th>Total Pelunasan</th>
        	                    <td><?php echo number_format($r->bayar_3) ?></td>
        	                    <td> <a class="btn btn-success" style="font-size:x-small" href="<?php echo site_url('client/print/'.$r->nomor_invoice.'/'.$r->nomor_invoice.'_LUNAS') ?>"><i class="flaticon2-print"></i> Print Sudah Pelunasan</a></td>
        	                </tr>
        	                <?php } ?>
	            <?php
	                }
	            ?>
	        </table>


	
		  </div>
		  <div class="card-footer">

		  </div>
	
	</div>


</div>



