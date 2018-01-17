# Développement Web

Réalisation d'un site web sans framework CSS.

Le site est déployé à cette adresse :
http://gite-brommat.fr/projetMilan/

Structure de la base de données :
`CREATE TABLE IF NOT EXISTS 'blog' (
  'id' int(11) NOT NULL AUTO_INCREMENT,
  'titre' varchar(255) NOT NULL,
  'courte_description' text NOT NULL,
  'contenu' text NOT NULL,
  'date' timestamp NOT NULL,
  PRIMARY KEY ('id')
) ENGINE=InnoDB;`
