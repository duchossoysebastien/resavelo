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

INSERT INTO velos (name, price, quantity, description, image_url) VALUES
('Vélo de ville classique', 12.00, 10, 'Vélo confortable pour les déplacements urbains quotidiens', 'velo_ville.jpg'),
('Vélo électrique urbain', 25.00, 5, 'Vélo électrique avec assistance, idéal pour longues distances', 'velo_electrique.jpg'),
('Vélo pliant compact', 15.00, 7, 'Vélo pliant facile à transporter et à ranger', 'velo_pliant.jpg'),
('VTT urbain', 18.00, 6, 'Vélo tout terrain adapté à la ville et chemins mixtes', 'vtt_urbain.jpg'),
('Vélo enfant', 8.00, 12, 'Vélo sécurisé pour enfants de 6 à 10 ans', 'velo_enfant.jpg'),
('Vélo cargo', 30.00, 3, 'Vélo cargo pour transport de charges ou enfants', 'velo_cargo.jpg'),
('Vélo hollandais', 14.00, 8, 'Vélo confortable à position droite', 'velo_hollandais.jpg'),
('Vélo gravel', 20.00, 4, 'Vélo polyvalent route et chemins', 'velo_gravel.jpg'),
('Vélo de course', 22.00, 5, 'Vélo léger et rapide pour trajets sportifs', 'velo_course.jpg'),
('Tandem urbain', 28.00, 2, 'Vélo tandem pour balades à deux', 'velo_tandem.jpg');


INSERT INTO reservations (velo_id, start_date, end_date, total_price, status) VALUES
(1, '2026-01-05', '2026-01-07', 36.00, 'validée'),
(2, '2026-01-10', '2026-01-12', 75.00, 'en_attente'),
(3, '2026-01-03', '2026-01-04', 30.00, 'validée'),
(4, '2026-01-01', '2026-01-02', 36.00, 'annulée'),
(5, '2025-12-20', '2025-12-22', 24.00, 'refusée'),
(6, '2026-01-08', '2026-01-09', 60.00, 'validée'),
(7, '2026-01-11', '2026-01-13', 42.00, 'validée'),
(8, '2026-01-06', '2026-01-08', 60.00, 'en_attente'),
(9, '2026-01-04', '2026-01-05', 44.00, 'validée'),
(10,'2026-01-09', '2026-01-10', 56.00, 'annulée');
