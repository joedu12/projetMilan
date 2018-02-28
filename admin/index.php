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
      table { margin-bottom: 20px; }
      td { padding: 3px; }
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
      <header>
        <h2>Bonjour !</h2>
      </header>
        <p>Ici, vous pourrez ajouter, modifier, supprimer les articles ou les chambres</p>
    </section>
    <?php require "../inc/footer.php"; ?>
    </div>
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/script.js"></script>
    <script defer src="../js/fontawesome-all.min.js"></script>
  </body>
</html>