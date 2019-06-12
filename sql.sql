create database web2;
use web2;

CREATE USER 'irene'@'localhost' IDENTIFIED BY 'p@ssw0rd';
GRANT ALL ON web2.* TO 'irene'@'localhost';


CREATE TABLE accounts
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    email      VARCHAR(40) NOT NULL,
    password   VARCHAR(50) NOT NULL,
    first_name VARCHAR(40),
    last_name  VARCHAR(40),
    country    VARCHAR(20),
    address    VARCHAR(50),
    birthday   DATE

);

CREATE TABLE products
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(40) NOT NULL,
    author      VARCHAR(50),
    description VARCHAR(500),
    review      varchar(500),
    image       VARCHAR(50),
    price       DOUBLE NOT NULL,
    quantity    INT

);

insert into products (name,description,image,price,quantity) values ('PHP Learning',);

# GRANT SELECT ON db2.invoice TO 'jeffrey'@'localhost';
# ALTER USER 'jeffrey'@'localhost' WITH MAX_QUERIES_PER_HOUR 90;
