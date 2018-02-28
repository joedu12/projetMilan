<?php
    /* 
     *Affiche le resultat des chambres
     */
    
if(!empty($_REQUEST)){
  extract($_REQUEST);
    
  if(!empty(dateArrivee) && !empty(dateDepart) && !empty($mess)) {
    echo '<section class="chambre">';
	echo '<header>';
	echo '<h1>Les chambres :</h1><hr/>';
    echo '</header>';

      $result = $conn->prepare(' 
        SELECT * 
        FROM CHAMBRES C 
        WHERE C.type_chambre = '$type_chambre'
        AND ID_chambre NOT IN (
          SELECT ID_chambre 
          FROM RESERVATION R 
          WHERE R.dateArrivee > '$dateArrivee'
          AND R.dateDepart < '$dateDepart'
          AND R.nbPers = '$personne'
        );');
      $result->execute();

      while ($data = $result->fetch()) {
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
      
?>
