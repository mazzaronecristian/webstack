-- Crea una tabella di esempio
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE opinions (
    id SERIAL PRIMARY KEY,
    opinion VARCHAR(250) NOT NULL
);

INSERT INTO users (username, email, password) VALUES 
('Mario Rossi', 'mario.rossi@example.com', 'securePassword123'),
('Anna Verdi', 'anna.verdi@example.com', 'J4e*n3FrtxC5$z');


INSERT INTO opinions (opinion) VALUES 
('My favorite dog is the Pinscher, because it is a very intelligent and affectionate dog.'),
('The German Shepherd is a breed of dog that is known for its intelligence and loyalty. They are often used as police dogs and search and rescue dogs because of their keen sense of smell and ability to follow commands.'),
('The Golden Retriever is a popular breed of dog that is known for its friendly and gentle nature. They are often used as therapy dogs and service dogs because of their calm demeanor and ability to connect with people.'),
('The Labrador Retriever is a breed of dog that is known for its friendly and outgoing personality. They are often used as guide dogs and search and rescue dogs because');
