CREATE DATABASE connect_user;

USE inscription;

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom DECIMAL(10,2),
    username VARCHAR(100),
    password password,
    confirm_password password,
); 