<?php

if(!empty($_REQUEST)){
  extract($_REQUEST);
  if(!empty($nom) && !empty($prenom) && !empty($dateArrivee) && !empty($dateDepart) && !empty($personne) && !empty($email) && !empty($id)) {
    $mess=str_replace("\'","'",$mess);
    $destinataire="$mail";
    $sujet="Réservation validée :";
    $msg="Vous avez réservation du : \n\t Date d'arrivée : $dateArrivee\t Date depart: $dateDepart\n Une chambre pour $personne personne\n La chambre que vous avez choisi est la chambre: $nom";
    $entete = "From: " . $nom ." " . $prenom . " <" . $email . "> \r\n";
    $etat_envoi = mail($destinataire,$sujet,$msg,$entete);
    echo ($etat_envoi) ? 'succes' : 'erreur';
  }
}
