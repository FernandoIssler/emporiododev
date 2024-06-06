-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06/06/2024 às 18:07
-- Versão do servidor: 10.11.7-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u948569319_emporiododev`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `address`
--

CREATE TABLE `address` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `street` varchar(255) NOT NULL DEFAULT '',
  `number` varchar(255) NOT NULL DEFAULT '',
  `complement` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Canecas'),
(2, 'Camisas'),
(3, 'Acessórios'),
(4, 'Quadros'),
(5, 'Porta Copos'),
(6, 'Almofadas'),
(7, 'Adesivos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`) VALUES
(3, 'fernandoissler@hotmail.com', '2024-05-03 09:39:36', '2024-05-03 09:39:36'),
(5, 'fernandoissler@gmail.com', '2024-05-03 10:17:27', '2024-05-03 10:17:27'),
(6, 'fernandoissler@hotmail.com', '2024-06-04 21:41:27', '2024-06-04 21:41:27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `previous_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `category`, `title`, `description`, `cover`, `price`, `previous_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Caneca \"Code Master\"', 'Caneca de porcelana branca com estampa \"Code Master\"', 'https://cdn.awsli.com.br/900x900/608/608801/produto/84924514/824fda0451.jpg', 34.99, NULL, 50, '2024-04-30 20:56:55', '2024-06-03 13:27:55'),
(2, 2, 'Camiseta \"Código Fonte\"', 'Camiseta preta com estampa de código fonte', 'https://cdn.awsli.com.br/900x900/608/608801/produto/146207456/e4eb6021a7.jpg', 24.99, NULL, 100, '2024-04-30 20:56:55', '2024-04-30 23:59:35'),
(3, 3, 'Mousepad Geek', 'Mousepad retangular com design geek', 'https://cdn.awsli.com.br/900x900/608/608801/produto/30402358/156052f109.jpg', 9.99, NULL, 80, '2024-04-30 20:56:55', '2024-05-01 00:01:38'),
(4, 4, 'Quadro \"Byte Art\"', 'Quadro decorativo com arte inspirada em bytes', 'https://cdn.awsli.com.br/900x900/608/608801/produto/176468652/f2543fb0b9.jpg', 29.99, NULL, 30, '2024-04-30 20:56:55', '2024-05-01 00:00:46'),
(6, 6, 'Almofada \"Coding Comfort\"', 'Almofada decorativa com estampa de código de programação', 'https://cdn.awsli.com.br/900x900/608/608801/produto/200840582/tmpchrome3d-f460d7515e.jpg', 34.99, NULL, 40, '2024-04-30 20:56:55', '2024-05-01 00:01:01'),
(8, 1, 'Caneca \"Bug Hunter\"', 'Caneca de porcelana branca com estampa \"Bug Hunter\"', 'https://cdn.awsli.com.br/900x900/608/608801/produto/25906861/21edfc2773.jpg', 14.99, NULL, 50, '2024-04-30 20:56:55', '2024-05-01 00:01:25'),
(9, 2, 'Camiseta \"If Then Else\"', 'Camiseta preta com estampa do código If Then Else', 'https://cdn.awsli.com.br/900x900/608/608801/produto/174700041/ad486332f6.jpg', 24.99, NULL, 100, '2024-04-30 20:56:55', '2024-05-01 00:02:12'),
(13, 6, 'Almofada \"Geek Life\"', 'Almofada decorativa com estampa de símbolos geek', 'https://cdn.awsli.com.br/900x900/608/608801/produto/200840581/tmpwelcometomylocalhost-5dbaa4b363.jpg', 34.99, NULL, 40, '2024-04-30 20:56:55', '2024-05-01 00:00:39'),
(14, 7, 'Adesivo \"404 Not Found\"', 'Adesivo decorativo com o código de erro \"404 Not Found\"', 'https://cdn.awsli.com.br/900x900/608/608801/produto/57340854/9ef198cc89.jpg', 4.99, NULL, 120, '2024-04-30 20:56:55', '2024-05-01 00:01:51'),
(15, 1, 'Caneca \"Developer\"', 'Caneca de porcelana branca com estampa \"Developer\"', 'https://cdn.awsli.com.br/900x900/608/608801/produto/256246984/caneca-soft-dev-umkcd5bwdg.png', 14.99, NULL, 50, '2024-04-30 20:56:55', '2024-05-01 00:01:19'),
(20, 6, 'Almofada Localhost', 'Almofada decorativa com estampa localhost', 'https://cdn.awsli.com.br/900x900/608/608801/produto/200840581/tmpwelcometomylocalhost-5dbaa4b363.jpg', 34.99, NULL, 40, '2024-04-30 20:56:55', '2024-06-04 13:01:23'),
(21, 7, 'Adesivo \"Geek Inside\"', 'Adesivo decorativo com a frase \"Geek Inside\"', 'https://cdn.awsli.com.br/900x900/608/608801/produto/58924251/29b18154be.jpg', 4.99, NULL, 120, '2024-04-30 20:56:55', '2024-05-01 00:01:57'),
(23, 1, 'MOLETOM BATTERY LIFE', 'Informações do Produto\r\n\r\n• Moletom com tecido 50% algodão e 50% poliéster\r\n\r\n• Cor: Preto\r\n\r\n• Costuras reforçadas\r\n\r\n• Tipo de impressão: DTG - Impressão digital direta no tecido com toque zero e alta durabilidade\r\n\r\nSobre a Estampa\r\n\r\n• Arte exclusiva com tema de humor\r\n\r\n• Design feito por Studio Geek\r\n\r\n• Estampa levemente desbotada estilo Vintage\r\n\r\n• Atenção: As cores podem apresentar diferenças de tonalidades devido a iluminação e variação de monitores', 'https://cdn.dooca.store/292/products/moletom-battery-life_620x620+fill_ffffff.jpg?v=1624634731', 149.90, NULL, 0, '2024-06-04 12:43:42', '2024-06-04 12:43:42'),
(24, 1, 'MOLETOM COM CAPUZ INFORMATION AGE EVOLUTION', 'Informações do Produto\r\n\r\n• Moletom com bolso canguru em tecido 50% algodão e 50% poliéster\r\n\r\n• Cor: Preto\r\n\r\n• Costuras reforçadas\r\n\r\n• Tipo de impressão: DTG - Impressão digital direta no tecido com toque zero e alta durabilidade\r\n\r\nSobre a Estampa\r\n\r\n• Arte exclusiva com tema de tecnologia\r\n\r\n• Design feito por Studio Geek\r\n\r\n• Estampa levemente desbotada estilo Vintage\r\n\r\n• Atenção: As cores podem apresentar diferenças de tonalidades devido a iluminação e variação de monitores', 'https://cdn.dooca.store/292/products/vtvonx1jotnrraremevc2mscnrafdjnka8h3_620x620+fill_ffffff.jpg?v=1691174423', 199.90, NULL, 0, '2024-06-04 12:44:24', '2024-06-04 12:44:24'),
(25, 1, 'MOLETOM COM CAPUZ NO INTERNET', 'Informações do Produto\r\n\r\n• Moletom felpado com tecido 50% algodão e 50% poliéster\r\n\r\n• Cor: Preto\r\n\r\n• Costuras reforçadas\r\n\r\n• Tipo de impressão: DTG - Impressão digital direta no tecido com toque zero e alta durabilidade\r\n\r\nSobre a Estampa\r\n\r\n• Arte exclusiva com tema de tecnologia\r\n\r\n• Design feito por Studio Geek\r\n\r\n• Estampa levemente desbotada estilo Vintage\r\n\r\n• Atenção: As cores podem apresentar diferenças de tonalidades devido a iluminação e variação de monitores', 'https://cdn.dooca.store/292/products/moletom-com-capuz-no-internet_620x620+fill_ffffff.jpg?v=1691165036&webp=0', 199.90, NULL, 0, '2024-06-04 12:44:55', '2024-06-04 12:45:01'),
(26, 1, 'MOLETOM NEVER FORGET', 'Informações do Produto\r\n\r\n• Moletom com tecido 50% algodão e 50% poliéster\r\n\r\n• Cor: Mescla Cinza\r\n\r\n• Costuras reforçadas\r\n\r\n• Tipo de impressão: DTG - Impressão digital direta no tecido com toque zero e alta durabilidade\r\n\r\nSobre a Estampa\r\n\r\n• Arte exclusiva com tema de tecnologia\r\n\r\n• Design feito por Studio Geek\r\n\r\n• Estampa levemente desbotada estilo Vintage\r\n\r\n• Atenção: As cores podem apresentar diferenças de tonalidades devido a iluminação e variação de monitores', 'https://cdn.dooca.store/292/products/moletom-never-forget_620x620+fill_ffffff.jpg?v=1593550981', 149.90, NULL, 0, '2024-06-04 12:45:29', '2024-06-04 12:45:29'),
(27, 1, 'Camisa Programmer', 'Esta camiseta de definição de programador é perfeita para profissionais de TI, programadores, engenheiros de computação, desenvolvedores de software e homens e mulheres de suporte técnico que usarão com orgulho esta camiseta de tecnologia da informação, codificação, programação e segurança cibernética.', 'https://m.media-amazon.com/images/I/A13usaonutL._CLa%7C2140%2C2000%7C81DGnl1LGOL.png%7C0%2C0%2C2140%2C2000%2B0.0%2C0.0%2C2140.0%2C2000.0_AC_SX466_.png', 48.36, NULL, 0, '2024-06-04 12:51:53', '2024-06-04 12:51:53'),
(28, 1, 'Camisa Full Stack Developer', 'Você é um desenvolvedor full stack que adora panquecas? Procurando uma camisa de programador para manter seu código fluindo? Abrace seu geek interior com esta camiseta de programador Full Stack Developer!', 'https://m.media-amazon.com/images/I/B1DBWbloIpS._CLa%7C2140%2C2000%7C713EKx7nHBL.png%7C0%2C0%2C2140%2C2000%2B0.0%2C0.0%2C2140.0%2C2000.0_AC_SX466_.png', 39.90, NULL, 0, '2024-06-04 12:53:07', '2024-06-04 12:53:07'),
(29, 1, 'Moletom JavaScript', 'Design exclusivo para todos os desenvolvedores, programadores e designers front-end de JavaScript da web.', 'https://m.media-amazon.com/images/I/B1i3u9-Q-KS._CLa%7C2140%2C2000%7CB10SSzW14NS.png%7C0%2C0%2C2140%2C2000%2B0.0%2C0.0%2C2140.0%2C2000.0_AC_SX466_.png', 399.00, NULL, 0, '2024-06-04 13:00:32', '2024-06-04 13:00:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `report_access`
--

CREATE TABLE `report_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `users` int(11) NOT NULL DEFAULT 1,
  `views` int(11) NOT NULL DEFAULT 1,
  `pages` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `report_access`
--

INSERT INTO `report_access` (`id`, `users`, `views`, `pages`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 193, '2019-02-11 15:12:15', '2019-02-11 17:57:55'),
(2, 1, 1, 32, '2019-02-14 13:37:35', '2019-02-14 13:39:23'),
(3, 1, 1, 7, '2022-12-22 10:43:34', '2022-12-22 11:54:31'),
(4, 1, 1, 13, '2023-07-26 09:54:50', '2023-07-26 09:57:20'),
(5, 1, 1, 264, '2023-08-06 07:09:47', '2023-08-06 12:51:14'),
(6, 1, 1, 18, '2023-08-07 21:21:37', '2023-08-07 21:47:19'),
(7, 1, 1, 1, '2023-08-08 09:22:07', '2023-08-08 09:22:07'),
(8, 1, 1, 181, '2023-08-10 15:07:16', '2023-08-10 21:50:01'),
(9, 1, 1, 7, '2023-08-11 14:52:44', '2023-08-11 14:53:01'),
(10, 26, 33, 717, '2023-08-14 08:20:24', '2023-08-14 21:51:16'),
(11, 1, 2, 1874, '2023-08-23 16:16:05', '2023-08-23 21:39:56'),
(12, 1, 1, 746, '2023-08-24 19:37:27', '2023-08-24 20:34:07'),
(13, 1, 1, 10309, '2023-08-25 00:47:23', '2023-08-25 15:37:22'),
(14, 1, 1, 6178, '2023-08-27 09:22:42', '2023-08-27 20:52:35'),
(15, 1, 1, 34, '2023-08-28 21:54:27', '2023-08-28 21:54:33'),
(16, 1, 1, 77, '2023-08-31 19:21:12', '2023-08-31 19:23:41'),
(17, 1, 1, 169, '2023-09-02 15:26:59', '2023-09-02 15:30:33'),
(18, 1, 1, 1, '2023-09-13 16:13:12', '2023-09-13 16:13:12'),
(19, 1, 1, 45, '2023-10-03 10:21:20', '2023-10-03 10:22:59'),
(20, 1, 1, 36, '2023-10-04 20:38:31', '2023-10-04 20:40:41'),
(21, 1, 1, 1, '2023-10-05 00:57:09', '2023-10-05 00:57:09'),
(22, 1, 1, 45, '2023-10-26 21:20:11', '2023-10-26 21:20:43'),
(23, 1, 1, 8, '2023-10-27 15:10:29', '2023-10-27 15:11:11'),
(24, 1, 1, 128, '2023-11-07 15:05:11', '2023-11-07 15:08:02'),
(25, 1, 1, 75, '2023-11-08 10:57:03', '2023-11-08 10:59:27'),
(26, 1, 1, 1647, '2023-11-12 09:58:32', '2023-11-12 23:49:34'),
(27, 1, 1, 170, '2023-12-07 09:00:02', '2023-12-07 17:05:20'),
(28, 1, 1, 2320, '2023-12-08 14:33:45', '2023-12-08 15:26:51'),
(29, 1, 1, 35, '2023-12-10 17:55:33', '2023-12-10 17:55:40'),
(30, 1, 1, 378, '2023-12-24 17:34:58', '2023-12-24 18:42:52'),
(31, 1, 1, 2448, '2023-12-25 10:44:11', '2023-12-25 22:50:20'),
(32, 1, 2, 6387, '2023-12-26 00:27:54', '2023-12-26 21:14:55'),
(33, 1, 1, 8927, '2023-12-27 08:37:21', '2023-12-27 18:00:03'),
(34, 1, 1, 2946, '2023-12-28 11:55:41', '2023-12-28 14:57:17'),
(35, 1, 1, 206, '2023-12-29 14:34:31', '2023-12-29 14:35:26'),
(36, 1, 1, 176, '2024-01-02 22:35:15', '2024-01-02 22:35:36'),
(37, 2, 4, 3961, '2024-01-03 13:24:19', '2024-01-03 23:43:49'),
(38, 2, 2, 259, '2024-01-04 13:51:12', '2024-01-04 21:54:42'),
(39, 1, 1, 138, '2024-01-05 00:09:07', '2024-01-05 14:42:18'),
(40, 1, 1, 78, '2024-01-06 22:10:04', '2024-01-06 23:03:05'),
(41, 1, 1, 186, '2024-01-07 08:02:50', '2024-01-07 23:58:54'),
(42, 1, 2, 250, '2024-01-08 00:00:36', '2024-01-08 10:27:54'),
(43, 1, 1, 61, '2024-01-09 06:45:14', '2024-01-09 20:27:03'),
(44, 1, 2, 102, '2024-01-11 08:45:48', '2024-01-11 21:18:50'),
(45, 1, 2, 80, '2024-01-12 11:46:16', '2024-01-12 15:42:32'),
(46, 1, 1, 17, '2024-01-13 18:31:42', '2024-01-13 18:44:12'),
(47, 1, 2, 123, '2024-01-14 06:15:26', '2024-01-14 23:01:48'),
(48, 1, 3, 73, '2024-01-16 11:48:46', '2024-01-16 21:20:04'),
(49, 1, 1, 5, '2024-01-17 23:56:44', '2024-01-17 23:56:45'),
(50, 1, 1, 16, '2024-01-28 16:10:32', '2024-01-28 16:12:55'),
(51, 1, 1, 12, '2024-02-07 19:05:41', '2024-02-07 19:06:37'),
(52, 1, 1, 17, '2024-02-29 16:51:30', '2024-02-29 17:04:31'),
(53, 1, 1, 5, '2024-03-04 10:34:36', '2024-03-04 10:34:37'),
(54, 1, 1, 17, '2024-03-05 09:20:32', '2024-03-05 11:47:01'),
(55, 1, 1, 10, '2024-04-15 14:18:13', '2024-04-15 14:18:23'),
(56, 1, 2, 5855, '2024-04-21 09:51:21', '2024-04-21 18:20:13'),
(57, 1, 2, 415, '2024-04-23 11:15:06', '2024-04-23 19:40:44'),
(58, 1, 1, 435, '2024-04-30 20:20:05', '2024-04-30 23:58:57'),
(59, 1, 1, 428, '2024-05-01 00:02:18', '2024-05-01 00:50:28'),
(60, 1, 1, 804, '2024-05-02 15:08:31', '2024-05-02 21:13:14'),
(61, 1, 2, 614, '2024-05-03 08:29:44', '2024-05-03 10:17:27'),
(62, 1, 1, 22, '2024-05-06 21:21:33', '2024-05-06 21:22:26'),
(63, 1, 1, 36, '2024-05-08 19:28:08', '2024-05-08 19:28:46'),
(64, 1, 1, 24, '2024-05-14 21:41:20', '2024-05-14 21:42:10'),
(65, 1, 1, 143, '2024-05-29 18:59:51', '2024-05-29 19:26:35'),
(66, 6, 7, 1090, '2024-06-03 00:14:14', '2024-06-03 18:05:17'),
(67, 11, 20, 529, '2024-06-04 12:00:15', '2024-06-04 22:58:24'),
(68, 1, 1, 1, '2024-06-05 19:22:24', '2024-06-05 19:22:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `report_online`
--

CREATE TABLE `report_online` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` int(11) UNSIGNED DEFAULT NULL,
  `ip` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `agent` varchar(255) NOT NULL DEFAULT '',
  `pages` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `report_online`
--

INSERT INTO `report_online` (`id`, `user`, `ip`, `url`, `agent`, `pages`, `created_at`, `updated_at`) VALUES
(228, NULL, '45.163.187.60', '/entrar', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Mobile Safari/537.36', 1, '2024-06-05 19:22:24', '2024-06-05 19:22:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `level` int(11) NOT NULL DEFAULT 1,
  `code` varchar(255) DEFAULT NULL,
  `forget` varchar(255) DEFAULT NULL,
  `genre` varchar(10) DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `document` varchar(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'registered' COMMENT 'registered, confirmed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `level`, `code`, `forget`, `genre`, `datebirth`, `document`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(133, 'Fernando', 'Issler', 'fernandoissler@hotmail.com', '$2y$10$f57JzKy8NFyQd53XKLoM1.7nag4OdtdcjnaHsDUakd/e4C9.d8nHC', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-01-03 16:41:50', '2024-01-03 16:43:04'),
(134, 'Fernando', 'Issler', 'fernandoissler@gmail.com', '$2y$10$K6IIg2fKiOyUFIGIsTiMLuGz04qmLukMJ/xhi.o3wHqGcRJamraw.', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-06-03 17:39:39', '2024-06-03 17:40:00'),
(135, 'Victor ', 'Lacerda', 'redekarma@gmail.com', '$2y$10$Qr0eDEClIG0p/nMyNwnPY.PDkhdqyMjCwh06umnoF0cWKy.3y6Cl.', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-06-03 17:48:51', '2024-06-04 12:34:02'),
(136, 'Lucas', 'Wesley', 'luwesleycas@gmail.om', '$2y$10$HKc.8/DUVcwB/W6580oxmu/QjZeCx.9QOhL2UvnxISR5L5ATWXr9G', 1, '4427', NULL, NULL, NULL, NULL, NULL, 'registered', '2024-06-04 18:06:20', '2024-06-04 18:06:20'),
(137, 'Lucas', 'Wesley', 'luwesleycas@gmail.com', '$2y$10$WjhEk8g9JgZ9a7IAgb.0m.difgihyeU/9uelxBeCTo/dDMxZ00sJq', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-06-04 18:10:48', '2024-06-04 18:11:58'),
(138, 'Henry', 'Puca', 'puca.puca.henry@gmail.com', '$2y$10$IgaGIXbPwGCPVJVV1f1wpuvpUmBfw/dXsqEBk3fpCzMklDDqE3Bwy', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-06-04 21:25:25', '2024-06-04 21:26:24');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addr_user` (`user_id`);

--
-- Índices de tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Índices de tabela `report_access`
--
ALTER TABLE `report_access`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `report_online`
--
ALTER TABLE `report_online`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `users` ADD FULLTEXT KEY `full_text` (`first_name`,`last_name`,`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `report_access`
--
ALTER TABLE `report_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `report_online`
--
ALTER TABLE `report_online`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
