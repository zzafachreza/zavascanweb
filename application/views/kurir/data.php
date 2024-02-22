<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">kurir</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  <div class="row">
	      <div class="col col-sm-3">
	      	<a href="<?php echo site_url() ?>" class="btn bg-kedua"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
    	  </div>
    	  	   <?php
        
        if($_SESSION['email']=="zavalabsofficial@gmail.com"){
            
            
            ?>
    	    <a href="<?php echo site_url('kurir/add') ?>" class="btn bg-utama"><i class="flaticon-add"></i> Tambah</a>
    	    
    	    <?php  }?>
    	    
    	    
    	    	   <?php
        
        if($_SESSION['email']!="zavalabsofficial@gmail.com"){
            
            
            ?>
             <div class="col col-sm-6">

        	   </div>
        	   
        	   <div class="col col-sm-3 bg-utama" style="padding:1%">
        	       <p style="text-align:center;font-size:x-large;font-weight:bold">Jumlah Ekspedisi : <?php echo $this->db->query("SELECT * FROM data_kurir")->num_rows() ?> </p>
        	   </div>
        	   
        	   
    	    
    	    <?php  }?>
	  </div>
	    
	    
	    
	    
    


	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza">
	  		<thead>
	  			<tr>
	  			    
	  			<th>No</th>
	  			<th>Nama Kurir</th>
                <th>Kode</th>
	  			<th>Foto</th>
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query("SELECT * FROM data_kurir")->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->nama_kurir ?></td>
		  				<td><?php echo $row->kode ?></td>

		  				<td><img src="<?php echo $row->foto ?>" width="100"> </td>
	
	
		  				
		  				
		  				<td>
		  	
		  		  	   <?php
    
    if($_SESSION['email']=="zavalabsofficial@gmail.com"){
        
        
        ?>

		  					<a href="<?php echo site_url('kurir/edit/'.$row->id) ?>" class="btn bg-utama"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url('kurir/delete/'.$row->id.'/'.$row->foto) ?>" class="btn btn-danger"><i class="flaticon-delete"></i></a>	

<?php } ?>
		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>

	  </div>
	</div>

<p id="p1"></p>

</div>

<script type="text/javascript">

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
</script>



