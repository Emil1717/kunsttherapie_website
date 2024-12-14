CREATE DATABASE participants;

USE participants;

CREATE TABLE participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vorname VARCHAR(100) NOT NULL,
    nachname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    tel VARCHAR(100) NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    postalcode VARCHAR(10) NOT NULL,
    country VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
