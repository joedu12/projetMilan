<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Le Château de Milan - Administration</title>
    <link rel="icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head> 
  <body>
    <?php require "../admMenu.php"; ?>
  <div id="contenu">
    <section>
        <?php
          require "../../inc/config.php";
          try {
            extract($_POST);

            $req = $conn->prepare('INSERT INTO Chambre (nom, description, surface, tarif, capacite, equipement)
            VALUES (:nom, :description, :surface, :tarif, :capacite, :equipement)');

            $req->execute(array(
              "nom" => $nom, 
              "description" => $description,
              "equipement" => $equipement,
              "surface" => $surface, 
              "tarif" => $tarif, 
              "capacite" => $capacite
            ));

            echo "<p>Chambre créé avec succès !</p><br/>";
            $id = $conn->lastInsertId();
          }
          catch(PDOException $e) {
            echo "<p><b>Erreur :</b> " . $e->getMessage()."</p>";
          }
          $conn = null;

          // upload l'image s'il y en a une
          if(!empty($_FILES['image']))
          {
            $path = realpath(dirname(getcwd())) . '../../img/chambres/' . $id . '.jpg';
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
              echo "<p>L'image ".  basename( $_FILES['image']['name']) . " à bien été envoyée.</p><br/>";
            } else{
                echo "<p><b>Erreur :</b> Aucune image n'a été envoyée.</p><br/>";
            }
          }
        ?>
    </section>
    <?php require "../../inc/footer.php"; ?>
    </div>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/script.js"></script>
    <script>setTimeout(function(){ location.href='chambre.php'; }, 2000);</script>
    <script defer src="../../js/fontawesome-all.min.js"></script>
  </body>
</html>
