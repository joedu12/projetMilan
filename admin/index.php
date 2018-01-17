<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <title>Administration</title>
  </head> 
  <body>
    <form method="post" action="creer.php" enctype="multipart/form-data">
      Titre : <input type="text" name="titre"/>
      <br />
      Courte description : <input type="text" name="courte_description"/>
      <br />
      Contenu :<br />
      <textarea name="contenu" style="width:80%; height:150px;"></textarea>
      <br />
      <input type="file" name="uploaded_file"></input><br />
      <input type="submit" value="Créér"/>
    </form>
  <br/>
  <?php
    require "../inc/config.php";

    $query = "SELECT * FROM blog";
    $result = $conn->query($query);
    $result->setFetchMode(PDO::FETCH_CLASS, 'Blog');

    while ($blog = $result->fetch()) {
        echo $blog->listeAdmin()."\n";
    }
    $conn = null;
  ?>
 
  <p><a href='../'>Retour au site</a></p>
  </body>
</html>