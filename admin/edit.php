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
      #imgArticle {
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
      <nav class="menu-horisontal">
        <a href="#" onclick="ouvrirMenu()" class="btn-ouvrir"><img src="../img/menu.svg" alt="Menu"/></a>
        <a href="index.php" class="logo">Administration</a>
        <a href="../index.html" class="liens">Retourner sur le site</a>
      </nav>
      <nav id="menu-vertical" class="menu-vertical">
        <a href="#" onclick="fermerMenu()" class="btn-fermer">&times;</a>
        <a href="index.php">Administration</a>
        <a href="../index.html">Retourner sur le site</a>
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

    $req = $conn->prepare('UPDATE blog SET
      titre = :titre,
      courte_description = :courte_description,
      contenu =:contenu
      WHERE id = :id;');

    $req->execute(array(
      "titre" => $titre, 
      "courte_description" => $courte_description,
      "contenu" => $contenu,
      "id" => $id
    ));

    echo "Article modifié <a href='index.php'>retour</a> ?";
  }

  if(!empty($_GET["id"])) {
    // Pré-remplit le formulaire
    $result = $conn->prepare("SELECT * FROM blog WHERE id = ?");
    $result->execute([$_GET["id"]]);
    $data = $result->fetch();
  }
?>
      <form method="post" action="edit.php">
        <img id="imgArticle" src="/projetMilan/img/<?= $_GET["id"] ?>.jpg">
        <input name="id" type="hidden" value="<?= htmlspecialchars($data["id"]) ?>"/>
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($data["titre"]); ?>"/>
        <br/>
        <label for="courte_description">Courte description : </label>
        <textarea id="courte_description" name="courte_description" style="height:100px;" rows="3"><?= htmlspecialchars($data["courte_description"]); ?></textarea>
        <br/>
        <label for="contenu">Contenu : </label>
        <textarea d="contenu" id="contenu" name="contenu" style="height:150px;" rows="3"><?= htmlspecialchars($data["contenu"]); ?></textarea>
        <br/>
        <div class="boutons">
          <button type="reset" onclick="history.back()">Retour</button>
          <button type="reset">Effacer les modifications</button>
          <button type="submit">Modifier</button>
        </div> 
      </form>
    </section>
    <footer>Créé par Margaux SARTIEAUX et Joévin SOULENQ.</footer>
    </div>
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>