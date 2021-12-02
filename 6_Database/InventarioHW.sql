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