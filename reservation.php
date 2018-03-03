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
    
    <div class="reservation" id = "resahotel">
            <?php require "inc/cadreResa.php"; ?>
    </div>
        <?php
          require "inc/config.php";
          /*
           * Affiche la chambre disponible correspondant aux critères
           */
          if(!empty($_GET["personne"]) && !empty($_GET["dateArrivee"]) && !empty($_GET["dateDepart"])) {
            extract($_GET);

            echo '<section class="chambre">';

            echo '<header>';
                echo '<h1>Chambre disponible trouvée(s) :</h1><hr/>';
            echo '</header>';

            $req = $conn->prepare('SELECT  c.*
            FROM    chambre c
            LEFT JOIN resachambre rc ON c.id_chambre = rc.fk_chambre
            WHERE c.capacite >= :personne
            AND ISNULL(rc.fk_resa) OR rc.fk_resa NOT IN (
              SELECT rv.id_resa FROM reservation rv   
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
              $html .= '<a href="reservation.php?id=' . $data['id_chambre'] .  '&dateDepart=' . $dateDepart . '&dateArrivee=' . $dateArrivee .  '&nbPers=' . $personne .'">';
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
              <input type="hidden" id="nbPers" name="nbPers" value="<?= $_GET['nbPers'] ?>">
              <input type="hidden" id="dateArrivee" name="dateArrivee" value="<?= $_GET['dateArrivee'] ?>">
              <input type="hidden" id="dateDepart" name="dateDepart" value="<?= $_GET['dateDepart'] ?>">
              <div class="boutons">
                <button type="reset">Annuler</button>
                <button type="submit">Réserver</button>
              </div>
            </form>
        <?php
            }

            if(!empty($_POST)){
              extract($_POST);
              if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($cp) && !empty($ville)) {

                $req1 = $conn->prepare('INSERT INTO Client (nom, prenom, adresse, cp, ville) VALUES (:nom, :prenom, :adresse, :cp, :ville);');
                
                $req1->execute(array(
                  "nom" => $nom, 
                  "prenom" => $prenom, 
                  "adresse" => $adresse, 
                  "cp" => $cp, 
                  "ville" => $ville
                ));
                  
                $idClient = $conn->lastInsertId();
                  
                $req2 = $conn->prepare('INSERT INTO Reservation (nbPers, dateResa, dateArrivee, dateDepart, fk_client) VALUES (:nbPers, :dateResa, :dateArrivee, :dateDepart, :idClient);');
                  
                $req2->execute(array(
                  "nbPers" => intval($nbPers), 
                  "dateResa" => date('Y-m-d'), 
                  "dateArrivee" => $dateArrivee, 
                  "dateDepart" => $dateDepart,
                  "idClient" => $idClient
                ));

                echo "Merci pour votre réservation $prenom ! <br/>";
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
