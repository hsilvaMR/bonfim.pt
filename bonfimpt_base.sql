-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 03-Maio-2022 às 15:13
-- Versão do servidor: 8.0.25
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bonfimpt_base`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` bigint NOT NULL,
  `nome` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `token` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `tipo` varchar(255) NOT NULL DEFAULT 'manager',
  `lingua` varchar(255) NOT NULL DEFAULT 'pt',
  `estado` varchar(255) NOT NULL DEFAULT 'pendente',
  `data_registo` int NOT NULL DEFAULT '0',
  `ultimo_acesso` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `email`, `password`, `token`, `avatar`, `tipo`, `lingua`, `estado`, `data_registo`, `ultimo_acesso`) VALUES
(1, 'Ana Clara Vieira', 'cvieira@mredis.com', '$2y$10$JdBvPKOJaqrE2r6Ep.JMi.gW.5PeJe4CZ0mIEjpHo8e/fRikOihPK', '123456', '', 'manager', 'pt', 'ativo', 0, 1651582132);

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_pass`
--

CREATE TABLE `admin_pass` (
  `id` bigint NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `token` varchar(255) NOT NULL DEFAULT '',
  `data` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin_pass`
--

INSERT INTO `admin_pass` (`id`, `email`, `token`, `data`) VALUES
(3, 'hsilva@mredis.com', 'uXKp8hWsWmaa', 1649605782),
(4, 'hsilva@mredis.com', '6J5qI6xJC1EQ', 1649605805),
(5, 'hsilva@mredis.com', 'oAwOUwfLOST2', 1649605880),
(6, 'hsilva@mredis.com', 'EWiEqo0tHl9q', 1649605886),
(7, 'hsilva@mredis.com', 'zA21QjKZNqNp', 1649605886),
(8, 'hsilva@mredis.com', 'tX3KPIEIboAB', 1649605886),
(9, 'hsilva@mredis.com', 'U6WAmezueRjY', 1649605886),
(10, 'hsilva@mredis.com', 'irpV62MdYREV', 1649605887),
(11, 'cvieira@mredis.com', 'bKdclVCLzglt', 1649606265);

-- --------------------------------------------------------

--
-- Estrutura da tabela `barra_progressao`
--

CREATE TABLE `barra_progressao` (
  `id` bigint NOT NULL,
  `data_inicio` int NOT NULL DEFAULT '0',
  `data_fim` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `barra_progressao`
--

INSERT INTO `barra_progressao` (`id`, `data_inicio`, `data_fim`) VALUES
(1, 1617277516, 1667220316);

-- --------------------------------------------------------

--
-- Estrutura da tabela `barra_progressao_fase`
--

CREATE TABLE `barra_progressao_fase` (
  `id` bigint NOT NULL,
  `fase_pt` varchar(255) NOT NULL DEFAULT '',
  `fase_en` varchar(255) NOT NULL DEFAULT '',
  `estado_pt` varchar(255) NOT NULL DEFAULT '',
  `estado_en` varchar(255) NOT NULL DEFAULT '',
  `data_inicio` int NOT NULL DEFAULT '0',
  `data_fim` int NOT NULL DEFAULT '0',
  `percentagem` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `barra_progressao_fase`
--

INSERT INTO `barra_progressao_fase` (`id`, `fase_pt`, `fase_en`, `estado_pt`, `estado_en`, `data_inicio`, `data_fim`, `percentagem`) VALUES
(1, 'Licenciamento', 'Licensing', 'Em aprovação', 'In approval', 1619869516, 1625139916, 0),
(3, 'Projeto de execução', 'Execution project', 'Em execução', 'Under execution', 1625139916, 1627731916, 0),
(4, 'Inicio da construção', 'Construction start', 'Demolições', 'Demolition', 1627818316, 1630496716, 0),
(5, 'Inicio das pré-vendas', 'Beginning of the pre-sales', 'Condições de venda especiais', 'Special sales conditions', 1630496716, 1640954716, 0),
(6, 'Inicio da fase de vendas', 'Sales phase begins', 'Condições de venda standard', 'Standard sales conditions', 1641213916, 1653911116, 0),
(7, 'Final da Construção', 'End of construction', 'Licença de habitabilidade', 'Habitation permit', 1654083916, 1659267916, 0),
(8, 'Escrituras', 'Deeds', 'Final do projeto', 'End of project', 1659354316, 1667220316, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_contactos`
--

CREATE TABLE `bonfim_contactos` (
  `id` bigint NOT NULL,
  `id_lote` bigint DEFAULT NULL,
  `nome` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `telefone` varchar(255) NOT NULL DEFAULT '',
  `mensagem` text NOT NULL,
  `data` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_home_galeria`
--

CREATE TABLE `bonfim_home_galeria` (
  `id` bigint NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `imagem_fullscreen` varchar(255) NOT NULL DEFAULT '',
  `online` bigint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_home_galeria`
--

INSERT INTO `bonfim_home_galeria` (`id`, `imagem`, `imagem_fullscreen`, `online`) VALUES
(106, '/img/bonfim/galeria_home_xs_quF.png', '/img/bonfim/galeria_home_fullscreean_lmR.png', 1),
(107, '/img/bonfim/galeria_home_xs_Mcf.png', '/img/bonfim/galeria_home_fullscreean_22g.png', 1),
(108, '/img/bonfim/galeria_home_xs_k3k.png', '/img/bonfim/galeria_home_fullscreean_Es7.png', 1),
(109, '/img/bonfim/galeria_home_xs_AJp.png', '/img/bonfim/galeria_home_fullscreean_Eun.png', 1),
(110, '/img/bonfim/galeria_home_xs_tgD.png', '/img/bonfim/galeria_home_fullscreean_HXQ.png', 1),
(111, '/img/bonfim/galeria_home_xs_fJA.png', '/img/bonfim/galeria_home_fullscreean_mOn.png', 1),
(112, '/img/bonfim/galeria_home_xs_RjB.png', '/img/bonfim/galeria_home_fullscreean_slR.png', 1),
(113, '/img/bonfim/galeria_home_xs_Apq.png', '/img/bonfim/galeria_home_fullscreean_NDr.png', 1),
(114, '/img/bonfim/galeria_home_xs_LX3.png', '/img/bonfim/galeria_home_fullscreean_ECO.png', 1),
(115, '/img/bonfim/galeria_home_xs_b5u.png', '/img/bonfim/galeria_home_fullscreean_qqz.png', 1),
(116, '/img/bonfim/galeria_home_xs_eM5.png', '/img/bonfim/galeria_home_fullscreean_FE6.png', 1),
(117, '/img/bonfim/galeria_home_xs_bYU.png', '/img/bonfim/galeria_home_fullscreean_qZI.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_lotes`
--

CREATE TABLE `bonfim_lotes` (
  `id` bigint NOT NULL,
  `fracao` varchar(255) NOT NULL DEFAULT '',
  `descricao` varchar(255) NOT NULL DEFAULT '',
  `area_util` varchar(255) NOT NULL DEFAULT '',
  `varandas` varchar(255) NOT NULL DEFAULT '',
  `roupeiros` varchar(255) NOT NULL DEFAULT '',
  `area_bruta` varchar(255) NOT NULL DEFAULT '',
  `piso` varchar(255) NOT NULL DEFAULT '',
  `wc` varchar(255) NOT NULL DEFAULT '',
  `arrumos` varchar(255) NOT NULL DEFAULT '',
  `valor` varchar(255) NOT NULL DEFAULT '',
  `disponibilidade` varchar(255) NOT NULL DEFAULT 'disponivel',
  `imagem_home_pt` varchar(255) DEFAULT '',
  `imagem_home_en` varchar(255) NOT NULL DEFAULT '',
  `imagem_planta` varchar(255) DEFAULT '',
  `imagem_planta_2` varchar(255) NOT NULL DEFAULT '',
  `data` int NOT NULL DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_lotes`
--

INSERT INTO `bonfim_lotes` (`id`, `fracao`, `descricao`, `area_util`, `varandas`, `roupeiros`, `area_bruta`, `piso`, `wc`, `arrumos`, `valor`, `disponibilidade`, `imagem_home_pt`, `imagem_home_en`, `imagem_planta`, `imagem_planta_2`, `data`, `online`) VALUES
(1, 'A', '', '55 m2', '10 m2 + 9 m2', '2.54 ml', '67.9 m2', '-1T | 0T', '2 un', '-', 'sob consulta', 'disponivel', '/img/bonfim/planta_slide1-tM2.svg', '/img/bonfim/planta_slide_en1-COr.svg', '/img/bonfim/esquema_apartamento_01.svg', '/img/bonfim/apartamento_A_planta.svg', 0, 1),
(2, 'B', '', '37 m2', '-', '2.48 ml', '52 m2', '0F | 1F', '2 un', '-', 'sob consulta', 'disponivel', '/img/bonfim/planta_slide2-waz.svg', '/img/bonfim/planta_slide_en2-bQ2.svg', '/img/bonfim/esquema_apartamento_02.svg', '/img/bonfim/apartamento_B_planta.svg', 0, 1),
(3, 'C', '', '40 m2', '3 m2', '2.54 ml', '56.9 m2', '1T | 2T', '2 un', '2 m2', 'sob consulta', 'disponivel', '/img/bonfim/planta_slide3-adZ.svg', '/img/bonfim/planta_slide_en3-R6f.svg', '/img/bonfim/esquema_apartamento_03.svg', '/img/bonfim/apartamento_D_planta.svg', 0, 1),
(4, 'D', '', '38 m2', '3 m2', '2.38 ml', '53.8 m2', '2F | 3F', '2 un', '-', 'sob consulta', 'disponivel', '/img/bonfim/planta_slide4-J06.svg', '/img/bonfim/planta_slide_en4-rTt.svg', '/img/bonfim/esquema_apartamento_04.svg', '/img/bonfim/apartamento_C_planta.svg', 0, 1),
(5, 'E', '', '37 m2', '3 m2', '1.35 ml', '54.6 m2', '3T | 4T', '2 un', '2 m2', 'sob consulta', 'disponivel', '/img/bonfim/planta_slide5-sL3.svg', '/img/bonfim/planta_slide_en5-uLh.svg', '/img/bonfim/esquema_apartamento_05.svg', '/img/bonfim/apartamento_E_planta.svg', 0, 1),
(6, 'F', '', '30 m2', '8 m2', '1.64 ml', '53.9 m2', '4F | 5F', '1 un', '-', 'sob consulta', 'disponivel', '/img/bonfim/planta_slide6-zOp.svg', '/img/bonfim/planta_slide_en6-76t.svg', '/img/bonfim/esquema_apartamento_06.svg', '/img/bonfim/apartamento_F_planta.svg', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_lotes_acabamentos`
--

CREATE TABLE `bonfim_lotes_acabamentos` (
  `id` bigint NOT NULL,
  `id_lote` bigint NOT NULL,
  `divisao_pt` varchar(255) NOT NULL DEFAULT '',
  `divisao_en` varchar(255) NOT NULL DEFAULT '',
  `online` bigint NOT NULL DEFAULT '0',
  `data` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_lotes_acabamentos`
--

INSERT INTO `bonfim_lotes_acabamentos` (`id`, `id_lote`, `divisao_pt`, `divisao_en`, `online`, `data`) VALUES
(1, 1, 'Cozinha', 'Kitchen', 1, 1608642266),
(2, 1, 'Hall e sala', 'Hall and living room', 1, 1608642266),
(3, 1, 'Quartos de banho', 'Bathrooms', 1, 1611079307),
(4, 1, 'Quarto', 'Room', 1, 1611079488),
(5, 1, 'Varandas ou terraços', 'Balconies or terraces', 1, 1611079651),
(6, 2, 'Cozinha', 'Kitchen', 1, 1611079651),
(7, 2, 'Hall e sala', 'Hall and living room', 1, 1611079651),
(8, 2, 'Quartos de banho', 'Bathrooms', 1, 1611079651),
(9, 2, 'Quarto', 'Room', 1, 1611079651),
(10, 2, 'Varandas ou terraços', 'Balconies or terraces', 1, 1611079651),
(11, 3, 'Cozinha', 'Kitchen', 1, 1611079651),
(12, 3, 'Hall e sala', 'Hall and living room', 1, 1611079651),
(13, 3, 'Quartos de banho', 'Bathrooms', 1, 1611079651),
(14, 3, 'Quarto', 'Room', 1, 1611079651),
(15, 3, 'Varandas ou terraços', 'Balconies or terraces', 1, 1611079651),
(16, 4, 'Cozinha', 'Kitchen', 1, 1611079651),
(17, 4, 'Hall e sala', 'Hall and living room', 1, 1611079651),
(18, 4, 'Quartos de banho', 'Bathrooms', 1, 1611079651),
(19, 4, 'Quarto', 'Room', 1, 1611079651),
(20, 4, 'Varandas ou terraços', 'Balconies or terraces', 1, 1611079651),
(21, 5, 'Cozinha', 'Kitchen', 1, 1611079651),
(22, 5, 'Hall e sala', 'Hall and living room', 1, 1611079651),
(23, 5, 'Quartos de banho', 'Bathrooms', 1, 1611079651),
(24, 5, 'Quarto', 'Room', 1, 1611079651),
(25, 5, 'Varandas ou terraços', 'Balconies or terraces', 1, 1611079651),
(26, 6, 'Cozinha', 'Kitchen', 1, 1611079651),
(27, 6, 'Hall e sala', 'Hall and living room', 1, 1611079651),
(28, 6, 'Quartos de banho', 'Bathrooms', 1, 1611079651),
(29, 6, 'Quarto', 'Room', 1, 1611079651),
(30, 6, 'Varandas ou terraços', 'Balconies or terraces', 1, 1611079651);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_lotes_acabamentos_tipo`
--

CREATE TABLE `bonfim_lotes_acabamentos_tipo` (
  `id` bigint NOT NULL,
  `id_acabamento` bigint NOT NULL,
  `tipo_pt` varchar(255) NOT NULL DEFAULT '',
  `tipo_en` varchar(255) NOT NULL DEFAULT '',
  `descricao_pt` text NOT NULL,
  `descricao_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_lotes_acabamentos_tipo`
--

INSERT INTO `bonfim_lotes_acabamentos_tipo` (`id`, `id_acabamento`, `tipo_pt`, `tipo_en`, `descricao_pt`, `descricao_en`) VALUES
(12, 1, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(13, 1, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(14, 1, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(15, 1, 'Armários', 'Cabinets', 'Estrutura em aglomerado de madeira ou MDF. \r\nPainéis interiores em melaminha branca e painéis exteriores em lacado colorido brilhante, com tampos em pedra de granito preto tipo Zimbabue.', 'Structure in agglomerated wood or MDF. Interior panels in white melamine and exterior panels in bright colored lacquer, with tops in black Zimbabwe type granite stone.'),
(16, 1, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture.'),
(18, 2, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(141, 2, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura. \r\nRodapés em madeira maciça envernizada.', 'Finished with projected plaster and paint. Varnished solid wood skirting.'),
(142, 2, 'Tectos', 'Ceilings', 'Acabamento a gesso projectado e pintura.', 'Finished with projected plaster and paint.'),
(143, 2, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(144, 2, 'Porta de entrada', 'Entrance Door', 'Porta de segurança, corta fogo, revestida a MDF lacado.', 'Fire-resistant security door in lacquered MDF.'),
(145, 2, 'Escada', 'Stairs', 'Degraus em Madeira. \r\nGuarda em vidro.', 'Wooden steps. Glass handrail.'),
(146, 2, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(147, 3, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(148, 3, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(149, 3, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(150, 3, 'Moveis', 'Furniture', 'Em MDF lacado.', 'Lcquered MDF.'),
(151, 3, 'Louças', 'Sanitary Fixtures', 'Lavatório de pousar UP39 circular. \r\nSanita de pousar NEXUS BTW54. \r\nBase de chuveiro VITA.\r\nTudo da Sanitana.', 'UP39 circular self standing wash basin. BTW54 NEXUS free-standing toilet. VITA shower tray. All from Sanitana.'),
(152, 3, 'Torneiras', 'Faucets', 'Tipo Bruma.', 'Bruma type.'),
(153, 3, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(154, 3, 'Porta', 'Door', 'Porta em favo de madeira folheada a MDF, lacada, com puxador em inox.', 'Door in MDF wood honeycomb, lacquered, with stainless steel handle.'),
(155, 3, 'Outros', 'Others', 'Base de chuveiro ou banheira com guarda em vidro.', 'Shower tray or bath with glass railing.'),
(156, 4, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(157, 4, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(158, 4, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(159, 4, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(160, 4, 'Roupeiro', 'Wardrobe', 'Interior folheado a madeira clara e portas de correr com estrutura em alumínio e painéis em MDF lacado.', 'Light wood veneered interior and sliding doors with aluminium frame and lacquered MDF panels.'),
(161, 4, 'Guarda', 'Security Gards', 'Em vidro temperado.', 'Glass handrails.'),
(162, 4, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(163, 5, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(164, 5, 'Guardas e guarda corpos', 'Security Gards', 'Em aço termolacado.', 'Thermo-lacquered steel.'),
(165, 11, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(166, 11, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(167, 11, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(168, 11, 'Armários', 'Cabinets', 'Estrutura em aglomerado de madeira ou MDF. \r\nPainéis interiores em melaminha branca e painéis exteriores em lacado colorido brilhante, com tampos em pedra de granito preto tipo Zimbabue.', 'Structure in agglomerated wood or MDF. Interior panels in white melamine and exterior panels in bright colored lacquer, with tops in black Zimbabwe type granite stone.'),
(169, 11, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(170, 26, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(171, 26, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(172, 26, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(173, 26, 'Armários', 'Cabinets', 'Estrutura em aglomerado de madeira ou MDF. \r\nPainéis interiores em melaminha branca e painéis exteriores em lacado colorido brilhante, com tampos em pedra de granito preto tipo Zimbabue.', 'Structure in agglomerated wood or MDF. Interior panels in white melamine and exterior panels in bright colored lacquer, with tops in black Zimbabwe type granite stone.'),
(174, 26, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto.\r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(175, 21, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(176, 21, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(177, 21, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(178, 21, 'Armários', 'Cabinets', 'Estrutura em aglomerado de madeira ou MDF. \r\nPainéis interiores em melaminha branca e painéis exteriores em lacado colorido brilhante, com tampos em pedra de granito preto tipo Zimbabue.', 'Structure in agglomerated wood or MDF. Interior panels in white melamine and exterior panels in bright colored lacquer, with tops in black Zimbabwe type granite stone.'),
(179, 21, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(180, 16, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(181, 16, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(182, 16, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(183, 16, 'Armários', 'Cabinets', 'Estrutura em aglomerado de madeira ou MDF. \r\nPainéis interiores em melaminha branca e painéis exteriores em lacado colorido brilhante, com tampos em pedra de granito preto tipo Zimbabue.', 'Structure in agglomerated wood or MDF. Interior panels in white melamine and exterior panels in bright colored lacquer, with tops in black Zimbabwe type granite stone.'),
(184, 16, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(185, 6, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(186, 6, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(187, 6, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(188, 6, 'Armários', 'Cabinets', 'Estrutura em aglomerado de madeira ou MDF. \r\nPainéis interiores em melaminha branca e painéis exteriores em lacado colorido brilhante, com tampos em pedra de granito preto tipo Zimbabue.', 'Structure in agglomerated wood or MDF. Interior panels in white melamine and exterior panels in bright colored lacquer, with tops in black Zimbabwe type granite stone.'),
(189, 6, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(190, 25, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(191, 25, 'Guardas e guarda corpos', 'Security Gards', 'Em aço termolacado.', 'Thermo-lacquered steel.'),
(192, 10, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(193, 10, 'Guardas e guarda corpos', 'Security Gards', 'Em aço termolacado.', 'Thermo-lacquered steel.'),
(194, 20, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(195, 20, 'Guardas e guarda corpos', 'Security Gards', 'Em aço termolacado.', 'Thermo-lacquered steel.'),
(196, 15, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(197, 15, 'Guardas e guarda corpos', 'Security Gards', 'Em aço termolacado.', 'Thermo-lacquered steel.'),
(198, 30, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(199, 30, 'Guardas e guarda corpos', 'Security Gards', 'Em aço termolacado.', 'Thermo-lacquered steel.'),
(200, 7, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(201, 7, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura. \r\nRodapés em madeira maciça envernizada.', 'Finished with projected plaster and paint. Varnished solid wood skirting.'),
(202, 7, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(203, 7, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(204, 7, 'Porta de entrada', 'Entrance Door', 'Porta de segurança, corta fogo, revestida a MDF lacado.', 'Fire-resistant security door in lacquered MDF.'),
(205, 7, 'Escada', 'Stairs', 'Degraus em Madeira. \r\nGuarda em vidro.', 'Wooden steps. Glass handrail.'),
(206, 7, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(207, 8, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(208, 8, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(209, 8, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(210, 8, 'Móveis', 'Furniture', 'Em MDF lacado.', 'Lcquered MDF.'),
(211, 8, 'Louças', 'Sanitary Fixtures', 'Lavatório de pousar UP39 circular. \r\nSanita de pousar NEXUS BTW54. \r\nBase de chuveiro VITA.\r\nTudo da Sanitana.', 'UP39 circular self standing wash basin. BTW54 NEXUS free-standing toilet. VITA shower tray. All from Sanitana.'),
(212, 8, 'Torneiras', 'Faucets', 'Tipo Bruma.', 'Bruma type.'),
(213, 8, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(214, 8, 'Porta', 'Door', 'Porta em favo de madeira folheada a MDF, lacada, com puxador em inox.', 'Door in MDF wood honeycomb, lacquered, with stainless steel handle.'),
(215, 8, 'Outros', 'Others', 'Base de chuveiro ou banheira com guarda em vidro.', 'Shower tray or bath with glass railing.'),
(216, 9, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(217, 9, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(218, 9, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(219, 9, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(220, 9, 'Roupeiro', 'Wardrobe', 'Interior folheado a madeira clara e portas de correr com estrutura em alumínio e painéis em MDF lacado.', 'Light wood veneered interior and sliding doors with aluminium frame and lacquered MDF panels.'),
(221, 9, 'Guarda', 'Security Gards', 'Em vidro temperado.', 'Glass handrails.'),
(222, 9, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(223, 12, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(224, 12, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura. \r\nRodapés em madeira maciça envernizada.', 'Finished with projected plaster and paint. Varnished solid wood skirting.'),
(225, 12, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(226, 12, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(227, 12, 'Porta de entrada', 'Entrance Door', 'Porta de segurança, corta fogo, revestida a MDF lacado.', 'Fire-resistant security door in lacquered MDF.'),
(228, 12, 'Escada', 'Stairs', 'Degraus em Madeira. \r\nGuarda em vidro.', 'Wooden steps. Glass handrail.'),
(229, 12, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(230, 13, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(231, 13, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(232, 13, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(233, 13, 'Móveis', 'Furniture', 'Em MDF lacado.', 'Lcquered MDF.'),
(234, 13, 'Louças', 'Sanitary Fixtures', 'Lavatório de pousar UP39 circular. \r\nSanita de pousar NEXUS BTW54. \r\nBase de chuveiro VITA.\r\nTudo da Sanitana.', 'UP39 circular self standing wash basin. BTW54 NEXUS free-standing toilet. VITA shower tray. All from Sanitana.'),
(235, 13, 'Torneiras', 'Faucets', 'Tipo Bruma.', 'Bruma type.'),
(236, 13, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(237, 13, 'Porta', 'Door', 'Porta em favo de madeira folheada a MDF, lacada, com puxador em inox.', 'Door in MDF wood honeycomb, lacquered, with stainless steel handle.'),
(238, 13, 'Outros', 'Others', 'Base de chuveiro ou banheira com guarda em vidro.', 'Shower tray or bath with glass railing.'),
(239, 14, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(240, 14, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(241, 14, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(242, 14, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(243, 14, 'Roupeiro', 'Wardrobe', 'Interior folheado a madeira clara e portas de correr com estrutura em alumínio e painéis em MDF lacado.', 'Light wood veneered interior and sliding doors with aluminium frame and lacquered MDF panels.'),
(244, 14, 'Guarda', 'Security Gards', 'Em vidro temperado.', 'Glass handrails.'),
(245, 14, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(246, 19, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(247, 19, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(248, 19, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(249, 19, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(250, 19, 'Roupeiro', 'Wardrobe', 'Interior folheado a madeira clara e portas de correr com estrutura em alumínio e painéis em MDF lacado.', 'Light wood veneered interior and sliding doors with aluminium frame and lacquered MDF panels.'),
(251, 19, 'Guarda', 'Security Gards', 'Em vidro temperado.', 'Glass handrails.'),
(252, 19, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(253, 24, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(254, 24, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(255, 24, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(256, 24, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing.Electric roller blinds on the outside.'),
(257, 24, 'Roupeiro', 'Wardrobe', 'Interior folheado a madeira clara e portas de correr com estrutura em alumínio e painéis em MDF lacado.', 'Light wood veneered interior and sliding doors with aluminium frame and lacquered MDF panels.'),
(258, 24, 'Guarda', 'Security Gards', 'Em vidro temperado.', 'Glass handrails.'),
(259, 24, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(260, 29, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(261, 29, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(262, 29, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(263, 29, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(264, 29, 'Roupeiro', 'Wardrobe', 'Interior folheado a madeira clara e portas de correr com estrutura em alumínio e painéis em MDF lacado.', 'Light wood veneered interior and sliding doors with aluminium frame and lacquered MDF panels.'),
(265, 29, 'Guarda', 'Security Gards', 'Em vidro temperado.', 'Glass handrails.'),
(266, 29, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(267, 17, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(268, 17, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura. \r\nRodapés em madeira maciça envernizada.', 'Finished with projected plaster and paint. Varnished solid wood skirting.'),
(269, 17, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(270, 17, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(271, 17, 'Porta de entrada', 'Entrance Door', 'Porta de segurança, corta fogo, revestida a MDF lacado.', 'Fire-resistant security door in lacquered MDF.'),
(272, 17, 'Escada', 'Stairs', 'Degraus em Madeira. \r\nGuarda em vidro.', 'Wooden steps. Glass handrail.'),
(273, 17, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(274, 22, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(275, 22, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura. \r\nRodapés em madeira maciça envernizada.', 'Finished with projected plaster and paint. Varnished solid wood skirting.'),
(276, 22, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(277, 22, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(278, 22, 'Porta de entrada', 'Entrance Door', 'Porta de segurança, corta fogo, revestida a MDF lacado.', 'Fire-resistant security door in lacquered MDF.'),
(279, 22, 'Escada', 'Stairs', 'Degraus em Madeira. \r\nGuarda em vidro.', 'Wooden steps. Glass handrail.'),
(280, 22, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(281, 27, 'Pavimentos', 'Floors', 'Soalho flutuante de madeira tipo Riga.', 'Riga type laminated wood flooring.'),
(282, 27, 'Paredes', 'Walls', 'Acabamento a gesso projetado e pintura. \r\nRodapés em madeira maciça envernizada.', 'Finished with projected plaster and paint. Varnished solid wood skirting.'),
(284, 27, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(285, 27, 'Caixilharia exterior', 'Exterior windows and doors', 'Caixilharia em alumínio com corte térmico e vidros duplos acústicos. \r\nEstores de rolo elétricos pelo exterior.', 'Aluminum frames with thermal cut and acoustic double glazing. Electric roller blinds on the outside.'),
(286, 27, 'Porta de entrada', 'Entrance Door', 'Porta de segurança, corta fogo, revestida a MDF lacado.', 'Fire-resistant security door in lacquered MDF.'),
(288, 27, 'Escada', 'Stairs', 'Degraus em Madeira.\r\nGuarda em vidro.', 'Wooden steps. Glass handrail.'),
(289, 27, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(290, 18, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(291, 18, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(292, 18, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(293, 18, 'Móveis', 'Furniture', 'Em MDF lacado.', 'Lcquered MDF.'),
(294, 18, 'Louças', 'Sanitary Fixtures', 'Lavatório de pousar UP39 circular. \r\nSanita de pousar NEXUS BTW54. \r\nBase de chuveiro VITA.\r\nTudo da Sanitana.', 'UP39 circular self standing wash basin. BTW54 NEXUS free-standing toilet. VITA shower tray. All from Sanitana.'),
(295, 18, 'Torneiras', 'Faucets', 'Tipo Bruma.', 'Bruma type.'),
(296, 18, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(297, 18, 'Porta', 'Door', 'Porta em favo de madeira folheada a MDF, lacada, com puxador em inox.', 'Door in MDF wood honeycomb, lacquered, with stainless steel handle.'),
(298, 18, 'Outros', 'Others', 'Base de chuveiro ou banheira com guarda em vidro.', 'Shower tray or bath with glass railing.'),
(299, 23, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(300, 23, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(301, 23, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(302, 23, 'Móveis', 'Furniture', 'Em MDF lacado.', 'Lcquered MDF.'),
(303, 23, 'Louças', 'Sanitary Fixtures', 'Lavatório de pousar UP39 circular. \r\nSanita de pousar NEXUS BTW54.\r\nBase de chuveiro VITA.\r\nTudo da Sanitana.', 'UP39 circular self standing wash basin. BTW54 NEXUS free-standing toilet. VITA shower tray. All from Sanitana.'),
(304, 23, 'Torneiras', 'Faucets', 'Tipo Bruma.', 'Bruma type.'),
(305, 23, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(306, 23, 'Porta', 'Door', 'Porta em favo de madeira folheada a MDF, lacada, com puxador em inox.', 'Door in MDF wood honeycomb, lacquered, with stainless steel handle.'),
(307, 23, 'Outros', 'Others', 'Base de chuveiro ou banheira com guarda em vidro.', 'Shower tray or bath with glass railing.'),
(308, 28, 'Pavimentos', 'Floors', 'Acabamento em mosaico porcelânico ou de grés.', 'Porcelain or stoneware mosaic finish.'),
(309, 28, 'Paredes', 'Walls', 'Acabamento com cerâmico tipo Primus Vitória, com brilho, aplicado com junta contrafiada.', 'Finishing with Primus Vitória type ceramic tiles, glossy, applied with a counter-primed joint.'),
(310, 28, 'Tectos', 'Ceilings', 'Acabamento a gesso projetado e pintura.', 'Finished with projected plaster and paint.'),
(311, 28, 'Móveis', 'Furniture', 'Em MDF lacado.', 'Lcquered MDF.'),
(312, 28, 'Louças', 'Sanitary Fixtures', 'Lavatório de pousar UP39 circular. \r\nSanita de pousar NEXUS BTW54. \r\nBase de chuveiro VITA.\r\nTudo da Sanitana.', 'UP39 circular self standing wash basin. BTW54 NEXUS free-standing toilet. VITA shower tray. All from Sanitana.'),
(313, 28, 'Torneiras', 'Faucets', 'Tipo Bruma.', 'Bruma type.'),
(314, 28, 'Iluminação', 'Lighting', 'Iluminação indireta com LEDs, em moldura de teto. \r\nLuminárias de LEDs.', 'Indirect LED lighting, in ceiling frame. LED light fixture'),
(315, 28, 'Porta', 'Door', 'Porta em favo de madeira folheada a MDF, lacada, com puxador em inox.', 'Door in MDF wood honeycomb, lacquered, with stainless steel handle.'),
(316, 28, 'Outros', 'Others', 'Base de chuveiro ou banheira com guarda em vidro.', 'Shower tray or bath with glass railing.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_lotes_galeria`
--

CREATE TABLE `bonfim_lotes_galeria` (
  `id` int NOT NULL,
  `id_lote` bigint NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '',
  `ordem` int NOT NULL DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_lotes_galeria`
--

INSERT INTO `bonfim_lotes_galeria` (`id`, `id_lote`, `img`, `ordem`, `online`) VALUES
(21, 1, '/img/bonfim/galeria_1_fgL.png', 5, 1),
(22, 1, '/img/bonfim/galeria_1_y2b.png', 5, 1),
(23, 2, '/img/bonfim/galeria_2_zUb.png', 6, 1),
(24, 2, '/img/bonfim/galeria_2_U5f.png', 6, 1),
(25, 3, '/img/bonfim/galeria_3_pcm.png', 7, 1),
(26, 3, '/img/bonfim/galeria_3_yJR.png', 7, 1),
(27, 4, '/img/bonfim/galeria_4_X6U.png', 8, 1),
(28, 4, '/img/bonfim/galeria_4_ZlA.png', 8, 1),
(29, 5, '/img/bonfim/galeria_5_ngE.png', 9, 1),
(30, 5, '/img/bonfim/galeria_5_5QO.png', 9, 1),
(31, 6, '/img/bonfim/galeria_6_f0b.png', 10, 1),
(32, 6, '/img/bonfim/galeria_6_S9o.png', 10, 1),
(48, 1, '/img/bonfim/galeria_1_pTt.png', 19, 1),
(49, 1, '/img/bonfim/galeria_1_vSo.png', 19, 1),
(50, 2, '/img/bonfim/galeria_2_dlW.png', 20, 1),
(51, 2, '/img/bonfim/galeria_2_EKf.png', 20, 1),
(52, 3, '/img/bonfim/galeria_3_gpm.png', 21, 1),
(53, 3, '/img/bonfim/galeria_3_YM8.png', 21, 1),
(54, 4, '/img/bonfim/galeria_4_qzD.png', 22, 1),
(55, 4, '/img/bonfim/galeria_4_6rS.png', 22, 1),
(56, 5, '/img/bonfim/galeria_5_1Gz.png', 23, 1),
(57, 5, '/img/bonfim/galeria_5_jL8.png', 23, 1),
(58, 6, '/img/bonfim/galeria_6_vjp.png', 24, 1),
(59, 6, '/img/bonfim/galeria_6_k7t.png', 24, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_newsletter`
--

CREATE TABLE `bonfim_newsletter` (
  `id` bigint NOT NULL,
  `token` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `lingua` varchar(255) NOT NULL DEFAULT 'pt',
  `data` varchar(11) NOT NULL DEFAULT '',
  `online` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_newsletter`
--

INSERT INTO `bonfim_newsletter` (`id`, `token`, `email`, `lingua`, `data`, `online`) VALUES
(98, 'OADnCuDodgpZ', 'cvieira@mredis.com', 'pt', '1620400122', 1),
(103, 'QRD6qZOSW2qA', 'tferreira@mredis.com', 'pt', '1620404753', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_newsletter_conteudo`
--

CREATE TABLE `bonfim_newsletter_conteudo` (
  `id` bigint NOT NULL,
  `id_news` bigint NOT NULL,
  `lingua` varchar(255) NOT NULL DEFAULT 'pt',
  `assunto` varchar(255) NOT NULL DEFAULT '',
  `corpo` text NOT NULL,
  `data` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_newsletter_conteudo`
--

INSERT INTO `bonfim_newsletter_conteudo` (`id`, `id_news`, `lingua`, `assunto`, `corpo`, `data`) VALUES
(10, 3, 'pt', 'tetse pt', 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum.', 1620036495),
(11, 3, 'en', 'teste en', 'tresetev enxxxxxxxxxjulg.hhhhtttccccfffsdfffggggggg', 1620041790);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_newsletter_conteudo_file`
--

CREATE TABLE `bonfim_newsletter_conteudo_file` (
  `id` bigint NOT NULL,
  `id_conteudo` bigint NOT NULL,
  `ficheiro` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_newsletter_conteudo_file`
--

INSERT INTO `bonfim_newsletter_conteudo_file` (`id`, `id_conteudo`, `ficheiro`) VALUES
(18, 10, '/backoffice/files/newsletter/newsletter_pt10_S4b.png'),
(19, 10, '/backoffice/files/newsletter/newsletter_pt10_WwJ.png'),
(20, 11, '/backoffice/files/newsletter/newsletter_en11_AGk.png'),
(22, 11, '/backoffice/files/newsletter/newsletter_en11_94L.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_newsletter_identificacao`
--

CREATE TABLE `bonfim_newsletter_identificacao` (
  `id` bigint NOT NULL,
  `identificacao` varchar(255) NOT NULL DEFAULT '',
  `data` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_newsletter_identificacao`
--

INSERT INTO `bonfim_newsletter_identificacao` (`id`, `identificacao`, `data`) VALUES
(3, 'Teste teste', 1620041790);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_noticias`
--

CREATE TABLE `bonfim_noticias` (
  `id` bigint NOT NULL,
  `titulo_pt` varchar(255) DEFAULT '',
  `titulo_en` varchar(255) NOT NULL DEFAULT '',
  `data_noticia_pt` varchar(255) DEFAULT '',
  `data_noticia_en` varchar(255) NOT NULL DEFAULT '',
  `primeiro_texto_pt` text,
  `primeiro_texto_en` text NOT NULL,
  `segundo_texto_pt` text,
  `segundo_texto_en` text NOT NULL,
  `link_pt` varchar(255) NOT NULL DEFAULT '',
  `link_en` varchar(255) DEFAULT '',
  `imagem` varchar(255) DEFAULT '',
  `imagem_rasgao` varchar(255) NOT NULL DEFAULT 'C',
  `data` int NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_noticias`
--

INSERT INTO `bonfim_noticias` (`id`, `titulo_pt`, `titulo_en`, `data_noticia_pt`, `data_noticia_en`, `primeiro_texto_pt`, `primeiro_texto_en`, `segundo_texto_pt`, `segundo_texto_en`, `link_pt`, `link_en`, `imagem`, `imagem_rasgao`, `data`, `online`) VALUES
(1, '\"Bonfim é um dos 10 bairros \"mais cool da Europa\", diz o Guardian\"', '\"Bonfim is one of the 10 \"coolest neighborhoods in Europe\", says the Guardian\"', '10 de Fevereiro de 2020 | Jornal PÚBLICO', 'February 10, 2020 | Jornal PÚBLICO', 'Depois de Arroios ter sido considerado o “bairro mais cool do mundo” pela Time Out, agora é o Bonfim a entrar nos tops de tal demanda, desta feita limitada aos países europeus, seleccionada pela equipa do Guardian. Curiosamente, ainda que as duas listas se cruzem, por vezes, nas mesmas cidades, não partilham um único bairro entre os eleitos.<br><br>Quanto ao Bonfim, concentra o melhor de vários mundos: lojas independentes, galerias de arte, novos conceitos gastronómicos e os clássicos de sempre. A subida das rendas no centro histórico do Porto está a empurrar para o Bonfim “uma multidão jovem e criativa”, transformando aquele que outrora foi um dos “enclaves burgueses” da cidade num dos bairros mais interessantes do velho continente.', 'After Arroios has been considered the \"coolest neighborhood in the world\" by Time Out, now is Bonfim to enter the tops of such demand, this time limited to European countries, selected by the Guardian team. Interestingly, even though the two lists sometimes intersect in the same cities, they do not share a single neighborhood among the elected.\r\n\r\n\r\nAs for Bonfim, it concentrates the best of several worlds: independent stores, art galleries, new gastronomic concepts and the usual classics. The rise in rents in Porto\'s historic center is pushing \"a young and creative crowd\" to Bonfim, transforming what was once one of the city\'s \"bourgeois enclaves\" into one of the most interesting neighborhoods in the old continent.', 'Menos turístico que a Baixa e próximo de Campanhã, principal estação de comboios e terminal de autocarros e de metro, não faltam argumentos para passar pelo Bonfim, garante a equipa do jornal The Guardian, que elege o bairro do Porto como sendo o quarto “mais do cool da Europa”.<br><br>Não há centros comerciais, aponta o jornal britânico, mas não faltam “lojas independentes e cool”, a maioria na Rua de Santo Ildefonso, assim como galerias e espaços ligados às artes. Entre as moradas sugeridas, estão a Queijaria Amaral, a livraria Inc. e a Patch, uma loja que alia o vintage e o contemporâneo, com peças de vestuário, papelaria, mobiliário, entre outros. Mas também a Senhora Presidenta, a Lehmann + Silva e a Salut au Monde!, inaugurada no início de 2019, dedicada à fotografia contemporânea e documental.<br><br>Se o turista estiver à procura de “vistas soberbas sobre o Douro”, então aconselham um passeio pelo Parque de Nova Sintra, apontando a “maravilhosa colecção de fontes antigas” do pequeno jardim, devolvido à cidade no início de 2018. Para passar a noite, sugerem as guesthouses myhomeinporto e Cocorico.<br><br>Depois há o comer. E não é que se coma mal em qualquer parte da cidade, mas “uma das alegrias da relativa exclusão do Bonfim do boom turístico do Porto é a infinidade de lugares da velha guarda” para escolher, escreve o jornal. A icónica sandes de pernil da Casa Guedes não falha a selecção (agora com segunda casa, a dois passos da tasca original), que engloba ainda “o camarão tigre grelhado ou a francesinha” do restaurante Madureira e o arroz de polvo da Casa Aleixo.<br><br>Mas têm aberto também novos espaços nos últimos anos, como o Pedro Limão, que serve “fine dining a preços justos” ou o vegetariano Árvore do Mundo. Além de bares e cafés que piscam o olho às novas tendências, como o Combi, o Bird of Passage ou o TerraPlana.<br><br>No topo dos “dez bairros mais cool da Europa” ficaram os impronunciáveis Järntorget e Långgatorna, em Gotemburgo, segunda cidade mais importante da Suécia; o Quarteirão Universitário de Bruxelas (Bélgica) e o antigo bairro de pescadores de Valência, El Cabanyal (Espanha). A lista fica completa com Neukölln, em Berlim (Alemanha); Powi?le, em Varsóvia (Polónia); Holešovice, em Praga (República Checa); Ostiense, em Roma (Itália); Dorcol, em Belgrado (Sérvia); e Quartier de la Réunion, em Paris (França).', 'Less touristy than downtown and close to Campanhã, the main train station and bus and subway terminal, there are plenty of arguments to pass by Bonfim, guarantees the team of the Guardian newspaper, which elects the Porto neighborhood as the fourth \"coolest in Europe.<br><br>There are no shopping centers, points out the British newspaper, but there is no shortage of \"independent stores and cool\", most on Rua de Santo Ildefonso, as well as galleries and spaces related to the arts. Among the suggested addresses are Queijaria Amaral, the bookstore Inc. and Patch, a store that combines vintage and contemporary, with clothing, stationery, furniture, and other items. But also Senhora Presidenta, Lehmann + Silva, and Salut au Monde!, opening in early 2019, dedicated to contemporary and documentary photography.<br><br>If tourists are looking for \"superb views over the Douro,\" then they recommend a walk through the Nova Sintra Park, pointing out the \"wonderful collection of ancient fountains\" of the small garden, returned to the city in early 2018. To spend the night, they suggest the guesthouses myhomeinporto and Cocorico.<br><br>Then there is eating. And it\'s not that you can eat badly anywhere in the city, but \"one of the joys of Bonfim\'s relative exclusion from Porto\'s tourism boom is the plethora of old-school places\" to choose from, the paper writes. The iconic ham sandwich of Casa Guedes does not miss the selection (now with a second house, two steps from the original tavern), which also includes \"the grilled shrimp tiger or francesinha\" from Madureira restaurant and octopus rice from Casa Aleixo.<br><br>But new spaces have also opened in recent years, like Pedro Limão, which serves \"fine dining at fair prices\" or the vegetarian Árvore do Mundo. In addition to bars and cafes that are winking at the new trends, like Combi, Bird of Passage or TerraPlana.<br><br>At the top of the \"ten coolest neighborhoods in Europe\" were the unpronounceable Järntorget and Långgatorna in Gothenburg, Sweden\'s second most important city; the University Quarter in Brussels (Belgium) and the old fishermen\'s quarter of Valencia, El Cabanyal (Spain). The list is completed with Neukölln in Berlin (Germany); Powisle in Warsaw (Poland); Holesovice in Prague (Czech Republic); Ostiense in Rome (Italy); Dorcol in Belgrade (Serbia); and Quartier de la Réunion in Paris (France).', 'https://www.publico.pt/2020/02/10/fugas/noticia/bonfim-porto-bairros-cool-europa-guardian-1903565', 'https://www.publico.pt/2020/02/10/fugas/noticia/bonfim-porto-bairros-cool-europa-guardian-1903565', '/img/bonfim/noticias/noticia_1.png', 'C', 1609928069, 1),
(8, '“O Melhor do Bonfim”', '\"The Best of Bonfim\"', '9 de Outubro de 2020 | Editores da Time Out Porto', 'October 9, 2020 | Editores da Time Out Porto', 'A identidade genuína do Porto, que começa a desaparecer em zonas mais centrais da cidade, ainda está bem viva no Bonfim. Com um forte espírito de comunidade e comércio de proximidade – agora, mais importantes do que nunca – há pequenos cafés e lojas, alguns dos mais tradicionais restaurantes da cidade, mas também espaços mais modernos de cozinha de autor. Com grandes impulsos criativos, em muito devido à Faculdade de Belas Artes e às galerias, há um roteiro artístico para descobrir no Bonfim. E agora que está a ficar cada vez mais pedonal, é ainda mais convidativo explorar a zona a pé, pelas ruas que preservam traços tradicionais da arquitetura urbanística e pelos refúgios no meio da natureza, como o Parque de Nova Sintra, com vista para o rio Douro.', 'The genuine identity of Porto, which is beginning to disappear in more central areas of the city, is still very much alive in Bonfim. With a strong community spirit and close trade - now more important than ever - there are small cafes and stores, some of the most traditional restaurants in town, but also more modern spaces of signature cuisine. With great creative impulses, largely due to the Faculty of Fine Arts and the galleries, there is an artistic itinerary to discover in Bonfim. And now that it is becoming increasingly pedestrianized, it is even more inviting to explore the area on foot, through the streets that preserve traditional traces of urban architecture and the refuges in the midst of nature, such as the Nova Sintra Park, overlooking the Douro River.', '', '', 'https://www.timeout.pt/porto/pt/coisas-para-fazer/o-melhor-do-bonfim', 'https://www.timeout.pt/porto/pt/coisas-para-fazer/o-melhor-do-bonfim', '/img/bonfim/noticias/noticia8-CqR.png', 'B', 1612350667, 1),
(9, '“Guia para explorar o Bonfim no Porto”', '“Guide to explore Bonfim neighborhood in Porto”', '13 de Março de 2020 | Portoalities.com', 'March 13, 2020 | Portoalities.com', 'O Bonfim, no Porto, foi eleito recentemente pelo The Guardian como um dos bairros mais “cool” da Europa. Não me surpreende: é uma zona encantadora, que ainda não foi arruinada pelo turismo massivo, povoada por locais que ali residem há décadas, estudantes de arte e muitos hipsters.<br><br>Pessoalmente, deixa-me muito feliz escrever este artigo porque sou bonfinense de gema – a minha família vive aqui há mais de 50 anos, assim como eu.<br><br>Assim, não te faço esperar mais – vem conhecer o melhor do meu bairro!', 'Bonfim neighborhood, in Porto, was considered one of the coolest neighborhoods in Europe by The Guardian. No wonder: this charming neighborhood is yet to be ruined by tourism and it elegantly combines elder Portuguese residents with art students and loads of hipsters.<br><br>\r\nI am very happy to write this article because I am a bonfinense – my family has been living here for the past 50 years, and so do I.\r\n<br><br>\r\nSo, with no further due, let me introduce you to the best of Bonfim neighborhood!', '', '', 'https://portoalities.com/pt/guia-para-explorar-bonfim-porto/', 'https://portoalities.com/pt/guia-para-explorar-bonfim-porto/', '/img/bonfim/noticias/noticia9-ntx.jpg', 'A', 1612351723, 1),
(11, 'O Bonfim é o novo “bairro das artes” do Porto', 'Bonfim is Porto\'s new \"arts district”', '25 de Outubro de 2018 | VISÃO', 'October 25, 2018 | VISÃO', 'Foi à procura de uma vida mais pacata – e doce, diríamos – que Jorge Santos, 30 anos, trocou Londres e a Cornualha, no Reino Unido, para abrir uma cafetaria na Rua do Heroísmo. Aberta há pouco mais de um ano, a Bolinhos do Jorge – assim mesmo porque é ele quem põe a mão na massa – tornou-se conhecida por causa do brownie, que até já teve direito a um dia a ele dedicado: saiu em forma de bolo, com manteiga de amendoim, frutos vermelhos e leite-creme. O empresário lamenta “a falta de dinamização do Bonfim”, por isso, já anda a juntar as lojas vizinhas para as comemorações do Halloween. Na mesma rua, a servir de caminho para a Estação de Campanhã, onde se encontram restaurantes tradicionais como o Cozinha do Manel ou o Xico dos Presuntos, o que mais mexe é o velhinho Centro Comercial Stop, construído na década de 1980, no boom dos shoppings, em que mais de 100 lojas foram transformadas em estúdios de ensaio para músicos. O Stop, contam-nos, até já recebe visitas guiadas de turistas, curiosos com este fenómeno. Haveremos de regressar à noite, altura em que os sons dos instrumentos e das vozes mais se fazem ouvir.', 'It was in search of a quieter - and sweeter, we might say - life that Jorge Santos, 30, swapped London and Cornwall, in the UK, to open a coffee shop in Rua do Heroísmo. Opened just over a year ago, Bolinhos do Jorge - just like that because he\'s the one doing the baking - became known because of the brownie, which has even had a day dedicated to it: it came out as a cake, with peanut butter, red fruits and custard milk. The businessman regrets \"the lack of dynamism of Bonfim\", so he is already gathering the neighboring stores for the Halloween celebrations. In the same street, on the way to Campanhã Station, where you can find traditional restaurants like Cozinha do Manel or Xico dos Presuntos, what\'s stirring the most is the old Stop Shopping Center, built in the 1980\'s, during the shopping boom, where more than 100 stores were transformed into rehearsal studios for musicians. The Stop, we are told, even receives guided tours from tourists, curious about this phenomenon. We will return at night, when the sounds of instruments and voices can be heard the most.', 'A designer Madalena Martins vive e trabalha no Bonfim<br>Atravessamos o Museu Militar do Porto – onde, entre outras coleções, se mostra uma quantidade de soldados em miniatura –, o Prado do Repouso, o primeiro cemitério público do Porto (com esculturas de Soares dos Reis e de Zulmiro de Carvalho), rumo à Avenida Rodrigues de Freitas, uma das artérias centrais. Foi para aqui que a designer Madalena Martins, 42 anos, mudou o seu atelier há três anos, quando foi obrigada a sair da zona do Bolhão. A viver na Rua do Bonfim, a poucos passos do trabalho, acabou por juntar o útil ao agradável. “Aqui sinto a identidade da cidade, o que já não sentia na Baixa. Tenho os cafés do costume, o senhor da oficina que me arranja o carro, as frutarias e as drogarias onde vou quando é preciso”, conta. E todos a conhecem. A ela e ao Caramelo, o periquito azul que anda ao ombro de Madalena para todo o lado, seja a pé ou de bicicleta. É neste atelier que a designer tem dado asas à criatividade, desde os candeeiros cabeçudos, de pasta de papel, às andorinhas de pátio desenhadas para o Museu Bordalo Pinheiro, em Lisboa, ou aos cadernos feitos a partir de rótulos da Esporão, numa produção maioritariamente assegurada por reclusos de estabelecimentos prisionais.', 'We pass through Porto\'s Military Museum - where, among other collections, a number of miniature soldiers are on display -, the Prado do Repouso, Porto\'s first public cemetery (with sculptures by Soares dos Reis and Zulmiro de Carvalho), heading towards Avenida Rodrigues de Freitas, one of the central arteries. It was here that the designer Madalena Martins, 42, moved her atelier three years ago, when she was forced to leave the Bolhão area. Living in Rua do Bonfim, a few steps away from her work, she ended up combining the useful with the pleasant. \"Here I feel the city\'s identity, which I didn\'t feel downtown. I have the usual cafes, the man from the garage who fixes my car, the fruit and drugstores where I go when I need to,\" she says. And everyone knows her. She and Caramelo, the blue parakeet that walks everywhere on Madalena\'s shoulder, either on foot or by bike. It is in this atelier that the designer has given wings to her creativity, from the big-headed paper pulp lamps, to the swallows designed for the Bordalo Pinheiro Museum in Lisbon, or the notebooks made from Esporão labels, mostly produced by inmates from prison establishments.', 'https://visao.sapo.pt/visaose7e/sair/2018-10-25-o-bonfim-e-o-novo-bairro-das-artes-do-porto/', 'https://visao.sapo.pt/visaose7e/sair/2018-10-25-o-bonfim-e-o-novo-bairro-das-artes-do-porto/', '/img/bonfim/noticias/noticia11-i7y.jpg', 'C', 1617978120, 1),
(12, '“Conhece o Bonfim?”', '\"Facts about Bonfim”', '2011 | Explorebonfim.com', '2011 | Explorebonfim.com', 'O Bonfim é uma freguesia da cidade do Porto que conta, atualmente, com 176 anos de existência. A freguesia e paróquia do Bonfim foram criadas a 11 de dezembro de 1841, por decreto governamental assinado por Costa Cabral durante o reinado de D. Maria II. A freguesia constituiu-se, então, por meio de um pequeno território que foi suprimido à freguesia da Sé, ao qual se somou também uma parte do território pertencente às freguesias de Santo Ildefonso e de Campanhã.<br>Em meados do século XIX, o Bonfim tornou-se no principal polo industrial da cidade do Porto, no qual predominava a indústria têxtil. Na paisagem destacavam-se as altas chaminés e a movimentação apressada dos operários das fábricas, que pautava o quotidiano da freguesia. De facto, naquele período, o Bonfim assumia-se como um verdadeiro cluster industrial, detendo o maior número de operários e estabelecimentos fabris de que há registo na cidade. A instalação massiva de fábricas nesta parte oriental da cidade do Porto conduziu à multiplicação de uma solução habitacional conhecida como «ilha», que se foi espraiando um pouco por toda a freguesia, mas com maior expressividade em S. Vítor, Gomes Freire e Praça da Alegria.', 'Bonfim is a parish of Porto that counts with 176 years of existence. It was created on the 11th of December 1841 by a government decree signed by Costa Cabral during the reign of Queen Maria II. The territory of Bonfim was constituted thanks to some areas that were suppressed from the parish of Sé, Santo Ildefonso, and Campanhã.<br>\r\n In the mid-nineteenth century, Bonfim became the main industrial cluster of Porto, where the textile industry predominated. In the landscape stood the high chimneys and the hurried movement of the workers of the factories. In that period, Bonfim had the largest number of workers and manufacturing establishments ever recorded in the city. The massive installation of factories in this area of Porto led to the boom of a housing solution known as «Ilhas», specially located on S. Vítor, Gomes Freire and Praça da Alegria.', 'Ao mesmo tempo que proliferavam «ilhas», foram-se erguendo grandes palacetes, construídos com materiais de qualidade e mandados edificar por capitalistas, industriais e grandes comerciantes, muitos deles brasileiros de torna-viagem que enriqueceram em Terras de Vera Cruz. Nestes edifícios encontrávamos espécies exóticas dessa terra longínqua e soluções arquitetónicas inovadoras que marcaram uma época e que ainda hoje podem ser apreciadas. Muitos desses «brasileiros» – como assim eram conhecidos – investiram largas somas de dinheiro na freguesia, não só nas suas habitações, mas também nas fábricas de tecelagem e cerâmica e em melhoramentos infraestruturais.<br>Mais recentemente, as fábricas de outros tempos deixaram de laborar e deram lugar a diferentes atividades económicas, tais como o comércio e a restauração, as estruturas vocacionadas ao ensino e à saúde, as instituições bancárias, as pequenas empresas e os serviços, sendo importante não esquecer o turismo, que age como divulgador e impulsionador da cultura e do património da freguesia do Bonfim.', 'At the same time, some palatial houses were built with quality materials by capitalists, industrials, and merchants, some of them Portuguese that emigrated to Brazil and made a lot of money there. In these majestic mansions, we would find exotic species from Brazil and architectonical solutions that characterized an era. A large percentage of these “Brazilians” – as they were known – invested large sums of capital in Bonfim, not only in their properties but also in factories.<br><br>Nowadays, many of these old factories are closed and have disappeared, replaced by different economic activities that we can find in Bonfim, such as commerce and restaurants, education and health structures, bank institutions, small companies, and services. We must not forget tourism which acts as a promoter of the culture and heritage of Bonfim.', 'https://www.explorebonfim.com/historia', 'https://www.explorebonfim.com/history', '/img/bonfim/noticias/noticia12-JYG.png', 'B', 1619196697, 1),
(13, '“Bonfim: entre o clássico das gentes e o turismo contemporâneo”', '\"Bonfim: between classic people and contemporary tourism\"', '28 de Fevereiro de 2020 | JPN', 'February 28, 2020 | JPN', 'Na rua que dá nome à freguesia, vive-se um ambiente de “Regresso ao Futuro”. Subir a Rua do Bonfim até ao cimo da igreja com o mesmo nome é como viajar para um tempo ao qual o boom imobiliário não chegou. Os poucos edifícios requalificados coexistem com prédios devolutos e lojas fechadas.<br><br>O burburinho do comércio local faz lembrar o Bonfim da década de 1980. Do Campo 24 de Agosto à igreja do Bonfim, ainda é possível ver a oficina de carros, a tabacaria onde se compra o jornal, o restaurante típico com o prato do dia ou a mercearia onde se fazem as compras do quotidiano.<br><br>Esta autenticidade melancólica do Bonfim é vivida ainda um pouco por toda a freguesia. O velho e o novo, o antigo e o renovado vivem lado a lado, numa área geográfica tão díspar que vai das Fontaínhas às Antas.', 'In the street that gives name to the parish, one lives an atmosphere of \"Back to the Future\". Going up Bonfim Street to the top of the church with the same name is like traveling to a time when the real estate boom didn\'t come. The few renovated buildings coexist with vacant buildings and closed stores.<br><br>\r\nThe buzz of local commerce is reminiscent of the Bonfim of the 1980s. From Campo 24 de Agosto to the Bonfim church, it is still possible to see the car repair shop, the tobacoo shop where you buy the newspaper, the typical restaurant with the dish of the day or the grocery store where you do your daily shopping.<br><br>\r\nThis melancholic authenticity of Bonfim is still lived a little everywhere in the parish. The old and the new, the ancient and the renewed live side by side in such a disparate geographical area that goes from Fontaínhas to Antas.', 'Para o vereador do pelouro da Educação e Cidadania da Junta de Freguesia do Bonfim, Hugo Pinho, aquela zona geográfica combina o melhor de dois mundos. Ao JPN, o vereador considera que foi uma “maravilha perceber que o património foi recuperado” ao mesmo tempo que a freguesia “mantém as suas gentes”.<br><br>Hugo Pinho acredita que o turismo não é a “panaceia de todos os males.” “Isto vai ter um pico e depois disso vamos ter que arranjar soluções [quando o boom turístico acalmar] para continuar a dar a mesma utilização ou dar uma outra. Estamos a viver esse caminho de encontrar o equilíbrio que não tem sido fácil”, reitera.<br><br>O empedrado das ruas transversais ao Heroísmo mistura-se com o comércio new chic da área envolvente. Da renovada zona de Barão de Nova Sintra avista-se o Museu Militar. Uns passos em frente e o Busto da resistente anti-fascista Virgínia Moura lembra-nos um pedaço de história, que tal como o Bonfim, resiste ao tempo.<br><br>É a pensar nesse tempo que o vereador salienta a chegada das empresas tecnológicas BLIP e Natixis. Hugo Pinho caracteriza-as como rostos de uma mistura do tecido económico e social da freguesia “capazes de gerar emprego para uma população jovem”. O responsável da Junta de Freguesia considera que o Bonfim passou de “zona industrial para uma freguesia comercial e residencial, numa diversidade de atividades económicas que a dinamizam.”<br><br>A arte, seja ela sacra, arquitetónica ou decorativa, é de traço comum no quarteirão que liga o cemitério do Prado do Repouso à Faculdade de Belas Artes da Universidade do Porto (FBAUP). A diretora da instituição, Lúcia Matos, revela que “há um interesse, um envolvimento nos últimos 30 anos no interior das Belas Artes pela geografia, pelas pessoas e pelos negócios da zona envolvente”.<br><br>Por Paulo Sá Ferreira, JPN.', 'For Hugo Pinho, councilman for Education and Citizenship at the Bonfim Borough Council, that geographic area combines the best of both worlds. To JPN, the councilman considers that it was \"wonderful to realize that the heritage was recovered\" at the same time that the parish \"keeps its people\".<br><br>Hugo Pinho believes that tourism is not the \"panacea for all ills.\" \"This is going to have a peak and after that we\'ll have to find solutions [when the tourism boom calms down] to continue to give the same use or give another one. We are living that path of finding the balance that has not been easy,\" he reiterates.<br><br>The cobblestoned streets that cross Heroísmo blend with the new chic commerce in the surrounding area. The Military Museum can be seen from the renovated Barão de Nova Sintra area. A few steps ahead and the Bust of the anti-fascist resistent Virgínia Moura reminds us of a piece of history, which, just like Bonfim, resists time.<br><br>It is with this time in mind that the councilman highlights the arrival of the technological companies BLIP and Natixis. Hugo Pinho characterizes them as faces of a mixture of economic and social fabric of the parish \"capable of generating jobs for a young population\". The responsible of the Junta de Freguesia considers that Bonfim went from \"industrial zone to a commercial and residential parish, in a diversity of economic activities that make it dynamic.\"<br><br>Art, be it sacred, architectural or decorative, is of common trait in the block that connects the Prado do Repouso cemetery to the Faculty of Fine Arts of the University of Porto (FBAUP). The institution\'s director, Lúcia Matos, reveals that \"there has been an interest, an involvement over the last 30 years within Fine Arts by the geography, the people, and the businesses of the surrounding area.<br><br>By Paulo Sá Ferreira, JPN.', 'https://www.jpn.up.pt/2020/02/28/bonfim-entre-o-classico-das-gentes-e-o-turismo-contemporaneo/', 'https://www.jpn.up.pt/2020/02/28/bonfim-entre-o-classico-das-gentes-e-o-turismo-contemporaneo/', '/img/bonfim/noticias/noticia13-7Rv.jpg', 'A', 1619523937, 1),
(14, '“Âme, o café que se tornou alma da zona do Bonfim, Porto”', '\"Âme, the Coffe Shop that became the soul of the Bonfim area, Porto\"', '18 de Agosto de 2020 | Capitalmag.pt', 'August 18, 2020 | Capitalmag.pt', 'Fica num prédio na Rua Duque de Saldanha, de fachada antiga e cantarias de granito, bem ao estilo burguês do Porto do século XIX. Não é um café normal, onde se tomam expressos escaldados e indiferenciados e se comem os bolos iguais aos de todos os outros cafés normais.<br>Quer dizer, também servem os cafés expresso, tão ao gosto dos portugueses. E servem bolos – caseiros ou de cozinheiros que os fazem de propósito para os clientes do Âme. Mas não é essa a marca distintiva. O que distingue começa pela decoração. Um magnífico balcão de azulejos ocre e madeira está rodeado de sofás (com mantas dobradas e colocadas nos braços, para os dias frios da cidade), mesas vintage, vasos com plantas. Nas paredes uma exposição de fotografias, à venda. Nas traseiras, há uma esplanada – ótima para os tempos atuais de pandemia. Árvores, um tomateiro, sombra, um mural de um artista amigo dos proprietários, Mariana e André. Ambiente perfeito.', 'It is located in a building on Rua Duque de Saldanha, with an old frontage and granite stonework, in the bourgeois style of 19th century Porto. It is not a normal café, where you drink scalded and undifferentiated espressos and eat the same cakes as in all other normal cafés.<br><br>\r\nI mean, they also serve the espresso coffee, so much to the taste of the Portuguese. And they serve cakes - homemade or baked by chefs who make them on purpose for Âme clients. But this is not the distinguishing mark. What distinguishes begins with the decoration. A magnificent counter of ochre tiles and wood is surrounded by sofas (with blankets folded and placed on the arms, for the cold days in the city), vintage tables, vases with plants. On the walls is an exhibition of photographs, for sale. In the back, there is a terrace - great for the current pandemic times. Trees, a tomato plant, shade, a mural by an artist friend of the owners, Mariana and André. Perfect environment.', 'O espaço é acolhedor, de travo vintage, onde apetece ir beber demoradamente um café (longo), ficar a trabalhar no computador, aproveitar a sombra da esplanada nestes dias de verão, tomar um relaxado pequeno almoço. Afinal, Âme foi buscar o nome à palavra francesa âme, que significa alma. É um local bom para reconectar com a alma. Mas também funciona como acrónimo de Add More Energy. É um sítio onde recarregar energias a meio de um dia de trabalho, depois de regressar do emprego, ou de as potenciar logo de manhã ao pequeno almoço.<br><br>Mas ainda não é isto o mais distintivo no Âme. São mesmo os cafés. Os criadores do espaço, Mariana e André, são portugueses que nasceram e viveram muitos anos no Brasil. De lá trouxeram o gosto pelo café. Servem sobretudo cafés de especialidade. Até o seu café expresso é diferente. Mariana explica: ‘Desenvolvemos um blend exclusivo para o nosso expresso que realça os mais intensos sabores dos grãos da Etiópia, Guatemala e Brasil. Nosso café é torrado pelo 7G Roaster, uma torrefação de Vila Nova de Gaia. Nosso blend Âme é cremoso, com corpo denso, notas de chocolate ao leite e frutos vermelhos. Totalmente diferente dos cafés tradicionais mas que agradam os paladares mais exigentes do café. Um café perfeito também em bebidas de leite, como o cappuccino ou macchiato.’<br>Mais apetecíveis ainda são os cafés com métodos de filtragem provenientes de vários países e com grãos cultivados em numerosas zonas do mundo. Os utensílios para fazer café dispostos no balcão do Âme são mais parecidos com o que usualmente se vislumbra num bar do que num café tradicional. Há processos de fazer café pouco comuns até agora em Portugal.<br><br>Por Maria João Marques, Capitalmag.pt .', 'The space is cozy, with a vintage feel, where you feel like having a long coffee, working on the computer, enjoying the shade of the terrace on these summer days, having a relaxed breakfast. After all, Âme got its name from the French word âme, which means soul. It is a good place to reconnect with the soul. But it also works as an acronym for Add More Energy. It\'s a place where you can recharge your energy in the middle of a work day, after coming home from work, or boost it first thing in the morning at breakfast.<br><br>But this is not yet the most distinctive thing about Âme. It\'s really the coffees. The space\'s creators, Mariana and André, are Portuguese who were born and lived for many years in Brazil. From there they brought their taste for coffee. They serve mainly specialty coffees. Even their espresso is different. Mariana explains: \'We developed an exclusive blend for our espresso that brings out the most intense flavors of beans from Ethiopia, Guatemala, and Brazil. Our coffee is roasted by 7G Roaster, a roaster from Vila Nova de Gaia. Our Âme blend is creamy, with a dense body, notes of milk chocolate and red fruits. Totally different from traditional coffees but pleasing to the most demanding coffee tastes. A perfect coffee also in milk drinks, such as cappuccino or macchiato.\'<br><br>Even more desirable are coffees with filtering methods from various countries and with beans grown in many parts of the world. The coffee-making utensils laid out on the counter at Âme are more like what you would usually see in a bar than in a traditional coffee shop. There are coffee making processes that have been uncommon until now in Portugal.<br><br>By Maria João Marques, Capitalmag.pt .', 'https://capitalmag.pt/2020/08/18/ame-o-cafe-que-se-tornou-alma-da-zona-do-bonfim-porto/', 'https://capitalmag.pt/2020/08/18/ame-o-cafe-que-se-tornou-alma-da-zona-do-bonfim-porto/', '/img/bonfim/noticias/noticia14-cob.jpeg', 'C', 1619524237, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_noticias_slide`
--

CREATE TABLE `bonfim_noticias_slide` (
  `id` bigint NOT NULL,
  `id_noticia` bigint NOT NULL,
  `titulo_pt` text NOT NULL,
  `titulo_en` text NOT NULL,
  `texto_pt` text NOT NULL,
  `texto_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_noticias_slide`
--

INSERT INTO `bonfim_noticias_slide` (`id`, `id_noticia`, `titulo_pt`, `titulo_en`, `texto_pt`, `texto_en`) VALUES
(2, 1, ' \"Bonfim é um dos 10 bairros \"mais cool ...', ' \"Bonfim is one of the 10 \"coolest neighborhoods ...', ' Depois de Arroios ter sido considerado o “bairro mais cool do mundo” pela Time Out, agora é o Bonfim a entrar nos tops de tal demanda, desta feita limitada aos países europeus, seleccionada pela equipa do ...', ' After Arroios has been considered the \"coolest neighborhood in the world\" by Time Out, now is Bonfim to enter the tops of such demand, this time limited to European countries, selected by the Guardian team. Interestingly, ...'),
(7, 8, '“O Melhor do Bonfim”', '\"The Best of Bonfim\"', ' A identidade genuína do Porto, que começa a desaparecer em zonas mais centrais da cidade, ainda está bem viva no Bonfim. Com um forte espírito de comunidade e comércio de proximidade – agora, mais importantes do ...', ' The genuine identity of Porto, which is beginning to disappear in more central areas of the city, is still very much alive in Bonfim. With a strong community spirit and close trade - now more important ...'),
(8, 9, '“Guia para explorar o Bonfim no Porto”', '“Guide to explore Bonfim neighborhood in Porto”', ' O Bonfim, no Porto, foi eleito recentemente pelo The Guardian como um dos bairros mais “cool” da Europa. Não me surpreende: é uma zona encantadora, que ainda não foi arruinada pelo turismo massivo, povoada por locais ...', ' Bonfim neighborhood, in Porto, was considered one of the coolest neighborhoods in Europe by The Guardian. No wonder: this charming neighborhood is yet to be ruined by tourism and it elegantly combines elder Portuguese residents with ...'),
(10, 11, ' O Bonfim é o novo “bairro das artes” ...', 'Bonfim is Porto\'s new \"arts district”', ' Foi à procura de uma vida mais pacata – e doce, diríamos – que Jorge Santos, 30 anos, trocou Londres e a Cornualha, no Reino Unido, para abrir uma cafetaria na Rua do Heroísmo. Aberta há ...', ' It was in search of a quieter - and sweeter, we might say - life that Jorge Santos, 30, swapped London and Cornwall, in the UK, to open a coffee shop in Rua do Heroísmo. Opened ...'),
(11, 12, '“Conhece o Bonfim?”', '\"Facts about Bonfim”', ' O Bonfim é uma freguesia da cidade do Porto que conta, atualmente, com 176 anos de existência. A freguesia e paróquia do Bonfim foram criadas a 11 de dezembro de 1841, por decreto governamental assinado por ...', ' Bonfim is a parish of Porto that counts with 176 years of existence. It was created on the 11th of December 1841 by a government decree signed by Costa Cabral during the reign of Queen Maria ...'),
(12, 13, ' “Bonfim: entre o clássico das gentes e o ...', '\"Bonfim: between classic people and contemporary tourism\"', ' Na rua que dá nome à freguesia, vive-se um ambiente de “Regresso ao Futuro”. Subir a Rua do Bonfim até ao cimo da igreja com o mesmo nome é como viajar para um tempo ao qual ...', ' In the street that gives name to the parish, one lives an atmosphere of \"Back to the Future\". Going up Bonfim Street to the top of the church with the same name is like traveling to ...'),
(13, 14, ' “Âme, o café que se tornou alma da ...', ' \"Âme, the Coffe Shop that became the soul ...', ' Fica num prédio na Rua Duque de Saldanha, de fachada antiga e cantarias de granito, bem ao estilo burguês do Porto do século XIX. Não é um café normal, onde se tomam expressos escaldados e indiferenciados ...', ' It is located in a building on Rua Duque de Saldanha, with an old frontage and granite stonework, in the bourgeois style of 19th century Porto. It is not a normal café, where you drink scalded ...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonfim_projeto`
--

CREATE TABLE `bonfim_projeto` (
  `id` bigint NOT NULL,
  `imagem_pt` varchar(255) NOT NULL DEFAULT '',
  `imagem_en` varchar(255) NOT NULL DEFAULT '',
  `imagem_sem_resolucao_pt` varchar(255) NOT NULL DEFAULT '',
  `imagem_sem_resolucao_en` varchar(255) NOT NULL DEFAULT '',
  `descricao_pt` varchar(255) NOT NULL DEFAULT '',
  `descricao_en` varchar(255) NOT NULL DEFAULT '',
  `ordem` int NOT NULL DEFAULT '1',
  `online` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bonfim_projeto`
--

INSERT INTO `bonfim_projeto` (`id`, `imagem_pt`, `imagem_en`, `imagem_sem_resolucao_pt`, `imagem_sem_resolucao_en`, `descricao_pt`, `descricao_en`, `ordem`, `online`) VALUES
(1, '/img/bonfim/planta_1.png', '/img/bonfim/planta_en1-anx.png', '/img/bonfim/planta_1_low-res.png', '/img/bonfim/255_Projecto_1EN_low.png', 'PISO -1A', 'FLOOR -1A', 2, 1),
(2, '/img/bonfim/planta_2.png', '/img/bonfim/planta_en2-eop.png', '/img/bonfim/planta_2_low-res.png', '/img/bonfim/255_Projecto_2EN_low.png', 'PISO 0A | 0B', 'FLOOR 0A | 0B', 3, 1),
(3, '/img/bonfim/planta_3.png', '/img/bonfim/planta_en3-4MI.png', '/img/bonfim/planta_3_low-res.png', '/img/bonfim/255_Projecto_3EN_low.png', 'PISO 1B | 1C', 'FLOOR 1B | 1C', 4, 1),
(4, '/img/bonfim/planta_4.png', '/img/bonfim/planta_en4-FPQ.png', '/img/bonfim/planta_4_low-res.png', '/img/bonfim/255_Projecto_4EN_low.png', 'PISO 2C | 2D', 'FLOOR 2C | 2D', 5, 1),
(5, '/img/bonfim/planta_5.png', '/img/bonfim/planta_en5-TrT.png', '/img/bonfim/planta_5_low-res.png', '/img/bonfim/255_Projecto_5EN_low.png', 'PISO 3D | 3E', 'FLOOR 3D | 3E', 6, 1),
(6, '/img/bonfim/planta_6.png', '/img/bonfim/planta_en6-2fj.png', '/img/bonfim/planta_6_low-res.png', '/img/bonfim/255_Projecto_6EN_low.png', 'PISO 4E | 4F', 'FLOOR 4E | 4F', 7, 1),
(7, '/img/bonfim/planta_7.png', '/img/bonfim/planta_en7-CuL.png', '/img/bonfim/planta_7_low-res.png', '/img/bonfim/255_Projecto_7EN_low.png', 'PISO 5E | 5F', 'FLOOR 5E | 5F', 8, 1),
(8, '/img/bonfim/planta_8.png', '/img/bonfim/planta_en8-WmB.png', '/img/bonfim/planta_8_low-res.png', '/img/bonfim/255_Projecto_8EN_low.png', 'Perfil da Rua do Bonfim', 'Profile of Rua do Bonfim', 9, 1),
(9, '/img/bonfim/planta_9.png', '/img/bonfim/planta_en9-iX7.png', '/img/bonfim/planta_9_low-res.png', '/img/bonfim/255_Projecto_9EN_low.png', 'Tardoz', 'Tardoz', 10, 1),
(11, '/img/bonfim/planta_10.png', '/img/bonfim/planta_en11-2rG.png', '/img/bonfim/planta_10_low-res.png', '/img/bonfim/255_Projecto_10EN_low.png', 'Perfil - Pormenor', 'Profile - Detail', 11, 1),
(12, '/img/bonfim/planta_11.png', '/img/bonfim/planta_en12-sKP.png', '/img/bonfim/planta_11_low-res.png', '/img/bonfim/255_Projecto_11EN_low.png', 'CORTE 2', 'CUT 2', 12, 1),
(13, '/img/bonfim/planta_12.png', '/img/bonfim/planta_en13-STT.png', '/img/bonfim/planta_12_low-res.png', '/img/bonfim/255_Projecto_12EN_low.png', 'CORTE 3', 'CUT 3', 13, 1),
(14, '/img/bonfim/planta_13.png', '/img/bonfim/planta_en14-DXx.png', '/img/bonfim/planta_13_low-res.png', '/img/bonfim/255_Projecto_13EN_low.png', 'Indicações', 'Indications', 14, 1),
(15, '/img/bonfim/planta_14.png', '/img/bonfim/planta_en15-hPp.png', '/img/bonfim/planta_14_low-res.png', '/img/bonfim/255_Projecto_14EN_low.png', 'Perfil Longitudinal', 'Longitudinal Profile', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` bigint NOT NULL,
  `nome` varchar(255) NOT NULL DEFAULT '',
  `ficha_tecnica_pt` text NOT NULL,
  `ficha_tecnica_en` text NOT NULL,
  `data` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id`, `nome`, `ficha_tecnica_pt`, `ficha_tecnica_en`, `data`) VALUES
(1, 'bonfim', 'Arquitetura por Mário Vilanova e Solange Valente | Topografia por Miguel Gomes | Especialidades por Pina & Machado, Lda | Construção por Sá Machado & Filhos, Lda.', 'Architecture by Mário Vilanova and Solange Valente | Topography by Miguel Gomes | Specialties by Pina & Machado, Lda | Construction by Sá Machado & Filhos, Lda.', 1619717359);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_pass`
--
ALTER TABLE `admin_pass`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `barra_progressao`
--
ALTER TABLE `barra_progressao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `barra_progressao_fase`
--
ALTER TABLE `barra_progressao_fase`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bonfim_contactos`
--
ALTER TABLE `bonfim_contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lote` (`id_lote`);

--
-- Índices para tabela `bonfim_home_galeria`
--
ALTER TABLE `bonfim_home_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bonfim_lotes`
--
ALTER TABLE `bonfim_lotes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bonfim_lotes_acabamentos`
--
ALTER TABLE `bonfim_lotes_acabamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lote` (`id_lote`);

--
-- Índices para tabela `bonfim_lotes_acabamentos_tipo`
--
ALTER TABLE `bonfim_lotes_acabamentos_tipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acabamento` (`id_acabamento`);

--
-- Índices para tabela `bonfim_lotes_galeria`
--
ALTER TABLE `bonfim_lotes_galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lote` (`id_lote`);

--
-- Índices para tabela `bonfim_newsletter`
--
ALTER TABLE `bonfim_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bonfim_newsletter_conteudo`
--
ALTER TABLE `bonfim_newsletter_conteudo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_news` (`id_news`);

--
-- Índices para tabela `bonfim_newsletter_conteudo_file`
--
ALTER TABLE `bonfim_newsletter_conteudo_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_conteudo` (`id_conteudo`);

--
-- Índices para tabela `bonfim_newsletter_identificacao`
--
ALTER TABLE `bonfim_newsletter_identificacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bonfim_noticias`
--
ALTER TABLE `bonfim_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bonfim_noticias_slide`
--
ALTER TABLE `bonfim_noticias_slide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_noticia` (`id_noticia`);

--
-- Índices para tabela `bonfim_projeto`
--
ALTER TABLE `bonfim_projeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `admin_pass`
--
ALTER TABLE `admin_pass`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `barra_progressao`
--
ALTER TABLE `barra_progressao`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `barra_progressao_fase`
--
ALTER TABLE `barra_progressao_fase`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `bonfim_contactos`
--
ALTER TABLE `bonfim_contactos`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `bonfim_home_galeria`
--
ALTER TABLE `bonfim_home_galeria`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de tabela `bonfim_lotes`
--
ALTER TABLE `bonfim_lotes`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `bonfim_lotes_acabamentos`
--
ALTER TABLE `bonfim_lotes_acabamentos`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `bonfim_lotes_acabamentos_tipo`
--
ALTER TABLE `bonfim_lotes_acabamentos_tipo`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT de tabela `bonfim_lotes_galeria`
--
ALTER TABLE `bonfim_lotes_galeria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `bonfim_newsletter`
--
ALTER TABLE `bonfim_newsletter`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de tabela `bonfim_newsletter_conteudo`
--
ALTER TABLE `bonfim_newsletter_conteudo`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `bonfim_newsletter_conteudo_file`
--
ALTER TABLE `bonfim_newsletter_conteudo_file`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `bonfim_newsletter_identificacao`
--
ALTER TABLE `bonfim_newsletter_identificacao`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `bonfim_noticias`
--
ALTER TABLE `bonfim_noticias`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `bonfim_noticias_slide`
--
ALTER TABLE `bonfim_noticias_slide`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `bonfim_projeto`
--
ALTER TABLE `bonfim_projeto`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bonfim_contactos`
--
ALTER TABLE `bonfim_contactos`
  ADD CONSTRAINT `bonfim_contactos_ibfk_1` FOREIGN KEY (`id_lote`) REFERENCES `bonfim_lotes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `bonfim_lotes_acabamentos`
--
ALTER TABLE `bonfim_lotes_acabamentos`
  ADD CONSTRAINT `bonfim_lotes_acabamentos_ibfk_1` FOREIGN KEY (`id_lote`) REFERENCES `bonfim_lotes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `bonfim_lotes_acabamentos_tipo`
--
ALTER TABLE `bonfim_lotes_acabamentos_tipo`
  ADD CONSTRAINT `bonfim_lotes_acabamentos_tipo_ibfk_1` FOREIGN KEY (`id_acabamento`) REFERENCES `bonfim_lotes_acabamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `bonfim_lotes_galeria`
--
ALTER TABLE `bonfim_lotes_galeria`
  ADD CONSTRAINT `bonfim_lotes_galeria_ibfk_1` FOREIGN KEY (`id_lote`) REFERENCES `bonfim_lotes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `bonfim_newsletter_conteudo`
--
ALTER TABLE `bonfim_newsletter_conteudo`
  ADD CONSTRAINT `bonfim_newsletter_conteudo_ibfk_1` FOREIGN KEY (`id_news`) REFERENCES `bonfim_newsletter_identificacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `bonfim_newsletter_conteudo_file`
--
ALTER TABLE `bonfim_newsletter_conteudo_file`
  ADD CONSTRAINT `bonfim_newsletter_conteudo_file_ibfk_1` FOREIGN KEY (`id_conteudo`) REFERENCES `bonfim_newsletter_conteudo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `bonfim_noticias_slide`
--
ALTER TABLE `bonfim_noticias_slide`
  ADD CONSTRAINT `bonfim_noticias_slide_ibfk_1` FOREIGN KEY (`id_noticia`) REFERENCES `bonfim_noticias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
