<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
if (isset($_POST['submit'])) {
//Create an instance; passing `true` enables exceptions

$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'centrumbusinesssquare2020@gmail.com';                     //SMTP username
    $mail->Password   = 'lqkwtnzgxswlantc';                               //SMTP password
    $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('centrumbusinesssquare2020@gmail.com', 'Centrum');
    $mail->addAddress('abzansari19@gmail.com', 'Centrum');     //Add a recipient
    // $mail->addReplyTo($_POST['email'], $_POST['name']);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Enquiry Form';
    $mail->Body    = "Name:". ' ' .$_POST['name'] . "<br/> Phone:". ' ' . $_POST['phone']."<br/> Email:".' '. $_POST['email']. "<br/> Enquire for: ".' ' .$_POST['ritem'];

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    try {
    $mail->send();
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Thank You!!');
    window.location.href='https://centrumsquare.com';
    </script>");
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{
    echo "failed";
}
?>