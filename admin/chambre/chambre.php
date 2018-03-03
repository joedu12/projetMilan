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
      <header>
        <h2>Liste des chambres :</h2>
      </header>
        <table>
<?php
  require "../../inc/config.php";

  $result = $conn->prepare('SELECT * FROM Chambre');
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
        <input type="number" id="capacite" name="capacite"/>
        <br/>
        <label for="surface">Surface : </label>
        <input type="number" id="surface" name="surface"/>
        <br/>
        <label for="tarif">Tarif : </label>
        <input d="tarif" id="tarif" name="tarif"/>
        <br/>
        <label for="description">Description : </label>
        <textarea d= "description" id="description" name="description"></textarea>
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
    <?php require "../../inc/footer.php"; ?>
    </div>
    <script src="../../js/jquery-3.2.1.js"></script>
    <script src="../../js/script.js"></script>
    <script defer src="../../js/fontawesome-all.min.js"></script>
  </body>
</html>
