<?php

//    $date            = date('Y-m-d H:i:s');
   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $objet           =  "Requete Sicomp-ci.Com";
   $objet           =  strip_tags($_POST['objet']);
   $nom             =  strip_tags($_POST['nom']);
   $email           = strip_tags($_POST['email']);
   $text         =  strip_tags($_POST['text']);
   $message = "Exp: ".$nom.", Email_exp: ".$email.", Requete: ".$text.""; 
//    $message = "Exp: Kone Moussa<br> Email_exp: km@gmail.com<br><br><u>Requete:</u> <br><p>Juste un bonjour</p>"; 
   $headers = 'De: SICOMP siteWeb';
   $to_email ='infos@sicomp-ci.com';

    // TRAITEMENT

        $result = mail($to_email,$objet,$message,$headers);
      if(!$result) {   
      $code = 0; $msg = "Erreur, veuillez réessayer plus tard";   
      } else {
      $code = 1; $msg = "Message envoyé !";
      }

      // Return data as JSON
      echo json_encode(array('code'=> $code,'msg'=> $msg));
}

    // FIN TRAITEMENT
        
    
    

?>