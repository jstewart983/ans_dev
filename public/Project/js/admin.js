
function getUsersLoggedIn(){

  $.ajax({
  type: 'GET',
  url: "../../ajax/getUsersLoggedIn.php",

  success: function(json) {

              logged_in = [];
      for(var i = 0; i < json.length; i++) {

      logged_in.push (json[i]["users_in"]);
  }

      var users_logged_in = parseInt($('#usersLoggedIn').text());

      console.log(users_logged_in);
      if(parseInt(logged_in) !== users_logged_in){

        $('#usersLoggedIn').fadeOut(500, function() {
        if(parseInt(logged_in) == 1){
          var $span1 = $('<span style="text-align:center;" id="usersLoggedIn">'+logged_in+' User Logged in</span>');

        }else{
          var $span1 = $('<span style="text-align:center;" id="usersLoggedIn">'+logged_in+' Users Logged in</span>');

        }
       var $span1 = $('<span style="text-align:center;" id="usersLoggedIn">'+logged_in+' Users Logged in</span>');
       //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
       $("#usersLoggedIn").replaceWith($span1);
       //$("#openProjects").replaceWith($span2);
       $span1.fadeIn(1200);

   });
      }



  }

});

}


function getUserCount(){

  $.ajax({
  type: 'GET',
  url: "../../ajax/getUserCount.php",
  success: function(json) {

              users = [];
      for(var i = 0; i < json.length; i++) {

      users.push (json[i]["users_count"]);

  }

        $('#userCount').fadeOut(500, function() {
          if(users == 1){

          }
       var $span1 = $('<span style="text-align:center;" id="usersCount">'+users+' Total Users</span>');
       //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
       $("#userCount").replaceWith($span1);
       //$("#openProjects").replaceWith($span2);
       $span1.fadeIn(1200);

   });


  }

});

}






$(document).ready(function(){
  var check = 0;
  var $userid = 0;
  var ajaxcounter = 0;
  $('#userView').on('click','span.yes', function(){
    var user = jQuery(this).attr('id');
    var flag = 0;
    $.ajax({
      type:"POST",
      url:"../../ajax/active.php?flag="+flag+"&user="+user,
      success:function(){
        $('#'+user).replaceWith("<span id='"+user+"' href='#' style='margin:5px;text-align:center;'class='btn btn-xs btn-danger no'>no</span>");
      }
    });

  });
    $('#userView').on('click','span.no', function(){
    var user = jQuery(this).attr('id');
    var flag = 1;
    $.ajax({
      type:"POST",
      url:"../../ajax/active.php?flag="+flag+"&user="+user,
      success:function(){
        $('#'+user).replaceWith("<span id='"+user+"' href='#' style='margin:5px;text-align:center;'class='btn btn-xs btn-success yes'>yes</span>");
      }
    });

  });




$('#userView').on('click','#backTable',function(){

  $('#userDetail').addClass('hidden');
  $('#userTable').removeClass('hidden');
  $.ajax({
    url:"../../ajax/getTotalUsersTable.php",
    success:function(table){
    //$('#options').fadeOut(500, function() {


    $("#userTable").replaceWith(table);
    //$span1.fadeIn(1200);

      //});
    }
  });

});


var $table = $('table'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;

// Get the tbody columns width array
colWidth = $bodyCells.map(function() {
    return $(this).width();
}).get();

// Set the width of thead columns
$table.find('thead tr').children().each(function(i, v) {
    $(v).width(colWidth[i]);
});













  /*getUserCount();
  getUsersLoggedIn();
  setInterval(function() {
    getUsersLoggedIn();
}, 3000);*/
// Change the selector if needed
var $table = $('table'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;

// Get the tbody columns width array
colWidth = $bodyCells.map(function() {
    return $(this).width();
}).get();

// Set the width of thead columns
$table.find('thead tr').children().each(function(i, v) {
    $(v).width(colWidth[i]);
});

  //$('#loading').html('<img style="display:block;margin-left:auto;margin-right:auto;" src="../../../css/assets/spiffygif_148x148.gif"> <h4 style="text-align:center;">Loading CW DB Structure...</h4>');
    /*$.ajax({
      url: "../../../ajax/dbStructure.php",
      context: document.body,
      success: function(html){
        $('#loading').fadeOut();
        $("#clientTable").append(html);
  }
});*/

$('#activeSwitch').click( function(){
  $user = $(this).attr('value');
  $flag = 0
  $.ajax({
    type:"POST",
    url:"../../ajax/active.php?flag="+$flag+"&user="+$user,
    success:function(){
      $(this).replaceWith("<span id='inactiveSwitch' value='"+$user+"' href='#' style='margin:5px;text-align:center;'class='btn btn-xs btn-danger'>no</span>");
    }
  });

});

$("#getUserCount").click( function(e)
{
  e.preventDefault();

    $.ajax({
      url:"../../ajax/getTotalUsersTable.php",
      success:function(table){

      //$('#options').fadeOut(500, function() {

        var $span1 = $('<div id="options">'+table+'</div>');
        $("#options").replaceWith($span1);
        //$span1.fadeIn(1200);

      //});

    }

  });
});


$("#getUsersLoggedIn").click( function(e)
{
  e.preventDefault();

  $.ajax({
    url:"../../ajax/getUsersLoggedInTable.php",
    success:function(table){

    //$('#options').fadeOut(500, function() {

    var $span1 = $('<div id="options">'+table+'</div>');
    $("#options").replaceWith($span1);
    //$span1.fadeIn(1200);

      //});

    }

  });
});





$("#usermanagement").click( function(e)
{
  e.preventDefault();

  $.ajax({
    type:"GET",
    url:"../../ajax/checkPermissions.php",
    success:function(answer){
      check = answer;
      check = parseInt(check);
      console.log("check "+ check);
      if(check>0){
        $.ajax({
          url:"../../ajax/getTotalUsersTable.php",
          success:function(table){
          //$('#options').fadeOut(500, function() {
          var $span1 = $('<div id="options">'+table+'</div>');
          $('#options').addClass('hidden');
          $("#userView").append(table);
          //$span1.fadeIn(1200);

            //});
          }
        });
      }else{
        $('#message').append("<a style='margin-left:45%;' href='#' class='btn btn-xs btn-danger'>Cant do that...sorry</a>");
        setTimeout(function(){
          $('#message').empty();
        },3000);
      }
    }
  });
  console.log(check);


});

$('#userView').on('click','span.edit',function(){
  ajaxcounter = 0;
  $('#userTable').addClass('hidden');
  $('#userDetail').removeClass('hidden');
  $('#userName').empty();

  var permissions = [];
      $userid =0;
      $userid = jQuery(this).attr('id');
  var full_name = jQuery(this).attr('full_name');
  $('#userName').append(full_name);
  console.log(full_name);
  var user_name = jQuery(this).attr('user_name');
    console.log(user_name);
  var user_email = jQuery(this).attr('user_email');
    console.log(user_email);

  $('#full_name').val(full_name);
  $('#user_name').val(user_name);
  $('#user_email').val(user_email);
   $.ajax({
     type:"GET",
     url:"../../ajax/getAssignedPermissions.php?user="+$userid,
     success:function(json1){

       $('#left').empty();
       for(var i = 0; i < json1.length; i++){
         $('#left').append('<span permissionid="'+json1[i]['user_group_id']+'"  href="#" style="margin:5px;text-align:center;"class="btn btn-xs btn-success">'+json1[i]['user_group_name']+'</span>');
         permissions.push(json1[i]['user_group_name']);
       }
       if(permissions.length == 0){
         $('#left').append('<h1 style="text-align:center;opacity:.1;" id="gotNone">Aint Got None</h1>');
       }

       $.ajax({
         type:"GET",
         url:"../../ajax/getPermissions.php",
         success:function(json2){
           console.log(json2);
          $('#right').empty();
           for(var i = 0; i < json2.length; i++){
             //alert(jQuery.inArray(json2[i]['user_group_name'], json1[i]));
             if(jQuery.inArray(json2[i]['user_group_name'],permissions) == -1){
               $('#right').append('<span permissionid="'+json2[i]['user_group_id']+'" href="#" style="margin:5px;text-align:center;"class="btn btn-xs btn-default">'+json2[i]['user_group_name']+'</span>');

             }
           }

         }
       });
     }
   });

      //add a new style 'foo'




$("#addUser").click( function(e)
  {
  e.preventDefault();
  $.ajax({
    url:"../../ajax/addUserForm.php",
    success:function(table){
      $('#options').fadeOut(500, function() {

       var $span1 = $('<div id="options">'+table+'</div>');
       $("#options").replaceWith($span1);
        $span1.fadeIn(1200);

    });

  }

});
});


$('#issue_button').on('click','#issue',function(){

  $('#issueModal2').modal('show');



});


$('#issueModal2').on('click','#submit_issue',function(e){

  e.preventDefault();
  var name = encodeURI($('#name').val());
  var type = encodeURI($('#type').val());
  var body = encodeURI($('#description').val());
  $('<span style="font-size:25px;color:#2980B9;" id="gear" class="fa fa-cog fa-spin remodelGreen"></span>').appendTo('#alertMessage');
  $.ajax({
    url:"../../../ajax/new-task-to-project.php?name="+name+"&type="+type+"&body="+body,
    success:function(table){
      $('#alertMessage').empty();
      $('<div id="alert" style="background-color:#2ECC71;color:#fff;" class="btn main-btn pull-left" role="alert">Success! <span class="fui-check"></span></div>').appendTo('#alertMessage');
      setTimeout(function() {
        $('#alertMessage').empty();
        $('#name, #description').val('');
        $('#type').val('Select request type');
      }, 3000 );
      console.log("task added son!");
    }
  });

});

//$('#search').livefilter({selector:'tbody tr'});

    $('#clientTable').on('click','tr.co',function(e){
       e.preventDefault();

        var clickedVal = jQuery("#company" ,this).text();
        console.log(clickedVal);

        $('#basicModal1').modal('show');
        $('#myModalLabel').text(clickedVal);

    });

    dragula([document.querySelector('#left'), document.querySelector('#right')]).on('drag',function(el){

    }).on('drop',function(el){
      ajaxcounter=0;
      if( ajaxcounter<1){
      $.ajax({
        type:"GET",
        url:"../../ajax/checkPermissions.php?user="+$userid,
        success:function(answer){
          if(answer == 0){
            //$.notify("You cant do that","error");
          }else{
            setTimeout(function(){
              if($(el).parent().attr('id') == 'left' ){
                $('#gotNone').remove();
                var $permission = $(el).attr('permissionID');
              console.log( ajaxcounter);
                if( ajaxcounter<1){
                $.ajax({
                  type:"GET",
                  url:"../../ajax/setPermissions.php?user="+$userid+"&permission="+$permission+"&delete=false",
                  success:function(stuff){

                    console.log(stuff);
                    el.className = 'btn btn-xs btn-success';
                  }
                });
              }
               ajaxcounter++;

              }else{
                var $permission = $(el).attr('permissionID');
                console.log( ajaxcounter);
                if( ajaxcounter<1){


                $.ajax({
                  type:"POST",
                  url:"../../ajax/setPermissions.php?user="+$userid+"&permission="+$permission+"&delete=true",
                  success:function(stuff){

                    console.log(stuff);
                    el.className = 'btn btn-xs btn-default';
                  }
                });
              }
               ajaxcounter++;
              }

            },0);

          }
        }

      });

    }
    });



});


});
