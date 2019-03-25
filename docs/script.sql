-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema store
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema store
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `store` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`waiters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`waiters` (
  `id_waiter` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `user` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id_waiter`),
  UNIQUE INDEX `id_waiter_UNIQUE` (`id_waiter` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tables`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tables` (
  `id_table` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` TINYINT NOT NULL,
  PRIMARY KEY (`id_table`),
  UNIQUE INDEX `id_table_UNIQUE` (`id_table` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`requests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`requests` (
  `id_request` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `time_date` DATETIME NOT NULL,
  `value` FLOAT(4,2) NOT NULL,
  `status` TINYINT NOT NULL,
  `waiters_id_waiter` INT UNSIGNED NOT NULL,
  `tables_id_table` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_request`, `waiters_id_waiter`, `tables_id_table`),
  UNIQUE INDEX `id_request_UNIQUE` (`id_request` ASC),
  INDEX `fk_requests_waiters1_idx` (`waiters_id_waiter` ASC),
  INDEX `fk_requests_tables1_idx` (`tables_id_table` ASC),
  CONSTRAINT `fk_requests_waiters1`
    FOREIGN KEY (`waiters_id_waiter`)
    REFERENCES `mydb`.`waiters` (`id_waiter`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requests_tables1`
    FOREIGN KEY (`tables_id_table`)
    REFERENCES `mydb`.`tables` (`id_table`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `price` FLOAT(4,2) NOT NULL,
  `stock` INT NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `img` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`orders` (
  `id_order` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(30) NOT NULL,
  `price` FLOAT(4,2) UNSIGNED NOT NULL,
  `status` TINYINT NOT NULL,
  `quantities` VARCHAR(45) NOT NULL,
  `requests_id_request` INT UNSIGNED NOT NULL,
  `products_id` INT NOT NULL,
  PRIMARY KEY (`id_order`, `requests_id_request`, `products_id`),
  UNIQUE INDEX `id_type_UNIQUE` (`id_order` ASC),
  INDEX `fk_orders_requests_idx` (`requests_id_request` ASC),
  INDEX `fk_orders_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_orders_requests`
    FOREIGN KEY (`requests_id_request`)
    REFERENCES `mydb`.`requests` (`id_request`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `mydb`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cashier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cashier` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `user` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`kitchen_orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`kitchen_orders` (
  `orders_id_order` INT UNSIGNED NOT NULL,
  `orders_requests_id_request` INT UNSIGNED NOT NULL,
  `orders_products_id` INT NOT NULL,
  INDEX `fk_kitchen_orders_orders1_idx` (`orders_id_order` ASC, `orders_requests_id_request` ASC, `orders_products_id` ASC),
  PRIMARY KEY (`orders_id_order`, `orders_requests_id_request`, `orders_products_id`),
  CONSTRAINT `fk_kitchen_orders_orders1`
    FOREIGN KEY (`orders_id_order` , `orders_requests_id_request` , `orders_products_id`)
    REFERENCES `mydb`.`orders` (`id_order` , `requests_id_request` , `products_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cashier_request`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cashier_request` (
  `cashier_id` INT NOT NULL,
  `requests_id_request` INT UNSIGNED NOT NULL,
  `requests_waiters_id_waiter` INT UNSIGNED NOT NULL,
  `requests_tables_id_table` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cashier_id`, `requests_id_request`, `requests_waiters_id_waiter`, `requests_tables_id_table`),
  INDEX `fk_cashier_request_requests1_idx` (`requests_id_request` ASC, `requests_waiters_id_waiter` ASC, `requests_tables_id_table` ASC),
  CONSTRAINT `fk_cashier_request_cashier1`
    FOREIGN KEY (`cashier_id`)
    REFERENCES `mydb`.`cashier` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cashier_request_requests1`
    FOREIGN KEY (`requests_id_request` , `requests_waiters_id_waiter` , `requests_tables_id_table`)
    REFERENCES `mydb`.`requests` (`id_request` , `waiters_id_waiter` , `tables_id_table`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `store` ;

-- -----------------------------------------------------
-- Table `store`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store`.`clients` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cpf` CHAR(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `gender` ENUM('M', 'F', 'O') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 101
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `store`.`adresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store`.`adresses` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `street` VARCHAR(100) NOT NULL,
  `neighborhood` VARCHAR(100) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `state` VARCHAR(60) NOT NULL,
  `client_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_adresses_clients1_idx` (`client_id` ASC),
  CONSTRAINT `fk_adresses_clients1`
    FOREIGN KEY (`client_id`)
    REFERENCES `store`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 101
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `store`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store`.`products` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `price` FLOAT(7,2) UNSIGNED NOT NULL,
  `inventory` INT(10) UNSIGNED NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 101
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `store`.`client_buy_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store`.`client_buy_product` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `quantity` INT(10) UNSIGNED NOT NULL,
  `total` FLOAT(10,2) UNSIGNED NOT NULL,
  `client_id` INT(10) UNSIGNED NOT NULL,
  `product_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `client_id`, `product_id`),
  INDEX `fk_clients_has_products_products1_idx` (`product_id` ASC),
  INDEX `fk_clients_has_products_clients1_idx` (`client_id` ASC),
  CONSTRAINT `fk_clients_has_products_clients1`
    FOREIGN KEY (`client_id`)
    REFERENCES `store`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clients_has_products_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `store`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 101
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `store`.`phones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store`.`phones` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` CHAR(11) NOT NULL,
  `client_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_phones_clients_idx` (`client_id` ASC),
  CONSTRAINT `fk_phones_clients`
    FOREIGN KEY (`client_id`)
    REFERENCES `store`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 101
DEFAULT CHARACTER SET = utf8;

USE `mydb` ;

-- -----------------------------------------------------
-- Placeholder table for view `mydb`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`view1` (`id` INT);

-- -----------------------------------------------------
--  routine1
-- -----------------------------------------------------

DELIMITER $$
USE `mydb`$$
$$

DELIMITER ;

-- -----------------------------------------------------
--  routine2
-- -----------------------------------------------------

DELIMITER $$
USE `mydb`$$
$$

DELIMITER ;

-- -----------------------------------------------------
-- View `mydb`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`view1`;
USE `mydb`;

USE `store`;

DELIMITER $$
USE `store`$$
CREATE
DEFINER=`carlos`@`localhost`
TRIGGER `store`.`deletecliente`
BEFORE DELETE ON `store`.`clients`
FOR EACH ROW
DELETE FROM phones WHERE client_id = old.id$$

USE `store`$$
CREATE
DEFINER=`carlos`@`localhost`
TRIGGER `store`.`inventory`
AFTER INSERT ON `store`.`client_buy_product`
FOR EACH ROW
UPDATE products SET inventory = inventory - new.quantity WHERE id = new.product_id$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
