
$(document).ready(function(){





$('#contact').on('click',function(){


$("#aboutMe").fadeOut('slow', function() {
       $('#aboutMe').addClass("noDisplay");
       $('#contactForm').removeClass("noDisplay");
       $('#contactForm').fadeIn('slow', function() {
           // Animation complete

            });
       	});

});



$('#work').on('click',function(){

 		$("#aboutMe").fadeOut('slow', function() {
       $('#aboutMe').addClass("noDisplay");
       $('#myWork').removeClass("noDisplay");
       $('#myWork').fadeIn('slow', function() {
           // Animation complete
            });
       	});




        });



$('#about').on('click',function(){

 		$("#myWork").fadeOut('slow', function() {
       $('#myWork').addClass("noDisplay");
       $('#aboutMe').removeClass("noDisplay");
       $('#aboutMe').fadeIn('slow', function() {
           // Animation complete
            });
       	});




        });

$('#backContact').on('click',function(){

 		$("#contactForm").fadeOut('slow', function() {
       $('#contactForm').addClass("noDisplay");
       $('#aboutMe').removeClass("noDisplay");
       $('#aboutMe').fadeIn('slow', function() {
           // Animation complete
            });
       	});




        });



});





/*\*/
