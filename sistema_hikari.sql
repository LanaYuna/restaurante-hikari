-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07/06/2026 às 22:01
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_hikari`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Sushi'),
(2, 'Frango'),
(3, 'Bebidas'),
(4, 'Carne'),
(5, 'Temaki'),
(6, 'Tempurá');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id`, `rua`, `numero`, `complemento`, `usuario_id`) VALUES
(24, 'Rua Prof Antonio', '11', 'casa', 10),
(25, 'Rua Cristo Rei', '121', 'Apartamento 02', 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_pedido`
--

CREATE TABLE `item_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `item_pedido`
--

INSERT INTO `item_pedido` (`id`, `pedido_id`, `produto_id`, `quantidade`, `preco_unitario`) VALUES
(5, 3, 106, 3, 8.00),
(9, 6, 106, 1, 8.00),
(10, 6, 75, 1, 85.00),
(11, 7, 110, 2, 6.00),
(12, 7, 93, 1, 40.00),
(13, 8, 98, 1, 67.00),
(14, 8, 103, 3, 5.50),
(15, 9, 103, 1, 5.50),
(16, 9, 79, 1, 33.00),
(17, 10, 104, 3, 6.50),
(18, 10, 67, 1, 64.00),
(19, 11, 108, 1, 22.00),
(20, 12, 82, 1, 56.00),
(21, 13, 87, 1, 32.00),
(22, 13, 93, 1, 40.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_pedido` datetime DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL,
  `pagamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id`, `usuario_id`, `data_pedido`, `total`, `pagamento`) VALUES
(3, 1, '2026-06-06 15:55:29', 24.00, 'pix'),
(6, 15, '2026-06-07 00:42:29', 93.00, 'pix'),
(7, 10, '2026-06-07 15:51:16', 52.00, 'dinheiro'),
(8, 10, '2026-06-07 15:58:12', 83.50, 'dinheiro'),
(9, 21, '2026-06-07 15:59:30', 38.50, 'pix'),
(10, 15, '2026-06-07 15:59:53', 83.50, 'pix'),
(11, 15, '2026-06-07 16:00:02', 22.00, 'pix'),
(12, 15, '2026-06-07 16:00:10', 56.00, 'pix'),
(13, 20, '2026-06-07 16:48:04', 72.00, 'pix');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `imagem`, `categoria_id`) VALUES
(67, 'Carne com Legumes', 'Carne fatiada, acelga, couve flor, brócolis, cebola, champignon, bambu, cenoura, pimentão verde e vermelho e repolho.', 64.00, 'carne-com-legumes.jpg', 4),
(75, 'Gyukatsu', 'Filé mignon à milanesa.', 85.00, 'gyukatsu.jpg', 4),
(77, 'Filé Mignon Grelhado', 'Filé mignon grelhado.', 90.00, 'file-mignon-grelhado.jpg', 4),
(79, 'Futomaki de Ovo', 'Enrolado com ovo, recheio de cenoura, pepino e gengibre.', 33.00, 'futomaki-de-ovo.jpg', 1),
(80, 'Sushi Tradicional', 'Enrolado com alga, recheado com cenoura, gengibre, pepino e omelete.', 33.00, 'sushi-tradicional.jpg', 1),
(81, 'Ebi Maki', 'Enrolado com alga, recheio de camarão à milanesa e cream cheese.', 55.00, 'ebi-maki.jpg', 1),
(82, 'Sushi Jyo', 'Bolinho de arroz envolto por uma fatia fina de salmão, coberto com salmão picado, cebolinha e cream cheese ou maionese (8 unidades).', 56.00, 'sushi-jyo.jpg', 1),
(84, 'Sushi Jyo de Camarão', 'Versão alternativa do Sushi Jyo, preparado com camarão (8 unidades).', 60.00, 'sushi-jyo-de-camarao.jpg', 1),
(86, 'Temaki Filadélfia', 'Salmão, cream cheese e cebolinha.', 35.00, 'temaki-filadelfia.jpg', 5),
(87, 'Temaki California', 'Pepino, manga, kani kama.', 32.00, 'temaki-california.jpg', 5),
(88, 'Temaki Tradicional', 'Salmão e cebolinha.', 30.00, 'temaki-tradicional.jpg', 5),
(93, 'Temaki Hot Filadelfia', 'Salmão e cream cheese, frito.', 40.00, 'temaki-hot-filadelfia.jpg', 5),
(94, 'Tempurá Misto', 'Cebola, pimentão, abóbora, cenoura, berinjela, camarão, batata doce, cará, bambu, brócolis e couve.', 70.00, 'tempura-misto.jpg', 6),
(95, 'Tempurá de Legumes', 'Cenoura, batata e cebola.', 55.00, 'tempura-de-legumes.jpg', 6),
(96, 'Tempurá de Camarão', 'Camarão miúdo e cebolinha.', 80.00, 'tempura-de-camarao.jpg', 6),
(97, 'Frango Xadrez', 'Frango em cubos, pimentão verde e vermelho, cebola, bambu, champignon e salsão.', 60.00, 'frango-xadrez.jpg', 2),
(98, 'Frango Agridoce', 'Frango empanado em cubos, pimentão verde e vermelho, cebola, abacaxi e molho agridoce.', 67.00, 'frango-agridoce.jpg', 2),
(99, 'Frango ao Molho Curry', 'Frango em cubos cobertos por molho de curry, cebola, cenoura e ervilha.', 61.00, 'frango-ao-molho-curry.jpg', 2),
(100, 'Frango Karaguê', 'Versão oriental do tradicional frango a passarinho.', 62.00, 'frango-karague.jpg', 2),
(103, 'Água Mineral Com Gás', 'Garrafa de água mineral com gás 500ml.', 5.50, 'agua-com-gas.jpg', 3),
(104, 'Coca-Cola Lata', 'Refrigerante Coca-Cola lata 350ml.', 6.50, 'coca-cola-lata.jpg', 3),
(106, 'Suco de Laranja', 'Suco natural de laranja 300ml.', 8.00, 'suco-de-laranja.jpg', 3),
(108, 'Saquê Tradicional', 'Dose de saquê japonês tradicional.', 22.00, 'saque-tradicional.jpg', 3),
(109, 'Água Mineral Sem Gás', 'Garrafa de água mineral sem gás 500ml.', 5.50, 'agua-sem-gas.jpg', 3),
(110, 'Sprite Lata', 'Sprite Lata 350ml', 6.00, 'sprite-lata.jpg', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_favorito`
--

CREATE TABLE `produto_favorito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto_favorito`
--

INSERT INTO `produto_favorito` (`id`, `usuario_id`, `produto_id`, `criado_em`) VALUES
(106, 15, 104, '2026-06-07 03:42:18'),
(107, 15, 106, '2026-06-07 03:42:19'),
(109, 10, 108, '2026-06-07 17:57:31'),
(111, 10, 106, '2026-06-07 17:57:35'),
(113, 21, 109, '2026-06-07 18:59:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `telefone`, `senha`, `tipo`) VALUES
(1, 'lana', 'lana@gmail.com', '44 994376856', '$2y$10$OLvqf1pz8P5.syI911Ppw.eptWSgwvlxmOvzRaLIyCJkyodmyJ1.S', 'admin'),
(10, 'Eduardo', 'eduardo@gmail.com', '44 9932130921', '$2y$10$mbEpnLiAlIPEY2lr3kbgK.VExCbI2LzR19yx0wf5urGSFhwZPwWD6', 'cliente'),
(15, 'Vini', 'vini@gmail.com', '44 998410921', '$2y$10$HRycZvNtGujB.4IaP83/6eJWFOX0lFCkF2a1mVaTMJ/WGZLsH2aly', 'cliente'),
(20, 'lidia', 'lidia@gmail.com', '44 997376857', '$2y$10$wt4Nb.e70Ph3R6f9zbLEEOHu4ZD6rvlOIN5wIvCOrB8ja0MP42Tx6', 'cliente'),
(21, 'Gustavo', 'gustavo@gmail.com', '44 998410920', '$2y$10$dmFy05cnexI2ZsNZr7OHSOS.8W/5ZXryB/MIE7nck0GH.FhYsCUvy', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_usuario` (`usuario_id`);

--
-- Índices de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_categoria` (`categoria_id`);

--
-- Índices de tabela `produto_favorito`
--
ALTER TABLE `produto_favorito`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_produto_unique` (`usuario_id`,`produto_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de tabela `produto_favorito`
--
ALTER TABLE `produto_favorito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_categoria_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `item_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_pedido_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Restrições para tabelas `produto_favorito`
--
ALTER TABLE `produto_favorito`
  ADD CONSTRAINT `produto_favorito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produto_favorito_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
