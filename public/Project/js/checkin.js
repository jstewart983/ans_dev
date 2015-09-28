$(":input").keypress(function(event){
    if (event.which == '10' || event.which == '13') {
        event.preventDefault();
        var member = $( "#memberOptions option:selected" ).val().toString();
        var company = $( "#client2 option:selected" ).attr('name');
        var bar_code = $('#barcode').val();
        var in_out = $( "#in_out option:selected" ).val();

        if(member == "All"){
          $('#server_message').empty();
        $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="">You need to select your ID</button>');
        $('#server_message').removeClass('hidden');
        $('#memberOptions').attr('class','has-error form-control');
          setTimeout(function(){ $('#server_message').addClass('hidden');   $('#memberOptions').attr('class','form-control');}, 2000);
        }else if(company == "one"){
          $('#server_message').empty();
        $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="">You need to select a company</button>');
        $('#server_message').removeClass('hidden');
        $('#client2').attr('class','has-error form-control');
          setTimeout(function(){ $('#server_message').addClass('hidden');   $('#client2').attr('class','form-control');}, 2000);
        }else if(in_out=="none"){
          $('#server_message').empty();
        $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="">You need to select in or out</button>');
        $('#server_message').removeClass('hidden');
        $('#in_out').attr('class','has-error form-control');
          setTimeout(function(){ $('#server_message').addClass('hidden');   $('#in_out').attr('class','form-control');}, 2000);
        }else if(bar_code==""){
          $('#server_message').empty();
        $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="">You need to scan a #</button>');
        $('#server_message').removeClass('hidden');
        $('#barcode').attr('class','has-error form-control');
          setTimeout(function(){ $('#server_message').addClass('hidden');   $('#barcode').attr('class','form-control');}, 2000);
        }
        else{


          console.log(member);
          console.log(company);
          console.log(bar_code);
          console.log(in_out);

          if(in_out == "0"){


            $.ajax({
              url:"../../ajax/checkItem.php?bar_code="+bar_code,
              success:function(res){
                console.log(res);
                res = parseInt(res);
                if (res == 1) {
                  $.ajax({
                    url:"../../ajax/newItem.php?member="+member+"&company="+company+"&in_out="+in_out+"&bar_code="+bar_code,
                    success:function(json){
                      $('#server_message').empty();
                      $('#server_message').append('<button style="text-align:center;" class="btn btn-success" type="button" id="check_in" name="check_in" value="Done">Success</button>');
                      $('#server_message').removeClass('hidden');
                      $('#in_out').attr('class','has-success form-control');
                      $('#barcode').attr('class','has-success form-control');
                      $('#client2').attr('class','has-success form-control');
                      $('#memberOptions').attr('class','has-success form-control');
                        setTimeout(function(){ $('#server_message').addClass('hidden');   $('#memberOptions').attr('class','form-control');}, 2000);
                        setTimeout(function(){ $('#server_message').addClass('hidden');   $('#barcode').attr('class','form-control');}, 2000);
                          setTimeout(function(){ $('#server_message').addClass('hidden');   $('#in_out').attr('class','form-control');}, 2000);
                          setTimeout(function(){ $('#server_message').addClass('hidden');   $('#client2').attr('class','form-control');}, 2000);
                      $('#barcode').val('');
                        setTimeout(function(){ $('#server_message').addClass('hidden'); }, 2000);
                      $.ajax({

                      url: "../../ajax/items.php",
                      context: document.body,
                      success: function(html){
                      $('#item_table').empty();
                      $("#item_table").append(html);

                      }

                      });

                    }
                  });
                }else{
                  $('#server_message').empty();
                $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="Done">Item Not Found</button>');
                $('#server_message').removeClass('hidden');
                  setTimeout(function(){ $('#server_message').addClass('hidden'); }, 2000);
                }

              }
            });


          }else{


            $.ajax({
              url:"../../ajax/newItem.php?member="+member+"&company="+company+"&in_out="+in_out+"&bar_code="+bar_code,
              success:function(json){
                $('#server_message').empty();
                $('#server_message').append('<button style="text-align:center;" class="btn btn-success" type="button" id="check_in" name="check_in" value="Done">Success</button>');
                $('#server_message').removeClass('hidden');
                $('#in_out').attr('class','has-success form-control');
                $('#barcode').attr('class','has-success form-control');
                $('#client2').attr('class','has-success form-control');
                $('#memberOptions').attr('class','has-success form-control');
                  setTimeout(function(){ $('#server_message').addClass('hidden');   $('#memberOptions').attr('class','form-control');}, 2000);
                  setTimeout(function(){ $('#server_message').addClass('hidden');   $('#barcode').attr('class','form-control');}, 2000);
                    setTimeout(function(){ $('#server_message').addClass('hidden');   $('#in_out').attr('class','form-control');}, 2000);
                    setTimeout(function(){ $('#server_message').addClass('hidden');   $('#client2').attr('class','form-control');}, 2000);
                $('#barcode').val('');
                  setTimeout(function(){ $('#server_message').addClass('hidden'); }, 2000);


                $.ajax({

                url: "../../ajax/items.php",
                context: document.body,
                success: function(html){
                $('#item_table').empty();
                $("#item_table").append(html);

                }

                });


              }
            });



          }


        }
    }
});

$.ajax({
  url: "../../ajax/clientservices/getClientList2.php",
                context: document.body,
                success: function(html){
                 $("#client2").append(html);
                }
});

$.ajax({

url: "../../ajax/getMembers.php",
context: document.body,
success: function(html){
$("#memberOptions").append(html);

}

});
$.ajax({

url: "../../ajax/items.php",
context: document.body,
success: function(html){
$('#item_table').empty();
$("#item_table").append(html);

}

});

  var text = "";
$('#po_section #po').on('keyup',function(){
  var po = $('#po').val();

  $.ajax({
    url:"../../ajax/searchPO.php?po="+po,
    success:function(json){
      console.log(json['company']);
      $('#po_section #po_results').val(json['company']);
        if (json['company'] == "no results") {
          console.log("true");
            $('#po_section #po_results').attr('class','search-error form-control');
        }else if(json['company'] !== "no results"){
          console.log("found result!");
            $('#po_section #po_results').attr('class','search-success form-control');
        }








    }
  });

});

$('#form').on('submit',function(){




});


$('#form #check_in').on('click',function(){
  var member = $( "#memberOptions option:selected" ).val().toString();
  var company = $( "#client2 option:selected" ).attr('name');
  var bar_code = $('#barcode').val();
  var in_out = $( "#in_out option:selected" ).val();

  if(member == "All"){
    $('#server_message').empty();
  $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="">You need to select your ID</button>');
  $('#server_message').removeClass('hidden');
  $('#memberOptions').attr('class','has-error form-control');
    setTimeout(function(){ $('#server_message').addClass('hidden');   $('#memberOptions').attr('class','form-control');}, 2000);
  }else if(company == "one"){
    $('#server_message').empty();
  $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="">You need to select a company</button>');
  $('#server_message').removeClass('hidden');
  $('#client2').attr('class','has-error form-control');
    setTimeout(function(){ $('#server_message').addClass('hidden');   $('#client2').attr('class','form-control');}, 2000);
  }else if(in_out=="none"){
    $('#server_message').empty();
  $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="">You need to select in or out</button>');
  $('#server_message').removeClass('hidden');
  $('#in_out').attr('class','has-error form-control');
    setTimeout(function(){ $('#server_message').addClass('hidden');   $('#in_out').attr('class','form-control');}, 2000);
  }else if(bar_code==""){
    $('#server_message').empty();
  $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="">You need to scan a #</button>');
  $('#server_message').removeClass('hidden');
  $('#barcode').attr('class','has-error form-control');
    setTimeout(function(){ $('#server_message').addClass('hidden');   $('#barcode').attr('class','form-control');}, 2000);
  }
  else{


    console.log(member);
    console.log(company);
    console.log(bar_code);
    console.log(in_out);

    if(in_out == "0"){


      $.ajax({
        url:"../../ajax/checkItem.php?bar_code="+bar_code,
        success:function(res){
          console.log(res);
          res = parseInt(res);
          if (res == 1) {
            $.ajax({
              url:"../../ajax/newItem.php?member="+member+"&company="+company+"&in_out="+in_out+"&bar_code="+bar_code,
              success:function(json){
                $('#server_message').empty();
                $('#server_message').append('<button style="text-align:center;" class="btn btn-success" type="button" id="check_in" name="check_in" value="Done">Success</button>');
                $('#server_message').removeClass('hidden');
                $('#in_out').attr('class','has-success form-control');
                $('#barcode').attr('class','has-success form-control');
                $('#client2').attr('class','has-success form-control');
                $('#memberOptions').attr('class','has-success form-control');
                  setTimeout(function(){ $('#server_message').addClass('hidden');   $('#memberOptions').attr('class','form-control');}, 2000);
                  setTimeout(function(){ $('#server_message').addClass('hidden');   $('#barcode').attr('class','form-control');}, 2000);
                    setTimeout(function(){ $('#server_message').addClass('hidden');   $('#in_out').attr('class','form-control');}, 2000);
                    setTimeout(function(){ $('#server_message').addClass('hidden');   $('#client2').attr('class','form-control');}, 2000);
                $('#barcode').val('');
                  setTimeout(function(){ $('#server_message').addClass('hidden'); }, 2000);
                $.ajax({

                url: "../../ajax/items.php",
                context: document.body,
                success: function(html){
                $('#item_table').empty();
                $("#item_table").append(html);

                }

                });

              }
            });
          }else{
            $('#server_message').empty();
          $('#server_message').append('<button style="text-align:center;" class="btn btn-danger" type="button" id="check_in" name="check_in" value="Done">Item Not Found</button>');
          $('#server_message').removeClass('hidden');
            setTimeout(function(){ $('#server_message').addClass('hidden'); }, 2000);
          }

        }
      });


    }else{


      $.ajax({
        url:"../../ajax/newItem.php?member="+member+"&company="+company+"&in_out="+in_out+"&bar_code="+bar_code,
        success:function(json){
          $('#server_message').empty();
          $('#server_message').append('<button style="text-align:center;" class="btn btn-success" type="button" id="check_in" name="check_in" value="Done">Success</button>');
          $('#server_message').removeClass('hidden');
          $('#in_out').attr('class','has-success form-control');
          $('#barcode').attr('class','has-success form-control');
          $('#client2').attr('class','has-success form-control');
          $('#memberOptions').attr('class','has-success form-control');
            setTimeout(function(){ $('#server_message').addClass('hidden');   $('#memberOptions').attr('class','form-control');}, 2000);
            setTimeout(function(){ $('#server_message').addClass('hidden');   $('#barcode').attr('class','form-control');}, 2000);
              setTimeout(function(){ $('#server_message').addClass('hidden');   $('#in_out').attr('class','form-control');}, 2000);
              setTimeout(function(){ $('#server_message').addClass('hidden');   $('#client2').attr('class','form-control');}, 2000);
          $('#barcode').val('');
            setTimeout(function(){ $('#server_message').addClass('hidden'); }, 2000);


          $.ajax({

          url: "../../ajax/items.php",
          context: document.body,
          success: function(html){
          $('#item_table').empty();
          $("#item_table").append(html);

          }

          });


        }
      });



    }


  }





});
