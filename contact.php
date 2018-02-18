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
    <section>
      <header>
        <h1>Contact</h1><hr/>
      </header>
      <form class="contact" action="inc/formContact.php" accept-charset="UTF-8" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" placeholder="Nom" name="nom" required>

        <label for="email">Émail :</label>
        <input type="email" id="email" placeholder="Émail" name="email" required>

        <label for="mess">Message :</label>
        <textarea id="mess" name="mess" rows="3" placeholder="Entrez ici le message que vous souhaitez nous envoyer." required></textarea>

        <div class="boutons">
          <button type="reset">Annuler</button>
          <button type="submit">Envoyer</button>
          <span class="etat_message"></span>
        </div>  
      </form>
    </section>
    <?php require "inc/footer.php"; ?>
    </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
    <script defer src="js/fontawesome-all.min.js"></script>
  </body>
</html>