function getLocations(dates){

  $.ajax({
    type:"GET",
    url:"../../ajax/servicedelivery/getLocations.php?"+dates,
    success:function(table){
     //var $span1 = $('<div id ="locationsTable">'+table+'</div>');
     $("#locationsTable").empty();
     $("#locationsTable").append("<h4 style='text-align:center;'>Results Physiotherapy Sites</h4>"+table);
    }
  });
}

function getTicketsSite(dates,site){

  $.ajax({
    type:"GET",
    url:"../../ajax/servicedelivery/getTicketsSite.php?"+dates+"&site="+site,
    success:function(table){
     //var $span1 = $('<div id ="locationsTable">'+table+'</div>');
     $('#results').empty();
     $("#results").append("<h4 style='text-align:center;'>Tickets - "+site+" <a id='up' class='btn btn-xs btn-warning'><span class='fa fa-long-arrow-up'></span></a></h4>"+table);
    }
  });
}

$(document).ready(function(){
  var dates = "";
      getLocations('');
      $('input[name="daterange4"]').daterangepicker();
      $('#daterange4').on('apply.daterangepicker', function(ev, picker) {
        var start = picker.startDate.format('YYYY-MM-DD');
        var end = picker.endDate.format('YYYY-MM-DD');
        dates = 'range1='+start+'&range2='+end;
        getLocations(dates);
      });
      
      $('#locationsTable').on('click','tr.co',function(){
      
         $('html, body').animate({
            scrollTop: $("#ticketResults").offset().top
          }, 2000);
          
          
        
         var site = $(this).attr('site');
         //clickedVal = encodeURIComponent(clickedVal);
        
         if(dates == ""){
           getTicketsSite('',site);
         }else{
           
           getTicketsSite(dates,site);
         }
         
         
      });
      
   $('#locationsTable').on('click','tr.co2',function(){
      
         $('html, body').animate({
            scrollTop: $("#ticketResults").offset().top
          }, 2000);
          $('#ticketResults').off();
          
        
         var site = $(this).attr('site');
         //clickedVal = encodeURIComponent(clickedVal);
         
         if(dates == ""){
           getTicketsSite('',site);
         }else{
           
           getTicketsSite(dates,site);
         }
         
         
      });
      
      $('#results').on('click','#up',function(){
        
          $('html, body').animate({
            scrollTop: $("#daterange4").offset().top
          }, 2000);
          
        
      });
      
     $('.container').on('click','#chronicTickets',function(e){
        
        e.preventDefault();
        $('#basicModal2').modal('show');
          $("#ticketsBody").empty();
          $.ajax({
            type:'GET',
            url:"../../ajax/servicedelivery/chronicTickets.php",
            success:function(table){
            $('#ticketsBody').append(table);
            }

          });
        
      });            
});