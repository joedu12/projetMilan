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
    <?php require "inc/header.php"; ?>
    <div id="contenu">
        <div id="carousel">
            <figure>			
                <img src="img/hotel/chambre-1.jpg" alt="Chambre 1">
                <img src="img/hotel/chambre-2.jpg" alt="Chambre 2">
                <img src="img/hotel/chambre-3.jpg" alt="Chambre 3">
                <img src="img/hotel/chambre-4.jpg" alt="Chambre 4">
            </figure>
        </div>
        <div class="reservation" id = "resahotel">
                <?php require "inc/cadreResa.php"; ?>
        </div>
        <section>

            <?php require "inc/config.php"; ?>
            <?php require "php/affichageChambres.php"; ?>
            
        </section>
        <?php require "inc/footer.php"; ?>
     </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"></script>
    <script defer src="js/fontawesome-all.min.js"></script>
  </body>
</html>
