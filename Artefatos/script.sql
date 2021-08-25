-- CREATE DATABASE EQUIPAMENTO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE ESQUIPAMENTO (
                id BIGINT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                fabricante VARCHAR(50) NOT NULL,
                modelo VARCHAR(50) NOT NULL,
                data_aquisicao DATE NOT NULL,
                data_criacao DATETIME DEFAULT CURRENT_TIMESTEMP NOT NULL,
                ativo CHAR(1) NOT NULL,
                PRIMARY KEY (id)
);