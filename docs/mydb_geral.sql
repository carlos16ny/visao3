
DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (0,'Carlos Henrique','68e036f1f72b241fa7c89140b8d13691','carlos');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;





DROP TABLE IF EXISTS `cashier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cashier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cashier`
--

LOCK TABLES `cashier` WRITE;
/*!40000 ALTER TABLE `cashier` DISABLE KEYS */;
INSERT INTO `cashier` VALUES (3,'Eduarda Souza','202cb962ac59075b964b07152d234b70','eduarda'),(4,'George Oliveira','202cb962ac59075b964b07152d234b70','george'),(5,'Beatriz Pereira','202cb962ac59075b964b07152d234b70','beatriz');
/*!40000 ALTER TABLE `cashier` ENABLE KEYS */;
UNLOCK TABLES;








DROP TABLE IF EXISTS `cooker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cooker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cooker`
--

LOCK TABLES `cooker` WRITE;
/*!40000 ALTER TABLE `cooker` DISABLE KEYS */;
INSERT INTO `cooker` VALUES (1,'Amanda Felicio','202cb962ac59075b964b07152d234b70','amanda');
/*!40000 ALTER TABLE `cooker` ENABLE KEYS */;
UNLOCK TABLES;






DROP TABLE IF EXISTS `waiters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waiters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_waiter_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `waiters`
--

LOCK TABLES `waiters` WRITE;
/*!40000 ALTER TABLE `waiters` DISABLE KEYS */;
INSERT INTO `waiters` VALUES (2,'Raquel Martins','202cb962ac59075b964b07152d234b70','raquel'),(3,'Carlos Henrique','202cb962ac59075b964b07152d234b70','carlos'),(4,'Estevão Moura','202cb962ac59075b964b07152d234b70','estevao'),(5,'Livany Nunes','202cb962ac59075b964b07152d234b70','livany'),(6,'Anna Thereza','202cb962ac59075b964b07152d234b70','anna'),(7,'Paulo Batista','202cb962ac59075b964b07152d234b70','paulo'),(8,'Marcelo Cardoso','202cb962ac59075b964b07152d234b70','marcelo'),(9,'Yasmin Cardoso','202cb962ac59075b964b07152d234b70','yasmin');
/*!40000 ALTER TABLE `waiters` ENABLE KEYS */;
UNLOCK TABLES;





DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tables` (
  `id_table` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_table`),
  UNIQUE KEY `id_table_UNIQUE` (`id_table`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` VALUES (1,0),(2,0),(3,0),(4,0),(5,0),(6,0),(7,0),(8,0),(9,0),(10,0),(11,0),(12,0),(13,0),(14,0),(15,0),(16,0),(17,0),(18,0),(19,0),(20,0),(21,0),(22,0),(23,0),(24,0);
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;




DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,45.9,'mussarela','../assets/imgs/pizzas/mussarela.png','pizzas'),(2,45.9,'marguerita','../assets/imgs/pizzas/marguerita.png','pizzas'),(3,47.9,'bacon','../assets/imgs/pizzas/bacon.png','pizzas'),(4,47.9,'portuguesa','../assets/imgs/pizzas/portuguesa.png','pizzas'),(5,45.9,'frango','../assets/imgs/pizzas/frango.png','pizzas'),(6,47.9,'calabresa','../assets/imgs/pizzas/calabresa.png','pizzas'),(7,19.9,'aperol_Spritz','../assets/imgs/bebidas/aperol.png','bebidas'),(8,15.9,'caipirinha','../assets/imgs/bebidas/caipirinha.png','bebidas'),(9,16.9,'sex on the beach','../assets/imgs/bebidas/sexonthebeach.png','bebidas'),(10,18.9,'marguarita','../assets/imgs/bebidas/margarita.png','bebidas'),(11,5,'coca','../assets/imgs/refrigerantes/latas/coca.jpg','refrigerantes'),(12,5,'fanta laranja','../assets/imgs/refrigerantes/latas/fantalaranja.jpg','refrigerantes'),(13,5,'fanta uva','../assets/imgs/refrigerantes/latas/fantauva.jpg','refrigerantes'),(14,5,'guarana','../assets/imgs/refrigerantes/latas/guarana.jpg','refrigerantes'),(15,7,'laranja','../assets/imgs/sucos/laranja.jpg','sucos'),(16,7,'limonada','../assets/imgs/sucos/limonada.jpg','sucos'),(17,4,'goiaba','../assets/imgs/sucos/goiaba.jpg','sucos'),(18,4,'uva','../assets/imgs/sucos/uva.jpg','sucos'),(19,8,'abacaxi','../assets/imgs/sucos/abacaxi-hortela.jpg','sucos'),(20,3,'cheddar','../assets/imgs/acrescimos/cheddar.jpg','acrescimos'),(21,3,'catupiry','../assets/imgs/acrescimos/catupiry.jpg','acrescimos'),(22,5.5,'borda cheddar','../assets/imgs/acrescimos/borda.jpg','acrescimos'),(23,6,'borda catupiry','../assets/imgs/acrescimos/borda.jpg','acrescimos'),(24,11.9,'coca','../assets/imgs/refrigerantes/pet/coca.jpg','refrigerantes'),(25,11.5,'pepsi','../assets/imgs/refrigerantes/pet/pepsi.jpg','refrigerantes'),(26,11.5,'guarana','../assets/imgs/refrigerantes/pet/guarana.jpg','refrigerantes'),(27,5,'pepsi','../assets/imgs/refrigerantes/latas/pepsi.jpg','refrigerantes');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;





DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `id_request` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `value` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `waiters_id` int(10) unsigned NOT NULL,
  `tables_id_table` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_request`,`waiters_id`,`tables_id_table`),
  UNIQUE KEY `id_request_UNIQUE` (`id_request`),
  KEY `fk_requests_waiters1_idx` (`waiters_id`),
  KEY `fk_requests_tables1_idx` (`tables_id_table`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;





DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id_order` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(30) NOT NULL,
  `price` float unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `quantities` varchar(45) NOT NULL,
  `observation` varchar(45) DEFAULT NULL,
  `size` varchar(4) DEFAULT NULL,
  `requests_id_request` int(10) unsigned NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id_order`,`requests_id_request`,`products_id`),
  UNIQUE KEY `id_type_UNIQUE` (`id_order`),
  KEY `fk_orders_requests_idx` (`requests_id_request`),
  KEY `fk_orders_products1_idx` (`products_id`),
  CONSTRAINT `fk_orders_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_requests` FOREIGN KEY (`requests_id_request`) REFERENCES `requests` (`id_request`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;





DROP TABLE IF EXISTS `cashier_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cashier_request` (
  `cashier_id` int(11) NOT NULL,
  `requests_id_request` int(10) unsigned NOT NULL,
  `requests_waiters_id_waiter` int(10) unsigned NOT NULL,
  `requests_tables_id_table` int(10) unsigned NOT NULL,
  `waiter_tips` float NOT NULL,
  `date` datetime NOT NULL,
  `value_total` float NOT NULL,
  PRIMARY KEY (`cashier_id`,`requests_id_request`,`requests_waiters_id_waiter`,`requests_tables_id_table`),
  KEY `fk_cashier_request_requests1_idx` (`requests_id_request`,`requests_waiters_id_waiter`,`requests_tables_id_table`),
  CONSTRAINT `fk_cashier_request_cashier1` FOREIGN KEY (`cashier_id`) REFERENCES `cashier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cashier_request_requests1` FOREIGN KEY (`requests_id_request`, `requests_waiters_id_waiter`, `requests_tables_id_table`) REFERENCES `requests` (`id_request`, `waiters_id`, `tables_id_table`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cashier_request`
--

LOCK TABLES `cashier_request` WRITE;
/*!40000 ALTER TABLE `cashier_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `cashier_request` ENABLE KEYS */;
UNLOCK TABLES;

