CREATE DATABASE ferroviax;

USE ferroviax;

CREATE TABLE usuario(
    pk_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(50),
    email_usuario VARCHAR(50),
    senha_usuario VARCHAR(200),
    foto_usuario VARCHAR(255)
    );