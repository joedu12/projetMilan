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
        <nav class="menu-horizontal">
			<a href="#" onclick="ouvrirMenu()" class="btn-ouvrir"><img src="img/menu.svg" alt="Menu"/></a>
			<a href="index.php" class="logo">Le Château de Milan</a>
            <a href="hotel.php" class="actif">Hôtel</a>
            <a href="blog.php" class="liens">Blog</a>
            <a href="contact.php" class="liens">Contact</a>
        </nav>
		<nav id="menu-vertical" class="menu-vertical">
			<a href="#" onclick="fermerMenu()" class="btn-fermer">&times;</a>
			<a href="index.php">Accueil</a>
			<a href="hotel.php">Hôtel</a>
            <a href="blog.php">Blog</a>
            <a href="contact.php">Contact</a>
		</nav>
    </header>
	<div id="contenu">
		<div id="carousel">
			<figure>			
				<img src="img/chambre-1.jpg" alt="Chambre 1">
				<img src="img/chambre-2.jpg" alt="Chambre 2">
				<img src="img/chambre-3.jpg" alt="Chambre 3">
				<img src="img/chambre-4.jpg" alt="Chambre 4">
			</figure>
		</div>
		<section>
			<header>
			  <h1>To do list :</h1><hr/>
			</header>
			  <li>
				<b>Carousel => OK</b>
				<p>Faire un carousel sur la page de l'hôtel (CSS).</p>
			  </li>
			  <li>
				<b>Flèche => OK</b>
				<p>Scroll animé vers le bas (jquery).</p>
			  </li>
			  <li>
				  <b>Menu responsive => OK</b>
				  <p>Menu responsive (CSS + JS).</p>
			  </li>
			  <li>
				  <b>Joli header</b>
				  <p>Bandeau qui disparait au scroll.</p>
			  </li>
			  <li>
				  <b>Blog (il manque les commentaires)</b>
				  <p>Le rendre efficace et magnifique.</p>
			  </li>
			  <li>
				  <b>Réservation :</b>
				  <p>Le rendre efficace et magnifique.</p>
			  </li>
			  <li>
				  <b>Footer :</b>
				  <p>Le rendre efficace et magnifique.</p>
			  </li>
		</section>
    	<?php require "inc/footer.php"; ?>
	</div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
    <script defer src="js/fontawesome-all.min.js"></script>
  </body>
</html>