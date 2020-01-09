<?php
            $headers = 'From: infos@sicomp-ci.com' . "\r\n";
            $headers .="MIME-Version: 1.0 \n";
            $headers .="Content-Type: text/html; charset=iso-8859-1 \n";
            $email = "ibrahpremier@gmail.com";
            $taille_modele = filesize("mail_template.php"); //correspond à l'équivalent du message enregistrer dans une fichier html
            $message = fopen("mail_template.php", "r");
 
            //Lecture du fichier
            $donnees_html = fread($message, $taille_modele);
 
            //Fermer le fichier
            fclose($message);
 
            
        $result = mail($email,'Titre du message',$donnees_html,$headers);
        if(!$result) {   
        $code = 0; $msg = "Erreur, veuillez réessayer plus tard";   
        } else {
        $code = 1; $msg = "Message envoyé !";
        }

      // Return data as JSON
      echo json_encode(array('code'=> $code,'msg'=> $msg));
?>