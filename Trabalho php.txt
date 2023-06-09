create database Bujigangas;
use Bujigangas;

CREATE TABLE Locatario (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    cep VARCHAR(9) NOT NULL,
    complemento VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);
SELECT * FROM Locatario;
DESCRIBE Locatario;

CREATE TABLE Produto (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(100),
    quantidade INT,
    PRIMARY KEY (id)
);

SELECT * FROM Produto;

CREATE TABLE Emprestimo (
    id INT NOT NULL AUTO_INCREMENT,
    id_Produto INT NOT NULL,
    id_Locatario INT NOT NULL,
    data_emprestimo DATE,
    acao varchar(20),
    PRIMARY KEY (id),
    FOREIGN KEY (id_Produto) REFERENCES Produto (id),
    FOREIGN KEY (id_Locatario) REFERENCES Locatario (id)
);

SELECT * FROM Emprestimo;
