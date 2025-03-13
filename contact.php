<?php

// $name = $_POST['name'];
// $email    = $_POST['email'];
// $phone   = $_POST['phone'];
// $comments   = $_POST['comments'];

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

// $msg = "Name: ".$name."\n\nemail: ".$email."\n\nphone: ".$phone."\n\nCommets:\n".$comments;

// $headers = "From: $email";

// if(mail($to, $subject, $msg, $headers))
//  {

// 	echo "</fieldset>";
//     echo "<div id='success_page'>";
// 	echo "<h1>Your Message Sent Successfully.</h1>";
// 	echo "<p>Thank you <strong>$name </strong>, your message has been submitted to us. We will contact you shortly </p>";
// 	echo "</div>";
// 	echo "</fieldset>";

// 	echo "<a href='index.html'>Return to Home</a>";
// } 
// else {

// 	echo 'ERROR!';

// }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $name = stripcslashes($_POST['name']);
    $email = stripcslashes($_POST['email']);
    $phone = stripcslashes($_POST['phone']);
    $comment = stripcslashes($_POST['comments']);

    $subject = 'Maxon Contact Form'; // Define your email subject

    // $mail->SMTPDebug = 2;
    // $mail->SMTPAuth = true;
    // $mail->IsSMTP();
    $mail->Host = 'mail.lizyweb.com';
    $mail->Username = 'smt@lizyweb.com';
    $mail->Password = 'Lizyweb@123';
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $mail->Port = 587;

    $mail->setFrom('smt@lizyweb.com', $name);
    $mail->addAddress('maxoninfrastructure@gmail.com');
    $mail->Subject = $subject;

    // Create the HTML message
    $message = "Name: $name<br /><br />";
    $message .= "Email: $email<br /><br />";
    $message .= "Phone: $phone<br /><br />";
    $message .= "Comments: $comment";

    $mail->MsgHTML($message);

    // Send the email
    if ($mail->Send()) {
        echo "</fieldset>";
        echo "<div id='success_page'>";
        echo "<h1>Your Message Sent Successfully.</h1>";
        echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us. We will contact you shortly.</p>";
        echo "</div>";
        echo "</fieldset>";

        echo '<a href="index.html">Return to Home</a>';
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Mailer Error: " . $e->getMessage();
}
?>