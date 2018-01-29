DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `courte_description` text NOT NULL,
  `contenu` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8;

INSERT INTO `blog` (`id`, `titre`, `courte_description`, `contenu`, `date`) VALUES
(1, 'Tagliatelle aux crevettes et à l’estragon', 'Ces pâtes aux fruits de mer sont un délice: les crevettes sont mélangées à des tagliatelle avec une sauce au citron et à l''estragon.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Faire cuire les tagliatelle al dente dans de l’eau salée. Les égoutter, les rafraîchir sous l’eau froide et réserver.</li>\r\n<br/>\r\n<li>Râper finement le zeste du citron. Exprimer le jus. Rincer les crevettes sous l’eau froide et les éponger. Les mélanger avec le zeste de citron et un peu de jus. Effeuiller les brins d’estragon. Hacher l’échalote. La faire revenir dans le beurre. Mouiller avec le bouillon et ajouter la crème. Laisser la sauce cuire env. 5 min. Mélanger les crevettes, l’estragon et les tagliatelle avec la sauce. Bien chauffer le tout. Assaisonner avec le jus de citron restant, le sel et le poivre de Cayenne.</li>\r\n</ol>', '2018-01-17 20:55:11'),
(2, 'Gratin de pommes de terre', 'Un plat simple, nourrissant et vite préparé qui s''accorde à merveille avec une salade fraîche et croquante ou un rôti délicieusement braisé.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Éplucher les pommes de terre et, à l''aide d''une mandoline, les détailler en tranches de 2 mm d''épaisseur. Les répartir dans le plat. Mélanger le lait et la demi-crème puis les relever de sel, de noix de muscade et de poivre. Verser la liaison sur les pommes de terre et parsemer le tout de fromage râpé.</li>\r\n<br/>\r\n<li>Glisser le plat sur une grille au milieu du four froid, le régler sur 180 °C et faire cuire le gratin env. 50 min.</li>\r\n</ol>', '2018-01-17 20:55:53'),
(3, 'Salade de betteraves rouges avec sauce au miel', 'La sauce miel-moutarde donne aux betteraves rouges un goût doux et relevé. Garnie de noix grillées et de feta, cette salade fait un très bon plat principal.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Frotter les betteraves sous un filet d’eau pour éliminer la peau puis les couper en fines rondelles. Mettre la moutarde, le miel, le vinaigre, l’huile, le sel et une pincée de poivre dans un bol mélangeur. Avec un mixeur-plongeur, réduire le tout en une sauce à salade onctueuse. Rectifier l’assaisonnement en sel et en poivre.</li>\r\n<br/>\r\n<li>Hacher grossièrement les noix puis les faire dorer à sec dans une poêle antiadhésive. Les retirer et réserver. Disposer les rondelles de betteraves sur un plat et les parsemer de noix. Emietter la feta et la répartir également par-dessus. Arroser la salade de sauce et décorer avec le cresson.</li>\r\n<ol>', '2018-01-22 13:20:19'),
(4, 'Velouté de chou-fleur avec gremolata de noisettes', 'Vite réalisé, ce velouté de chou-fleur offre un plaisir raffiné. Il est parsemé d''une gremolata de noisettes associée à de menus morceaux de viande séchée.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Hacher grossièrement l''oignon et détailler le chou-fleur en rosettes. Les saisir tous les deux dans le beurre. Mouiller avec le bouillon et faire mijoter env. 30 min à couvert jusqu''à ce que le chou-fleur soit tendre. Incorporer la crème et porter à ébullition. Réduire en purée au mixeur-plongeur puis saler et poivrer.</li>\r\n<br/>\r\n<li>Pour la gremolata, hacher grossièrement les noisettes et les faire dorer dans une poêle sèche jusqu''à ce qu''un léger parfum se dégage. Émincer finement le mostbröckli et le persil puis les mélanger avec les noisettes, le parmesan et l''huile. Relever de sel et de poivre. Dresser le velouté avec la gremolata.</li>\r\n</ol>', '2018-01-22 13:50:30'),
(5, 'Foie de veau avec purée de céleri', 'Rien de tel que cette recette de purée de céleri pour changer des pommes de terre en accompagnement des foies de veau cuits avec carottes et poireau.', '<h2>Préparation</h2>\r\n<ol>\r\n<li>Couper le céleri en gros cubes. Les faire cuire dans de l’eau salée durant env. 20 min jusqu’à tendreté. Egoutter et réduire en purée. Porter le lait à ébullition avec la moitié du beurre, incorporer à la purée. Hacher le cerfeuil et l’ajouter. Saler, poivrer et réserver au chaud.</li>\r\n<br/>\r\n<li>Hacher l’oignon. Détailler les carottes et le poireau en fins bâtonnets. Chauffer le beurre à rôtir dans une poêle antiadhésive. Y faire revenir les légumes durant env. 2 min. Ajouter le foie et le faire rissoler env. 2 min. Saler et poivrer. Dresser la purée de céleri avec le foie. Faire mousser le reste du beurre dans la poêle et en napper le foie.</li>\r\n</ol>', '2018-01-22 13:53:21');


DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `pseudo` VARCHAR(255) NOT NULL ,
  `mail` VARCHAR(255) NOT NULL,
  `contenu` TEXT NOT NULL ,
  `blog_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET=utf8;