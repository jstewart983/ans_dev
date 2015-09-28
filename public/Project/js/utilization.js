



function check_holiday (dt_date) {



// check simple dates (month/date - no leading zeroes)

var n_date = dt_date.getDate(),

n_month = dt_date.getMonth() + 1;

var s_date1 = n_month + '/' + n_date;



if (   s_date1 == '1/1'   // New Year's Day

|| s_date1 == '6/14'  // Flag Day

|| s_date1 == '7/4'   // Independence Day

|| s_date1 == '11/11' // Veterans Day

|| s_date1 == '12/25' // Christmas Day

) return true;



// weekday from beginning of the month (month/num/day)

var n_wday = dt_date.getDay(),

n_wnum = Math.floor((n_date - 1) / 7) + 1;

var s_date2 = n_month + '/' + n_wnum + '/' + n_wday;



if (   s_date2 == '1/3/1'  // Birthday of Martin Luther King, third Monday in January

|| s_date2 == '2/3/1'  // Washington's Birthday, third Monday in February

|| s_date2 == '5/3/6'  // Armed Forces Day, third Saturday in May

|| s_date2 == '9/1/1'  // Labor Day, first Monday in September

|| s_date2 == '10/2/1' // Columbus Day, second Monday in October

|| s_date2 == '11/4/4' // Thanksgiving Day, fourth Thursday in November

) return true;



// weekday number from end of the month (month/num/day)

var dt_temp = new Date (dt_date);

dt_temp.setDate(1);

dt_temp.setMonth(dt_temp.getMonth() + 1);

dt_temp.setDate(dt_temp.getDate() - 1);

n_wnum = Math.floor((dt_temp.getDate() - n_date - 1) / 7) + 1;

var s_date3 = n_month + '/' + n_wnum + '/' + n_wday;



if (   s_date3 == '5/1/1'  // Memorial Day, last Monday in May

) return true;

//hey

// misc complex dates

if (s_date1 == '1/20' && (((dt_date.getFullYear() - 1937) % 4) == 0)

// Inauguration Day, January 20th every four years, starting in 1937.

) return true;



if (n_month == 11 && n_date >= 2 && n_date < 9 && n_wday == 2

// Election Day, Tuesday on or after November 2.

) return true;



return false;

}


function addWeekdays(date, days) {
  date.setDate(date.getDate());
    var counter = 0;
      if(days > 0 ){
        while (counter < days) {
         date.setDate(date.getDate() + 1 ); // Add a day to get the date tomorrow
         //console.log(date);
         var check = date.getDay(); // turns the date into a number (0 to 6)
             if (check == 0 || check == 6) {
                 // Do nothing it's the weekend (0=Sun & 6=Sat)
                 days = days -1;
             }else if(check_holiday(date) == true){
               days = days -1;
             }
             else{

                 counter++;
                 //console.log(counter);  // It's a weekday so increase the counter
             }
           }
         }
         return counter;
       }


function days_between(date1, date2) {

// The number of milliseconds in one day
var ONE_DAY = 1000 * 60 * 60 * 24;

// Convert both dates to milliseconds
var date1_ms = date1.getTime();
var date2_ms = date2.getTime();

// Calculate the difference in milliseconds
var difference_ms = Math.abs(date1_ms - date2_ms);

// Convert back to days and return
return Math.round(difference_ms/ONE_DAY);

}


function getMonday(d) {
d = new Date(d);
var day = d.getDay(),
diff = d.getDate() - day + (day == 0 ? -6:1); // adjust when day is sunday
return new Date(d.setDate(diff));
}

function timeEntry (member,day,month,year,hours){
month = month - 1;
this.member = member;
this.date = new Date(parseInt(year),parseInt(month),parseInt(day));
this.hours = hours;
}

function member (id){
this.id = id;
this.sumTimeMember = sumTimeMember;
}


sumTimeMember = function(arrayOfObjects,member){
var sum = 0;
for(var i = 0;i<arrayOfObjects.length;i++){
if(arrayOfObjects[i].member == member){
sum += arrayOfObjects[i].hours;
}
}
return sum;
}

sumTime = function(arrayOfObjects){
var sum = 0;
for(var i = 0;i<arrayOfObjects.length;i++){
sum += arrayOfObjects[i].hours;
}
return sum;
}

function searchArray1(value, myArray){
for (var j=0; j < myArray.length; j++) {
if (myArray[j].member.toString() === value.toString()) {
return j;
}
}
};

function thisMonth(arrayOfObjects){
  var d = new Date();
  var m = d.getMonth();
  var newArray = [];
  for(var i = 0;i<arrayOfObjects.length;i++){
    if(searchArray1(arrayOfObjects[i].member,newArray) > -1){
      if(arrayOfObjects[i].date.getMonth() == m){
          newArray[searchArray1(arrayOfObjects[i].member,newArray)].hours += arrayOfObjects[i].hours;
      }
    }else{
      if(arrayOfObjects[i].date.getMonth() == m){
        newArray.push({
          'member':arrayOfObjects[i].member,
          'hours':arrayOfObjects[i].hours
      });
    }else{
      newArray.push({
          'member':arrayOfObjects[i].member,
          'hours':0
        });
      }
    }
  }
return newArray;
}


function thisQuarter(arrayOfObjects){
var d = new Date();
var m = d.getQuarter();
var y = d.getFullYear();
var newArray = [];
for(var i = 0;i<arrayOfObjects.length;i++){
if(searchArray1(arrayOfObjects[i].member,newArray) > -1){
if(arrayOfObjects[i].date.getQuarter() == m && arrayOfObjects[i].date.getFullYear() == y){
    newArray[searchArray1(arrayOfObjects[i].member,newArray)].hours += arrayOfObjects[i].hours;
}
}else{
  if(arrayOfObjects[i].date.getQuarter() == m && arrayOfObjects[i].date.getFullYear() == y){
    newArray.push({
      'member':arrayOfObjects[i].member,
      'hours':arrayOfObjects[i].hours
  });
}else{
newArray.push({
  'member':arrayOfObjects[i].member,
  'hours':0
});
}
}
}
return newArray;
}


function thisWeek(arrayOfObjects){
var d = new Date();
var m = d.getWeek();
var y = d.getFullYear();
var newArray = [];
for(var i = 0;i<arrayOfObjects.length;i++){
if(searchArray1(arrayOfObjects[i].member,newArray) > -1){
if(arrayOfObjects[i].date.getWeek() == m && arrayOfObjects[i].date.getFullYear() == y){
    newArray[searchArray1(arrayOfObjects[i].member,newArray)].hours += arrayOfObjects[i].hours;
}
}else{
  if(arrayOfObjects[i].date.getWeek() == m && arrayOfObjects[i].date.getFullYear() == y){
    newArray.push({
      'member':arrayOfObjects[i].member,
      'hours':arrayOfObjects[i].hours
  });
}else{
newArray.push({
  'member':arrayOfObjects[i].member,
  'hours':0
});
}
}
}
return newArray;
}


function thisYear(arrayOfObjects){
  var d = new Date();
  var m = d.getFullYear();
  var newArray = [];
  for(var i = 0;i<arrayOfObjects.length;i++){
  if(searchArray1(arrayOfObjects[i].member,newArray) > -1){
  if(arrayOfObjects[i].date.getFullYear() == m){
      newArray[searchArray1(arrayOfObjects[i].member,newArray)].hours += arrayOfObjects[i].hours;
  }
  }else{
    if(arrayOfObjects[i].date.getFullYear() == m){
      newArray.push({
        'member':arrayOfObjects[i].member,
        'hours':arrayOfObjects[i].hours
    });
  }else{
  newArray.push({
    'member':arrayOfObjects[i].member,
    'hours':0
  });
  }
  }
  }
  return newArray;
}



$(document).ready(function(){


  var members = [];
  var utilization = [];
  var entries = [];
  //show loading animation
  $('#utilization #loading').show();
    //get Monday from today's date
    var first = getMonday(new Date());
    //today's date
    var today = new Date();
    //initialize hours to zero
    var hours = 0
    //set the amount of days equal to
    var dayCount = addWeekdays(getMonday(first), days_between(getMonday(today),today));
    var i = 0;
    while(i<dayCount){
    hours = hours + 8;
    i++;
  }

  /*$.ajax({
    type:"GET",
    url:"../../ajax/servicedelivery/billableByMember.php",
    success:function(json){
    var billable_hours = 0;
    var actual_hours = [];
    for(var j = 0;j<json.length;j++){
    members.push(json[j]["member_id"]);
    actual_hours.push(json[j]["billable_hours"]);
    utilization.push((json[j]['billable_hours']/hours)*100);
    billable_hours = billable_hours +json[j]["billable_hours"];
  }
    hours = hours * members.length;
    var percent = (billable_hours/hours)*100;
  /*  var chart = c3.generate({
       bindto: '#utilGoal',
data: {
  columns: [
      ['utilization', 0]
  ],
  type: 'gauge',
  //onclick: function (d, i) { console.log("onclick", d, i); },
  //onmouseover: function (d, i) { console.log("onmouseover", d, i); },
  //onmouseout: function (d, i) { console.log("onmouseout", d, i); }
},
gauge: {
//        label: {
//            format: function(value, ratio) {
//                return value;
//            },
//            show: false // to turn off the min/max labels.
//        },
//    min: 0, // 0 is default, //can handle negative min e.g. vacuum / voltage / current flow / rate of change
//    max: 100, // 100 is default
//    units: ' %',
//    width: 39 // for adjusting arc thickness
},
color: {
  pattern: ['#E74C3C', '#E67E22', '#F1C40F', '#2ECC71'], // the three color levels for the percentage values.
  threshold: {
//            unit: 'value', // percentage is default
//            max: 200, // 100 is default
      values: [30, 60, 90, 100]
  }
},
size: {
  height: 180
}
});

var t = 0;
function nextFrame() {
if(t < utilization.length) {
chart.load({
  columns: [['utilization', utilization[t]]]
});
$('#memberid').empty();
$('#memberid').append(members[t]);
t++;
// Continue the loop in 3s
setTimeout(nextFrame, 2000);
}else{
chart.load({
  columns: [['utilization', percent.toFixed(2)]]
});
$('#memberid').empty();
$('#memberid').append("Overall");
}
}
setTimeout(nextFrame(),0);*/

//$('#utilzation').append('<table id="utilizationTable" class="table table-striped"><thead><th  style="text-align:left;">Member ID</th><th  style="text-align:center;">Actual Hours</th><th  style="text-align:center;">Utilization</th></thead><tbody id="utilizationTableBody"></tbody></table>"');
  /*  }
  });*/

  //ajax request to get CIM time entries
  $.ajax({
    type:'GET',
    url:'../../../ajax/fieldservices/timeEntries.php',
    success:function(json){
      //iterate through the result and create
      /*for(var i = 0;i<json.length;i++){
        entries[i] = new timeEntry(json[i]['member_id'],json[i]['day'],json[i]['month'],json[i]['year'],json[i]['billable_hours']);
      }*/
      entries = json;
    }
  });





$('#thisMonth').on('click',function(){

$('#thisMonth').addClass('active');
$('#thisWeek').removeClass('active');
$('#thisQuarter').removeClass('active');
$('#thisYear').removeClass('active');
function getQuarter(d) {
d = d || new Date(); // If no date supplied, use today
var q = [1,2,3,4];
return q[Math.floor(d.getMonth() / 3)];
}
var today = new Date();
var firstOfMonth = new Date();
firstOfMonth.setDate(1);
var dayCount = addWeekdays(firstOfMonth, days_between(firstOfMonth,today));
var t = 0;
hours = 0;
while(t<dayCount){
hours = hours + 8;
console.log("loop "+t+" "+hours);
t++;
}

$('#utilizationTableBody').empty();

console.log(thisMonth(entries));

for(var i = 0;i<thisMonth(entries).length;i++){
$('#utilizationTableBody').append("<tr>");
$('#utilizationTableBody').append("<td style='text-align:left;'>"+thisMonth(entries)[i].member+"</td>");
$('#utilizationTableBody').append("<td style='text-align:center;'>"+thisMonth(entries)[i].hours.toFixed(2)+"</td>");
if(parseInt((thisMonth(entries)[i].hours/hours)*100) > 100 || parseInt((thisMonth(entries)[i].hours/hours)*100) == 100){
    $('#utilizationTableBody').append("<td style='text-align:center;color:#2ECC71;'>"+parseInt((thisMonth(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}else if(parseInt((thisMonth(entries)[i].hours/hours)*100) <100 && parseInt((thisMonth(entries)[i].hours/hours)*100) >90){
    $('#utilizationTableBody').append("<td style='text-align:center;color:#F1C40F;'>"+parseInt((thisMonth(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}else if(parseInt((thisMonth(entries)[i].hours/hours)*100) <90 && parseInt((thisMonth(entries)[i].hours/hours)*100) >60){
  $('#utilizationTableBody').append("<td style='text-align:center;color:#E67E22;'>"+parseInt((thisMonth(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}else{
    $('#utilizationTableBody').append("<td style='text-align:center;color:#E74C3C;'>"+parseInt((thisMonth(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}

$('#utilizationTableBody').append("</tr>");

}




});


$('#utilization #loading').hide();
for(var i = 0;i<members.length;i++){
$('#utilizationTableBody').append("<tr>");
$('#utilizationTableBody').append("<td style='text-align:left;'>"+members[i]+"</td>");
$('#utilizationTableBody').append("<td style='text-align:center;'>"+actual_hours[i]+"</td>");
if(parseInt(utilization[i]) > 100 || parseInt(utilization[i]== 100)){
$('#utilizationTableBody').append("<td style='text-align:center;color:#2ECC71;'>"+utilization[i].toFixed(2)+"%</td>");
}else if(parseInt(utilization[i])<100 && parseInt(utilization[i]) >90){
$('#utilizationTableBody').append("<td style='text-align:center;color:#F1C40F;'>"+utilization[i].toFixed(2)+"%</td>");
}else if(parseInt(utilization[i]<90 && parseInt(utilization[i]>60))){
$('#utilizationTableBody').append("<td style='text-align:center;color:#E67E22;'>"+utilization[i].toFixed(2)+"%</td>");
}else{
$('#utilizationTableBody').append("<td style='text-align:center;color:#E74C3C;'>"+utilization[i].toFixed(2)+"%</td>");
}

$('#utilizationTableBody').append("</tr>");

}

$('#thisQuarter').on('click',function(){

$('#thisQuarter').addClass('active');
$('#thisWeek').removeClass('active');
$('#thisMonth').removeClass('active');
$('#thisYear').removeClass('active');
var today = new Date();
var firstOfQuarter = new Date();
firstOfQuarter.setDate(1);
if(today.getQuarter()==1){
firstOfQuarter.setMonth(0);
}else if(today.getQuarter()==2){
firstOfQuarter.setMonth(3);
}else if (today.getQuarter() == 3){
firstOfQuarter.setMonth(6);
}else{
firstOfQuarter.setMonth(9);
}
var dayCount = addWeekdays(firstOfQuarter, days_between(firstOfQuarter,today));
var t = 0;
hours = 0;
while(t<dayCount){
hours = hours + 8;
console.log("loop "+t+" "+hours);
t++;
}

$('#utilizationTableBody').empty();
console.log(entries);
console.log(thisQuarter(entries));


for(var i = 0;i<thisQuarter(entries).length;i++){
$('#utilizationTableBody').append("<tr>");
$('#utilizationTableBody').append("<td style='text-align:left;'>"+thisQuarter(entries)[i].member+"</td>");
$('#utilizationTableBody').append("<td style='text-align:center;'>"+thisQuarter(entries)[i].hours.toFixed(2)+"</td>");
if(parseInt((thisQuarter(entries)[i].hours/hours)*100) > 100 || parseInt((thisQuarter(entries)[i].hours/hours)*100) == 100){
    $('#utilizationTableBody').append("<td style='text-align:center;color:#2ECC71;'>"+parseInt((thisQuarter(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}else if(parseInt((thisMonth(entries)[i].hours/hours)*100) <100 && parseInt((thisQuarter(entries)[i].hours/hours)*100) >90){
    $('#utilizationTableBody').append("<td style='text-align:center;color:#F1C40F;'>"+parseInt((thisQuarter(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}else if(parseInt((thisQuarter(entries)[i].hours/hours)*100) <90 && parseInt((thisQuarter(entries)[i].hours/hours)*100) >60){
  $('#utilizationTableBody').append("<td style='text-align:center;color:#E67E22;'>"+parseInt((thisQuarter(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}else{
    $('#utilizationTableBody').append("<td style='text-align:center;color:#E74C3C;'>"+parseInt((thisQuarter(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}

$('#utilizationTableBody').append("</tr>");

}



});


$('#thisYear').on('click',function(){
rangeFilter = 'year';

$('#thisYear').addClass('active');
$('#thisWeek').removeClass('active');
$('#thisMonth').removeClass('active');
$('#thisQuarter').removeClass('active');
var today = new Date();
var firstOfYear = new Date();
firstOfYear.setDate(1);
firstOfYear.setMonth(0);
firstOfYear.setYear(today.getFullYear());

var dayCount = addWeekdays(firstOfYear, days_between(firstOfYear,today));
var t = 0;
hours = 0;
while(t<dayCount){
hours = hours + 8;
console.log("loop "+t+" "+hours);
t++;
}

$('#utilizationTableBody').empty();
console.log(entries);
console.log(thisQuarter(entries));


for(var i = 0;i<thisYear(entries).length;i++){
$('#utilizationTableBody').append("<tr>");
$('#utilizationTableBody').append("<td style='text-align:left;'>"+thisYear(entries)[i].member+"</td>");
$('#utilizationTableBody').append("<td style='text-align:center;'>"+thisYear(entries)[i].hours.toFixed(2)+"</td>");
if(parseInt((thisYear(entries)[i].hours/hours)*100) > 100 || parseInt((thisYear(entries)[i].hours/hours)*100) == 100){
    $('#utilizationTableBody').append("<td style='text-align:center;color:#2ECC71;'>"+parseInt((thisYear(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}else if(parseInt((thisYear(entries)[i].hours/hours)*100) <100 && parseInt((thisYear(entries)[i].hours/hours)*100) >90){
    $('#utilizationTableBody').append("<td style='text-align:center;color:#F1C40F;'>"+parseInt((thisYear(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}else if(parseInt((thisYear(entries)[i].hours/hours)*100) <90 && parseInt((thisYear(entries)[i].hours/hours)*100) >60){
  $('#utilizationTableBody').append("<td style='text-align:center;color:#E67E22;'>"+parseInt((thisYear(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}else{
    $('#utilizationTableBody').append("<td style='text-align:center;color:#E74C3C;'>"+parseInt((thisYear(entries)[i].hours/hours)*100).toFixed(0)+"%</td>");
}

$('#utilizationTableBody').append("</tr>");

}



});

var rangeFilter = {
range:'week',
getRange:function(){
return this.range;
},
rangeFunction:function(array){
switch (this.getRange()){
case 'week':
thisWeek(array)
break;
case 'month':
thisMonth(array)
break;
case 'quarter':
thisQuarter(array)
break;
case 'year':
thisYear(array)
break;
}
}
};



$('#exportToCSV').on('click',function(){
function ConvertToCSV(objArray) {
var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
var str = '';

for (var i = 0; i < array.length; i++) {
    var line = '';
    for (var index in array[i]) {
        if (line != '') line += ','

        line += array[i][index];
    }

    str += line + '\r\n';
}

return str;
}
var download = function(content, fileName, mimeType) {
  var a = document.createElement('a');
      mimeType = mimeType || 'application/octet-stream';

  if (navigator.msSaveBlob) { // IE10
      return navigator.msSaveBlob(new Blob([content], { type: mimeType }), fileName);
  } else if ('download' in a) { //html5 A[download]
      a.href = 'data:' + mimeType + ',' + encodeURIComponent(content);
      a.setAttribute('download', fileName);
      document.body.appendChild(a);
      setTimeout(function() {
        a.click();
          document.body.removeChild(a);
        }, 66);
        return true;
  } else { //do iframe dataURL download (old ch+FF):
    var f = document.createElement('iframe');
    document.body.appendChild(f);
    f.src = 'data:' + mimeType + ',' + encodeURIComponent(content);

    setTimeout(function() {
          document.body.removeChild(f);
        }, 333);
        return true;
      }
    }
//var headerArray = ['member_id','billable_hours','utilization'];
    // Create Object
//thisQuarter(entries).unshift(headerArray);
    // Convert Object to JSON
    var jsonObject = JSON.stringify(thisQuarter(entries));
    //console.log(REMODELPROPOSAL.emps);
   download(ConvertToCSV(jsonObject), 'thisQuarter.csv', 'text/csv');
 });
});
