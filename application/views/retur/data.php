<style>
    .toast-close{
        color:red;
    }
</style>
<div class="container-fluid">
    <h3>Scan Resi</h3>
    <div class="card">
        <div class="row">
             <input id="id_member" value="<?php echo $_SESSION['id'] ?>" type="hidden" />
            <div class="col-sm-7">
                <div class="flex flex-column">
                    <div class="field p-input-filled">
                        <label>Enter waybill or order no.</label>
                        <input autofocus="autofocus" autocomplete="off" id="key" name="key" class="p-inputtext p-component p-element w-full ng-pristine ng-valid ng-touched" />
                    </div>
                </div>
            </div>
             <div class="col-sm-5">
                <div class="flex flex-column">
                    <div class="field p-input-filled">
                        <label>Scanned by</label>
                        <input  id="customer" value="" class="p-inputtext p-component p-element w-full ng-pristine ng-valid ng-touched" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--table-->
     <div class="card">
         <div id="dataScan">
          
        </div>
     </div>
</div>
<audio id="suara">
  <source  src="<?php echo site_url('errpack.mp3') ?>" type="audio/mp3">
</audio>
<audio id="suara2">
  <source  src="<?php echo site_url('scan.mp3') ?>" type="audio/mp3">
</audio>

<audio id="charsuara">
  <source  src="<?php echo site_url('char.mp3') ?>" type="audio/mp3">
</audio>

<script>

     var id_member = $("#id_member").val();
getDataScan(id_member);

    $("#key").change(function(){
       
        
        var key = $(this).val();
        var id_member = $("#id_member").val();
        var customer = $("#customer").val();
        
        
         if(key.length < 10){
              
               var x = document.getElementById("charsuara");
                         x.play();
                         
                         
               Toastify({
                          text: 'Minimal 10 karakter !',
                          duration: 3000,
                         style: {
                              background: '#FFE9E8',
                              color:'red'
                            },
                          close: true,
                          gravity: "top", // `top` or `bottom`
                          position: "right", // `left`, `center` or `right`
                          stopOnFocus: true, // Prevents dismissing of toast on hover
                        }).showToast();
          }else if(key.length > 18){
                var x = document.getElementById("charsuara");
                         x.play();
               Toastify({
                          text: 'Maksimal 18 karakter !',
                          duration: 3000,
                         style: {
                              background: '#FFE9E8',
                              color:'red'
                            },
                          close: true,
                          gravity: "top", // `top` or `bottom`
                          position: "right", // `left`, `center` or `right`
                          stopOnFocus: true, // Prevents dismissing of toast on hover
                        }).showToast();
          }else{
               $.ajax({
            url:'retur/post',
            type:'POST',
            data:{
                id_member:id_member,
                key:key,
                customer:customer
            },success:function(data){
                
                console.log(data);
                
                if(data==200){
                   getDataScan(id_member);
                   $("#key").val('').focus();
                                      
                  var x = document.getElementById("suara2");
                     x.play();
                }else{
                    
                    $(".alert").show()
                     $("#pesan").text(data);
                     var x = document.getElementById("suara");
                     x.play();
                     
                     $("#key").val('').focus();
                     
                }
                
                
               
                console.log(data);
                
            }
        })
          }
        
         
        
    });
    
    
    
    function hapusData(x,y,z){
        
        var result = confirm("Apakah Anda Akan Hapus barcode "+y+" ekspedisi " + z +" ?");
        if (result) {
             $.ajax({
                    url:'retur/delete',
                    type:'POST',
                    data:{
                        id_member:id_member,
                        id:x
                    },success:function(data){
                        
                          getDataScan(id_member);
                           $("#key").val('').focus();
             
                        console.log(data);
                        
                    }
                })
        }

       
    }
    

     
     
    function getDataScan(x){
       
        
        $.ajax({
            url:'retur/get',
            type:'POST',
            data:{
                id_member:x,
            },success:function(data){
                $("#dataScan").html(data);
                $('.tabza').dataTable({
                    "order": []
                });
            }
        })
        
        
    }
</script>