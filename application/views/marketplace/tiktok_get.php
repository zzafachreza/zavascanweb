<?php



if(!empty($_POST['key'])){
    
    $key = $_POST['key'];
    $sql="SELECT * FROM data_tiktok LEFT JOIN barcode ON barcode.nama = data_tiktok.kolom_34 WHERE fid_member='".$_SESSION['id']."' AND kolom_1 like '%$key%' OR kolom_34 like '%$key%' OR kolom_8 like '%$key%' limit 50";
    $jml = $this->db->query("SELECT * FROM data_tiktok WHERE fid_member='".$_SESSION['id']."' AND kolom_1 like '%$key%' OR kolom_34 like '%$key%' OR kolom_8 like '%$key%'")->num_rows();
}else{
     $sql="SELECT * FROM data_tiktok LEFT JOIN barcode ON barcode.nama = data_tiktok.kolom_34 WHERE fid_member='".$_SESSION['id']."' limit 50";
      $jml = $this->db->query("SELECT * FROM data_tiktok WHERE fid_member='".$_SESSION['id']."'")->num_rows();
}

?>



<div style="padding-bottom:1%;padding-top:1%">
    Total Data tiktok : <strong><?php echo number_format($jml)  ?></strong>
</div>
<table class="table table-bordered table-striped table-hover tabza2 nowrap display"  style="width:100%">
	  		<thead  style="color:white;background:#000000">
	  			<tr>
    	  			<th>No</th>
    	  			 <th>Status Scan</th>
    	  		        <th>Order ID</th>
                        <th>Order Status</th>
                        <th>Order Substatus</th>
                        <th>Cancelation/Return Type</th>
                        <th>Normal or Pre-order</th>
                        <th>SKU ID</th>
                        <th>Seller SKU</th>
                        <th>Product Name</th>
                        <th>Variation</th>
                        <th>Quantity</th>
                        <th>Sku Quantity of return</th>
                        <th>SKU Unit Original Price</th>
                        <th>SKU Subtotal Before Discount</th>
                        <th>SKU Platform Discount</th>
                        <th>SKU Seller Discount</th>
                        <th>SKU Subtotal After Discount</th>
                        <th>Shipping Fee After Discount</th>
                        <th>Original Shipping Fee</th>
                        <th>Shipping Fee Seller Discount</th>
                        <th>Shipping Fee Platform Discount</th>
                        <th>Taxes</th>
                        <th>Order Amount</th>
                        <th>Order Refund Amount</th>
                        <th>Created Time</th>
                        <th>Paid Time</th>
                        <th>RTS Time</th>
                        <th>Shipped Time</th>
                        <th>Delivered Time</th>
                        <th>Cancelled Time</th>
                        <th>Cancel By</th>
                        <th>Cancel Reason</th>
                        <th>Fulfillment Type</th>
                        <th>Warehouse Name</th>
                        <th>Tracking ID</th>
                        <th>Delivery Option</th>
                        <th>Shipping Provider Name</th>
                        <th>Buyer Message</th>
                        <th>Buyer Username</th>
                        <th>Recipient</th>
                        <th>Phone #</th>
                        <th>Zipcode</th>
                        <th>Country</th>
                        <th>Province</th>
                        <th>Regency and City</th>
                        <th>Districts</th>
                        <th>Villages</th>
                        <th>Detail Address</th>
                        <th>Additional address information</th>
                        <th>Payment Method</th>
                        <th>Weight(kg)</th>
                        <th>Product Category</th>
                        <th>Package ID</th>
                        <th>Seller Note</th>

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
		  				<td> <?php echo $icon ?> <?php echo $txt ?></td>
		  				<td><?php echo $row->kolom_1 ?></td>
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
                        <td><?php echo $row->kolom_48 ?></td>
                        <td><?php echo $row->kolom_49 ?></td>
                        <td><?php echo $row->kolom_50 ?></td>
                        <td><?php echo $row->kolom_51 ?></td>
                        <td><?php echo $row->kolom_52 ?></td>
                        <td><?php echo $row->kolom_53 ?></td>

		  				
		  				

		  				

		  				
                	  			
                	  		
                	  			
		  			
		  				<td>
		  				
		  	

		  					<a href="<?php echo site_url('marketplace/tiktok_delete/'.$row->id_tiktok) ?>" class="btn bg-ketiga"><i class="flaticon-delete"></i></a>	


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