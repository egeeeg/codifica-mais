CREATE DATABASE IF NOT EXISTS estoque_p1;
USE estoque_p1;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    unidade VARCHAR(10) NOT NULL, 
    nota TEXT,                    
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, email, senha) 
VALUES ('Homem Segredo', 'admin@admin.com', '$2y$10$2.S7Wp1wT3yk5.Xo1w1w1e1w1w1w1w1w1w1w1w1w1w1w1w1w1');
