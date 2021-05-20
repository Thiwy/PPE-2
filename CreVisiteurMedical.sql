-- Minimum requis pour faire le TP

CREATE TABLE visiteurMedical (
  vis_matricule char(4) NOT NULL,
  vis_nom varchar(30) DEFAULT NULL,
  vis_prenom varchar(30) DEFAULT NULL,
  vis_adresse char(60) DEFAULT NULL,
  vis_cp char(5) DEFAULT NULL,
  vis_ville char(30) DEFAULT NULL,
  vis_dateEmbauche date DEFAULT NULL
) ENGINE = INNODB CHARSET = UTF8;

ALTER TABLE visiteurMedical
ADD CONSTRAINT pk_visiteur PRIMARY KEY (vis_matricule);

--
-- Contenu de la table visiteurs
--

INSERT INTO visiteurMedical (vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville, vis_dateEmbauche) VALUES
('AGOM', 'GOMEZ', 'Alexandre', '7 rue G Fauré', '29200', 'Brest', '2013-04-07');

INSERT INTO visiteurMedical (vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville, vis_dateEmbauche) VALUES
('BDUB', 'DUBREUIL', 'Béatrice', '18 rue Jean Jaures', '29200', 'Brest', '2012-05-01');

INSERT INTO visiteurMedical (vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville, vis_dateEmbauche) VALUES
('CSEG', 'SEGALEN', 'Claude', '65 rue de Siam', '29200', 'Brest', '2014-02-01');

INSERT INTO visiteurMedical (vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville, vis_dateEmbauche) VALUES
('DLUC', 'LUCAS', 'Daniel', '43 rue des écureuils', '29200', 'Brest', '2013-04-27');

INSERT INTO visiteurMedical (vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville, vis_dateEmbauche) VALUES
('ELEP', 'LEPIC', 'Eric', '63 rue du Vally', '29200', 'Brest', '2012-05-01');

INSERT INTO visiteurMedical (vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville, vis_dateEmbauche) VALUES
('FRIO', 'RIOU', 'Francois', '34 rue Paul Gauguin', '29200', 'Brest', '2014-10-02');




