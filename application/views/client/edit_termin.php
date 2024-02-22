<div class="container-fluid">


	  <form action="<?php echo site_url($modul.'/update_invoice_termin') ?>" method="POST" enctype="multipart/form-data">

    <div class="row" style="margin-top:2%;margin-bottom:2%">
        <div class="col col-sm-6">
            	<a href="<?php echo site_url($modul) ?>" class="btn bg-white col col-sm-12"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  
        </div>
        <div class="col col-sm-6">
            	<button class="btn bg-utama col col-sm-12" id="simpan" type="SUBMIT"><i class="flaticon2-files-and-folders"></i> Simpan</button>
        </div>
    </div>
    <?php
    
     date_default_timezone_set("Asia/Jakarta");
    	$nomor_invoice = $this->uri->segment(3);
	
	$sql="SELECT * FROM data_invoice WHERE nomor_invoice='$nomor_invoice'";
	$i = $this->db->query($sql)->row_object();

    
    ?>
	  		
	  		    <div class="row">
	  		        <div class="col-sm-6">
	  		    <div class="form-group">
    	  		        <label>Nomor Invoice / Penawaran</label>
    	  		         <input type="hidden" name="fid_client" value="<?php echo $i->fid_client ?>" />
    	  		        <input class="form-control" name="nomor_invoice" readonly  type="text" required autocomplete="off" value="<?php echo $i->nomor_invoice ?>" />
    	  		    </div>
	  		            <div class="form-group">
        	  		        <label>Status</label>
        	  		        <input readonly class="form-control" name="status_invoice" value="SUDAH BAYAR TERMIN">
        	  	
        	  		    </div>
        	  		    
	  		        <div class="form-group">
    	  		        <label>Tanggal Bayar Termin 1</label>
    	  		        <input class="form-control" name="tanggal_2" type="date" value="<?php echo date('Y-m-d') ?>" />
    	  		    </div>
    	  		    
    	  	
    
                   <div class="row">
                       
                        <div class="form-group col-sm-6">
    	  		        <label>Harga Project</label>
    	  		        <input id="harga" readonly class="form-control uang" name="harga" type="text" required autocomplete="off" value="<?php echo $i->harga ?>" />
        	  		    </div>
        	  		     <div class="form-group col-sm-6">
        	  		        <label>Diskon</label>
        	  		        <input id="diskon" readonly class="form-control uang" name="diskon" type="text" value="<?php echo $i->diskon ?>" required autocomplete="off" />
        	  		    </div>
        	  		    
        	  		     <div class="form-group col-sm-6">
    	  		        <label>Harga Project</label>
    	  		        <input id="total" readonly class="form-control uang" name="harga_total" type="text" required autocomplete="off" value="<?php echo $i->harga_total ?>" />
        	  		    </div>
        	  		    
        	  		      <div class="form-group col-sm-6">
    	  		        <label>Down Payment</label>
    	  		        <input id="dp" readonly class="form-control uang" name="bayar_1" type="text" required autocomplete="off" value="<?php echo $i->bayar_1 ?>" />
        	  		    </div>
        	  		    
        	  		 
    	  		    
    	  		    
                   </div>
                  
    	  	
	  		    </div>
	  		    
	  		    <div class="col-sm-6">
	  		    
    	  		    
    	  		 
    	  		        <div class="form-group">
    	  		        <label>Pembayaran Termin</label>
    	  		        <input id="termin" class="form-control uang" name="bayar_2" type="text" required autocomplete="off" autofocus />
        	  		    </div>
    	  		    
    	  		    
    	  		     <div class="form-group">
    	  		        <label>Sisa Pembayaran</label>
    	  		        <input class="form-control uang" name="sisa" id="sisa" type="text" readonly value="<?php echo $i->sisa ?>" required autocomplete="off" />
    	  		    </div>
    	  		    
    	  		    <!-- <div class="form-group">-->
    	  		    <!--    <label>Termin 1</label>-->
    	  		    <!--    <input class="form-control uang" name="bayar_2" type="text" required autocomplete="off" />-->
    	  		    <!--</div>-->
    	  		    
    	  		    
    	  		    <!-- <div class="form-group">-->
    	  		    <!--    <label>Termin 2</label>-->
    	  		    <!--    <input class="form-control uang" name="bayar_3" type="text" required autocomplete="off" />-->
    	  		    <!--</div>-->
	  		        
	  		          
        	  		    
        	  	
        	  		    
        	  		    
	  		    </div>
	  		    </div>

			

	
			   
			   
			
			</form>





</div>
<script>
    $(document).ready(function() {
         $('#summernote').summernote({
            height:200
        });
        // .simpleMoneyFormat();

        
        
        $("#termin").keyup(function(){
            var total = parseFloat($("#total").val().replace(",","").replace(",","").replace(",",""));
            var dp = parseFloat($("#dp").val().replace(",","").replace(",","").replace(",",""));
            var termin = parseFloat($("#termin").val().replace(",","").replace(",","").replace(",",""));
            var sisa = (total - dp)-termin;
            $("#sisa").val(sisa).simpleMoneyFormat();
            
        })
        
        
    });
</script>


