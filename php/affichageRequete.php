<?php 

require "inc/config.php";
  /*
   * Affiche la chambre disponible correspondant aux critères
   */
  if(!empty($_GET["personne"]) && !empty($_GET["dateArrivee"]) && !empty($_GET["dateDepart"]) && empty($_GET["id"]) ) {
    extract($_GET);

    echo '<section class="chambre">';
    echo '<header>';
        echo '<h1>Chambre disponible trouvée(s) :</h1><hr/>';
    echo '</header>';
      
    $req = $conn->prepare('SELECT  c.*
        FROM    Chambre c
        LEFT JOIN ResaChambre rc 
        ON c.id_chambre = rc.fk_chambre
        WHERE c.capacite >= :personne
        AND ISNULL(rc.fk_resa) 
        OR c.capacite >= :personne
        AND rc.fk_resa NOT IN (
          SELECT rv.id_resa FROM Reservation rv   
                   WHERE :dateArrivee BETWEEN dateArrivee AND dateDepart
                   OR    :dateDepart BETWEEN dateArrivee AND dateDepart 
                   OR  dateArrivee BETWEEN :dateArrivee AND :dateDepart  
                   AND dateDepart BETWEEN :dateArrivee AND :dateDepart
        )');

    $req->execute(array(
      "personne" => $personne,
      "dateDepart" => $dateDepart,
      "dateArrivee" => $dateArrivee
    ));
  

    while ($data = $req->fetch()) {
      $html = '<article>';
      $html .= '<a href="reservation.php?id=' . $data['id_chambre'] . '&personne=' . htmlspecialchars($personne) . '&dateArrivee=' . htmlspecialchars($dateArrivee) . '&dateDepart=' . htmlspecialchars($dateDepart) . '">';
            $html .= '<img src="img/chambres/' . $data['id_chambre'] . '.jpg"alt="' . $data['nom'] . '"/>';
            $html .= '<h2>' . $data['nom'] . '</h2>';
        $html .= '</a>';
      $html .= '<p>' . $data['description'] . '</p>';
      $html .= '<p>' . $data['capacite'] . ' personnes</p>';
      $html .= '<p>' . $data['surface'] . ' m²</p>';
      $html .= '<p>' . $data['tarif'] . ' €/jour</p>';
      
      $datetime1 = new DateTime($_GET["dateArrivee"]);
      $datetime2 = new DateTime($_GET["dateDepart"]);
      $interval = $datetime1->diff($datetime2);
      $tarifs = ($interval->format('%a')) * $data['tarif'];
  
          
      $html .= '<p> Pour cette réservation de '.$interval->format('%a').' jours le prix sera de <strong>' .  sprintf("%.2f", $tarifs) . ' €</strong></p>';

      $html .= '</article>';
      echo $html;
    }
 
    echo '</section>';
  }
?>
