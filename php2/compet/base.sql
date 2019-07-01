CREATE DATABASE portfolio; 
USE portfolio; 
CREATE TABLE utilisateur (
	id_utilisateur serial PRIMARY KEY, 
	prenom varchar(50) UNIQUE, 
	admin boolean DEFAULT FALSE 
);

CREATE TABLE competence (
	id_competence serial PRIMARY KEY, 
	libelle varchar(50) UNIQUE, 
	logo varchar(250)
);

CREATE TABLE competence_utilisateur(
	id_utilisateur int, 
	id_competence int, 
	niveau int,
	PRIMARY KEY (id_utilisateur, id_competence)
);

INSERT INTO utilisateur(prenom, admin) VALUES('competence', TRUE); 



INSERT INTO competence(libelle, logo) VALUES('PHP', 'logo/php.png'); 
INSERT INTO competence(libelle, logo) VALUES('JavaScript', 'logo/js.png'); 
INSERT INTO competence(libelle, logo) VALUES('HTML5 - CSS3', 'logo/html-css.png'); 
INSERT INTO competence(libelle, logo) VALUES('python', 'logo/python.png'); 


INSERT INTO competence_utilisateur VALUES(1, 1, 5); 
INSERT INTO competence_utilisateur VALUES(1, 2, 3); 
INSERT INTO competence_utilisateur VALUES(1, 3, 2); 
INSERT INTO competence_utilisateur VALUES(2, 4, 5); 
INSERT INTO competence_utilisateur VALUES(3, 2, 4); 
INSERT INTO competence_utilisateur VALUES(3, 3, 5); 
INSERT INTO competence_utilisateur VALUES(4, 1, 2); 
INSERT INTO competence_utilisateur VALUES(4, 3, 3); 
INSERT INTO competence_utilisateur VALUES(5, 4, 2); 
INSERT INTO competence_utilisateur VALUES(5, 3, 2); 
INSERT INTO competence_utilisateur VALUES(6, 1, 5); 
INSERT INTO competence_utilisateur VALUES(6, 3, 5); 

