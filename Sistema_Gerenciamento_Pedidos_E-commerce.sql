CREATE TABLE Clientes (
    IdCliente INTEGER PRIMARY KEY,
    NomeCliente VARCHAR2(50),
    Endereco VARCHAR2(100),
    Email VARCHAR2(50)
);

CREATE TABLE Produtos (
    IdProduto INTEGER PRIMARY KEY,
    NomeProduto VARCHAR2(30),
    Descricao VARCHAR2(50),
    Preco NUMBER(12,4),
    fk_Estoque_IdEstoque INTEGER
);

CREATE TABLE Pedidos (
    IdPedido INTEGER PRIMARY KEY,
    DataPedido DATE,
    fk_Clientes_IdCliente INTEGER
);

CREATE TABLE Estoque (
    Qtd NUMBER,
    IdEstoque INTEGER PRIMARY KEY
);

CREATE TABLE PedidoProduto (
    fk_Produtos_IdProduto INTEGER,
    fk_Pedidos_IdPedido INTEGER,
    QtdPedido NUMBER
);
 
ALTER TABLE Produtos ADD CONSTRAINT FK_Produtos_2
    FOREIGN KEY (fk_Estoque_IdEstoque)
    REFERENCES Estoque (IdEstoque)
    ON DELETE RESTRICT;
 
ALTER TABLE Pedidos ADD CONSTRAINT FK_Pedidos_2
    FOREIGN KEY (fk_Clientes_IdCliente)
    REFERENCES Clientes (IdCliente)
    ON DELETE CASCADE;
 
ALTER TABLE PedidoProduto ADD CONSTRAINT FK_PedidoProduto_1
    FOREIGN KEY (fk_Produtos_IdProduto)
    REFERENCES Produtos (IdProduto)
    ON DELETE RESTRICT;
 
ALTER TABLE PedidoProduto ADD CONSTRAINT FK_PedidoProduto_2
    FOREIGN KEY (fk_Pedidos_IdPedido)
    REFERENCES Pedidos (IdPedido)
    ON DELETE SET NULL;

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (1, 'João da Silva', 'Rua A, 123', 'joao@gmail.com');

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (2, 'José da Silva', 'Fazenda Boa Esperança, S/N', 'jose.silva@hotmail.com');

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (3, 'Pedro Oliveira', 'Fazenda Santa Rosa, S/N', 'pedro.oliveira@yahoo.com');

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (4, 'Ana Pereira', 'Fazenda Santo Antônio, S/N', 'ana.pereira@gmail.com');

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (5, 'Márcia Santos', 'Fazenda Nossa Senhora Aparecida, S/N', 'marcia.santos@fazenda.com');

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (6, 'Lucas Oliveira', 'Fazenda São José, S/N', 'lucas.oliveira@terra.com');

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (7, 'Fernanda Silva', 'Fazenda Esperança, S/N', 'fernanda.silva@fazenda.com');

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (8, 'Rafaela Pereira', 'Fazenda São Francisco, S/N', 'rafaela.pereira@gmail.com');

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (9, 'Gustavo Oliveira', 'Fazenda Santo Inácio, S/N', 'gustavo.oliveira@fazenda.com');

INSERT INTO Clientes (IdCliente, NomeCliente, Endereco, Email)
VALUES (10, 'Carolina Santos', 'Fazenda Nova Vida, S/N', 'carolina.santos@hotmail.com');


INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (1, 3000000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (2, 4000000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (3, 3500000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (4, 5000000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (5, 3700000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (6, 4500000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (7, 3600000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (8, 4600000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (9, 5100000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (10, 3400000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (11, 4200000);

INSERT INTO Estoque (IdEstoque, Qtd)
VALUES (12, 5000000);


INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(1, 'Bramax Zeus Ipro', 'SOJA', 12.50, 1);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(2, 'Bramax Fibra Ipro', 'SOJA', 11.75, 2);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(3, 'Don Mario 66I68RSF Ipro', 'SOJA', 13.00, 3);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(4, 'Golden Harvest GH2258 Ipro', 'SOJA', 12.00, 4);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(5, 'Monsoy M6620 I2X', 'SOJA', 10.75, 5);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(6, 'ROOS 90', 'TRIGO', 3.75, 6);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(7, 'TBIO Ponteiro', ' TRIGO ', 3.80, 7);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(8, 'TBIO Calibre', ' TRIGO ', 3.50, 8);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(9, 'OR ORS Absoluto', ' TRIGO', 3.25, 9);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(10, 'Semevinea TSZ Dominadore', ' TRIGO ', 2.80, 10);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(11, 'AG 9035', ' MILHO', 17.50, 11);

INSERT INTO Produtos (IdProduto, NomeProduto, Descricao, Preco, fk_Estoque_IdEstoque)
VALUES(12, 'AG 7088', ' MILHO', 18.00, 12);


INSERT INTO Pedidos (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (1, TO_DATE('2023-06-01', 'YYYY-MM-DD'), 1);

INSERT INTO Pedidos (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (2, TO_DATE('2023-06-02', 'YYYY-MM-DD'), 2);

INSERT INTO Pedidos (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (3, TO_DATE('2023-06-03', 'YYYY-MM-DD'), 3);

INSERT INTO Pedidos (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (4, TO_DATE('2023-06-04', 'YYYY-MM-DD'), 4);

INSERT INTO Pedidos (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (5, TO_DATE('2023-06-05', 'YYYY-MM-DD'), 5);


INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (1, 1, 100000);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (2, 1, 550000);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (3, 1, 80000);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (4, 2, 150000);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (5, 2, 12000);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (6, 3, 200500);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (7, 3, 67500);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (8, 4, 99555);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (9, 4, 715610);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (10, 5, 115120);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (11, 5, 14450);

INSERT INTO PedidoProduto (fk_Produtos_IdProduto, fk_Pedidos_IdPedido, QtdPedido)
VALUES (12, 5, 160000);
