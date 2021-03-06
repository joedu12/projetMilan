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
        <h2>Liste des articles :</h2>
      </header>
        <table>
<?php
  require "../../inc/config.php";

  $result = $conn->prepare('SELECT * FROM Blog');
  $result->execute();

  while ($data = $result->fetch()) {
    $html = '<tr>';
    $html .= '<td>' .$data['id_blog'] . '</td>';
    $html .= '<td>' . $data['titre'] . '</td>';
    $html .= '<td><a href="editPlat.php?id=' . $data['id_blog'] . '">Modifier</a></td>';
    $html .= '<td><a href="supprPlat.php?id=' . $data['id_blog'] . '">Supprimer</a></td>';
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
      <form method="post" action="creerPlat.php" enctype="multipart/form-data">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required/>
        <br/>
        <label for="courte_description">Courte description : </label>
        <input type="text" id="courte_description" name="courte_description" required/>
        <br/>
        <label for="content">Longue description : </label>
        <textarea id="content" name="content" style="height:150px;" rows="3" required></textarea>
        <br/>
        <label>Image d'entête : </label>
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
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/script.js"></script>
    <script defer src="../../js/fontawesome-all.min.js"></script>
  </body>
</html>
