 <?php


        // Get the form fields and remove whitespace.
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $msg = $_POST["msg"];
        //$headers = 'From: '.$email;
        
        $name = $firstName." ".$lastName;
        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        //$recipient = "nj.jstewart@gmail.com";

        // Set the email subject.
        $subject = "JTSdev Shoutout";

        // Build the email content.
        $message ="Name: ".$name." \nEmail: ".$email."\nMessage: ".$msg;

        // Build the email headers.
        

       mail("nj.jstewart@gmail.com","JTSdev Shoutout",$message);



//echo "Thank you for your interest in Tii Cares. We will be in touch soon!";
?>