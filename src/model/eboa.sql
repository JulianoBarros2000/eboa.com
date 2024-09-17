--
-- Estrutura da tabela `cliente_sistema`
--

CREATE TABLE `cliente_sistema` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(191) NOT NULL,
  `sexo` varchar(191) NOT NULL,
  `data_nasc` date NOT NULL,
  `foto_perfil` varchar(255) NOT NULL,
  `id_morada` int(11) DEFAULT NULL,
  `id_contacto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente_sistema`
--

INSERT INTO `cliente_sistema` (`id_cliente`, `nome`, `sexo`, `data_nasc`, `foto_perfil`, `id_morada`, `id_contacto`) VALUES
(2, 'isildo dala', 'masculino', '2002-03-30', 'adam-bartoszewicz-vdkyWisomns-unsplash.jpg', 38, 32),
(3, 'marcos manuel', 'masculino', '2023-05-31', 'icone_podio.jpg', 39, 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE `contactos` (
  `id_contactos` int(11) NOT NULL,
  `telemovel` int(191) NOT NULL,
  `telefone_alt` int(191) NOT NULL,
  `email` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`id_contactos`, `telemovel`, `telefone_alt`, `email`) VALUES
(3, 938696815, 954455565, 'julianosocabarros2000@gmail.com'),
(4, 929977754, 934455565, 'juliano@mail.com'),
(6, 8878, 989098900, 'con'),
(7, 923461773, 934455565, 'aldermartins2011@hotmail.com.br'),
(8, 929977754, 934455565, 'julianosocabarros2000@gmail.com'),
(9, 920077486, 955656565, 'julianosocabarros2000@gmail.com'),
(10, 999977754, 934455565, 'julianosocabarros2000@gmail.com'),
(11, 999977754, 934455565, 'julianosocabarros2000@gmail.com'),
(12, 934827746, 918423326, 'marcos@gmail.com'),
(13, 929977754, 934455565, 'juliano@mail.com'),
(14, 929977754, 934455565, 'juliano@mail.com'),
(15, 929977754, 934455565, 'alex2000@gmail.com'),
(17, 999977754, 999999999, 'marcos@mail.com'),
(18, 929977754, 934455565, 'julianosocabarros2000@gmail.com'),
(19, 929977754, 934455565, 'juliano@mail.com'),
(20, 929977754, 934455565, 'juliano@mail.com'),
(21, 929977754, 934455565, 'julianosocabarros2000@gmail.com'),
(22, 929977754, 934455565, 'julianosocabarros2000@gmail.com'),
(23, 929977754, 934455565, 'juliano@mail.com'),
(24, 929977754, 934455565, 'juliano@mail.com'),
(25, 929977754, 934455565, 'juliano@mail.com'),
(26, 929977754, 934455565, 'juliano@mail.com'),
(27, 929977754, 934455565, 'juliano@mail.com'),
(28, 929977754, 934455565, 'juliano@mail.com'),
(32, 931065708, 951707736, 'isildorodriguesdala@gmail.com'),
(33, 930029737, 951707736, 'julianosocabarros2000@gmail.com'),
(34, 938696815, 938696815, 'julianosocabarros2000@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda`
--

CREATE TABLE `encomenda` (
  `id_encomenda` int(11) NOT NULL,
  `produtos` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total` float NOT NULL,
  `data_entrega` datetime NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `encomenda`
--

INSERT INTO `encomenda` (`id_encomenda`, `produtos`, `quantidade`, `total`, `data_entrega`, `data_cadastro`) VALUES
(1, ' humburguer(6), café(1),', 2, 9050, '2023-06-20 10:09:00', '2023-06-05 09:09:31'),
(2, ' humburguer(1), café(1),', 2, 1550, '2023-06-06 10:35:00', '2023-06-05 09:35:41'),
(3, ' humburguer(1),', 1, 1500, '2023-06-14 10:38:00', '2023-06-05 09:38:28'),
(4, ' café(1), humburguer(5), bolo de chocolate(8),', 3, 31550, '2023-06-13 10:42:00', '2023-06-05 09:42:41'),
(5, ' gelado com menta(1),', 1, 300, '2023-06-05 22:47:00', '2023-06-05 21:47:51'),
(6, ' Água pura(1),', 1, 100, '2023-06-05 22:53:00', '2023-06-05 21:53:13'),
(7, ' bolo de chocolate(1), humburguer(1), Água pura(1), café(1),', 4, 4650, '2023-06-07 23:40:00', '2023-06-05 22:40:31'),
(8, ' bolo de chocolate(1), humburguer(1), café(1),', 3, 4550, '2023-06-06 23:58:00', '2023-06-05 22:58:58'),
(9, ' humburguer(1),', 1, 1500, '2023-06-07 02:23:00', '2023-06-06 01:23:22'),
(10, ' humburguer(1),->1.500,00 kz bolo de chocolate(1),->3.000,00 kz', 2, 4500, '2023-06-22 02:40:00', '2023-06-06 01:40:56'),
(11, ' humburguer, café,', 2, 1550, '2023-06-14 03:19:00', '2023-06-06 02:19:57'),
(12, ' humburguer,', 1, 1500, '2023-06-18 03:27:00', '2023-06-06 02:27:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(191) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL,
  `bi` varchar(14) NOT NULL,
  `sexo` varchar(191) NOT NULL DEFAULT '0',
  `estado_log` tinyint(4) NOT NULL,
  `foto_perfil` varchar(191) NOT NULL,
  `cargo` varchar(191) NOT NULL,
  `salario` varchar(191) NOT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  `id_morada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `senha`, `data_nasc`, `bi`, `sexo`, `estado_log`, `foto_perfil`, `cargo`, `salario`, `id_contacto`, `id_morada`) VALUES
(3, 'juliano soca barros', '$2y$10$TVoMo8YcKPMuXpXTW8DoHemQBvAAwFLN1TOgF0banCf5H6bX82gE2', '2000-11-30', '007789877CA021', 'masculino', 1, 'IMG_20221223_160627.jpg', 'Administrador', '300000', 3, 9),
(4, 'antónio barros', '$2y$10$Peg6vcQ9mR3ObGyy3LgM4OO/.QQwh3DbcFLggSZg/y5yhKoZKj/w.', '2023-05-09', '877654563456', 'masculino', 0, 'none.jpeg', 'Gerente', '10000', 4, 10),
(7, 'marcos augusto', '$2y$10$plQyPPnzJ5bIKYTftVIuf.HSbDNlIH92bMc7KYReUyzE5AedkJu1u', '2023-05-02', '877654563456', 'masculino', 0, 'none.jpeg', 'Administrador', '300000', 22, 28),
(8, 'santos el', '$2y$10$Gyi88./e1RQ25gjA1.rNTeHzVW0T4449mQ54UOMsIhelw8z9WBtCK', '2018-05-07', '007789877ca021', 'masculino', 1, 'IMG-20230105-WA0002.jpg', 'Outro', '50000', 34, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiaprima`
--

CREATE TABLE `materiaprima` (
  `id_materiaprima` int(11) NOT NULL,
  `nome` varchar(191) NOT NULL,
  `tipo` varchar(191) NOT NULL,
  `codigo_barra` varchar(255) NOT NULL,
  `preco` varchar(191) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `data_validade` date DEFAULT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `estado` enum('activo','não activo') NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `materiaprima`
--

INSERT INTO `materiaprima` (`id_materiaprima`, `nome`, `tipo`, `codigo_barra`, `preco`, `quantidade`, `data_validade`, `fornecedor`, `foto`, `estado`, `descricao`) VALUES
(12, 'cebolas ', 'igrediente', '0000', '100', 10, '2023-06-15', 'desconhecido', 'Cebolas .jpeg', '', 'é uma alimento gostoso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_web`
--

CREATE TABLE `menu_web` (
  `id_web` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `quantidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `morada`
--

CREATE TABLE `morada` (
  `id_morada` int(11) NOT NULL,
  `municipio` varchar(191) NOT NULL,
  `rua_casa` varchar(191) NOT NULL,
  `numero_casa` varchar(191) NOT NULL,
  `bairro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `morada`
--

INSERT INTO `morada` (`id_morada`, `municipio`, `rua_casa`, `numero_casa`, `bairro`) VALUES
(9, '', 'Jaylinda', '1232', 'Chimbicado'),
(10, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(12, 'ghgjh', 'hghgjh', 'ghgj', 'hgjgj'),
(13, 'Belas', 'Mateus', 'CBCD12', '12 de Abril'),
(14, 'Talatona', 'Jaylinda', '12', 'Chimbicado'),
(15, 'Viana', 'Jaylinda', '11212df', 'Fofoca'),
(16, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(17, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(18, 'Luanda', 'São Paulo', 'CD23', 'Martes'),
(19, 'Belas', 'Martes', '128ZA', 'Nathan'),
(20, 'Belas', 'Martes', '128ZA', 'Nathan'),
(21, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(23, 'Talatona', 'Jaylinda', '78987', 'Vaga'),
(24, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(25, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(26, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(27, 'Belas', 'San', '1232', 'Chimbicado'),
(28, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(29, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(30, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(31, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(32, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(33, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(34, 'Talatona', 'Jaylinda', '1232', 'Chimbicado'),
(38, '', '28 de Agosto', '128ZA', 'Golf 2'),
(39, 'Viana', 'Larenquie', 'A3WE', 'Muxima'),
(40, 'camama 1', 'Jaylinda', '12', 'Chimbicado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `funcionario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_local`
--

CREATE TABLE `produto_local` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(191) NOT NULL,
  `codigo_barra` varchar(191) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `data_validade` date NOT NULL,
  `preco` varchar(191) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto_local`
--

INSERT INTO `produto_local` (`id_produto`, `nome`, `codigo_barra`, `quantidade`, `data_validade`, `preco`, `tipo`, `foto`, `estado`, `fornecedor`, `descricao`, `data_cadastro`) VALUES
(16, 'bolo chocolate', '345293848cad342', 197, '2023-06-15', '1000', 'alimento', 'Bolo Chocolate.jpeg', 'Activo', 'eboa', 'é uma alimento gostoso', '2023-06-06 01:12:35'),
(17, 'gelado simples', '122201111', 186, '2023-06-03', '300', '12', 'Gelado Simples.jpeg', 'Activo', 'eboa', 'é uma alimento gostoso', '2023-06-06 01:12:35'),
(18, 'humburquer', '345293848cad3', 191, '2023-06-03', '1000', 'alimento', 'Humburquer.jpeg', 'Activo', 'eboa', 'é uma alimento gostoso', '2023-06-05 20:24:23'),
(19, 'pizza', '0', 196, '2023-06-04', '3500', 'alimento', 'Pizza.jpeg', 'Activo', 'eboa', 'é uma alimento gostoso', '2023-06-06 01:10:12'),
(20, 'coca cola', '000045rrr4', 186, '2026-05-04', '200', 'bebida', 'Coca Cola.jpeg', 'Activo', 'coca', 'é uma alimento gostoso', '2023-06-06 01:12:35'),
(21, 'fanta bitão', '345293848cad3', 226, '2023-06-29', '600', 'bebida', 'Fanta Bitão.jpeg', 'Activo', 'fanta', 'é uma alimento gostoso', '2023-06-06 01:12:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_web`
--

CREATE TABLE `produto_web` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `codigo_barra` varchar(255) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `data_validade` date NOT NULL,
  `preco` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto_web`
--

INSERT INTO `produto_web` (`id_produto`, `nome`, `codigo_barra`, `quantidade`, `data_validade`, `preco`, `tipo`, `foto`, `estado`, `fornecedor`, `descricao`, `data_cadastro`) VALUES
(2, 'gelado com menta', '345293ad3', 49, '2023-06-01', '300', 'gelado', 'Gelado Com Mentajpeg', 'Activo', 'eboa', 'é uma alimento gostoso', '2023-06-05 21:47:51'),
(3, 'bolo de chocolate', '0', 9, '2023-06-05', '3000', 'alimento, doce', 'Bolo de Chocolate.jpeg', 'Activo', 'eboa', 'bolo feito base de chocolate puro e creme de coco.', '2023-06-06 01:40:56'),
(4, 'humburguer', '0', 31, '2023-06-05', '1500', 'alimento', 'Humburguer.jpeg', 'Activo', 'eboa', 'feito com carne pura sem intervenção de mecanismos de fábricas ', '2023-06-06 02:27:16'),
(5, 'pizza normal', '0', 20, '2023-06-05', '3000', 'alimento', 'Pizza Normal.jpeg', 'Inactivo', 'eboa', 'feito com mais detalhes no seu sabor de tomate', '2023-06-04 16:21:35'),
(6, 'gelado de 🍓 ', '0', 100, '2023-06-05', '300', 'alimento', 'Gelado de 🍓 .jpeg', 'Inactivo', 'eboa', 'o mais gostoso que já vi', '2023-06-04 16:21:55'),
(7, 'café', '0', 94, '2023-06-05', '50', 'bebida', 'Café.jpeg', 'Activo', 'eboa', 'escuro e agradável ', '2023-06-06 02:19:58'),
(9, 'Água pura', '345293848cad342', 498, '2027-09-15', '100', 'bebida', 'Água Pura.jpeg', 'Activo', 'pura', 'a melhor Água  de angola', '2023-06-05 22:40:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `operador` int(11) NOT NULL,
  `produtos` varchar(255) NOT NULL,
  `quantidade` int(200) NOT NULL,
  `total` float NOT NULL,
  `modo_pagamento` enum('Multicaixa','Numeral') NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `troco` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `operador`, `produtos`, `quantidade`, `total`, `modo_pagamento`, `data`, `troco`) VALUES
(1, 3, ' humburquer(1), fanta bitão(1), coca cola(1), gelado simples(3),', 4, 2700, 'Numeral', '2023-06-04 10:34:41', 300),
(2, 3, ' coca cola(5), fanta bitão(1), gelado simples(1), humburquer(1), pizza(1),', 5, 6400, 'Numeral', '2023-06-04 16:04:19', 13600),
(3, 3, ' bolo chocolate(1), coca cola(1), fanta bitão(1), gelado simples(1), humburquer(1), pizza(1),', 6, 6600, 'Numeral', '2023-06-05 20:24:23', 13400),
(4, 3, ' coca cola(1), gelado simples(1), pizza(1),', 3, 4000, 'Numeral', '2023-06-06 01:10:11', 6000),
(5, 8, ' bolo chocolate(1), coca cola(1), fanta bitão(1), gelado simples(1),', 4, 2100, 'Numeral', '2023-06-06 01:12:35', 899);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitante`
--

CREATE TABLE `visitante` (
  `id_visitante` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telemovel` varchar(14) NOT NULL,
  `telefone_alt` varchar(14) NOT NULL,
  `municipio` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `n_casa` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `id_encomenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `visitante`
--

INSERT INTO `visitante` (`id_visitante`, `nome`, `email`, `telemovel`, `telefone_alt`, `municipio`, `bairro`, `n_casa`, `mensagem`, `id_encomenda`) VALUES
(8, 'Juliano Barros', 'julianosocabarros2000@gmail.com', '938696815', '938696815', 'Talatona', 'Chimbicado', '1232', '2023-06-06T23:58', 8),
(9, 'Juliano Barros', 'julianosocabarros2000@gmail.com', '938696815', '938696815', 'Talatona', 'Chimbicado', '1232', '2023-06-07T02:23', 9),
(10, 'Juliano Barros', 'julianosocabarros2000@gmail.com', '938696815', '938696815', 'Talatona', 'Chimbicado', '1232', '2023-06-22T02:40', 10),
(11, 'Juliano Barros', 'julianosocabarros2000@gmail.com', '938696815', '938696815', 'Talatona', 'Chimbicado', '1232', '2023-06-14T03:19', 11),
(12, 'Juliano Barros', 'julianosocabarros2000@gmail.com', '938696815', '938696815', 'Talatona', 'Chimbicado', '1232', '2023-06-18T03:27', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `website`
--

CREATE TABLE `website` (
  `id_website` int(11) NOT NULL,
  `titulo_principal` varchar(255) NOT NULL,
  `descricao_principal` varchar(255) NOT NULL,
  `imagem_capa` varchar(255) NOT NULL,
  `logotipo` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `titulo_sobre` varchar(255) NOT NULL,
  `descricao_sobre` varchar(255) NOT NULL,
  `contacto_telefone` varchar(255) NOT NULL,
  `contacto_email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Índices para tabela `cliente_sistema`
--
ALTER TABLE `cliente_sistema`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `cliente_sistema_ibfk_1` (`id_morada`),
  ADD KEY `cliente_sistema_ibfk_2` (`id_contacto`);

--
-- Índices para tabela `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contactos`);

--
-- Índices para tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD PRIMARY KEY (`id_encomenda`),
  ADD KEY `id_pedido` (`total`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `funcionario_ibfk_1` (`id_morada`),
  ADD KEY `funcionario_ibfk_2` (`id_contacto`);

--
-- Índices para tabela `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD PRIMARY KEY (`id_materiaprima`);

--
-- Índices para tabela `menu_web`
--
ALTER TABLE `menu_web`
  ADD PRIMARY KEY (`id_web`);

--
-- Índices para tabela `morada`
--
ALTER TABLE `morada`
  ADD PRIMARY KEY (`id_morada`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `produto_local`
--
ALTER TABLE `produto_local`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `produto_web`
--
ALTER TABLE `produto_web`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_item` (`id_item`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `vendas_ibfk_1` (`operador`);

--
-- Índices para tabela `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`id_visitante`),
  ADD KEY `visitante_ibfk_1` (`id_encomenda`);

--
-- Índices para tabela `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_website`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cliente_sistema`
--
ALTER TABLE `cliente_sistema`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contactos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `encomenda`
--
ALTER TABLE `encomenda`
  MODIFY `id_encomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `materiaprima`
--
ALTER TABLE `materiaprima`
  MODIFY `id_materiaprima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `menu_web`
--
ALTER TABLE `menu_web`
  MODIFY `id_web` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `morada`
--
ALTER TABLE `morada`
  MODIFY `id_morada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_local`
--
ALTER TABLE `produto_local`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `produto_web`
--
ALTER TABLE `produto_web`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `visitante`
--
ALTER TABLE `visitante`
  MODIFY `id_visitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `website`
--
ALTER TABLE `website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente_sistema`
--
ALTER TABLE `cliente_sistema`
  ADD CONSTRAINT `cliente_sistema_ibfk_1` FOREIGN KEY (`id_morada`) REFERENCES `morada` (`id_morada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_sistema_ibfk_2` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id_contactos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_morada`) REFERENCES `morada` (`id_morada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id_contactos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `pedido` (`id_pedido`);

--
-- Limitadores para a tabela `visitante`
--
ALTER TABLE `visitante`
  ADD CONSTRAINT `visitante_ibfk_1` FOREIGN KEY (`id_encomenda`) REFERENCES `encomenda` (`id_encomenda`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

