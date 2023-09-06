

DROP TABLE IF EXISTS incident;


CREATE TABLE incident(
        id            Int  Auto_increment  NOT NULL ,
        sujet         Varchar (50) NOT NULL ,
        description   Varchar (50) NOT NULL ,
        -- id_technicien Int NOT NULL
	CONSTRAINT incident_PK PRIMARY KEY (id)

	
)ENGINE=InnoDB;





INSERT INTO incident (sujet, description)
VALUES
('ecran','pas de signal'),
('clavier','touche manquante');

