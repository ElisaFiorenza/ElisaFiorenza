DROP DATABASE IF EXISTS ECannizzaro;
CREATE DATABASE ECannizzaro;
USE ECannizzaro;

-- Creazione delle tabelle
CREATE TABLE Utenti(
    id INT AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(20) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE Prodotti(
    id INT AUTO_INCREMENT,
    modello VARCHAR(20) NOT NULL,
    marca VARCHAR(20) NOT NULL,
    prezzo DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE Acquisti(
    id INT AUTO_INCREMENT,
    data DATE,
    idUtente INT,
    idProdotto INT,
    PRIMARY KEY(id),
    FOREIGN KEY(idUtente) REFERENCES Utenti(id),
    FOREIGN KEY(idProdotto) REFERENCES Prodotti(id)
);

-- Inserimento dati di esempio
INSERT INTO Utenti(nome, cognome, email, password) VALUES 
('Luca', 'Bianchi', 'lucacbi@mail.com', '1234567890'),
('Maria', 'Rossi', 'mariros@mail.com', '0987654321'),
('Giulia', 'Verdi', 'giuverd@mail.com', '1112223334'),
('Marco', 'Neri', 'marcner@mail.com', '5556667778');

INSERT INTO Prodotti(modello, marca, prezzo) VALUES 
('Iphone 15', 'Apple', 950),
('S23', 'Samsung', 700.00),
('P300', 'Huawei', 888.00),
('Pearphone x', 'Pear', 150.00);

INSERT INTO Acquisti(data, idUtente, idProdotto) VALUES 
('2024-12-10', 1, 1),
('2024-05-18', 2, 4),
('2024-08-24', 2, 2),
('2024-11-11', 3, 2),
('2025-01-07', 3, 1),
('2025-03-15', 4, 4),
('2025-06-22', 4, 3);

