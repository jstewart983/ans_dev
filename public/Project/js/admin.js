
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
  /*getUserCount();
  getUsersLoggedIn();
  setInterval(function() {
    getUsersLoggedIn();
}, 3000);*/


  $('#loading').html('<img style="display:block;margin-left:auto;margin-right:auto;" src="../../../css/assets/spiffygif_148x148.gif"> <h4 style="text-align:center;">Loading CW DB Structure...</h4>');
    $.ajax({
      url: "../../../ajax/dbStructure.php",
      context: document.body,
      success: function(html){
        $('#loading').fadeOut();
        $("#clientTable").append(html);
  }
});



$("#getUserCount").click( function(e)
{
  e.preventDefault();

    $.ajax({
      url:"../../ajax/getTotalUsersTable.php",
      success:function(table){

      $('#options').fadeOut(500, function() {

        var $span1 = $('<div id="options">'+table+'</div>');
        $("#options").replaceWith($span1);
        $span1.fadeIn(1200);

      });

    }

  });
});


$("#getUsersLoggedIn").click( function(e)
{
  e.preventDefault();

  $.ajax({
    url:"../../ajax/getUsersLoggedInTable.php",
    success:function(table){

    $('#options').fadeOut(500, function() {

    var $span1 = $('<div id="options">'+table+'</div>');
    $("#options").replaceWith($span1);
    $span1.fadeIn(1200);

      });

    }

  });
});

$("#usermanagement").click( function(e)
{
  e.preventDefault();
  $.ajax({
    url:"../../ajax/getTotalUsersTable.php",
    success:function(table){
    $('#options').fadeOut(500, function() {
    var $span1 = $('<div id="options">'+table+'</div>');
    $("#options").replaceWith($span1);
    $span1.fadeIn(1200);

      });
    }
  });
});

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

$('input').livefilter({selector:'tbody tr'});

    $('#clientTable').on('click','tr.co',function(e){
       e.preventDefault();

        var clickedVal = jQuery("#company" ,this).text();
        console.log(clickedVal);

        $('#basicModal1').modal('show');
        $('#myModalLabel').text(clickedVal);

    });

});
