<!DOCTYPE html>
<html lang="fr">
  <head>
	<meta charset="UTF-8">
	<title>Le Château de Milan</title>
    <meta name="keywords" content="château, hôtel, reservation, milan, luxe, avis">
    <meta name="description" content="Le Château de Milan vous propose ses nombreuses chambres de luxe au meilleur prix.">
    <link rel="icon" href="img/favicon.ico">
  	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <?php require "inc/header.php"; ?>
	<div id="contenu">
    
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
      
    // la requête est à revoir
    $req = $conn->prepare('SELECT  c.*
FROM    Chambre c
LEFT JOIN ResaChambre rc ON c.id_chambre = rc.fk_chambre
WHERE c.capacite >= :personne
AND ISNULL(rc.fk_resa) OR rc.fk_resa NOT IN (
  SELECT rv.id_resa FROM Reservation rv   
           WHERE :dateArrivee BETWEEN dateArrivee AND dateDepart
           OR    :dateDepart BETWEEN dateArrivee AND dateDepart 
           OR  dateArrivee BETWEEN :dateArrivee AND :dateDepart  
           AND dateDepart BETWEEN :dateArrivee AND :dateDepart
)
         ORDER BY c.capacite;');

    $req->execute(array(
      "personne" => $personne,
      "dateDepart" => $dateDepart,
      "dateArrivee" => $dateArrivee
    ));

    while ($data = $req->fetch()) {
      $html = '<article>';
      $html .= '<a href="reservation.php?id=' . $data['id_chambre'] . '&personne=' . htmlspecialchars($personne) . '&dateArrivee=' . htmlspecialchars($dateArrivee) . '&dateDepart=' . htmlspecialchars($dateDepart) . '">';
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
  }

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
    $html .= '<img src="img/chambres/' . $data['id_chambre'] . '_0.jpg"/>';
        $html .= '<p>' . $data['description'] . '</p>';
        $html .= '<p>' . $data['capacite'] . ' personnes</p>';
        $html .= '<p>' . $data['surface'] . ' m²</p>';
    $html .= '<p>' . $data['tarif'] . ' €</p>';
    $html .= '</article>';
    echo $html;
?>

    <h1>Formulaire de réservation : </h1>
    <form class= "blog" action="reservation.php" accept-charset="UTF-8" method="POST">
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
    }

    if(!empty($_POST)){
      extract($_POST);
      if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($cp) && !empty($ville)
      && !empty($dateArrivee) && !empty($dateDepart) && !empty($personne)
      && !empty($id_chambre)) {

        $reqClient = $conn->prepare('INSERT INTO Client (nom, prenom, adresse, cp, ville)
                                     VALUES (:nom, :prenom, :adresse, :cp, :ville);
        ');
        $reqClient->execute(array(
          "nom" => $nom,
          "prenom" => $prenom, 
          "adresse" => $adresse, 
          "cp" => $cp, 
          "ville" => $ville
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

        echo "<h1>Réservation enregistrée !</h1>";
        }
      }
    $conn = null;
    echo '</section>';
?>
    	<?php require "inc/footer.php"; ?>
      </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
    <script defer src="js/fontawesome-all.min.js"></script>
  </body>
</html>