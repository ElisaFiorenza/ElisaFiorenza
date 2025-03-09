DROP DATABASE IF EXISTS Prestiti ;
CREATE DATABASE  Prestiti;
USE Prestiti;

CREATE TABLE Libri (
    id INT AUTO_INCREMENT, 
    titolo VARCHAR(64) NOT NULL, 
    autore VARCHAR(64), 
    numeroPagine INT,
    PRIMARY KEY(id)
);

CREATE TABLE Utenti (
    id INT AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    cognome VARCHAR(20) NOT NULL,
    dataNascita DATE NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(30),
    PRIMARY KEY(id)
);

CREATE TABLE Prestiti (
    id INT AUTO_INCREMENT, 
    dataInizio DATE NOT NULL,
    dataFine DATE,
    idUtente int NOT NULL, 
    idLibro int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(idLibro) REFERENCES Libri(id),
    FOREIGN KEY(idUtente) REFERENCES Utenti(id)   
);

INSERT INTO Utenti (nome, cognome, dataNascita, telefono, email)VALUES
 ('Mario','Rossi', '1968-03-25', '0865475890', 'mario.rossi@gmail.com'),
 ('Carlo','Bianchi', '1972-11-07', '05683244', 'carlo.bianchi@gmail.com'),
 ('Ciro','Neri', '1965-09-17', '094795824', NULL),
 ('Luigi', 'Verdi', '1967-04-05', '086547599', 'luigi.verdi@gmail.com');

INSERT INTO Libri (titolo, autore, numeroPagine) VALUES
 ('Doctor sleep', 'Stephen King', 700),
 ('Shining', 'Stephen King', 685),
 ('Il libro dei Baltimore', 'Joel Dicker', 350),    
 ('Viaggio al centro della terra', 'Giulio Verne', 400),
 ('Pet sematary', 'Stephen King', 430),
 ('Frankenstein', 'Mary Shelley', 830),
 ('1984', 'George Orwell', 500);

INSERT INTO Prestiti(idLibro, idUtente, dataInizio, dataFine) VALUES 
 ('1', '1', '2025-01-05', '2025-02-05'),
 ('1', '3', '2025-02-05', NULL),
 ('5', '2', '2024-12-03', NULL),
 ('6', '2', '2024-09-01', '2024-09-10'),
 ('6', '2', '2024-10-15', '2024-10-21'),
 ('6', '1', '2024-11-15', '2024-12-09');

-- 1. Selezionare l'elenco dei libri che hanno un numero di pagine maggiore del numero di pagine di "Shining".
SELECT Titolo, Autore 
FROM Libri 
WHERE numeroPagine > (
    SELECT numeroPagine 
    FROM Libri 
    WHERE titolo = 'Shining');

-- 2. Selezionare l'elenco dei libri che hanno un numero di pagine minore del numero medio di pagine.
SELECT Titolo, Autore
FROM Libri 
WHERE numeroPagine < (
    SELECT AVG(numeroPagine) 
    FROM Libri);

-- 3. Per ogni utente selezionare il numero dei libri presi in prestito.
SELECT nome, cognome, dataNascita, 
       (
        SELECT COUNT(*) 
        FROM Prestiti 
        WHERE Prestiti.idUtente = Utenti.id) AS LibriInPrestito
FROM Utenti;

-- 4. Selezionare l'elenco dei libri presi in prestito almeno 2 volte.
SELECT titolo, autore 
FROM Libri 
WHERE id IN (
    SELECT idLibro 
    FROM Prestiti 
    GROUP BY idLibro 
    HAVING COUNT(*) >= 2
);

-- 5. Selezionare l'elenco dei libri in prestito e non ancora restituiti.
SELECT titolo, autore
FROM Libri 
WHERE id IN (
    SELECT idLibro 
    FROM Prestiti 
    WHERE dataFine IS NULL);

-- 6. Selezionare l'elenco dei libri disponibili (non in prestito).
SELECT titolo, autore 
FROM Libri 
WHERE id NOT IN (
    SELECT idLibro 
    FROM Prestiti 
    WHERE dataFine IS NULL);

-- 7. Selezionare l'elenco dei libri che non sono di “Stephen King” e che hanno un numero di pagine 
-- maggiore del massimo numero di pagine dei libri di “Stephen King“.
SELECT titolo, autore 
FROM Libri 
WHERE autore != 'Stephen King' 
AND numeroPagine > (
    SELECT MAX(numeroPagine) 
    FROM Libri 
    WHERE autore = 'Stephen King');

-- 8. Selezionare i libri per i quali è stato effettuato almeno un prestito nel 2025.
SELECT titolo, autore 
FROM Libri 
WHERE id = ANY(
    SELECT libri.id
    FROM Libri, Prestiti
    WHERE prestiti.idLibro = Libri.id AND YEAR(dataInizio) = 2025);

-- 9. Selezionare gli utenti che non hanno effettuato un prestito nel 2025.
SELECT nome, cognome 
FROM Utenti 
WHERE id NOT IN (
    SELECT DISTINCT idUtente 
    FROM Prestiti 
    WHERE YEAR(dataInizio) = 2025);

-- 10. Selezionare i libri che non sono mai stati presi in prestito.
SELECT titolo, autore 
FROM Libri 
WHERE id NOT IN (
    SELECT DISTINCT idLibro 
    FROM Prestiti);

-- 11. Selezionare l'elenco degli utenti che non hanno mai preso in prestito un libro (fare uso di EXISTS).
SELECT nome, cognome 
FROM Utenti 
WHERE NOT EXISTS (
    SELECT * 
    FROM Prestiti 
    WHERE Prestiti.idUtente = Utenti.id);

-- 12. Selezionare gli utenti che non hanno preso in prestito i libri presi in prestito da Mario Rossi.
SELECT nome, cognome 
FROM Utenti 
WHERE id NOT IN (
    SELECT DISTINCT idUtente FROM Prestiti 
    WHERE idLibro IN (
        SELECT idLibro 
        FROM Prestiti 
        WHERE idUtente = (
            SELECT id 
            FROM Utenti 
            WHERE nome = 'Mario' AND cognome = 'Rossi'))
) 
AND id != (
    SELECT id 
    FROM Utenti 
    WHERE nome = 'Mario' AND cognome = 'Rossi');

-- 13. Selezionare titolo, autore e numero pagine del libro con il maggior numero di pagine.
SELECT titolo, autore, numeroPagine 
FROM Libri 
WHERE numeroPagine = (
    SELECT MAX(numeroPagine) 
    FROM Libri);

-- 14. Selezionare i libri per i quali esiste almeno un prestito effettuato prima del mese di Novembre del 2024.
SELECT titolo, autore, numeroPagine 
FROM Libri 
WHERE id IN (
    SELECT idLibro 
    FROM Prestiti 
    WHERE dataInizio < '2024-11-01');

-- 15. Selezionare i libri per cui non è stato effettuato un prestito tra Gennaio e Ottobre 2024.
SELECT titolo, autore 
FROM Libri 
WHERE id NOT IN (
    SELECT DISTINCT idLibro 
    FROM Prestiti 
    WHERE dataInizio BETWEEN '2024-01-01' AND '2024-10-31'
);
