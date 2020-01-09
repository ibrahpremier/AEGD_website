<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = strip_tags($_POST['nom']);
    $phone = strip_tags($_POST['phone']);
    $email = strip_tags($_POST['email']);
    $objet = strip_tags($_POST['objet']);
    $text = strip_tags($_POST['msg']);

    if(!isset($nom) || empty($nom) || !isset($email) || empty($email) || !isset($objet) || empty($objet)|| !isset($text) || empty($text)){
        header('location:../?incomplete#contactus'); 
    } else{
        send_mail($objet, $nom, $email, $phone, $text);
    }

}

function send_mail($objet, $nom, $email, $phone, $text){
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.digital-co.ci';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'infos@digital-co.ci';                     // SMTP username
        $mail->Password   = 'Digital-cowebmail1er';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('infos@digital-co.ci', 'EADG');
        $mail->addAddress('aegdevelopment19@gmail.com');
        $mail->addBCC('ibrahiim1er@gmail.com');            

        // Content
        $mail->isHTML(true);     // Set email format to HTML
        $mail->Subject = 'Contact via votre SITE-WEB';
        $message = '<p>Vous avez un nouveau message en provence de votre site Web</p>';
        $message.= '<br><h2><u>Objet: </u> '.$objet;
        $message.= '</h2><p><u>Auteur: </u>'.$nom;
        $message.= '<p><u>Tel: </u>'.$phone;
        $message.= ' <br><u>Email: </u>'.$email;
        $message.= '<br><u>Message: </u> <p style="padding: 10px;">'.$text;
        $message.= '</p><p style="text-align: center;">
                <img src="" alt="Logo EAGD">
            </p>
        </p>';


        $mail->Body  = $message;

        $mail->send();
        header("Location:../?sendok#contactus");
        echo 'Message Envoyé';
    } catch (Exception $e) {
        echo "Message non envoyé. Mailer Error: {$mail->ErrorInfo}";
        header('location:../?sendnok#contactus');  
    }

} // fin fonction send_mail


?>