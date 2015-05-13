function sendEmail(form) {
        
        // Serialize the form data.
        var formData = $(form).serialize();

        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })
        .done(function(response) {

            // Set the message text.
            //$(formMessages).text(response);

            // Clear the form.
            $('#firstName').val('');
            $('#lastName').val('');
            $('#email').val('');
            $('#textarea').val('');
            $('#captcha').val('');

            $('#contactForm').fadeOut(500, function() {




    $("contactForm").addClass("noDisplay");
        $('#aboutMe').removeClass("noDisplay");
       $('#aboutMe').fadeIn('slow', function() {
           // Animation complete
            });

        

    });




            // Make sure that the formMessages div has the 'success' class.
          
            //$(formMessages).removeClass('error');
            //$(formMessages).addClass('alert alert-success success');

            
        })
        .fail(function(data) {
            // Make sure that the formMessages div has the 'error' class.
           

            // Set the message text.
           alert("message did not send");
        });

    
}


$(document).ready(function(){

    var form = $('#defaultForm');



    var emailSendLimit = 0;
    $(form).submit(function(e) {

        if(emailSendLimit<1){
            sendEmail(form);
            e.preventDefault();
            e.stopPropagation();
            emailSendLimit++;
        }
        
        //e.unbind();

    });
});