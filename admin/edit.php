<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <title>Administration</title>
  </head> 
  <body>
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
      <input name="id" type="hidden" value="<?= htmlspecialchars($data["id"]) ?>"/>
      Titre :<input type="text" name="titre" value="<?= htmlspecialchars($data["titre"]); ?>"/>
      <br />
      Image d'entête : <br />
      <img src="/projetMilan/img/<?= $_GET["id"] ?>.jpg" width="20%"><br/>
      Courte description :<br />
      <textarea name="courte_description" style="width:50%; height:50px;"><?= htmlspecialchars($data["courte_description"]); ?></textarea><br />
      Contenu :<br />
      <textarea name="contenu" style="width:50%; height:300px;"><?= htmlspecialchars($data["contenu"]); ?></textarea><br />
      <input type="submit" value="Modifier" />
    </form>
  </body>
</html>