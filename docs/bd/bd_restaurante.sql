CREATE DATABASE bd_restaurantemaneiro;
USE bd_restaurantemaneiro;

-- Tabela que armazena dados dos administradores do sistema. --
CREATE TABLE tb_admin(
	id_admin INT PRIMARY KEY,
    login VARCHAR(75) NOT NULL UNIQUE,
    senha VARCHAR(25) NOT NULL
)DEFAULT CHARSET='utf8';

-- Tabela que armazena dados dos entregadores que trabalham no restaurante. --
CREATE TABLE tb_entregador(
	id_entregador INT PRIMARY KEY,
    nome VARCHAR(75) NOT NULL,
    cpf CHAR(14) NOT NULL,
    cep CHAR(9) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    cidade VARCHAR(75) NOT NULL,
    bairro VARCHAR(75) NOT NULL,
    rua VARCHAR(75) NOT NULL,
    numero INT NOT NULL,
    complemento VARCHAR(45),
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(75) NOT NULL UNIQUE
)DEFAULT CHARSET='utf8';

-- Tabela que armazena dados dos clientes --
CREATE TABLE tb_cliente(
	id_cliente INT PRIMARY KEY,
    nome VARCHAR(75) NOT NULL,
    cpf CHAR(14) NOT NULL,
    cep CHAR(9) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    cidade VARCHAR(75) NOT NULL,
    bairro VARCHAR(75) NOT NULL,
    rua VARCHAR(75) NOT NULL,
    numero INT NOT NULL,
    complemento VARCHAR(45),
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(75) NOT NULL UNIQUE
)DEFAULT CHARSET='utf8';

-- Tabela que armazena dados dos pratos/receitas do restaurates. --
CREATE TABLE tb_prato(
	id_prato INT PRIMARY KEY,
    nome VARCHAR(75) NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
)DEFAULT CHARSET='utf8';

-- Tabela que armazena dados dos pedidos. --
CREATE TABLE tb_pedido(
	id_pedido INT PRIMARY KEY,
    cliente INT NOT NULL,
    data_requisicao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    valor_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY(cliente) REFERENCES tb_cliente(id_cliente)
)DEFAULT CHARSET='utf8';

-- Tabela que armazena os itens dos pedidos, relacionando tb_pedido a tb_prato. --
CREATE TABLE tb_item_pedido(
	id_item_pedido INT PRIMARY KEY,
    item INT NOT NULL,
    pedido INT NOT NULL,
    FOREIGN KEY(pedido) REFERENCES tb_pedido(id_pedido),
    FOREIGN KEY(item) REFERENCES tb_prato(id_prato)
)DEFAULT CHARSET='utf8';

-- Tabela que armazena dados das entregas, relacioando tb_entregador a tb_pedido. --
CREATE TABLE tb_entrega(
	id_entrega INT PRIMARY KEY,
    pedido INT NOT NULL,
    entregador INT NOT NULL,
    cep CHAR(9) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    cidade VARCHAR(75) NOT NULL,
    bairro VARCHAR(75) NOT NULL,
    rua VARCHAR(75) NOT NULL,
    numero INT NOT NULL,
    complemento VARCHAR(45),
    status_entrega VARCHAR(20) NOT NULL,
    termino TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(pedido) REFERENCES tb_pedido(id_pedido),
    FOREIGN KEY(entregador) REFERENCES tb_entregador(id_entregador)
)DEFAULT CHARSET='utf8';