DROP DATABASE IF EXISTS InventarioHW;

CREATE DATABASE InventarioHW;
USE InventarioHW;

CREATE TABLE classroom(
	number INT PRIMARY KEY AUTO_INCREMENT,
	description VARCHAR(50)
);

CREATE TABLE type(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	description VARCHAR(50)
);

CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT,
	is_admin BOOLEAN,
	name VARCHAR(25),
	surname VARCHAR(25),
	username VARCHAR(50),
	email VARCHAR(50),
	hash_password VARCHAR(80)
);

CREATE TABLE object(
	id INT PRIMARY KEY AUTO_INCREMENT,
	description VARCHAR(50),
	serial_number VARCHAR(50),
	riservation_data DATE,
	user_id INT,
	classroom_number INT,
	type_id INT NOT NULL,
	active BOOL,
	FOREIGN KEY(user_id) REFERENCES user(id),
	FOREIGN KEY(classroom_number) REFERENCES classroom(number),
	FOREIGN KEY(type_id) REFERENCES type(id)
);

INSERT INTO `classroom` VALUES (1,'Magazzino'),(348,'Aula maturità'),(417,'Aula informatica'),(420,'Aula informatica');

INSERT INTO `type` VALUES (1,'Computer','Desktop, Laptop e Mac'),(2,'Monitor','Monitor non apple'),(3,'Tastiere','Ogni genere di tastiere'),(4,'Mouse','Ogni genere di mouse'),(5,'Proiettori','Beamer e retroproiettori');

INSERT INTO `user` VALUES (10,1,'Samuele','Abba','samuele.abba','samuele.abba@samtrevano.ch','ce0c504d299308a5ced0ea357d705eeb30f3db192bae36112b3e521fe1564555'),(11,0,'Dennis','Donofrio','dennis.donofrio','dennis.donofrio@samtrevano.ch','372a051e54033555cd0a3ab29c99269231db1184a6781b4f020002a781dbe117');

INSERT INTO `object` VALUES (2,'iMac m1 24\"','CZC6518DGJ','2021-12-09',10,420,1,1),(3,'HP Omen 3090','ANR62A782H','2021-12-09',10,417,1,1),(4,'HP Optical Sensor','DN395PO37U',NULL,NULL,1,4,1),(5,'Apple Magic Keyboard','APP581DE35',NULL,NULL,1,3,1),(10,'Beamer grosso','1sd5vg83p4',NULL,NULL,1,5,1),(12,'Beamer grosso2','f3a5s9vc7d',NULL,NULL,1,4,1),(13,'i9 64GB ram','d52bg7tzp3',NULL,NULL,1,1,0);