function sendEmail(form) {
  //$('#contact_form').replaceWith('<div id="contact_form" style="min-height:399px;><h4 style="display:table;margin:0 auto;text-align:center;">sending...</h4></div>')
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

            $('#contact_form').replaceWith('<div id="contact_form" style="min-height:399px;"><h4 class="btn btn-primary" style="display:table;margin:0 auto;text-align:center;">Success!</h4></div>')




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
