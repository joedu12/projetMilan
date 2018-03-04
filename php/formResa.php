<?php

  /*
   * Affiche la chambre à réserver
   */
  if(!empty($_GET["id"])) {
    $result = $conn->prepare('SELECT * FROM Chambre WHERE id_chambre = ?');
    $result->execute([$_GET["id"]]);
    $data = $result->fetch();

    echo '<section>';
    echo '<header>';
    echo '<h1>' . $data['nom']. '</h1><hr/>';
    echo '</header>';
    $html = '<article>';
    $html .= '<img src="img/chambres/' . $data['id_chambre'] . '.jpg"/>';
        $html .= '<p>' . $data['description'] . '</p>';
        $html .= '<p>' . $data['capacite'] . ' personnes</p>';
        $html .= '<p>' . $data['surface'] . ' m²</p>';
    $html .= '<p>' . $data['tarif'] . ' €</p>';
      
      $datetime1 = new DateTime($_GET["dateArrivee"]);
      $datetime2 = new DateTime($_GET["dateDepart"]);
      $interval = $datetime1->diff($datetime2);
      $tarifs = ($interval->format('%a')) * $data['tarif'];
  
          
      $html .= '<p> Pour cette réservation de '.$interval->format('%a').' jours le prix sera de <strong>' .  sprintf("%.2f", $tarifs) . ' €</strong></p>';

    $html .= '<h2>Résumé des équipements</h2> ';
    $html .= '<hr>';
    $html .= '<div class = "column">'. $data['equipement'] . '</div>';
    $html .= '</article>';
    $html .= '<hr/>';
    echo $html;
?>

    <h1>Formulaire de réservation : </h1>
    <form class= "blog" action="reservation.php" action="php/mailResa.php" action="php/mailClient.php"  accept-charset="UTF-8" method="POST">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom" required>
      <label for="prenom">Prénom</label>
      <input type="text" id="prenom" name="prenom" required>
      <label for="adresse">Adresse</label>
      <input type="text" id="adresse" name="adresse" required>
      <label for="cp">Code Postal</label>
      <input type="text" id="cp" name="cp" required>
      <label for="mail">Ville</label>
      <input type="text" id="ville" name="ville" required>
      <label for="email">Email</label>
      <input type="text" id="email" name="email" required>
      <label for="dateArrivee">Date d'arrivée</label>
      <input type="date" name="dateArrivee" id="dateArrivee" value="<?= htmlspecialchars($_GET["dateArrivee"]) ?>" required>
      <label for="dateDepart">Date de départ</label>
      <input type="date" name="dateDepart" id="dateDepart" value="<?= htmlspecialchars($_GET["dateDepart"]) ?>" required>
      <label for="personne">Personnes</label>
      <input type="number" name="personne" id="personne" value="<?= htmlspecialchars($_GET["personne"]) ?>" required>
      <input type="hidden" value="<?= htmlspecialchars($_GET["id"]) ?>" name="id_chambre">
      <div class="boutons">
        <button type="reset">Annuler</button>
        <button type="submit">Réserver</button>
      </div>
    </form>
<?php
    } ?>
