  <script>
      $('#site_id').on('change',function(){
      var siteID = $(this).val();    
      if(siteID){
          $.ajax({
             type:"GET",
             url:"{{url('facility/get-region-list')}}?site_id="+siteID,
             success:function(res){ 
             // console.log(res);           
              if(res){
                  $("#region_code").empty();
                  $("#region_code").html("<option disabled selected>Choose your Region</option>");
                  $.each(res,function(key,value){
                      //console.log(key,value);
                      $('#region_code').html();
                      $("#region_code").append('<option value="'+key+'">'+value+'</option>');
                   });
             
              }else{
                 $("#region_code").empty();
              }
             }
          });
      }
      else{
          $("#region_code").empty();
          $("#province_code").empty();
      }   

     });

      $('#region_code').on('change',function(){
      var regionID = $(this).val();    
      if(regionID){
          $.ajax({
             type:"GET",
             url:"{{url('facility/get-province-list')}}?region_id="+regionID,
             success:function(res){            
              if(res){
                // console.log(res);
                  $("#province_code").empty();
                  $("#province_code").append("<option disabled selected>Choose your Province</option>");
                  $.each(res,function(key,value){
                      $('#province_code').html();
                      $("#province_code").append('<option value="'+key+'">'+value+'</option>');
                  });
             
              }else{
                 $("#province_code").empty();
              }
             }
          });
      }
      else{
          $("#province_code").empty();
          $("#muncity_code").empty();
      }   

     });

          $('#province_code').on('change',function(){
            var provinceID = $(this).val();    
            if(provinceID){
                $.ajax({
                   type:"GET",
                   url:"{{url('facility/get-muncity-list')}}?province_id="+provinceID,
                   success:function(res){               
                    if(res){
                        $("#muncity_code").empty();
                        $("#muncity_code").append('<option disabled selected>Choose your Municipality</option>');
                        $.each(res,function(key,value){
                            $('#muncity_code').html();
                            $("#muncity_code").append('<option value="'+key+'">'+value+'</option>');
                        });
                   
                    }else{
                       $("#muncity_code").empty();
                    }
                   }
                });
            }
            else{
                $("#muncity_code").empty();
            }     
           });

      $('#muncity_code').on('change',function(){
      var muncityID = $(this).val();    
      if(muncityID){
          $.ajax({
             type:"GET",
             url:"{{url('facility/get-brgy-list')}}?muncity_id="+muncityID,
             success:function(res){             
              if(res){
                  $("#brgy_code").empty();
                  $("#brgy_code").append('<option disabled selected>Choose your Barangay</option>');
                  $.each(res,function(key,value){
                      $('#brgy_code').html();
                      $("#brgy_code").append('<option value="'+key+'">'+value+'</option>');
                  });
             
              }else{
                 $("#brgy_code").empty();
              }
             }
          });
      }
      // else{
      //     $("#brgy_code").empty();
      // }     
     });

  </script>