DROP DATABASE IF EXISTS web_php_cars;
CREATE DATABASE IF NOT EXISTS web_php_cars;
USE web_php_cars;

CREATE USER 'dealer'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON web_php_cars.* TO 'dealer'@'localhost';
     
DROP TABLE IF EXISTS cars;
CREATE TABLE IF NOT EXISTS cars (
	id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    model VARCHAR(50) NOT NULL,
    engine_power INT NOT NULL,
    fuel VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    price INT NOT NULL,
    category VARCHAR(50) NOT NULL CHECK(category IN ('motorbike','suv','sportscar'))
);

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO cars(model, engine_power, fuel, year, color, price, category) VALUES
	('Mazda MX5',250,'diesel',2012,'red',4400,'sportscar'),
	('Dodge Challenger',450,'gasoline',1970,'blue',19000,'sportscar'),
	('Tesla Model X',150,'electric',2016,'gray',19500,'suv'),
    ('Yamaha Scooter',30,'diesel',2019,'green',3000,'motorbike'),
    ('Suzuki Katana',220,'gasoline',2010,'yellow',7500,'motorbike'),
    ('Harley Davidson',330,'gasoline',1996,'black',39500,'motorbike');

INSERT INTO users(username, password) VALUES
	('alpi','alpi'),
    ('alp','alp'),
    ('alparius','password');