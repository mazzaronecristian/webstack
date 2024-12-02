-- Crea una tabella di esempio
CREATE TABLE utenti (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

-- Inserisce alcuni dati nella tabella
INSERT INTO utenti (nome, email) VALUES 
('Mario Rossi', 'mario.rossi@example.com'),
('Anna Verdi', 'anna.verdi@example.com');

