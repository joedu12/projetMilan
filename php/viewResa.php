<?php
  // Connexion à la base de données
  require "../inc/config.php";

  if(!empty($_GET["id"])) {
    // récupère le client associé à la réservation
    $result = $conn->prepare("SELECT * FROM Reservation
          LEFT JOIN Client
              ON fk_client = id_client
          WHERE id_resa = :id_resa");

    $result->execute(array("id_resa" => $_GET["id"]));
    $data = $result->fetch();
    extract($data);

    // récupère la chambre associée à la réservation
    $result = $conn->prepare("SELECT * FROM ResaChambre
          LEFT JOIN Chambre
              ON fk_chambre = id_chambre
          WHERE fk_resa = :id_resa");
    $result->execute(array("id_resa" => $_GET["id"]));
    $chambre = $result->fetch();

    // calcule la durée et le tarif total
    $arrivee = new DateTime($dateArrivee);
    $depart  = new DateTime($dateDepart);
    $intervale = $arrivee->diff($depart);
    $tarif = $intervale->format('%a') * $chambre['tarif'];

    $html  = '<div class="flex-container">';
      $html .= '<p class="flex-item">';
        $html .= '<b>' . $nom . ' ' . $prenom . '</b> (' . $nbPers . ' personnes)<br/>';
        $html .= $email . '<br/>';
        $html .= $adresse . '<br/>';
        $html .= $cp . '<br/>';
        $html .= $ville . '<br/>';
      $html .= '</p>';
      $html .= '<p clas="flex-item">';
        $html .= $chambre['nom'] . '<br/>';
        $html .= 'Du ' . $arrivee->format('d/m/Y') . ' au ' . $depart->format('d/m/Y'). ' (' . $intervale->format('%a') . ' jours)<br/>';
        $html .= 'Tarif journalier : ' . $chambre['tarif'] . '€/j<br/>';
        $html .= 'Total : ' . $tarif . '€';
      $html .= '</p>';
    $html .= '</div>';
    echo $html;
    
    $conn = null;
  }
?>