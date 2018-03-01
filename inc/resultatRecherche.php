<?php
/* 
 * Fichier inutile à moins de faire de l'AJAX.
 * URL pour tester la page :
 * http://localhost/projetMilan/inc/resultatRecherche.php?dateArrivee=2018-03-15&dateDepart=2018-03-16&personne=1
 */
require "config.php";
if(!empty($_GET)){
  extract($_GET);
    
  if(!empty($dateArrivee) && !empty($dateDepart) && !empty($personne)) {
      echo '<section class="chambre">';
      echo '<header>';
      echo '<h1>Les Chambres :</h1><hr/>';
      echo '</header>';

      $req = $conn->prepare('SELECT * 
      FROM Chambre
      WHERE capacite > :capacite
      NOT IN (
        SELECT id_chambre 
        FROM Reservation r
        WHERE r.dateArrivee > :dateArrivee
        AND r.dateDepart < :dateDepart);');


      $req->execute(array(
        "capacite" => $personne, 
        "dateArrivee" => $dateArrivee, 
        "dateDepart" => $dateDepart
      ));

      while ($data = $req->fetch()) {
        $html = '<article>';
        $html .= '<a href="hotel.php?id=' . $data['id_chambre'] . '">';
            $html .= '<img src="img/chambres/' . $data['id_chambre'] . '_0.jpg"/>';
            $html .= '<h2>' . $data['nom'] . '</h2>';
        $html .= '</a>';
        $html .= '<p>' . $data['description'] . '</p>';
        $html .= '<p>' . $data['capacite'] . ' personnes</p>';
        $html .= '<p>' . $data['surface'] . ' m²</p>';
        $html .= '<p>' . $data['tarif'] . ' €</p>';
        $html .= '</article>';
        echo $html;
      }

      $conn = null;
    }
  }
?>