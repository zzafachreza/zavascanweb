<div class="container" style="padding-top:2%">
<audio id="suara">
  <source  src="https://zavalabs.com/salah.mp3" type="audio/mp3">
</audio>
      <div class="form-group">
        <label for="exampleInputEmail1">Scan Barcode disini :</label>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none">
            <span id="pesan"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <input id="id_member" value="<?php echo $_SESSION['id'] ?>" type="hidden" />
        <input type="text" class="form-control" id="key" placeholder="Masukan barcode anda" autofocus="autofocus" autocomplete="off">
        <small class="form-text" style="color:red">Dibawah merupakan 5 resi yang terakhir di scan</small>
      </div>
      
      <div id="dataScan">
          
      </div>
</div>

<script>

     var id_member = $("#id_member").val();
getDataScan(id_member);

    $("#key").change(function(){
       
        
        var key = $(this).val();
        var id_member = $("#id_member").val();
        
          $.ajax({
            url:'scan/post',
            type:'POST',
            data:{
                id_member:id_member,
                key:key
            },success:function(data){
                
                console.log(data);
                
                if(data==200){
                   getDataScan(id_member);
                   $("#key").val('').focus();
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
        
    });
    
    
    
    function hapusData(x,y,z){
        
        var result = confirm("Apakah Anda Akan Hapus barcode "+y+" ekspedisi " + z +" ?");
        if (result) {
             $.ajax({
                    url:'scan/delete',
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
            url:'scan/get',
            type:'POST',
            data:{
                id_member:x,
            },success:function(data){
                $("#dataScan").html(data);
            }
        })
        
        
    }
</script>