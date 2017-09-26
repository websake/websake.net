<?php

    $to = "info@websake.net"; // this is your Email address

    // Check if name has been entered
        if (!$_POST['info_name']) {
            $errName = 'Please enter your name';
        }

        // Check if email has been entered and is valid
        if (!$_POST['info_email'] || !filter_var($_POST['info_email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }

        //Check if subject has been entered
        if (!$_POST['info_subject']) {
            $errSubject = 'Please enter your subject';
        }

        //Check if message has been entered
        if (!$_POST['info_message']) {
            $errMessage = 'Please enter your message';
        }

    // If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage && !$errSubject) {

    $from = $_POST['info_email']; // this is the sender's Email address
    $name = $_POST['info_name'];

    $subject = $_POST['info_subject'];
    $subjectto = $subject . " è stato ricevuto!";
    $message = $name . " ha scritto: \r\n" . " \n\n" . $_POST['info_message'];
    $messageto = $name . " ecco qui una copia del tuo messaggio: \r\n" . " \n\n" . $_POST['info_message'];


     $headers = "From:" . $from . "\r\n";
     $headers.= "MIME-Version: 1.0\r\n";
     $headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $headers.= "X-Priority: 1\r\n";

     $headersto = "From:" . $to . "\r\n";
     $headersto.= "MIME-Version: 1.0\r\n";
     $headersto.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $headersto.= "X-Priority: 1\r\n";


    //if(isset($_POST['submit']))
    //{
    if (mail($to, $subject, $message, $headers))
    {
    mail($from, $subjectto, $messageto, $headersto); // sends a copy of the message to the sender
    //echo "Messaggio inviato correttamente. Grazie " . $name . ", sarà nostra cura contattarti il prima possibile.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    header( "Location: grazie.html#inviato" );
    }
    else {
      echo "Ops! Qualcosa è andato storto.\nTorna indietro e riprova.";
      //header( "Location: contatti.html" );
    }
    //}
    }
    else {
      header( "Location: contatti.html" );
    }
    // if (mail ($to, $subject, $body, $from)) {
    //   $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    // } else {
    //   $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    // }
?>
