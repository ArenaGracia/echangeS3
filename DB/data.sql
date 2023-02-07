-- source /home/johan/Documents/ROJO/DB/data.sql

---------------------------------------- UTILISATEUR ----------------------------------------
INSERT INTO Utilisateur VALUES(null,'BIRA','Jean David','ETU001944@gmail.com','david');
INSERT INTO Utilisateur VALUES(null,'RABESERANANA','Arena Gracia','ETU001976@gmail.com','arena');
INSERT INTO Utilisateur VALUES(null,'ANDRIANAIVOSOA','Johan Anjartiana','ETU001933@gmail.com','johan');

------------------------------------  SUPERUTILISATEUR ----------------------------------------
INSERT INTO SuperUtilisateur VALUES(null,'RABENANAHARY','Rojo','rojo@gmail.com','rojo');

----------------------------------------  CATEGORIE -------------------------------------------
INSERT INTO Categorie VALUES(null,'Bijoux');
INSERT INTO Categorie VALUES(null,'Montre');
INSERT INTO Categorie VALUES(null,'Moyen de transport');
INSERT INTO Categorie VALUES(null,'Smartphone');
INSERT INTO Categorie VALUES(null,'Ordinateur');

-----------------------------------------  OBJET ---------------------------------------------
INSERT INTO Objet VALUES(null,1,'ASUS',200000);
INSERT INTO Objet VALUES(null,1,'Ordinateur portable',100000);


-----------------------------------------  OWNER ---------------------------------------------
INSERT INTO Owner VALUES(1,2);
INSERT INTO Owner VALUES(2,1);

-----------------------------------------  PHOTO ---------------------------------------------
INSERT INTO Photo VALUES(1,'image.jpg');

-----------------------------------------  OBJET ---------------------------------------------
-- INSERT INTO Proposition VALUES(idE,idR,idOe,idOr);
INSERT INTO Proposition VALUES(1,2,2,1);

-----------------------------------------  Accepter ---------------------------------------------
-- INSERT INTO Accepter VALUES(idE,idR,idOe,idOr);

-----------------------------------------  Refus ---------------------------------------------
-- INSERT INTO Refus VALUES(idE,idR,idOe,idOr);