<?php
  /*
   * Affiche une chambre
   */
 if(!empty($_GET["id"])) {
    $result = $conn->prepare('SELECT * FROM Chambre WHERE id_chambre = ?');
    $result->execute([$_GET["id"]]);
    $data = $result->fetch();

    echo '<header>';
    echo '<h1>' . $data['nom']. '</h1><hr/>';
    echo '</header>';
    $html = '<article id="hotelchambre">';
    $html .= '<img src="img/chambres/' . $data['id_chambre'] . '_0.jpg"/>';
        $html .= '<p>' . $data['description'] . '</p>';
        $html .= '<p>' . $data['capacite'] . ' personnes</p>';
        $html .= '<p>' . $data['surface'] . ' m²</p>';
    $html .= '<p>' . $data['tarif'] . ' €</p>';
    $html .= '</article>';
    $html .= '<a class="button" href="#resahotel">Réserver</a>';
    echo $html;
 }

    /* 
     *Affiche l'ensemble des chambres
     */

 if (empty($_GET["id"])) {
    echo '<div class="chambre">';
    echo '<header>';
    echo '<h1>Les chambres :</h1><hr/>';
    echo '</header>';

      $result = $conn->prepare('SELECT * FROM Chambre');
      $result->execute();

      while ($data = $result->fetch()) {
        $html = '<article>';
        $html .= '<a href="hotel.php?id=' . $data['id_chambre'] . '">';
            $html .= '<img src="img/chambres/' . $data['id_chambre'] . '_0.jpg"alt="' . $data['nom'] . '"/>';
            $html .= '<h2>' . $data['nom'] . '</h2>';
        $html .= '</a>';
        $html .= '<p>' . $data['description'] . '</p>';
        $html .= '<p>' . $data['capacite'] . ' personnes</p>';
        $html .= '<p>' . $data['surface'] . ' m²</p>';
        $html .= '<p>' . $data['tarif'] . ' €</p>';
        $html .= '</article>';
        echo $html;
      }
      echo '</section>';
      $conn = null;
  }
?>