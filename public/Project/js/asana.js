$('#issue_button').on('click','#issue',function(){

  $('#issueModal2').modal('show');



});


$('#issueModal2').on('click','#submit_issue',function(e){

  e.preventDefault();
  var name = encodeURI($('#name').val());
  var type = encodeURI($('#type').val());
  var body = encodeURI($('#issueModal2 #description').val());
  $('<span style="font-size:25px;color:#2980B9;" id="gear" class="fa fa-cog fa-spin remodelGreen"></span>').appendTo('#alertMessage');
  $.ajax({
    url:"../../ajax/new-task-to-project.php?name="+name+"&type="+type+"&body="+body,
    success:function(table){
      $('#alertMessage').empty();
      $('<div id="alert" style="background-color:#2ECC71;color:#fff;" class="btn main-btn pull-left" role="alert">Success! <span class="fui-check"></span></div>').appendTo('#alertMessage');
      setTimeout(function() {
        $('#alertMessage').empty();
        $('#name, #description').val('');
        $('#type').val('Select request type');
      }, 3000 );
      console.log("task added son!" +table);
    }
  });

});
