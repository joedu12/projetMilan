<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <title>Administration</title>
  </head> 
  <body>
    <?php
      require "../inc/config.php";
      try {
        $sql = "DELETE FROM blog WHERE id={$_GET['id']}";
        $conn->exec($sql);
        echo "Article supprimé avec succès !";
      }
      catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }

      // suppression de l'image
      $image = realpath(dirname(getcwd())) . '/img/' . $id . '.jpg';
      unlink($image);
    ?>
    <script>location.href='index.php';</script>
  </body>
</html>