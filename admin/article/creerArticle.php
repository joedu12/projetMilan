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
    <?php require "admMenu.php"; ?>
  <div id="contenu">
    <section>
      <p>
        <?php
          require "../inc/config.php";
          try {
            extract($_POST);

            $req = $conn->prepare('INSERT INTO Blog (titre, courte_description, contenu)
            VALUES (:titre, :courte_description, :contenu)');

            $req->execute(array(
              "titre" => $titre,
              "courte_description" => $courte_description,
              "contenu" => $contenu
            ));

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
            $path = realpath(dirname(getcwd())) . '/img/blog/' . $id . '.jpg';
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
              echo "L'image ".  basename( $_FILES['image']['name']) . " à bien été envoyée.<br/>";
            } else{
                echo "<b>Erreur :</b> Aucune image n'a été envoyée.<br/>";
            }
          }
        ?>
      </p>
    </section>
    <?php require "../inc/footer.php"; ?>
    </div>
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/script.js"></script>
    <script>setTimeout(function(){ location.href='index.php'; }, 2000);</script>
    <script defer src="../js/fontawesome-all.min.js"></script>
  </body>
</html>