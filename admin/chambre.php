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
        <h2>Liste des chambres :</h2>
      </header>
        <table>
<?php
  require "../inc/config.php";

  $result = $conn->prepare('SELECT * FROM CHAMBRE');
  $result->execute();

  while ($data = $result->fetch()) {
    $html = '<tr>';
    $html .= '<td>' .$data['id_chambre'] . '</td>';
    $html .= '<td>' . $data['nom'] . '</td>';
    $html .= '<td><a href="editChambre.php?id=' . $data['id_chambre'] . '">Modifier</a></td>';
    $html .= '<td><a href="supprChambre.php?id=' . $data['id_chambre'] . '">Supprimer</a></td>';
    $html .= '</tr>';
    echo $html;
  }
  $conn = null;
?>
      </table>
    </section>
    <section>
      <header><hr/>
        <h2>Créer une nouvelle chambre :</h2>
      </header>
      <form method="post" action="creerChambre.php" enctype="multipart/form-data">
        <label for="nom">Nom de la chambre :</label>
        <input type="text" id="nom" name="nom"/>
        <br/>
        <label for="capacite">Capacité : </label>
        <textarea d="capacite" id="capacite" name="capacite" style="height:150px;" rows="3"></textarea>
          <br/>
          
        <label for="surface">Surface : </label>
        <textarea d="surface" id="surface" name="surface" style="height:150px;" rows="3"></textarea>
          <br/>
          
        <label for="tarif">Tarif : </label>
        <textarea d="tarif" id="tarif" name="tarif" style="height:150px;" rows="3"></textarea>
          <br/>
        <label for="description">Description : </label>
        <input type="text" id="description" name="description"/>
        <br/>
        <label>Image : </label>
        <input type="file" style="border:none" name="image"/>
          <br/>
        <div class="boutons">
          <button type="reset">Annuler</button>
          <button type="submit">Créer</button>
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