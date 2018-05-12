-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Maio-2018 às 23:18
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cashier`
--

DROP TABLE IF EXISTS `cashier`;
CREATE TABLE IF NOT EXISTS `cashier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cashier`
--

INSERT INTO `cashier` (`id`, `name`, `password`, `user`) VALUES
(3, 'Eduarda Souza', '123', 'eduarda'),
(4, 'George Oliveira', '123', 'george'),
(5, 'Beatriz Pereira', '123', 'beatriz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cashier_request`
--

DROP TABLE IF EXISTS `cashier_request`;
CREATE TABLE IF NOT EXISTS `cashier_request` (
  `cashier_id` int(11) NOT NULL,
  `requests_id_request` int(10) UNSIGNED NOT NULL,
  `requests_waiters_id_waiter` int(10) UNSIGNED NOT NULL,
  `requests_tables_id_table` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`cashier_id`,`requests_id_request`,`requests_waiters_id_waiter`,`requests_tables_id_table`),
  KEY `fk_cashier_request_requests1_idx` (`requests_id_request`,`requests_waiters_id_waiter`,`requests_tables_id_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `kitchen_orders`
--

DROP TABLE IF EXISTS `kitchen_orders`;
CREATE TABLE IF NOT EXISTS `kitchen_orders` (
  `orders_id_order` int(10) UNSIGNED NOT NULL,
  `orders_requests_id_request` int(10) UNSIGNED NOT NULL,
  `orders_products_id` int(11) NOT NULL,
  PRIMARY KEY (`orders_id_order`,`orders_requests_id_request`,`orders_products_id`),
  KEY `fk_kitchen_orders_orders1_idx` (`orders_id_order`,`orders_requests_id_request`,`orders_products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(30) NOT NULL,
  `price` float(4,2) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `requests_id_request` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id_order`,`requests_id_request`,`products_id`),
  UNIQUE KEY `id_type_UNIQUE` (`id_order`),
  KEY `fk_orders_requests_idx` (`requests_id_request`),
  KEY `fk_orders_products1_idx` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` float(4,2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `price`, `name`, `img`) VALUES
(1, 45.90, 'mussarela', ''),
(2, 45.90, 'marguerita', ''),
(3, 47.90, 'bacon', ''),
(4, 47.90, 'portuguesa', ''),
(5, 45.90, 'frango', ''),
(6, 47.90, 'calabresa', ''),
(7, 19.90, 'aperol_Spritz', ''),
(8, 15.90, 'caipirinha', ''),
(9, 16.90, 'sex_beach', ''),
(10, 18.90, 'marguerita', ''),
(11, 11.50, 'coca', ''),
(12, 11.00, 'fanta_laranja', ''),
(13, 11.00, 'fanta_uva', ''),
(14, 10.00, 'guarana', ''),
(15, 7.00, 'laranja', ''),
(16, 7.00, 'limonada', ''),
(17, 4.00, 'goiaba', ''),
(18, 4.00, 'uva', ''),
(19, 8.00, 'abacaxi', ''),
(20, 3.00, 'cheddar', ''),
(21, 3.00, 'catupiry', ''),
(22, 5.50, 'borda_cheddar', ''),
(23, 6.00, 'borda_catupiry', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id_request` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `time_date` datetime NOT NULL,
  `value` float(4,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `waiters_id_waiter` int(10) UNSIGNED NOT NULL,
  `tables_id_table` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_request`,`waiters_id_waiter`,`tables_id_table`),
  UNIQUE KEY `id_request_UNIQUE` (`id_request`),
  KEY `fk_requests_waiters1_idx` (`waiters_id_waiter`),
  KEY `fk_requests_tables1_idx` (`tables_id_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id_table` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_table`),
  UNIQUE KEY `id_table_UNIQUE` (`id_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `waiters`
--

DROP TABLE IF EXISTS `waiters`;
CREATE TABLE IF NOT EXISTS `waiters` (
  `id_waiter` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id_waiter`),
  UNIQUE KEY `id_waiter_UNIQUE` (`id_waiter`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `waiters`
--

INSERT INTO `waiters` (`id_waiter`, `name`, `password`, `user`) VALUES
(1, 'Raquel Martins', '123', 'raquel'),
(2, 'Carlos Henrique', '123', 'carlos'),
(3, 'Estevão Moura', '123', 'estevao'),
(4, 'Livany Nunes', '123', 'livany'),
(5, 'Anna Thereza', '123', 'anna'),
(6, 'Paulo Batista', '123', 'paulo'),
(7, 'Marcelo Cardoso', '123', 'marcelo'),
(8, 'Yasmin Cardoso', '123', 'yasmin');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cashier_request`
--
ALTER TABLE `cashier_request`
  ADD CONSTRAINT `fk_cashier_request_cashier1` FOREIGN KEY (`cashier_id`) REFERENCES `cashier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cashier_request_requests1` FOREIGN KEY (`requests_id_request`,`requests_waiters_id_waiter`,`requests_tables_id_table`) REFERENCES `requests` (`id_request`, `waiters_id_waiter`, `tables_id_table`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `kitchen_orders`
--
ALTER TABLE `kitchen_orders`
  ADD CONSTRAINT `fk_kitchen_orders_orders1` FOREIGN KEY (`orders_id_order`,`orders_requests_id_request`,`orders_products_id`) REFERENCES `orders` (`id_order`, `requests_id_request`, `products_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_requests` FOREIGN KEY (`requests_id_request`) REFERENCES `requests` (`id_request`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_requests_tables1` FOREIGN KEY (`tables_id_table`) REFERENCES `tables` (`id_table`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requests_waiters1` FOREIGN KEY (`waiters_id_waiter`) REFERENCES `waiters` (`id_waiter`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
