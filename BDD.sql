#------------------------------------------------------------
#-- Table: Commentaire
#------------------------------------------------------------
DROP TABLE IF EXISTS Commentaire;
CREATE TABLE IF NOT EXISTS Commentaire (
  id_comm	INTEGER NOT NULL AUTO_INCREMENT,
  pseudo	VARCHAR(255) NOT NULL,
  mail		VARCHAR(255) NOT NULL,
  date		TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  contenu	TEXT NOT NULL,
  fk_blog	INTEGER NOT NULL,
  PRIMARY KEY (id_comm)
) ENGINE = InnoDB
  DEFAULT CHARSET=utf8;

#------------------------------------------------------------
#-- Table: Blog
#------------------------------------------------------------
DROP TABLE IF EXISTS Blog;
CREATE TABLE IF NOT EXISTS Blog (
  id_blog		INTEGER NOT NULL AUTO_INCREMENT,
  titre			VARCHAR(255) NOT NULL,
  courte_description	TEXT NOT NULL,
  date			TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  contenu		TEXT NOT NULL,
  PRIMARY KEY (id_blog)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8;

#------------------------------------------------------------
#-- Table: ResaChambre
#------------------------------------------------------------
DROP TABLE IF EXISTS ResaChambre;
CREATE TABLE IF NOT EXISTS ResaChambre(
	fk_resa		INTEGER NOT NULL,
	fk_chambre	INTEGER NOT NULL,
  	PRIMARY KEY (fk_resa, fk_chambre)
) ENGINE = InnoDB
  DEFAULT CHARSET=utf8;

#------------------------------------------------------------
#-- Table: Reservation
#------------------------------------------------------------
DROP TABLE IF EXISTS Reservation;
CREATE TABLE IF NOT EXISTS Reservation(
	id_resa		INTEGER NOT NULL AUTO_INCREMENT,
	nbPers		INTEGER,
	dateResa	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dateArrivee TIMESTAMP NOT NULL,
    dateDepart  TIMESTAMP NOT NULL,
	fk_client	INTEGER NOT NULL,
	PRIMARY KEY (id_resa)
) ENGINE = InnoDB
  DEFAULT CHARSET=utf8;

#------------------------------------------------------------
#-- Table: Client
#------------------------------------------------------------
DROP TABLE IF EXISTS Client;
CREATE TABLE IF NOT EXISTS Client(
	id_client	INTEGER NOT NULL AUTO_INCREMENT,
	nom			VARCHAR(255) NOT NULL,
	prenom		VARCHAR(255) NOT NULL,
	adresse		VARCHAR(255) NOT NULL,
	cp			VARCHAR(12)  NOT NULL,
	ville		VARCHAR(100) NOT NULL,
	PRIMARY KEY (id_client)
) ENGINE = InnoDB
  DEFAULT CHARSET=utf8;

#------------------------------------------------------------
#-- Table: Chambre
#------------------------------------------------------------
DROP TABLE IF EXISTS Chambre;
CREATE TABLE IF NOT EXISTS Chambre(
	id_chambre	INTEGER NOT NULL AUTO_INCREMENT,
	nom			VARCHAR(255) NOT NULL,
	description	TEXT NOT NULL,
	capacite	INTEGER NOT NULL,
	surface		DECIMAL(6,2) NOT NULL,
	tarif		DECIMAL(6,2) NOT NULL,
  	PRIMARY KEY (id_chambre)
) ENGINE = InnoDB
  DEFAULT CHARSET=utf8;

#------------------------------------------------------------
#-- Contraintes
#------------------------------------------------------------
ALTER TABLE Commentaire
	ADD FOREIGN KEY (fk_blog) REFERENCES Blog(id_blog)
	ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Reservation
	ADD FOREIGN KEY (fk_client) REFERENCES Client(id_client)
	ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE ResaChambre
	ADD FOREIGN KEY (fk_resa) REFERENCES Reservation(id_resa)
	ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE ResaChambre
	ADD FOREIGN KEY (fk_chambre) REFERENCES Chambre(id_chambre)
	ON UPDATE CASCADE ON DELETE CASCADE;

#------------------------------------------------------------
#-- Données pour le blog
#------------------------------------------------------------
INSERT INTO `Blog` (`id_blog`, `titre`, `courte_description`, `contenu`, `date`) VALUES
(1, 'Tagliatelle aux crevettes et à l’estragon', 'Ces pâtes aux fruits de mer sont un délice: les crevettes sont mélangées à des tagliatelle avec une sauce au citron et à l''estragon.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Faire cuire les tagliatelle al dente dans de l’eau salée. Les égoutter, les rafraîchir sous l’eau froide et réserver.</li>\r\n\r\n<li>Râper finement le zeste du citron. Exprimer le jus. Rincer les crevettes sous l’eau froide et les éponger. Les mélanger avec le zeste de citron et un peu de jus. Effeuiller les brins d’estragon. Hacher l’échalote. La faire revenir dans le beurre. Mouiller avec le bouillon et ajouter la crème. Laisser la sauce cuire env. 5 min. Mélanger les crevettes, l’estragon et les tagliatelle avec la sauce. Bien chauffer le tout. Assaisonner avec le jus de citron restant, le sel et le poivre de Cayenne.</li>\r\n</ol>', '2018-01-17 20:55:11'),
(2, 'Gratin de pommes de terre', 'Un plat simple, nourrissant et vite préparé qui s''accorde à merveille avec une salade fraîche et croquante ou un rôti délicieusement braisé.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Éplucher les pommes de terre et, à l''aide d''une mandoline, les détailler en tranches de 2 mm d''épaisseur. Les répartir dans le plat. Mélanger le lait et la demi-crème puis les relever de sel, de noix de muscade et de poivre. Verser la liaison sur les pommes de terre et parsemer le tout de fromage râpé.</li>\r\n\r\n<li>Glisser le plat sur une grille au milieu du four froid, le régler sur 180 °C et faire cuire le gratin env. 50 min.</li>\r\n</ol>', '2018-01-17 20:55:53'),
(3, 'Salade de betteraves rouges avec sauce au miel', 'La sauce miel-moutarde donne aux betteraves rouges un goût doux et relevé. Garnie de noix grillées et de feta, cette salade fait un très bon plat principal.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Frotter les betteraves sous un filet d’eau pour éliminer la peau puis les couper en fines rondelles. Mettre la moutarde, le miel, le vinaigre, l’huile, le sel et une pincée de poivre dans un bol mélangeur. Avec un mixeur-plongeur, réduire le tout en une sauce à salade onctueuse. Rectifier l’assaisonnement en sel et en poivre.</li>\r\n\r\n<li>Hacher grossièrement les noix puis les faire dorer à sec dans une poêle antiadhésive. Les retirer et réserver. Disposer les rondelles de betteraves sur un plat et les parsemer de noix. Emietter la feta et la répartir également par-dessus. Arroser la salade de sauce et décorer avec le cresson.</li>\r\n<ol>', '2018-01-22 13:20:19'),
(4, 'Velouté de chou-fleur avec gremolata de noisettes', 'Vite réalisé, ce velouté de chou-fleur offre un plaisir raffiné. Il est parsemé d''une gremolata de noisettes associée à de menus morceaux de viande séchée.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Hacher grossièrement l''oignon et détailler le chou-fleur en rosettes. Les saisir tous les deux dans le beurre. Mouiller avec le bouillon et faire mijoter env. 30 min à couvert jusqu''à ce que le chou-fleur soit tendre. Incorporer la crème et porter à ébullition. Réduire en purée au mixeur-plongeur puis saler et poivrer.</li>\r\n\r\n<li>Pour la gremolata, hacher grossièrement les noisettes et les faire dorer dans une poêle sèche jusqu''à ce qu''un léger parfum se dégage. Émincer finement le mostbröckli et le persil puis les mélanger avec les noisettes, le parmesan et l''huile. Relever de sel et de poivre. Dresser le velouté avec la gremolata.</li>\r\n</ol>', '2018-01-22 13:50:30'),
(5, 'Foie de veau avec purée de céleri', 'Rien de tel que cette recette de purée de céleri pour changer des pommes de terre en accompagnement des foies de veau cuits avec carottes et poireau.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Couper le céleri en gros cubes. Les faire cuire dans de l’eau salée durant env. 20 min jusqu’à tendreté. Egoutter et réduire en purée. Porter le lait à ébullition avec la moitié du beurre, incorporer à la purée. Hacher le cerfeuil et l’ajouter. Saler, poivrer et réserver au chaud.</li>\r\n\r\n<li>Hacher l’oignon. Détailler les carottes et le poireau en fins bâtonnets. Chauffer le beurre à rôtir dans une poêle antiadhésive. Y faire revenir les légumes durant env. 2 min. Ajouter le foie et le faire rissoler env. 2 min. Saler et poivrer. Dresser la purée de céleri avec le foie. Faire mousser le reste du beurre dans la poêle et en napper le foie.</li>\r\n</ol>', '2018-01-22 13:53:21');

INSERT INTO `Commentaire` (`id_comm`, `pseudo`, `date`, `mail`, `contenu`, `fk_blog`) VALUES
(1, 'Pierrick', '2018-01-29 20:55:53', 'pierrick.dubois@monmail.fr', 'Cela semble excellent !', 1),
(2, 'Élisa', '2018-01-29 21:55:53', 'delisa.sarran@monmail.fr', 'Je confirme !', 1);

INSERT INTO `Chambre` (`id_chambre`, `nom`, `description`, `capacite`, `surface`, `tarif`) VALUES
('1', 'Chambre confort - 2 lits', 'Cadre chaleureux et contemporain pour découvrir la cuisine gastronomique. Hôtel neuf de très bon confort chambre spacieuse, avec télévision, bain et douche à jets, WC, téléphone, coffre et sèche cheveux, jardin, parking et garage. - Hébergement pour 2 personnes 2 lits.', '2', '25', '70.5'),
('2', 'Suite Blanche-Neige 4 personnes', 'Suite féerique avec un miroir enchanté, deux lits doubles, une combiné baignoire-douche, un coin salon avec des fauteuils royaux et un buffet petit déjeuner copieux. - Hébergement pour 4 personnes 2 lits.', '4', '30', '100.0'),
('3', 'Chambre tout confort 4 personnes', 'Chambre de luxe avec un grand lit double et deux lits simples, combiné baignoire-douche, buffet petit déjeuner compris.', '4', '40', '80.5'),
('4', 'Chambre cozy 5 personnes', 'Chambre cosy et fonctionnelle avec douche en toilettes, boxsprings, deux lits surélevés plus un lit double et petit-déjeuner compris.', '45', '50', '110.0');
