-- cria o banco --
CREATE DATABASE escola;

-- usa o banco --
USE escola;

-- cria as tabelas com todas as informações necessárias --
CREATE TABLE alunos(
    id INT AUTO INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    email VARCHAR(100) NOT NULL,
    curso VARCHAR(100) NOT NULL);