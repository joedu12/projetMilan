<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Le Château de Milan - Administration</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
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
      <p>
<?php
  require "../inc/config.php";
  try {
    extract($_POST);
    $sql = "INSERT INTO blog (titre, courte_description, contenu)
            VALUES ('$titre', '$courte_description', '$contenu')";
    $conn->exec($sql);
    echo "Article créé avec succès !<br/>";
    $id = $conn->lastInsertId();
  }
  catch(PDOException $e) {
    echo "<b>Erreur :</b> " . $e->getMessage();
  }
  $conn = null;

  // upload l'image s'il y en a une
  if(!empty($_FILES['image']))
  {
    $path = realpath(dirname(getcwd())) . '/img/' . $id . '.jpg';
    if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
      echo "L'image ".  basename( $_FILES['image']['name']) . " à bien été envoyée.<br/>";
    } else{
        echo "<b>Erreur :</b> Aucune image n'a été envoyée.<br/>";
    }
  }
?>
      </p>
    </section>
    <footer>Créé par Margaux SARTIEAUX et Joévin SOULENQ.</footer>
    </div>
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/script.js"></script>
    <script>setTimeout(function(){ location.href='index.php'; }, 2000);</script>
  </body>
</html>