<div class="container-fluid">
    
    
    <div class="row" style="margin-top:5%">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            
            <?php if($this->session->flashdata('msg')){ ?>
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span id="pesan">  <?php echo $this->session->flashdata('msg'); ?></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                      
              
            <?php } ?>


            <center><h2>PILIH FILTER UNTUK MENGHAPUS RESI</h2></center>
         <form method="POST" style="margin-top:5%" action="<?php echo site_url('scan2/hapus_resi_delete') ?>">
        <input value="<?php echo $_SESSION['id'] ?>" name="id_member" type="hidden" />
       
             <div class="form-group">
     
		  <label class="form-text" ><i class="flaticon-truck"></i> Ekspedisi</label>
			    <select class="form-control" name="ekspedisi">
			        <option>SEMUA</option>
			        <?php
			            
			            foreach($this->db->query("SELECT nama_kurir FROM data_kurir GROUP BY nama_kurir")->result() as $r){
			        
			        ?>
			        <option <?php echo isset($_POST['ekspedisi']) && $_POST['ekspedisi']==$r->nama_kurir ?'selected':'' ?> ><?php echo $r->nama_kurir ?></option>
			        
			        <?php 
			        
			        
			        }
			        
			        ?>
			        
			    </select>
			  
	
      </div>
    
    
      <div class="form-group">
     			     <label class="form-text"><i class="flaticon2-calendar-9"></i> Dari Tanggal</label>
			    <input autocomplete="off" required="required" type="text" name="awal" class="tgl form-control" value="<?php echo isset($_POST['awal'])?$_POST['awal']:date('d/m/Y') ?>">
			 
	
      </div>
        <div class="form-group">
       <label class="form-text" ><i class="flaticon2-calendar-9"></i> Sampai Tanggal</label>
		
			    <input autocomplete="off" required="required" type="text" name="akhir" class="tgl form-control" value="<?php echo isset($_POST['akhir'])?$_POST['akhir']:date('d/m/Y') ?>">
			  
	
      </div>
      <div>
          <button type="submit" onClick="return confirm('Apakah anda yakin akan hapus ini ?')" class="btn btn-danger col-sm-12"><i class="flaticon-delete"></i> Hapus Data Resi</button>
      </div>
      
 
    </form>   
        </div>
        <div class="col-sm-4"></div>
    </div>
    
    <hr/>
    <?php

   

	   
	   
	   
	   
    ?>
    
    
</div>