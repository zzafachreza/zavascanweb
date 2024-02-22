<div class="container-fluid">


	  <form action="<?php echo site_url($modul.'/insert') ?>" method="POST" enctype="multipart/form-data">

    <div class="row" style="margin-top:2%;margin-bottom:2%">
        <div class="col col-sm-6">
            	<a href="<?php echo site_url($modul) ?>" class="btn bg-white col col-sm-12"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  
        </div>
        <div class="col col-sm-6">
            	<button class="btn bg-utama col col-sm-12" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
        </div>
    </div>
	
	  		
	  		    <div class="row">
	  		        <div class="col-sm-6">
	  		        <div class="form-group">
    	  		        <label>Tanggal Daftar</label>
    	  		        <input class="form-control" name="tanggal_daftar" type="date" value="<?php echo date('Y-m-d') ?>" />
    	  		    </div>
    	  		    
    	  		    <div class="form-group">
    	  		        <label>Nama Client</label>
    	  		        <input class="form-control" name="nama_client" type="text" required autocomplete="off" />
    	  		    </div>
    
                     <div class="form-group">
    	  		        <label>Telepon / Whatsapp Client</label>
    	  		        <input class="form-control" name="telepon_client" type="text" required autocomplete="off" />
    	  		    </div>
    
                    <div class="form-group">
    	  		        <label>Alamat Client</label>
    	  		        <input class="form-control" name="alamat_client" type="text" required autocomplete="off" />
    	  		    </div>
    	  		   <div class="form-group">
    	  		        <label>Nama Aplikasi</label>
    	  		        <input class="form-control" name="nama_aplikasi" type="text" required autocomplete="off" />
    	  		    </div>
    	  	
	  		    </div>
	  		    
	  		    <div class="col-sm-6">
	  		    
    	  		    
    	  		    <div class="form-group">
    	  		        <label>Tema Warna Aplikasi</label>
    	  		        <input class="form-control" name="tema_warna" type="text" required autocomplete="off" />
    	  		    </div>
	  		        
	  		            <div class="form-group">
        	  		        <label>Deadline</label>
        	  		        <input class="form-control" name="deadline" type="date" required autocomplete="off" />
        	  		    </div>
        	  		    
        	  		    <div class="form-group">
        	  		        <label>Harga Project</label>
        	  		        <input class="form-control uang" name="harga_client" type="text" required autocomplete="off" />
        	  		    </div>
        	  		    
        	  		    <div class="form-group">
        	  		        <label>Status Client</label>
        	  		        <select class="form-control" name="status_client">
        	  		            <option>PROSPEK</option>
        	  		            <option>DEAL</option>
        	  		            <option>BATAL</option>
        	  		        </select>
        	  		    </div>
        	  		    
        	  		     <div class="form-group">
        	  		        <label>Logo Aplikasi</label>
        	  		        <input class="form-control" name="foto_client" type="file" required autocomplete="off" />
        	  		    </div>
	  		    </div>
	  		    </div>

			

	
			   
			   
			
			</form>





</div>



