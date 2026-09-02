CREATE TABLE copies (
    id SERIAL PRIMARY KEY,
    note_brute NUMERIC(4,2) NOT NULL,
    penalite_appliquee BOOLEAN NOT NULL,
    date_limite DATE NOT NULL,
    date_depot DATE NOT NULL,
    note_finale NUMERIC(4,2)

);
SELECT * FROM copies;

INSERT INTO copies (note_brute,penalite_appliquee,date_limite,date_depot,note_finale)
VALUES
(15.00,FALSE,CURRENT_DATE,'2026-09-07',15.00);