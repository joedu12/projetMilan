<?php
  // Connexion à la base de données
  require "../inc/config.php";

  if(!empty($_GET["id"])) {
    $result = $conn->prepare("SELECT * FROM Reservation
          LEFT JOIN Client
              ON fk_client = id_client
          WHERE id_resa = :id_resa");

    $result->execute(array("id_resa" => $_GET["id"]));

    $data = $result->fetch();
    extract($data);

    $html  = '<p>';
      $html .= $nom . ' ' . $prenom . '<br/>';
      $html .= $adresse . '<br/>';
      $html .= $nbPers . ' personnes<br/>';
      $html .= 'Du ' . $dateArrivee . ' au ' . $dateDepart;
    $html .= '</p>';
    echo $html;
    
    $conn = null;
  }
?>