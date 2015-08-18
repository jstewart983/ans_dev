<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../css/demo.css">
		<link rel="stylesheet" type="text/css" href="../../css/razorflow.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/navbar.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<!--<link rel="stylesheet" href="../../libraries/css-toggle/css/base.css">-->
		<link rel="stylesheet" href="../../libraries/css-toggle/css/style.css">

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
		<link rel="stylesheet" href="../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<script type="text/javascript" src="../../libraries/css-toggle/js/html5shiv.min.js"></script>

		<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js"></script>


		<script type="text/javascript">
window.heap=window.heap||[],heap.load=function(t,e){window.heap.appid=t,window.heap.config=e;var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=("https:"===document.location.protocol?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+t+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(t){return function(){heap.push([t].concat(Array.prototype.slice.call(arguments,0)))}},p=["clearEventProperties","identify","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
heap.load("3593988708");
</script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>


		<script type="text/javascript" src="../../js/Chart.js"></script>
		<script type="text/javascript" src="../../js/legend.js"></script>
		<script type="text/javascript" src="../../js/oneUp.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker-bs3.css" />
		<script>$('.navmenu').offcanvas()</script>
		<style media="screen">
			.legend{
				display: inline-block !important;
				width:100% !important;
			}
			.title{
				display: inline-block !important;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 style="text-align:center;">Ticket Count by # of Days Open</h3>
				</div>
			</div>
			<div id="chart" class="row">
				<div class="col-md-12">
					<canvas  id="canvas" width="700" height="200"></canvas>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-4">
					<div id="legend">

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="table">

					</div>
				</div>
			</div>
		</div>

		<script>
    var members = [];
		var label = [];
		var lessSevenAr = [];
		var sevenToFourteenAr = [];
		var fourteenToThirtyAr = [];
		 var greaterThirtyAr = [];
			//console.log(members);
		function searchArray(value, myArray){
    for (var i=0; i < myArray.length; i++) {
        if (myArray[i].member.toString() === value.toString()) {
            return i;
        }
    }
};
    $.ajax({
      type:'GET',
      url:'../../ajax/fieldservices/getTicketsAssigned.php',
      success:function(json){
						//console.log(json.length);
						//console.log(members[0].member);
						//console.log(members[1].member);

						console.log(searchArray('hey',members));

        for(var i =0;i<json.length;i++){



					if(searchArray(json[i]['resourceList'],members) > -1){

						if(json[i]['daysOpen'] <= 7){
						members[searchArray(json[i]['resourceList'],members)].lessSeven += json[i]['daysOpenCount'];
					}else if(json[i]['daysOpen'] > 7 && json[i]['daysOpen'] <= 14){
						members[searchArray(json[i]['resourceList'],members)].sevenToFourteen += json[i]['daysOpenCount'];
					}	else if(json[i]['daysOpen'] > 14 && json[i]['daysOpen'] <= 30){
						members[searchArray(json[i]['resourceList'],members)].fourteenToThirty += json[i]['daysOpenCount'];
					}else{
						members[searchArray(json[i]['resourceList'],members)].greaterThirty += json[i]['daysOpenCount'];
					}
					}else{

							members.push({
								'member':json[i]['resourceList'].toString(),
								'lessSeven':0,
								'sevenToFourteen':0,
								'fourteenToThirty':0,
								'greaterThirty':0,
							});


					}//end
				}
					  console.log(members);


					for(var i = 0;i<members.length;i++){

						label.push(members[i].member.toString());
						lessSevenAr.push(members[i].lessSeven);
						sevenToFourteenAr.push(members[i].sevenToFourteen);
						fourteenToThirtyAr.push(members[i].fourteenToThirty);
						 greaterThirtyAr.push(members[i].greaterThirty);
					}
					console.log(label);
						console.log(lessSevenAr);
							console.log(sevenToFourteenAr);
								console.log(fourteenToThirtyAr);
									console.log(greaterThirtyAr);

									function legend2(parent, data) {
									    parent.className = 'legend';
									    var datas = data.hasOwnProperty('datasets') ? data.datasets : data;

									    // remove possible children of the parent
									    while(parent.hasChildNodes()) {
									        parent.removeChild(parent.lastChild);
									    }

									    datas.forEach(function(d) {
									        var title = document.createElement('span');
									        title.className = 'title';
									        parent.appendChild(title);

									        var colorSample = document.createElement('div');
									        colorSample.className = 'color-sample';
									        colorSample.style.backgroundColor = d.hasOwnProperty('highlightFill') ? d.highlightFill : d.color;
									        colorSample.style.borderColor = d.hasOwnProperty('fillColor') ? d.fillColor : d.color;
									        title.appendChild(colorSample);

									        var text = document.createTextNode(d.title);

									        title.appendChild(text);

									    });
									}


									var ChartData = {
										labels : label,
							datasets : [{fillColor :"rgba(43,179,59,0.7)",highlightFill : "rgba(43,179,59,1)",pointColor : "rgba(52,152,219,1)",markerShape :"circle",pointStrokeColor : "rgba(43,179,59,1)",
								data : lessSevenAr,title:"<7"},
							{fillColor :"rgba(237,255,41,0.7)",highlightFill : "rgba(237,255,41,1)",pointColor : "rgba(46,204,113,1)",markerShape :"circle",pointStrokeColor : "rgba(255,255,255,1.00)",
								data : sevenToFourteenAr,title:"7-14"},
							{fillColor :"rgba(224,112,47,0.7)",highlightFill : "rgba(224,112,47,1)",pointColor : "rgba(155,89,182,1)",markerShape :"circle",pointStrokeColor : "rgba(255,255,255,1.00)",
								data : fourteenToThirtyAr,title:"14-30"},
							{fillColor :"rgba(242,53,53,0.7)",highlightFill : "rgba(242,53,53,1)",pointColor : "rgba(241,196,15,1)",markerShape :"circle",pointStrokeColor : "rgba(255,255,255,1)",
								data :greaterThirtyAr,title:">30"},
							]};
							var ctx = document.getElementById('canvas').getContext('2d');
							var chart = new Chart(ctx).Bar(ChartData);
							legend2(document.getElementById("legend"), ChartData,chart);

							$("#chart").on('click','#canvas',function(e) {
								//clearInterval(ticketsClosedByMemberID);
								 var activeBars = chart.getBarsAtEvent(e);
									//$('#basicModal2').modal('show');
								 //$('#basicModal2').find(".modal-title").text(activeBars[0].label);

								 $.ajax({
	 					      type:'GET',
	 					      url:'../../ajax/fieldservices/getTicketsAssigned.php?member='+activeBars[0].label,
	 					      success:function(table){
										$('#table').empty();
										$('#table').append(table);

									}
								});
							});
      }
    });




 </script></body></html>
