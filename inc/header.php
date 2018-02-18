  	<header>
      <nav class="menu-horizontal">
  			<a href="#" onclick="ouvrirMenu()" class="btn-ouvrir"><img src="img/menu.svg" alt="Menu"/></a>
  			<a href="index.php" class="logo">Le Château de Milan</a>
        <a href="hotel.php" class="<?= $_SERVER['PHP_SELF']=="/projetMilan/hotel.php" ? "actif":"liens" ?>">Hôtel</a>
        <a href="blog.php" class="<?= $_SERVER['PHP_SELF']=="/projetMilan/blog.php" ? "actif":"liens" ?>">Blog</a>
        <a href="contact.php" class="<?= $_SERVER['PHP_SELF']=="/projetMilan/contact.php" ? "actif":"liens" ?>">Contact</a>
        </nav>
  		<nav id="menu-vertical" class="menu-vertical">
  			<a href="#" onclick="fermerMenu()" class="btn-fermer">&times;</a>
  			<a href="index.php">Accueil</a>
  			<a href="hotel.php">Hôtel</a>
        <a href="blog.php">Blog</a>
        <a href="contact.php">Contact</a>
  		</nav>
  	</header>