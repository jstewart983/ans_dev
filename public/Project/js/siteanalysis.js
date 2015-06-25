function getLocations(dates){

  $.ajax({
    type:"GET",
    url:"../../ajax/servicedelivery/getLocations.php?"+dates,
    success:function(table){

     $("#locationsTable").empty();
     $("#locationsTable").append(table);
    }
  });
}

function getTicketsSite(dates,site){


  $.ajax({
    type:"GET",
    url:"../../ajax/servicedelivery/getTicketsSite.php?"+dates+"&site="+site,
    success:function(table){

      var data= [];

      //data.push(table[0]['sr_service_recid'].toString(),table[0]['sr_service_recid'].toString(),table[0]['sr_service_recid'].toString(),table[0]['sr_service_recid'].toString(),table[0]['sr_service_recid'].toString(),table[0]['sr_service_recid'].toString(),table[0]['sr_service_recid'].toString(),table[0]['sr_service_recid'].toString());


      var realdata = [data];
        console.log(table);
        $('#basicModal3').modal('show');
        if(typeof grid === 'undefined'){
          grid = $('#results').dataTable({

            data:table

        });
      }else{
        grid.fnClearTable();
        grid.fnAddData(table);
      }


      }

     //var $span1 = $('<div id ="locationsTable">'+table+'</div>');
     //$('#results').empty();
     //$("#results").append("<h4 style='text-align:center;'>Tickets - "+site+" <a id='up' class='btn btn-xs btn-warning'><span class='fa fa-long-arrow-up'></span></a></h4>"+table);

  });
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

  function checkCookie() {
      //var tour=getCookie("tour");
      var x = document.cookie;
      if (x == "tour=true") {

        document.cookie = "tour=false";
        var tour1 = {
             id: "hello-hopscotch",
             steps: [
               {
                 title: "Welcome to Results Site Analysis Tool",
                 content: "The purpose of this tool is to assist in the identification of chronic or recurring issues on a site by site basis. Continue the tour for more tips.",
                 target: "#locationsTable",
                 placement: "top",
                 xOffset: 'center',
                 width:'800px'
               },
               {
                 title: "Problematic Tickets",
                 content: "This button, when clicked, will display a window with problematic tickets that are currently open (ticket summary containing '!Problematic')",
                 target: '#chronicTickets',
                 placement: "bottom"
               },
               {
                 title: "Date Range Selector",
                 content: "Click in this text field to display a calendar. Select a start date and an end date and then press apply to update the table below.",
                 target: '#daterange4',
                 placement: "right",
                 width:'200px'
               },
               {
                 title: "Hours by Site",
                 content: "This side of the table displays actual hours by site. The tickets have to be one of the following service types: Hardware, Internet, Monitoring Alerts, Network, Phone/Fax, Printer, Wireless, or Workstation.",
                 target: '#hours',
                 placement: "right",
                 width:'200px'
               },
               {
                 title: "Tickets Opened by Site",
                 content: "This side of the table displays the number of tickets opened by site. The tickets have to be one of the following service types: Hardware, Internet, Monitoring Alerts, Network, Phone/Fax, Printer, Wireless, or Workstation.",
                 target: '#tickets',
                 placement: "left",
                 width:'200px'
               }
             ]
           };

           hopscotch.startTour(tour1);
      }
  }

$(document).ready(function(){


    checkCookie();

  var grid;
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
          $('#myModalLabel3').empty();
         $('#myModalLabel3').text(site);

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
         $('#myModalLabel3').empty();
        $('#myModalLabel3').text(site);
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
