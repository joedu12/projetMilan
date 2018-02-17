<?php

if(!empty($_REQUEST)){
  extract($_REQUEST);
  if(!empty($nom) && !empty($email) && !empty($mess)) {
    $mess=str_replace("\'","'",$mess);
    $destinataire="contact@gite-brommat.fr";
    $sujet="Message client :";
    $msg="Un nouveau message est arrive : \nNom : $nom\nEmail : $email\nMessage : $mess";
    $entete = "From: " . $nom . " <" . $email . "> \r\n";
    $etat_envoi = mail($destinataire,$sujet,$msg,$entete);
    echo ($etat_envoi) ? 'succes' : 'erreur';
  }
}