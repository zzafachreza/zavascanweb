<?php



if(!empty($_POST['key'])){
    
    $key = $_POST['key'];
    $sql="SELECT * FROM data_shopee LEFT JOIN barcode ON barcode.nama = data_shopee.kolom_5 WHERE fid_member='".$_SESSION['id']."' AND kolom_1 like '%$key%' OR kolom_5 like '%$key%' OR kolom_13 like '%$key%' limit 50";
    $jml = $this->db->query("SELECT * FROM data_shopee WHERE fid_member='".$_SESSION['id']."' AND kolom_1 like '%$key%' OR kolom_5 like '%$key%' OR kolom_13 like '%$key%'")->num_rows();
}else{
     $sql="SELECT * FROM data_shopee LEFT JOIN barcode ON barcode.nama = data_shopee.kolom_5 WHERE fid_member='".$_SESSION['id']."' limit 50";
      $jml = $this->db->query("SELECT * FROM data_shopee WHERE fid_member='".$_SESSION['id']."'")->num_rows();
}

?>



<div style="padding-bottom:1%;padding-top:1%">
    Total Data Shopee : <strong><?php echo number_format($jml)  ?></strong>
</div>
<table class="table table-bordered table-striped table-hover tabza2 nowrap display"  style="width:100%">
	  		<thead  style="color:white;background:#FC5A31">
	  			<tr>
    	  			<th>No</th>
    	  		        <th>No. Pesanan</th>
    	  		        <th>Status Scan</th>
                        <th>Status Pesanan</th>
                        <th>Alasan Pembatalan</th>
                        <th>Status Pembatalan/ Pengembalian</th>
                        <th>No. Resi</th>
                        <th>Opsi Pengiriman</th>
                        <th>Antar ke counter/ pick-up</th>
                        <th>Pesanan Harus Dikirimkan Sebelum (Menghindari keterlambatan)</th>
                        <th>Waktu Pengiriman Diatur</th>
                        <th>Waktu Pesanan Dibuat</th>
                        <th>Waktu Pembayaran Dilakukan</th>
                        <th>SKU Induk</th>
                        <th>Nama Produk</th>
                        <th>Nomor Referensi SKU</th>
                        <th>Nama Variasi</th>
                        <th>Harga Awal</th>
                        <th>Harga Setelah Diskon</th>
                        <th>Jumlah</th>
                        <th>Total Harga Produk</th>
                        <th>Total Diskon</th>
                        <th>Diskon Dari Penjual</th>
                        <th>Diskon Dari Shopee</th>
                        <th>Berat Produk</th>
                        <th>Jumlah Produk di Pesan</th>
                        <th>Total Berat</th>
                        <th>Voucher Ditanggung Penjual</th>
                        <th>Cashback Koin</th>
                        <th>Voucher Ditanggung Shopee</th>
                        <th>Paket Diskon</th>
                        <th>Paket Diskon (Diskon dari Shopee)</th>
                        <th>Paket Diskon (Diskon dari Penjual)</th>
                        <th>Potongan Koin Shopee</th>
                        <th>Diskon Kartu Kredit</th>
                        <th>Ongkos Kirim Dibayar oleh Pembeli</th>
                        <th>Estimasi Potongan Biaya Pengiriman</th>
                        <th>Ongkos Kirim Pengembalian Barang</th>
                        <th>Total Pembayaran</th>
                        <th>Perkiraan Ongkos Kirim</th>
                        <th>Catatan dari Pembeli</th>
                        <th>Catatan</th>
                        <th>Username (Pembeli)</th>
                        <th>Nama Penerima</th>
                        <th>No. Telepon</th>
                        <th>Alamat Pengiriman</th>
                        <th>Kota/Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Waktu Pesanan Selesai</th>
    	  			<th>Action</th>
    	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query($sql)->result() as $row):
	  				$no++;
	  				
	  				if(strlen($row->nama) > 3 ){
	  				    $icon = '<i class="flaticon2-correct" style="font-size:x-large;color:green"></i>';
	  				    $txt = 'DONE';

	  				}else{
	  				      $icon = '<i class="flaticon2-cross" style="font-size:large;color:red"></i>';
	  				       $txt = '';
	  				}
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  				<td><?php echo $row->kolom_1 ?></td>
		  				<td> <?php echo $icon ?> <?php echo $txt ?></td>
                        <td><?php echo $row->kolom_2 ?></td>
                        <td><?php echo $row->kolom_3 ?></td>
                        <td><?php echo $row->kolom_4 ?></td>
                        <td><?php echo $row->kolom_5 ?></td>
                        <td><?php echo $row->kolom_6 ?></td>
                        <td><?php echo $row->kolom_7 ?></td>
                        <td><?php echo $row->kolom_8 ?></td>
                        <td><?php echo $row->kolom_9 ?></td>
                        <td><?php echo $row->kolom_10 ?></td>
                        <td><?php echo $row->kolom_11 ?></td>
                        <td><?php echo $row->kolom_12 ?></td>
                        <td><?php echo $row->kolom_13 ?></td>
                        <td><?php echo $row->kolom_14 ?></td>
                        <td><?php echo $row->kolom_15 ?></td>
                        <td><?php echo $row->kolom_16 ?></td>
                        <td><?php echo $row->kolom_17 ?></td>
                        <td><?php echo $row->kolom_18 ?></td>
                        <td><?php echo $row->kolom_19 ?></td>
                        <td><?php echo $row->kolom_20 ?></td>
                        <td><?php echo $row->kolom_21 ?></td>
                        <td><?php echo $row->kolom_22 ?></td>
                        <td><?php echo $row->kolom_23 ?></td>
                        <td><?php echo $row->kolom_24 ?></td>
                        <td><?php echo $row->kolom_25 ?></td>
                        <td><?php echo $row->kolom_26 ?></td>
                        <td><?php echo $row->kolom_27 ?></td>
                        <td><?php echo $row->kolom_28 ?></td>
                        <td><?php echo $row->kolom_29 ?></td>
                        <td><?php echo $row->kolom_30 ?></td>
                        <td><?php echo $row->kolom_31 ?></td>
                        <td><?php echo $row->kolom_32 ?></td>
                        <td><?php echo $row->kolom_33 ?></td>
                        <td><?php echo $row->kolom_34 ?></td>
                        <td><?php echo $row->kolom_35 ?></td>
                        <td><?php echo $row->kolom_36 ?></td>
                        <td><?php echo $row->kolom_37 ?></td>
                        <td><?php echo $row->kolom_38 ?></td>
                        <td><?php echo $row->kolom_39 ?></td>
                        <td><?php echo $row->kolom_40 ?></td>
                        <td><?php echo $row->kolom_41 ?></td>
                        <td><?php echo $row->kolom_42 ?></td>
                        <td><?php echo $row->kolom_43 ?></td>
                        <td><?php echo $row->kolom_44 ?></td>
                        <td><?php echo $row->kolom_45 ?></td>
                        <td><?php echo $row->kolom_46 ?></td>
                        <td><?php echo $row->kolom_47 ?></td>

		  				

		  				
                	  			
                	  		
                	  			
		  			
		  				<td>
		  				
		  	

		  					<a href="<?php echo site_url('marketplace/shopee_delete/'.$row->id_shopee) ?>" class="btn bg-ketiga"><i class="flaticon-delete"></i></a>	


		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>
	  	
	  	<script>
	$(document).ready(function() {
    $('.tabza2').DataTable( {
        "scrollX": true,
        'searching':false,
        'paging':false
    } );
    
} );
	  	</script>