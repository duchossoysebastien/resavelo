DROP DATABASE IF EXISTS `resavelo`;
CREATE DATABASE IF NOT EXISTS `resavelo`;
USE `resavelo`;

DROP TABLE IF EXISTS `velos`;
CREATE TABLE `velos` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `quantity` INT NOT NULL,
  `description` TEXT,
  `image_url` VARCHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `velo_id` INT NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `total_price` DECIMAL(10,2) NOT NULL,
  `status` ENUM('en_attente', 'validée', 'refusée', 'annulée') DEFAULT 'en_attente',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`velo_id`) REFERENCES `velos`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;