<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Biaya Bulanan</li>
	  </ol>
</nav>
<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<a href="<?php echo site_url() ?>" class="btn btn-secondary"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	  	<a href="<?php echo site_url('bulanan/add') ?>" class="btn bg-utama"><i class="flaticon-add"></i> Tambah</a>
	  </div>
	  <div class="card-body">

	  	<table class="table table-bordered table-striped table-hover tabza" style="font-size:small">
	  		<thead>
	  			<tr>
	  			<th>No</th>
	  			<th>No. Invoce</th>
	  			<th>Tanggal Invoice</th>
	  			<th>Nama Member</th>
	  			<th>Jumlah & harga Device</th>
	  			<th>Biaya Device</th>
	  			<th>Hosting</th>
	  			<th>Biaya Tahunan</th>
	  			<th>Expired</th>
	            <th>Status</th>
	  			<th>Action</th>
	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  			
	  			if($_SESSION['email']=='zavalabsofficial@gmail.com'){
	  			    $q="SELECT a.*,b.status status_member,b.jumlah_device,nama_lengkap FROM data_bulanan a JOIN member b ON a.fid_member = b.id ORDER BY id_bulanan*1 DESC";
	  			}else{
	  			    $q="SELECT a.*,b.status status_member,b.jumlah_device,a.status status,nama_lengkap FROM data_bulanan a JOIN member b ON a.fid_member = b.id WHERE data_bulanan.fid_member='".$_SESSION['id']."' ORDER BY id_bulanan*1 DESC";
	  			}
	  				$no=0;
	  				foreach($this->db->query($q)->result() as $row):
	  				$no++;
	  				$warna = '';
	  				if($row->status=="LUNAS"){
	  				     $warna='success';
	  				}else{
	  				    $warna='danger';
	  				}
	  				$jml_device = $row->jumlah_device;
	  				$harga_device = 0;
	  				
	  				if($jml_device > 0 && $jml_device <=10){
                        $harga_device = 50000;
                    }elseif($jml_device > 10 && $jml_device <=20){
                        $harga_device = 45000;
                    }elseif($jml_device > 20 && $jml_device <=100){
                        $harga_device = 40000;
                    }elseif($jml_device > 100){
                        $harga_device = 25000;
                    }
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo "ZVS".$row->id_bulanan ?></td>
		  				<td><?php echo Indonesia3Tgl($row->tanggal_bulanan) ?></td>
		  				<td><?php echo $row->nama_lengkap ?></td>
		  				<td><?php echo number_format($row->jumlah_device) ?> x <?php echo number_format($harga_device) ?></td>

		  				<td><?php echo number_format($row->jumlah_device*$harga_device) ?></td>
		  				<td><?php echo number_format($row->biaya) ?></td>
		  				<td><?php echo number_format($row->biaya + ($row->jumlah_device*$harga_device)) ?></td>
		  						<td><?php echo $row->jatuh_tempo ?></td>
		  						
		  							<td><span class="badge badge-<?php echo $warna ?>"><?php echo $row->status ?></span></td>
		  			
	
	
		  				
		  				
		  				<td>
		  				<?php if($row->status=='BELUM BAYAR'){ ?>
		  				
                            	<a href="<?php echo site_url('bulanan/update/'.$row->id_bulanan.'/'.$row->fid_member) ?>" class="btn bg-success text-white"><i class="flaticon2-correct"></i></a>
		  				
		  					<?php } ?>
		  					
		  					<a href="<?php echo site_url('bulanan/view/'.$row->id_bulanan.'/ZVS'.$row->id_bulanan.'_'.$row->status) ?>" class="btn bg-danger text-white"><i class="flaticon2-print"></i></a>
		  					
		  					<a href="<?php echo site_url('bulanan/next/'.$row->id_bulanan.'/'.$row->fid_member) ?>" class="btn bg-utama text-white"><i class="flaticon2-refresh-button"></i></a>
		  					
		  						<a onClick="return confirm('Apakah anda yakin akan hapus ini ?')" href="<?php echo site_url('bulanan/delete/'.$row->id_bulanan) ?>" class="btn bg-secondary text-white"><i class="flaticon-delete"></i></a>

		  				

		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>

	  </div>
	</div>





