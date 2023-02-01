CREATE database yeti_rent
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;
USE yeti_rent;

CREATE table user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR (128) UNIQUE,
    password VARCHAR (128),
    name VARCHAR (128),
    status VARCHAR (64)    
);