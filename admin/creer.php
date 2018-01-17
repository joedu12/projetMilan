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
        extract($_POST);
        $sql = "INSERT INTO blog (titre, courte_description, contenu)
                VALUES ('$titre', '$courte_description', '$contenu')";
        $conn->exec($sql);
        echo "Article créé avec succès !<br/>";
        $id = $conn->lastInsertId();
      }
      catch(PDOException $e) {
        echo $sql . "<br/>" . $e->getMessage();
      }
      $conn = null;


    // upload l'image s'il y en a une
    if(!empty($_FILES['uploaded_file']))
    {
      $path = realpath(dirname(getcwd())) . '/img/' . $id . '.jpg';
      if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        echo "L'image ".  basename( $_FILES['uploaded_file']['name']) . " à bien été envoyée.";
      } else{
          echo "Erreur lors de l'envoi du fichier.";
      }
    }
    ?>
    <script>location.href='index.php';</script>
  </body>
</html>