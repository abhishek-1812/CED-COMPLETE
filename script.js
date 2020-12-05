$(document).ready(function(){
    //$('.bn').hide();
    var pick="Choose";
    var drop_point="Choose";
    var cabType="Choose";
    var lugRate=0;
    var eddata;
    var cldata;
    var savedata;
    var id;
    $("#pickup").change(function(){
        pick = $(this).val();
    });
    $("#drop").change(function(){
        drop_point = $(this).val();
    });
    $("#cab").change(function(){
        cabType = $(this).val();
  
        if(cabType == 'CedMicro'){
            $("#lug").val(' ');
            $("#lug").prop('disabled', true); 
            //alert("luggage is not allowed");
        } else {
            $("#lug").prop('disabled', false); 
        }
    });
    $("#b1").click(function(){
        //$('.bn').show();
        if (pick=="Choose"){
            alert("Please Enter Pickup Point");
            return false;
        }
        if (drop_point=="Choose"){
            alert("Please Enter Drop Point");
            return false;
        }
        if (cabType=="Choose"){
            alert("Please Select Cab");
            return false;
        }
        if (pick==drop_point){
            alert("Please Select Different Locations");
            return false;
        }
        lugRate = $('#lug').val();

        $.ajax({            
            type: "POST",
            url:  "farecal.php",          
            data:{
                pickUp:pick, drop:drop_point, cab:cabType, rate:lugRate
            },
            success: function(data) {
                $("#core").html(data);
            },
            error: function() {
              alert("Error");
            }
        });
       //$('.bn').show();
      });
      $(".ed").click(function(){
        eddata = $(this).data('eid');
      });
      $("#save").click(function(){
        savedata = $(this).data('edata');
        id = $(this).data('stat');
        alert(savedata);
      });
      $(".cl").click(function(){
        cldata = $(this).data('cid');
      });

});