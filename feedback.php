<?php

// $name = $_POST['name'];
// $email    = $_POST['email'];
// $phone   = $_POST['phone'];
// $comments   = $_POST['comments'];
// $rating = $_POST['rate'];

// if(trim($name) == '') {
// 	echo '<div class="error_message">Attention! You must enter your name.</div>';
// 	exit();
// }  
// else if(trim($email) == '') {
// 	echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
// 	exit();
// } 
// else if(trim($phone) == '') {
// 	echo '<div class="error_message">Attention! Please enter your phone.</div>';
// 	exit();
// }

// else if(trim($comments) == '') {
// 	echo '<div class="error_message">Attention! Please enter your message.</div>';
// 	exit();
// }


// $to = "maxoninfrastructure@gmail.com";


// $subject = 'You\'ve been contacted by ' . $name . '.';

// $msg = "Name: ".$name."\n\nemail: ".$email."\n\nphone: ".$phone."\n\nFeedback:\n".$comments. "\n\nRating: ".$rating;

// $headers = "From: $email";

// if(mail($to, $subject, $msg, $headers))
//  {

// 	echo "</fieldset>";
//     echo "<div id='success_page'>";
// 	echo "<h1>Your Message Sent Successfully.</h1>";
// 	echo "<p>Thank you <strong>$name </strong>, your Feedback and Rating Sent Successfully.</p>";
// 	echo "</div>";
// 	echo "</fieldset>";

// 	echo "<a href='index.html'>Return to Home</a>";
// } 
// else {

// 	echo 'ERROR!';

// }


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comments = $_POST['comments'];
    $rating = $_POST['rate'];

    if(trim($name) == '') {
        echo '<div class="error_message">Attention! You must enter your name.</div>';
        exit();
    }  
    else if(trim($email) == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
        exit();
    } 
    else if(trim($phone) == '') {
        echo '<div class="error_message">Attention! Please enter your phone.</div>';
        exit();
    }
    else if(trim($comments) == '') {
        echo '<div class="error_message">Attention! Please enter your message.</div>';
        exit();
    }

    $subject = 'You\'ve been contacted by ' . $name . '.';
    
    $mail->Host = 'mail.lizyweb.com';
    $mail->Username = 'smt@lizyweb.com';
    $mail->Password = 'Lizyweb@123';
    $mail->setFrom('smt@lizyweb.com', 'Maxon Contact Form');
    $mail->addAddress('maxoninfrastructure@gmail.com');
    $mail->Subject = $subject;

    $message = "Name: $name<br /><br />";
    $message .= "Email: $email<br /><br />";
    $message .= "Phone: $phone<br /><br />";
    $message .= "Feedback:<br />$comments<br /><br />";
    $message .= "Rating: $rating";

    $mail->isHTML(true);
    $mail->Body = $message;

    if ($mail->send()) {
        echo "</fieldset>";
        echo "<div id='success_page'>";
        echo "<h1>Your Message Sent Successfully.</h1>";
        echo "<p>Thank you <strong>$name</strong>, your Feedback and Rating Sent Successfully.</p>";
        echo "</div>";
        echo "</fieldset>";

        echo "<a href='index.html'>Return to Home</a>";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Mailer Error: " . $e->getMessage();
}

?>