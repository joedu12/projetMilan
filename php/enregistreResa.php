<?php
    if(!empty($_POST)){
      extract($_POST);
      if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($cp) && !empty($ville) && !empty($email)
      && !empty($dateArrivee) && !empty($dateDepart) && !empty($personne)
      && !empty($id_chambre)) {

        $reqClient = $conn->prepare('INSERT INTO Client (nom, prenom, adresse, cp, ville, email)
                                     VALUES (:nom, :prenom, :adresse, :cp, :ville :email);
        ');
        $reqClient->execute(array(
          "nom" => $nom,
          "prenom" => $prenom, 
          "adresse" => $adresse, 
          "cp" => $cp, 
          "ville" => $ville,
          "email" => $email
        ));

        $reqReservation = $conn->prepare('INSERT INTO Reservation (nbPers, dateArrivee, dateDepart, fk_client)
                                          VALUES (:personne, :dateArrivee, :dateDepart, :fk_client);
        ');
        $reqReservation->execute(array(
          "personne" => $personne,
          "dateArrivee" => $dateArrivee, 
          "dateDepart" => $dateDepart,
          "fk_client" => $conn->lastInsertId()
        ));

        $reqResaChambre = $conn->prepare('INSERT INTO ResaChambre (fk_resa, fk_chambre)
                                          VALUES (:fk_resa, :fk_chambre);
        ');
        $reqResaChambre->execute(array(
          "fk_resa" => $conn->lastInsertId(),
          "fk_chambre" => $id_chambre
        ));

        echo "<section><h2>Merci pour votre réservation $prenom ! Celle ci est bien enregistré</h2>
        <p>Le paiement sera effectué sur place.</p></section>";
        
        }
      }
    $conn = null;
    echo '</section>';
?>
