#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: equipement
#------------------------------------------------------------

CREATE TABLE equipement(
        id        Int  Auto_increment  NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        type      Varchar (50) NOT NULL ,
        fabricant Varchar (50) NOT NULL ,
        mes       Date NOT NULL ,
        etat      Varchar (50) NOT NULL
	,CONSTRAINT equipement_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: logiciel
#------------------------------------------------------------

CREATE TABLE logiciel(
        id          Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        exp_licence Date
	,CONSTRAINT logiciel_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: salle
#------------------------------------------------------------

CREATE TABLE salle(
        id  Int  Auto_increment  NOT NULL ,
        nom Varchar (50) NOT NULL
	,CONSTRAINT salle_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: technicien
#------------------------------------------------------------

CREATE TABLE technicien(
        id     Int  Auto_increment  NOT NULL ,
        nom    Varchar (50) NOT NULL ,
        prenom Varchar (50) NOT NULL
	,CONSTRAINT technicien_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: incident
#------------------------------------------------------------

CREATE TABLE incident(
        -- id            Int  Auto_increment  NOT NULL ,
        sujet         Varchar (50) NOT NULL ,
        -- date          Date NOT NULL ,
        description   Varchar (50) NOT NULL ,
        -- id_technicien Int NOT NULL
	,CONSTRAINT incident_PK PRIMARY KEY (id)

	,CONSTRAINT incident_technicien_FK FOREIGN KEY (id_technicien) REFERENCES technicien(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: enseignant
#------------------------------------------------------------

CREATE TABLE enseignant(
        id     Int  Auto_increment  NOT NULL ,
        nom    Varchar (50) NOT NULL ,
        prenom Varchar (50) NOT NULL
	,CONSTRAINT enseignant_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: signaler
#------------------------------------------------------------

CREATE TABLE signaler(
        id            Int NOT NULL ,
        id_enseignant Int NOT NULL
	,CONSTRAINT signaler_PK PRIMARY KEY (id,id_enseignant)

	,CONSTRAINT signaler_incident_FK FOREIGN KEY (id) REFERENCES incident(id)
	,CONSTRAINT signaler_enseignant0_FK FOREIGN KEY (id_enseignant) REFERENCES enseignant(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: verifier
#------------------------------------------------------------

CREATE TABLE verifier(
        id            Int NOT NULL ,
        id_enseignant Int NOT NULL
	,CONSTRAINT verifier_PK PRIMARY KEY (id,id_enseignant)

	,CONSTRAINT verifier_equipement_FK FOREIGN KEY (id) REFERENCES equipement(id)
	,CONSTRAINT verifier_enseignant0_FK FOREIGN KEY (id_enseignant) REFERENCES enseignant(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comprend
#------------------------------------------------------------

CREATE TABLE comprend(
        id          Int NOT NULL ,
        id_logiciel Int NOT NULL
	,CONSTRAINT comprend_PK PRIMARY KEY (id,id_logiciel)

	,CONSTRAINT comprend_equipement_FK FOREIGN KEY (id) REFERENCES equipement(id)
	,CONSTRAINT comprend_logiciel0_FK FOREIGN KEY (id_logiciel) REFERENCES logiciel(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: acceder
#------------------------------------------------------------

CREATE TABLE acceder(
        id            Int NOT NULL ,
        id_enseignant Int NOT NULL
	,CONSTRAINT acceder_PK PRIMARY KEY (id,id_enseignant)

	,CONSTRAINT acceder_salle_FK FOREIGN KEY (id) REFERENCES salle(id)
	,CONSTRAINT acceder_enseignant0_FK FOREIGN KEY (id_enseignant) REFERENCES enseignant(id)
)ENGINE=InnoDB;



INSERT INTO equipement (nom, type, fabricant, mes, etat)
VALUES
('terra', 'desktop','terra' ,'2016-03-22', 'fonctionnel'),
('terra', 'desktop','terra','2014-05-07','fonctionnel' ),
('heden', 'desktop','asus' ,'2015-06-06','fonctionnel' ),
('heden', 'desktop','asus' ,'2014-07-02','fonctionnel' );


INSERT INTO logiciel (nom, exp_licence)
VALUES
('chrome', NULL ),
('firefox', NULL ),
('JMerise', '2020-12-20' ),
('Visual Paradigme', NULL );


INSERT INTO salle (nom)
VALUES
('a113'),
('237' ),
('6' ),
('a20');



INSERT INTO incident (sujet, description)
VALUES
('ecran','pas de signal'),
('clavier','touche manquante';


