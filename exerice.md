1) SELECT * 
FROM `villes` 
WHERE nom LIKE 'P%'


2)SELECT * 
FROM villes 
WHERE departement BETWEEN '75' and '95'


3)SELECT nom 
FROM villes 
WHERE population_2010 > 20000


4)SELECT * 
FROM villes 
WHERE code_postal BETWEEN 75000 and 75020


5)SELECT * 
FROM villes 
WHERE departement NOT IN (69,33,13)

6)SELECT * 
FROM `villes` 
WHERE population_2010 BETWEEN 10000 AND 50000 AND departement = 75;


7)SELECT * 
FROM `villes` 
WHERE nom LIKE 'A%' OR nom LIKE 'B%'

8)SELECT * 
FROM `villes` 
WHERE densite_2010 > 1000 AND population_2010 < 20000


9)SELECT * 
FROM `villes` 
WHERE nom_reel!= nom_simple


10)SELECT * 
FROM `villes` 
WHERE nom = 'LYON'










EXERCICE2)


1) INSERT INTO `stagiaire` (`id`, `nom`, `prenom`, `date_naissance`, `email`) VALUES ('17', 'Ronald', 'Araujo', '2002-05-11', 'araujoronald@gmail.com');

2) UPDATE stagiaire SET prenom = 'Johnny' WHERE prenom = 'John';

3) DELETE FROM stagiaire
WHERE id = '2'

4) DELETE FROM stagiaire;

5)DROP TABLE stagiaire;

6)DROP DATABASE formation;

7) DROP DATABASE IF EXISTS formation;







EXERCICE 3)
1)CREATE TABLE stagiaire ( id INT PRIMARY KEY AUTO_INCREMENT, telephone VARCHAR(20), email VARCHAR(50) NOT NULL, prenom VARCHAR(30) NOT NULL, nom VARCHAR(30) NOT NULL, date_de_naissance DATE NOT NULL, CONSTRAINT unique_email UNIQUE (email) );

2)




