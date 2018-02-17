<?php

$etat_envoi = 'erreur';
if(!empty($_REQUEST)){
  extract($_REQUEST);
  if(!empty($nom) && !empty($email) && !empty($mess)) {
    $mess=str_replace("\'","'",$mess);
    $destinataire="contact@gite-brommat.fr";
    $sujet='Message client :';
    $msg='Un nouveau message est arrivé : \nNom : $nom \nEmail : $email \nMessage : $mess';
    $entete  = "From: $nom \n Replay-To: $email";
    $etat_envoi = mail($destinataire,$sujet,$msg,$entete);
    $etat_envoi ? 'succes' : 'erreur';
  }
}
echo $etat_envoi;