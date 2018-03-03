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
      <p>
        <?php
          require "../../inc/config.php";
          try {
            $sql = "DELETE FROM Blog WHERE id_blog={$_GET['id']}";
            $conn->exec($sql);
            echo "<p>Article supprimé avec succès !</p><br/>";
          }
          catch(PDOException $e) {
            echo "<p><b>Erreur :</b> " . $e->getMessage()."</p>";
          }

          // suppression de l'image
          $image = realpath(dirname(getcwd())) . '/img/blog/' . $_GET['id'] . '.jpg';
          if(file_exists($image)){
              unlink($image);
              echo "<p>Image supprimée avec succès.</p><br/>";
          }
          else{
              echo "<p><b>Erreur :</b> Image introuvable.</p><br/>";
          }
        ?>
      </p>
    </section>
    <?php require "../../inc/footer.php"; ?>
    </div>
    <script src="../../js/jquery-3.2.1.js"></script>
    <script src="../../js/script.js"></script>
    <script>setTimeout(function(){ location.href='article.php'; }, 2000);</script>
    <script defer src="../../js/fontawesome-all.min.js"></script>
  </body>
</html>
