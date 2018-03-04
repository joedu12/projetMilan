<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Le Château de Milan - Administration</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
	<link href='../css/fullcalendar.min.css' rel='stylesheet' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php require "admMenu.php"; ?>
	<div id="contenu">
		<section>
			<header>
				<h2>Bonjour !</h2>
			</header>
			<p>Vous pouvez ici ajouter, modifier ou supprimer les plats ou les chambres.</p>
			<p>Le calendrier ci-dessous vous permet de visualiser les réservations.</p>
			<div id="calendrier"></div>
		</section>
		<?php require "../inc/footer.php"; ?>
    </div>
	<script src='../js/moment.min.js'></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
	<script src='../js/fullcalendar.min.js'></script>
	<script src='../js/locale-all.js'></script>
    <script src="../js/script.js"></script>
    <script defer src="../js/fontawesome-all.min.js"></script>
  </body>
</html>
