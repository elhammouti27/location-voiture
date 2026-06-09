CREATE DATABASE IF NOT EXISTS cars_ehm;
USE cars_ehm;

-- =========================
-- TABLE CATEGORIES
-- =========================
CREATE TABLE categories(
   id_categorie INT AUTO_INCREMENT,
   nom_categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_categorie),
   UNIQUE(nom_categorie)
);

-- =========================
-- TABLE CARS
-- =========================
CREATE TABLE cars(
   id_car INT AUTO_INCREMENT,
   registration_number VARCHAR(50) NOT NULL,
   brand VARCHAR(50) NOT NULL,
   model VARCHAR(50) NOT NULL,
   price INT NOT NULL,
   notes VARCHAR(255),
   id_categorie INT NOT NULL,
   PRIMARY KEY(id_car),
   UNIQUE(registration_number),
   FOREIGN KEY(id_categorie) REFERENCES categories(id_categorie)
);

-- =========================
-- TABLE CLIENTS
-- =========================
CREATE TABLE clients(
   id_client INT AUTO_INCREMENT,
   cin VARCHAR(10) NOT NULL,
   firstname VARCHAR(50) NOT NULL,
   lastname VARCHAR(50) NOT NULL,
   phone_number VARCHAR(15) NOT NULL,
   email VARCHAR(50) NOT NULL,
   password VARCHAR(255) NOT NULL,
   permis VARCHAR(2) NOT NULL,
   PRIMARY KEY(id_client),
   UNIQUE(cin),
   UNIQUE(email)
);

-- =========================
-- TABLE RESERVATION
-- =========================
CREATE TABLE reservation(
   id_reservation INT AUTO_INCREMENT,
   start_date DATETIME NOT NULL,
   end_date DATETIME NOT NULL,
   status VARCHAR(50) NOT NULL DEFAULT 'pending',
   id_car INT NOT NULL,
   id_client INT NOT NULL,
   PRIMARY KEY(id_reservation),
   FOREIGN KEY(id_car) REFERENCES cars(id_car) ON DELETE CASCADE,
   FOREIGN KEY(id_client) REFERENCES clients(id_client) ON DELETE CASCADE
);

-- =========================
-- PROCEDURE CLIENTS
-- =========================

DELIMITER //

CREATE PROCEDURE SP_AddClient(
    cin VARCHAR(10),
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    phone VARCHAR(15),
    email VARCHAR(50),
    pass VARCHAR(255),
    permis VARCHAR(2)
)
BEGIN
    INSERT INTO clients(cin, firstname, lastname, phone_number, email, password, permis)
    VALUES (cin, firstname, lastname, phone, email, pass, permis);
END //

CREATE PROCEDURE SP_GetAllClients()
BEGIN
    SELECT * FROM clients;
END //

CREATE PROCEDURE SP_DeleteClient(id INT)
BEGIN
    DELETE FROM clients WHERE id_client = id;
END //

CREATE PROCEDURE SP_LoginClient(mail VARCHAR(50))
BEGIN
    SELECT * FROM clients WHERE email = mail;
END //

-- =========================
-- PROCEDURE CARS
-- =========================

CREATE PROCEDURE SP_AddCar(
    reg VARCHAR(50),
    br VARCHAR(50),
    mdl VARCHAR(50),
    pr INT,
    nt VARCHAR(255),
    cat INT
)
BEGIN
    INSERT INTO cars(registration_number, brand, model, price, notes, id_categorie)
    VALUES (reg, br, mdl, pr, nt, cat);
END //

CREATE PROCEDURE SP_GetAllCars()
BEGIN
    SELECT c.*, cat.nom_categorie
    FROM cars c
    JOIN categories cat ON c.id_categorie = cat.id_categorie;
END //

CREATE PROCEDURE SP_DeleteCar(id INT)
BEGIN
    DELETE FROM cars WHERE id_car = id;
END //

-- =========================
-- PROCEDURE RESERVATION
-- =========================

CREATE PROCEDURE SP_AddReservation(
    car INT,
    client INT,
    start_d DATETIME,
    end_d DATETIME
)
BEGIN
    INSERT INTO reservation(id_car, id_client, start_date, end_date, status)
    VALUES (car, client, start_d, end_d, 'pending');
END //

CREATE PROCEDURE SP_GetReservations()
BEGIN
    SELECT r.*, c.firstname, c.lastname, ca.brand, ca.model
    FROM reservation r
    JOIN clients c ON r.id_client = c.id_client
    JOIN cars ca ON r.id_car = ca.id_car;
END //

CREATE PROCEDURE SP_DeleteReservation(id INT)
BEGIN
    DELETE FROM reservation WHERE id_reservation = id;
END //

DELIMITER ;