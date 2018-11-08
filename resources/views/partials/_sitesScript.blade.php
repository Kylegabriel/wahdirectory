  <script>
     //  $('#site').on('change',function(){
     //  var siteID = $(this).val();    
     //  if(siteID){
     //      $.ajax({
     //         type:"GET",
     //         url:"{{url('facility/get-region-list')}}?site_id="+siteID,
     //         success:function(res){         
     //          if(res){
     //              $("#region_code").empty();
     //              $("#region_code").html("<option disabled selected>Choose your Region</option>");
     //              $.each(res,function(key,value){
     //                  //console.log(key,value);
     //                  $('#region_code').html();
     //                  $("#region_code").append('<option value="'+key+'">'+value+'</option>');
     //               });
             
     //          }else{
     //             $("#region_code").empty();
     //          }
     //         }
     //      });
     //  }
     //  else{
     //      $("#region_code").empty();
     //      $("#province_code").empty();
     //  }   

     // });

     // $('#system_admin').change(function(e) {
     //    var colorID = $(this).val();
     //    // console.log(colorID);
     //    switch(colorID) {
     //          case "1":
     //              var e = document.getElementById("system_admin");
     //              var tex = e.options[e.selectedIndex].text;
     //              // var val = e.options[e.selectedIndex].value; 
     //              e.options[e.selectedIndex].style = "background-color:blue" ;    
     //              break;
     //          case "2":
     //              var e = document.getElementById("system_admin");
     //              e.options[e.selectedIndex].style.color = "green";
     //              break;
     //          case "3":
     //              var e = document.getElementById("system_admin");
     //              e.options[e.selectedIndex].style.color = "yellow";
     //              break;
     //          case "4":
     //              var e = document.getElementById("system_admin");
     //              e.options[e.selectedIndex].style.color = "purple";
     //              break;
     //          default:
     //                console.log(4);
     //      }
     // });

      $('#region_code').on('change',function(){
      // Get the region code select id value
      var regionID = $(this).val();    
      if(regionID){
          $.ajax({
             type:"GET",
             // route
             url:"{{url('facility/get-province-list')}}?region_id="+regionID,
             success:function(res){           
              if(res){
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

      $('#brgy_code').on('change',function(){
      var brgy_code = $(this).val();    
      if(brgy_code){
          $.ajax({
             type:"GET",
             url:"{{url('facility/get-hfhudcode-list')}}?brgy_code="+brgy_code,
             success:function(res){        
              if(res){
                  $("#hfhudcode").empty();
                  $("#hfhudcode").append('<option disabled selected>Choose your Barangay</option>');
                  $.each(res,function(key,value){
                      $('#hfhudcode').html();
                      $("#hfhudcode").append('<option value="'+key+'">'+value+'</option>');
                  });
             
              }else{
                 $("#hfhudcode").empty();
              }
             }
          });
      }
      else{
          $("#hfhudcode").empty();
      }     
     });

  </script>