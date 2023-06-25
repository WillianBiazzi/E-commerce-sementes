-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Abr-2023 às 03:13
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravel`
--
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atores`
--

CREATE TABLE `atores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `inicio_atividades` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `atores`
--

INSERT INTO `atores` (`id`, `nome`, `nacionalidade`, `dt_nascimento`, `inicio_atividades`, `created_at`, `updated_at`) VALUES
(1, 'Johnny Depp', 'EUA', '1963-06-09', '1984-01-01', '2023-03-15 03:29:04', '2023-04-12 02:35:32'),
(2, 'Rafael Rieder', 'BRA', '1980-11-27', '2000-01-01', '2023-03-15 03:40:37', '2023-04-12 02:35:40'),
(3, 'Maria Joaquina', 'ARG', '2001-09-11', '2022-12-01', '2023-03-15 03:41:31', '2023-04-12 02:35:05'),
(4, 'Sei Ashina', 'JAP', '2023-03-01', '2023-03-01', '2023-04-05 03:54:24', '2023-04-12 02:35:49'),
(5, 'Hugh Jackman', 'AUS', '1968-10-12', '1980-01-01', '2023-04-05 03:55:24', '2023-04-05 03:55:24'),
(7, 'Olele Olala', 'BRA', '1980-01-01', '2023-04-18', '2023-04-19 02:12:16', '2023-04-19 02:12:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_03_14_234138_create_ators_table', 1),
(5, '2023_04_18_231815_create_nacionalidades_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidades`
--

CREATE TABLE `nacionalidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `nacionalidades`
--

INSERT INTO `nacionalidades` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Brasileira', '2023-04-19 03:53:17', '2023-04-19 03:53:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atores`
--
ALTER TABLE `atores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `nacionalidades`
--
ALTER TABLE `nacionalidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atores`
--
ALTER TABLE `atores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `nacionalidades`
--
ALTER TABLE `nacionalidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

    CREATE TABLE Clientes (
        IdCliente INT PRIMARY KEY,
        NomeCliente VARCHAR(50),
        Endereco VARCHAR(100),
        Email VARCHAR(50)
    );

    CREATE TABLE Produtos (
        IdProduto INT PRIMARY KEY AUTO_INCREMENT,
        NomeProduto VARCHAR(30),
        Descricao VARCHAR(50),
        Preco DECIMAL(12, 4),
        fk_Estoque_IdEstoque INT
    );

    CREATE TABLE Pedido (
        IdPedido INT PRIMARY KEY,
        DataPedido DATE,
        fk_Clientes_IdCliente INT
    );

    CREATE TABLE Estoque (
        Qtd DECIMAL,
        IdEstoque INT PRIMARY KEY AUTO_INCREMENT
    );

    CREATE TABLE PedidoProduto (
        fk_Produtos_IdProduto INT,
        fk_Pedidos_IdPedido INT,
        QtdPedido DECIMAL
    );

    ALTER TABLE Produtos ADD CONSTRAINT FK_Produtos_2
        FOREIGN KEY (fk_Estoque_IdEstoque)
        REFERENCES Estoque (IdEstoque)
        ON DELETE RESTRICT;

    ALTER TABLE Pedido ADD CONSTRAINT FK_Pedido_2
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


INSERT INTO Pedido (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (1, '2023-06-01', 1);

INSERT INTO Pedido (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (2, '2023-06-02', 2);

INSERT INTO Pedido (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (3, '2023-06-03', 3);

INSERT INTO Pedido (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (4, '2023-06-04', 4);

INSERT INTO Pedido (IdPedido, DataPedido, fk_Clientes_IdCliente)
VALUES (5, '2023-06-05', 5);


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

