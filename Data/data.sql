
CREATE TABLE `Membres` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`Email` varchar(20) NOT NULL,
	`MotDePasse`varchar(20) NOT NULL,
	`Nom`varchar(20) NOT NULL,
	`DateNaissance`varchar(20)NOT NULL,
	PRIMARY KEY(`id`)
);
INSERT INTO Membres (Email,MotDePasse,Nom,DateNaissance) VALUES ('mano1@gmail','root','Mano','2003-12-30');
INSERT INTO Membres (Email,MotDePasse,Nom,DateNaissance) VALUES ('mano2@gmail','root','Fitiavana','2003-12-30');
INSERT INTO Membres (Email,MotDePasse,Nom,DateNaissance) VALUES ('mano3@gmail','root','Tojo','2003-12-30');
INSERT INTO Membres (Email,MotDePasse,Nom,DateNaissance) VALUES ('mano3@gmail','root','Johary','2003-12-30');
INSERT INTO Membres (Email,MotDePasse,Nom,DateNaissance) VALUES ('mano3@gmail','root','Misa','2003-12-30');
INSERT INTO Membres (Email,MotDePasse,Nom,DateNaissance) VALUES ('mano3@gmail','root','Itokiana','2003-12-30');


CREATE TABLE `Amis` (
	`id` integer NOT NULL,
	`id2` integer NOT NULL,
	`DateEtHeureDemande` DateTime NOT NULL,
	`DateEtHeureAccepation` DateTime,
	`statut` varchar(3),
	FOREIGN KEY(`id2`) references Membres(`id`),
	FOREIGN KEY(`id`) references Membres(`id`)
);


CREATE TABLE `Publications` (
	`id_publication`int(10) NOT NULL AUTO_INCREMENT,
	`id_auteur` integer NOT NULL,
	`DateHeurePublication`DateTime NOT NULL,
	`TextePublication`varchar(200),
	`TypeAffichage`char(20) NOT NULL,
	PRIMARY KEY(`id_publication`),
	FOREIGN KEY(`id_auteur`) references Membres(`id`)
);
INSERT INTO Publications (id_auteur,DateHeurePublication,TextePublication,TypeAffichage) VALUES ('1',NOW(),'Premier Publiaction','texte');
INSERT INTO Publications (id_auteur,DateHeurePublication,TextePublication,TypeAffichage) VALUES ('1',NOW(),'Deuxieme Publication','texte');
INSERT INTO Publications (id_auteur,DateHeurePublication,TextePublication,TypeAffichage) VALUES ('1',NOW(),'Troisieme Publication','texte');


CREATE TABLE `Commentaires` (
	`id_auteur` integer NOT NULL,
	`id_commentaires`int(10) NOT NULL AUTO_INCREMENT,
	`id_publication`integer NOT NULL,
	`DateHeureCommentaires`DateTime NOT NULL,
	`TexteCommentaire`varchar(200) NOT NULL,
	PRIMARY KEY(`id_commentaires`),
	FOREIGN KEY(`id_publication`) references Publications(`id_publication`),
	FOREIGN KEY(`id_auteur`) references Membres(`id`)
);

CREATE TABLE `Reactions` (
	`id_reaction`int(10) NOT NULL,
	`id_auteur` integer NOT NULL,
	`id_publication`integer NOT NULL,
	PRIMARY KEY(`id_reaction`),
	FOREIGN KEY(`id_publication`) references Publications(`id_publication`),
	FOREIGN KEY(`id_auteur`) references Membres(`id`)
);
CREATE TABLE IF NOT EXISTS `Reaction_Possible`(
	`id_rp` integer NOT NULL,
	`Nom` varchar(20) NOT NULL,
	PRIMARY KEY(`id_rp`)
);
INSERT INTO Reaction_Possible values(1,"J'aime");
INSERT INTO Reaction_Possible values(2,"J'adore");
INSERT INTO Reaction_Possible values(3,"Haha");
INSERT INTO Reaction_Possible values(4,"Solidaire");

