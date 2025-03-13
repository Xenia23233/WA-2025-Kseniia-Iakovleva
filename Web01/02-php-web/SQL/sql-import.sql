CREATE TABLE wa_test (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    user_surname VARCHAR(50) NOT NULL,
    user_email VARCHAR(150) NOT NULL UNIQUE,
    user_age INT DEFAULT NULL,
    registratin_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO wa_test (user_name,user_surname,user_email,user_age) VALUES 
('Petr','Novak','petr@example.com',25),
('Jana','Koutna','jana@example.com',35),
('Jiri','Janota','jiri@example.com',56),
('Zbynek','Hubacek','zbynek@example.com',19);