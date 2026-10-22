-- 🗄️ Schema del database "scuola" — Modulo 04
-- Esegui questo file in HeidiSQL (File → Carica file SQL → ▶️ Esegui)
-- ATTENZIONE: se il database esiste già, viene cancellato e ricreato!

DROP DATABASE IF EXISTS scuola;
CREATE DATABASE scuola CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE scuola;

-- 👩‍🎓 Tabella degli studenti
CREATE TABLE studenti (
    id      INT AUTO_INCREMENT PRIMARY KEY,   -- numero progressivo automatico
    nome    VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    classe  VARCHAR(5)  NOT NULL
);

-- 📝 Tabella dei voti (collegata a studenti)
CREATE TABLE voti (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    studente_id  INT NOT NULL,
    materia      VARCHAR(50) NOT NULL,
    voto         DECIMAL(3,1) NOT NULL,
    FOREIGN KEY (studente_id) REFERENCES studenti(id) ON DELETE CASCADE,  -- se elimini lo studente, spariscono anche i suoi voti
    CHECK (voto BETWEEN 0 AND 10)
);

-- 🧪 Dati di prova
INSERT INTO studenti (nome, cognome, classe) VALUES
    ('Sofia',  'Rossi',   '5A'),
    ('Marco',  'Bianchi', '5A'),
    ('Giulia', 'Verdi',   '5B'),
    ('Luca',   'Neri',    '5B');

INSERT INTO voti (studente_id, materia, voto) VALUES
    (1, 'Informatica', 9),   (1, 'Matematica', 7),   (1, 'Storia', 8),
    (2, 'Informatica', 6),   (2, 'Matematica', 5.5),
    (3, 'Informatica', 8.5), (3, 'Storia', 7),
    (4, 'Informatica', 4);
