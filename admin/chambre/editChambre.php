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
          $data = null;

          // Modifie la chambre
          if(!empty($_POST)){
            extract($_POST);

            $req = $conn->prepare('UPDATE Chambre SET
              nom = :nom, 
              description = :description,
              surface = :surface,
              tarif = :tarif,
              capacite = :capacite,
              equipement = :equipement
              WHERE id_chambre = :id;');

            $req->execute(array(
              "nom" => $nom, 
              "description" => $description,
              "surface" => $surface, 
              "tarif" => $tarif,
              "capacite" => $capacite,
              "equipement" => $equipement,
              "id" => $id
            ));

            // upload l'image s'il y en a une
            if(!empty($_FILES['image']))
            {
              $path = realpath(dirname(getcwd())) . '../../img/chambres/' . $id . '_0.jpg';
              move_uploaded_file($_FILES['image']['tmp_name'], $path);
            }

            echo "<p>Chambre modifié avec succès !</p>";
            echo "<p><a href='chambre.php'>Retour à la liste des chambres</a> ?</p>";

            // complète le formulaire
            $data["id_chambre"] = $id;
            $_GET["id"] = $id;
            $data["nom"] = $nom;
            $data["description"] = $description;
            $data["surface"] = $surface;
            $data["tarif"] = $tarif;
            $data["capacite"] = $capacite;
            $data["equipement"] = $equipement;
          }

          if(!empty($_GET["id"])) {
            // Pré-remplit le formulaire
            $result = $conn->prepare("SELECT * FROM Chambre WHERE id_chambre = ?");
            $result->execute([$_GET["id"]]);
            $data = $result->fetch();
          }
        ?>
      <form method="post" action="editChambre.php" enctype="multipart/form-data">
        <img id="imgArticle" src="/projetMilan/img/chambres/<?= $_GET["id"] ?>.jpg?<?= date('U') ?>" alt="<?= htmlspecialchars($data["nom"]) ?>">
        <input name="id" type="hidden" value="<?= htmlspecialchars($data["id_chambre"]) ?>"/>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($data["nom"]); ?>"/>
        <br/>
        <label for="description">Description : </label>
        <textarea id="description" name="description" style="height:100px;" rows="3"><?= htmlspecialchars($data["description"]); ?></textarea>
        <br/>
        <label for="equipement">Équipement : </label>
        <textarea id="equipement" name="equipement" style="height:100px;" rows="3"><?= htmlspecialchars($data["equipement"]); ?></textarea>
        <br/>
        <label for="capacite">Capacite :</label>
        <input type="number" id="capacite" name="capacite" value="<?= htmlspecialchars($data["capacite"]); ?>"/>
        <br/>
        <label for="surface">Surface :</label>
        <input type="number" id="surface" name="surface" value="<?= htmlspecialchars($data["surface"]); ?>"/>
        <br/>
        <label for="tarif">Tarif :</label>
        <input type="text" id="tarif" name="tarif" value="<?= htmlspecialchars($data["tarif"]); ?>"/>
        <br/>
        <label>Image d'entête (laisser vide pour conserver l'existante) :</label>
        <input type="file" style="border:none" name="image"/>
        <br/>
        <div class="boutons">
          <button type="reset" onclick="history.back()">Retour</button>
          <button type="reset">Effacer les modifications</button>
          <button type="submit">Modifier</button>
        </div> 
      </form>
    </section>
    <?php require "../../inc/footer.php"; ?>
    </div>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/script.js"></script>
    <script defer src="../../js/fontawesome-all.min.js"></script>
  </body>
</html>
