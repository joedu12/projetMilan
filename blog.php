<!DOCTYPE html>
<html lang="fr">
  <head>
	<meta charset="UTF-8">
	<title>Le Château de Milan</title>
    <meta name="keywords" content="château, hôtel, reservation, milan, luxe, avis">
    <meta name="description" content="Le Château de Milan vous propose ses nombreuses chambres de luxe au meilleur prix.">
    <link rel="icon" href="img/favicon.ico">
  	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  	<header>
        <nav class="menu-horisontal">
			<a href="#" onclick="ouvrirMenu()" class="btn-ouvrir"><img src="img/menu.svg" alt="Menu"/></a>
			<a href="index.html" class="logo">Le Château de Milan</a>
            <a href="hotel.html" class="liens">Hôtel</a>
            <a href="blog.html" class="actif">Blog</a>
            <a href="contact.html" class="liens">Contact</a>
        </nav>
		<nav id="menu-vertical" class="menu-vertical">
			<a href="#" onclick="fermerMenu()" class="btn-fermer">&times;</a>
			<a href="index.html">Accueil</a>
			<a href="hotel.html">Hôtel</a>
            <a href="blog.html">Blog</a>
            <a href="contact.html">Contact</a>
		</nav>
    	</header>
	<div id="contenu">
		<section class="blog"> 
<?php
  require "inc/config.php";

  $query = "SELECT * FROM blog";
  $result = $conn->query($query);
  $result->setFetchMode(PDO::FETCH_CLASS, 'Blog');

  if(!empty($_GET["id"])) {
    $blog = $result->fetch();
    echo $blog->voir($_GET["id"])."\n";
  }
  else {
    while ($blog = $result->fetch()) {
        echo $blog->liste()."\n";
    }
  }
  $conn = null;
?>
		</section>
		<footer>Créé par Margaux SARTIEAUX et Joévin SOULENQ.</footer>
	 </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
