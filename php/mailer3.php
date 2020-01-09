<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.sicomp-ci.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'infos@sicomp-ci.com';                     // SMTP username
    $mail->Password   = 'Sicompwebmail1er';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('infos@sicomp-ci.com', 'SICOMP');
    $mail->addAddress('ibrahiim1er@gmail.com');               // Name is optional

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Demande de devis';
    $message = '<h2>Bienvenue</h2>
    <p>Vous avez un nouveau message en provence de votre site Web</p>
    <p>
        <u>Auteur: </u>  KOFFI FABRICE <br>
        <u>Email: </u> kf@gmail.com <br>
        <u>Objet: </u> DEMANDE DE DEVIS <br>
        <u>Message: </u>
        <p style="padding: 10px;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel a debitis fugit consequuntur repellendus distinctio, excepturi perspiciatis. Voluptatibus provident eum, ipsam exercitationem in rerum dolorem saepe dolorum aliquam consectetur dignissimos!
        </p>
        <p style="text-align: center;">
            <img src="http://sicomp-ci.com/img/logo.png" alt="Logo Sicomp">
        </p>
    </p>';


    $mail->Body  = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message Envoyé';
} catch (Exception $e) {
    echo "Message non envoyé. Mailer Error: {$mail->ErrorInfo}";
}

?>