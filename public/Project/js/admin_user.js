
//$(document).ready(function(){

  $('#clientTable').on('click','span.btn-success', function(){
    var user = jQuery(this).attr('id');
    var flag = 0;
    $.ajax({
      type:"POST",
      url:"../../ajax/active.php?flag="+flag+"&user="+user,
      success:function(){
        $('#'+user).replaceWith("<span id='"+user+"' href='#' style='margin:5px;text-align:center;'class='btn btn-xs btn-danger'>no</span>");
      }
    });

  });
    $('#clientTable').on('click','span.btn-danger', function(){
    var user = jQuery(this).attr('id');
    var flag = 1;
    $.ajax({
      type:"POST",
      url:"../../ajax/active.php?flag="+flag+"&user="+user,
      success:function(){
        $('#'+user).replaceWith("<span id='"+user+"' href='#' style='margin:5px;text-align:center;'class='btn btn-xs btn-success'>yes</span>");
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

























//});
