<?php

if(!empty($_REQUEST)){
  extract($_REQUEST);
  if(!empty($nom) && !empty($prenom) && !empty($dateArrivee) && !empty($dateDepart) && !empty($personne) && !empty($email) && !empty($id)) {
    $mess=str_replace("\'","'",$mess);
    $destinataire="contact@gite-brommat.fr";
    $sujet="Nouvelle réservation client :";
    $msg="Le client : \nNom : $nom\t Prenom : $prenom\tMail : $email\nRéservation : \n\t Date d'arrivée : $dateArrivee\t Date depart: $dateDepart\n\t Nombre de personne: $personne\n Chambre: $id\t $nomChambre";
    $entete = "From: " . $nom ." " . $prenom . " <" . $email . "> \r\n";
    $etat_envoi = mail($destinataire,$sujet,$msg,$entete);
    echo ($etat_envoi) ? 'succes' : 'erreur';
  }
}
