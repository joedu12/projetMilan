<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Le Château de Milan - Administration</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
    <style> /* surcharge pour la page d'administration */
      input, textarea, select {
        margin: 0px 0px;
        width: 75%;
        resize: vertical;
      }
      #imgChambre {
        width: 100%;
        height: 25vh;
        object-fit: cover;
        margin-bottom: 20px;
      }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head> 
  <body>
    <header>
      <nav class="menu-horizontal">
        <a href="#" onclick="ouvrirMenu()" class="btn-ouvrir"><img src="../img/menu.svg" alt="Menu"/></a>
        <a href="index.php" class="logo">Administration</a>
        <a href="article.php" class="liens">Articles</a>
        <a href="chambre.php" class="liens">Chambres</a>
        <a href="../index.php" class="liens">Retourner sur le site</a>
      </nav>
      <nav id="menu-vertical" class="menu-vertical">
        <a href="#" onclick="fermerMenu()" class="btn-fermer">&times;</a>
        <a href="index.php">Administration</a>
        <a href="article.php" class="liens">Articles</a>
        <a href="chambre.php" class="liens">Chambres</a>
        <a href="../index.php">Retourner sur le site</a>
      </nav>
    </header>
  <div id="contenu">
    <section>
<?php
  require "../inc/config.php";
  $data = null;

  // Modifie l'article
  if(!empty($_POST)){
    extract($_POST);

    $req = $conn->prepare('UPDATE Chambre SET
      nom = :nom, 
      description = :description, 
      surface = :surface, 
      tarif = :tarif,
      capacite = :capacite
      WHERE id_chambre = :id;');

    $req->execute(array(
      "nom" => $nom, 
      "description" => $description, 
      "surface" => $surface, 
      "tarif" => $tarif,
      "capacite" => $capacite,
      "id" => $id
    ));

    echo "Chambre modifié avec succès <a href='index.php'>retour</a> ?";
  }

  if(!empty($_GET["id"])) {
    // Pré-remplit le formulaire
    $result = $conn->prepare("SELECT * FROM Chambre WHERE id_chambre = ?");
    $result->execute([$_GET["id"]]);
    $data = $result->fetch();
  }
?>
      <form method="post" action="editChambre.php">
        <img id="imgChambre" src="/projetMilan/img/chambres/<?= $_GET["id"] ?>_0.jpg" alt="<?= htmlspecialchars($data["nom"]) ?>">
        <input name="id" type="hidden" value="<?= htmlspecialchars($data["id_chambre"]) ?>"/>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($data["nom"]); ?>"/>
        <br/>
        <label for="description">Description : </label>
        <textarea id="description" name="description" style="height:100px;" rows="3"><?= htmlspecialchars($data["description"]); ?></textarea>
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
        <div class="boutons">
          <button type="reset" onclick="history.back()">Retour</button>
          <button type="reset">Effacer les modifications</button>
          <button type="submit">Modifier</button>
        </div> 
      </form>
    </section>
    <?php require "../inc/footer.php"; ?>
    </div>
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/script.js"></script>
    <script defer src="../js/fontawesome-all.min.js"></script>
  </body>
</html>