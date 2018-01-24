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
        <a href="blog.php" class="actif">Blog</a>
        <a href="contact.html" class="liens">Contact</a>
        </nav>
  		<nav id="menu-vertical" class="menu-vertical">
  			<a href="#" onclick="fermerMenu()" class="btn-fermer">&times;</a>
  			<a href="index.html">Accueil</a>
  			<a href="hotel.html">Hôtel</a>
        <a href="blog.php">Blog</a>
        <a href="contact.html">Contact</a>
  		</nav>
    	</header>
	<div id="contenu">
		<section class="blog"> 
<?php
  require "inc/config.php";

  /*
   * Affiche un article au complet
   */
  if(!empty($_GET["id"])) {
    $result = $conn->prepare('SELECT * FROM blog WHERE id = ?');
    $result->execute([$_GET["id"]]);
    $data = $result->fetch();

    $html  = '<header>';
      $html .= '<img src="img/' . $data['id'] . '.jpg"/>';
      $html .= '<h2>' . $data['titre'] . '</h2>';
      $html .= '<time>' . $data['date'] . '</time>';
      $html .= '<p>' . $data['courte_description'] . '</p>';
      $html .= '<p>' . $data['contenu'] . '</p>';
    $html .= '</header>';
    echo $html;
    $conn = null;
  }

  /*
   * Affiche la liste des articles
   */
  elseif (empty($_GET["id"])) {
    // numéro de page par défaut
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1); 
    $limite = 2;

    // numéro du premier enregistrement
    $debut = ($page - 1) * $limite;

    $result = $conn->prepare('SELECT * FROM blog LIMIT :limite OFFSET :debut');
    $result->bindValue('debut', $debut, PDO::PARAM_INT);
    $result->bindValue('limite', $limite, PDO::PARAM_INT);
    $result->execute();

    while ($data = $result->fetch()) {
      $html = '<header>';
        $html .= '<a href="blog.php?id=' . $data['id'] . '">';
          $html .= '<img src="img/' . $data['id'] . '.jpg"/>';
          $html .= '<h2>' . $data['titre'] . '</h2>';
          $html .= '<time>' . $data['date'] . '</time>';
        $html .= '</a>';
        $html .= '<p>' . $data['courte_description'] . '</p>';
      $html .= '<hr/></header>';

      echo $html;
    }

    $html  = '<a href="?page=' . ($page - 1) . '">Page précédente</a>';
    $html .= ' - ';
    $html  .= '<a href="?page=' . ($page + 1) . '">Page suivante</a>';
    echo $html;

    $conn = null;
  }
?>
		</section>
		<footer>Créé par Margaux SARTIEAUX et Joévin SOULENQ.</footer>
	 </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
