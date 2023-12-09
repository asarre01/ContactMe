-- Création de la base de données
CREATE DATABASE IF NOT EXISTS db_contact;
USE db_contact;

-- Table des catégories qui sauvegarde la liste des catégories
CREATE TABLE IF NOT EXISTS categories (
    categoryID INT PRIMARY KEY AUTO_INCREMENT,
    categoryName VARCHAR(150) NOT NULL DEFAULT 'Amis',
    UNIQUE(categoryName)
);

-- Ajout des catégories par défaut
INSERT INTO categories (categoryName) VALUES
    ('Amis'),
    ('Famille'),
    ('Collègues');

-- Table contacts qui sauvegarde la liste des contacts
CREATE TABLE IF NOT EXISTS contacts (
    contactID INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    avatar VARCHAR(150) NOT NULL,
    numberPhone VARCHAR(25) NOT NULL,
    secondNumberPhone VARCHAR(25),
    categoryID INT NOT NULL DEFAULT 1,
    email VARCHAR(150) NOT NULL,
    UNIQUE(numberPhone),
    UNIQUE(email),
    FOREIGN KEY (categoryID) REFERENCES categories(categoryID)
);
