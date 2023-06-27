CREATE TABLE estoque (
    idEstoque INT PRIMARY KEY AUTO_INCREMENT,
    qtd DECIMAL
);
CREATE TABLE clientes (
    idCliente INT PRIMARY KEY AUTO_INCREMENT,
    nomeCliente VARCHAR(50),
    endereco VARCHAR(100),
    email VARCHAR(50)
);
CREATE TABLE produtos (
    idProduto INT PRIMARY KEY AUTO_INCREMENT,
    nomeProduto VARCHAR(30),
    descricao VARCHAR(50),
    preco DECIMAL(12, 4),
    fk_estoque_idEstoque INT,
    FOREIGN KEY (fk_estoque_idEstoque)
    REFERENCES estoque (idEstoque)
    ON DELETE RESTRICT
);
CREATE TABLE pedidos (
    idPedido INT PRIMARY KEY AUTO_INCREMENT,
    dataPedido DATE,
    fk_clientes_idCliente INT,
    FOREIGN KEY (fk_clientes_idCliente)
    REFERENCES clientes (idCliente)
    ON DELETE CASCADE
);
CREATE TABLE pedidoProduto (
    fk_produtos_idProduto INT,
    fk_pedidos_idPedido INT,
    qtdPedido DECIMAL,
    FOREIGN KEY (fk_produtos_idProduto)
    REFERENCES produtos (idProduto)
    ON DELETE RESTRICT,
    FOREIGN KEY (fk_pedidos_idPedido)
    REFERENCES pedidos (idPedido)
    ON DELETE SET NULL
);

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (1, 'João da Silva', 'Rua A, 123', 'joao@gmail.com');

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (2, 'José da Silva', 'Fazenda Boa Esperança, S/N', 'jose.silva@hotmail.com');

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (3, 'Pedro Oliveira', 'Fazenda Santa Rosa, S/N', 'pedro.oliveira@yahoo.com');

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (4, 'Ana Pereira', 'Fazenda Santo Antônio, S/N', 'ana.pereira@gmail.com');

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (5, 'Márcia Santos', 'Fazenda Nossa Senhora Aparecida, S/N', 'marcia.santos@fazenda.com');

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (6, 'Lucas Oliveira', 'Fazenda São José, S/N', 'lucas.oliveira@terra.com');

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (7, 'Fernanda Silva', 'Fazenda Esperança, S/N', 'fernanda.silva@fazenda.com');

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (8, 'Rafaela Pereira', 'Fazenda São Francisco, S/N', 'rafaela.pereira@gmail.com');

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (9, 'Gustavo Oliveira', 'Fazenda Santo Inácio, S/N', 'gustavo.oliveira@fazenda.com');

INSERT INTO clientes (idCliente, nomeCliente, endereco, email)
VALUES (10, 'Carolina Santos', 'Fazenda Nova Vida, S/N', 'carolina.santos@hotmail.com');


INSERT INTO estoque (idEstoque, qtd)
VALUES (1, 3000000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (2, 4000000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (3, 3500000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (4, 5000000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (5, 3700000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (6, 4500000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (7, 3600000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (8, 4600000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (9, 5100000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (10, 3400000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (11, 4200000);

INSERT INTO estoque (idEstoque, qtd)
VALUES (12, 5000000);


INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(1, 'Bramax Zeus Ipro', 'SOJA', 12.50, 1);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(2, 'Bramax Fibra Ipro', 'SOJA', 11.75, 2);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(3, 'Don Mario 66I68RSF Ipro', 'SOJA', 13.00, 3);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(4, 'Golden Harvest GH2258 Ipro', 'SOJA', 12.00, 4);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(5, 'Monsoy M6620 I2X', 'SOJA', 10.75, 5);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(6, 'ROOS 90', 'TRIGO', 3.75, 6);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(7, 'TBIO Ponteiro', ' TRIGO ', 3.80, 7);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(8, 'TBIO Calibre', ' TRIGO ', 3.50, 8);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(9, 'OR ORS Absoluto', ' TRIGO', 3.25, 9);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(10, 'Semevinea TSZ Dominadore', ' TRIGO ', 2.80, 10);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(11, 'AG 9035', ' MILHO', 17.50, 11);

INSERT INTO produtos (idProduto, nomeProduto, descricao, preco, fk_estoque_idEstoque)
VALUES(12, 'AG 7088', ' MILHO', 18.00, 12);


INSERT INTO pedidos (idPedido, dataPedido, fk_clientes_idCliente)
VALUES (1, '2023-06-01', 1);

INSERT INTO pedidos (idPedido, dataPedido, fk_clientes_idCliente)
VALUES (2, '2023-06-02', 2);

INSERT INTO pedidos (idPedido, dataPedido, fk_clientes_idCliente)
VALUES (3, '2023-06-03', 3);

INSERT INTO pedidos (idPedido, dataPedido, fk_clientes_idCliente)
VALUES (4, '2023-06-04', 4);

INSERT INTO pedidos (idPedido, dataPedido, fk_clientes_idCliente)
VALUES (5, '2023-06-05', 5);


INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (1, 1, 100000);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (2, 1, 550000);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (3, 1, 80000);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (4, 2, 150000);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (5, 2, 12000);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (6, 3, 200500);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (7, 3, 67500);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (8, 4, 99555);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (9, 4, 715610);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (10, 5, 115120);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (11, 5, 14450);

INSERT INTO pedidoProduto (fk_produtos_idProduto, fk_pedidos_idPedido, qtdPedido)
VALUES (12, 5, 160000);
