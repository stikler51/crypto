<?php
if(isset($_POST['email'])) {
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "stikler51@gmail.com";
    $email_subject = "Become a client form";


    $first_name = $_POST['your_name']; // required
    $website_url = $_POST['website_url']; // required
    $email_from = $_POST['email']; // required
    $messenger = $_POST['messenger']; // not required
    $promocode = $_POST['promocode']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$first_name)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    }


    if(strlen($error_message) > 0) {
        died($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($website_url)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($messenger)."\n";
    $email_message .= "Comments: ".clean_string($promocode)."\n";

// create email headers
    $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- include your own success html here -->

    Thank you for contacting us. We will be in touch with you very soon.

    <?php

}
?>