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
      <header>
        <h2>Liste des articles :</h2>
      </header>
        <table>
<?php
  require "../inc/config.php";

  $result = $conn->prepare('SELECT * FROM blog');
  $result->execute();

  while ($data = $result->fetch()) {
    $html = '<tr>';
    $html .= '<td>' .$data['id_blog'] . '</td>';
    $html .= '<td>' . $data['titre'] . '</td>';
    $html .= '<td><a href="edit.php?id=' . $data['id_blog'] . '">Modifier</a></td>';
    $html .= '<td><a href="suppr.php?id=' . $data['id_blog'] . '">Supprimer</a></td>';
    $html .= '</tr>';
    echo $html;
  }
  $conn = null;
?>
      </table>
    </section>
    <section>
      <header><hr/>
        <h2>Créer un nouvel article :</h2>
      </header>
      <form method="post" action="creer.php" enctype="multipart/form-data">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre"/>
        <br/>
        <label for="courte_description">Courte description : </label>
        <input type="text" id="courte_description" name="courte_description"/>
        <br/>
        <label for="contenu">Courte description : </label>
        <textarea d="contenu" id="contenu" name="contenu" style="height:150px;" rows="3"></textarea>
        <br/>
        <label>Image d'entête : </label>
        <input type="file" style="border:none" name="image"></input><br/>
        <div class="boutons">
          <button type="reset">Annuler</button>
          <button type="submit">Créer</button>
        </div> 
      </form>
    </section>
    <footer>Créé par Margaux SARTIEAUX et Joévin SOULENQ.</footer>
    </div>
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>