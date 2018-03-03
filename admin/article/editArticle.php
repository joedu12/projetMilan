<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Le Château de Milan - Administration</title>
    <link rel="icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <style> /* surcharge pour la page d'administration */
      
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head> 
  <body>
    <?php require "../admMenu.php"; ?>
  <div id="contenu">
    <section>
        <?php
          require "../../inc/config.php";
          $data = null;

          // Modifie l'article
          if(!empty($_POST)){
            extract($_POST);

            $req = $conn->prepare('UPDATE Blog SET
              titre = :titre,
              courte_description = :courte_description,
              contenu = :contenu
              WHERE id_blog = :id;');

            $req->execute(array(
              "titre" => $titre, 
              "courte_description" => $courte_description,
              "contenu" => $contenu,
              "id" => $id
            ));

            // upload l'image s'il y en a une
            if(!empty($_FILES['image']))
            {
              $path = realpath(dirname(getcwd())) . '../../img/blog/' . $id . '.jpg';
              move_uploaded_file($_FILES['image']['tmp_name'], $path);
            }

            echo "<p>Article modifié avec succès !</p>";
            echo "<p><a href='article.php'>Retour aux articles</a> ?</p>";

            // complète le formulaire
            $data["id_blog"] = $id;
            $_GET["id"] = $id;
            $data["titre"] = $titre;
            $data["courte_description"] = $courte_description;
            $data["contenu"] = $contenu;
          }

          if(!empty($_GET["id"])) {
            // Pré-remplit le formulaire
            $result = $conn->prepare("SELECT * FROM Blog WHERE id_blog = ?");
            $result->execute([$_GET["id"]]);
            $data = $result->fetch();
          }
        ?>
      <form method="post" action="editArticle.php" enctype="multipart/form-data">
        <img id="imgArticle" src="/projetMilan/img/blog/<?= $_GET["id"] ?>.jpg?<?= date('U') ?>" alt="<?= htmlspecialchars($data["titre"]); ?>">
        <input name="id" type="hidden" value="<?= htmlspecialchars($data["id_blog"]) ?>"/>
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($data["titre"]); ?>"/>
        <br/>
        <label for="courte_description">Courte description : </label>
        <textarea id="courte_description" name="courte_description" style="height:100px;" rows="3"><?= htmlspecialchars($data["courte_description"]); ?></textarea>
        <br/>
        <label for="contenu">Contenu : </label>
        <textarea d="contenu" id="contenu" name="contenu" style="height:150px;" rows="3"><?= htmlspecialchars($data["contenu"]); ?></textarea>
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
    <script src="../../js/jquery-3.2.1.js"></script>
    <script src="../../js/script.js"></script>
    <script defer src="../../js/fontawesome-all.min.js"></script>
  </body>
</html>
