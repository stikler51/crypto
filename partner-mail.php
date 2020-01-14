<?php
if(isset($_POST['email'])) {
    $email_to = "partner@cryptoprocessing.com";
    $email_subject = "Become a partner form";


    $first_name = $_POST['your_name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Messenger: ".clean_string($phone)."\n";

// create email headers
    $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    header('Location: ' . $_SERVER['HTTP_REFERER'])
    ?>
    <?php
}
?>