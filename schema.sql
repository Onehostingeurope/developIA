-- DevelopIA MySQL Database Schema
-- Compatible with MySQL 5.7+ / 8.0+ / MariaDB

CREATE DATABASE IF NOT EXISTS `developia_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `developia_db`;

-- Inquiries / Contact Form Submissions
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(191) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `project_type` VARCHAR(100) NOT NULL,
  `message` TEXT NOT NULL,
  `ip_address` VARCHAR(45) DEFAULT NULL,
  `user_agent` VARCHAR(255) DEFAULT NULL,
  `status` ENUM('new', 'read', 'archived') DEFAULT 'new',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status`),
  INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Admin Users Table
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default admin user if not exists (username: admin, password: DevelopIA2026!)
INSERT INTO `admin_users` (`username`, `password_hash`, `email`)
SELECT 'admin', '$2y$10$e8wEHQc76p.4jTfEFA.u8.H1ZqS0cZ8hK2N/7WqW8P0v2o7k0G7', 'contact@developia.org'
WHERE NOT EXISTS (SELECT 1 FROM `admin_users` WHERE `username` = 'admin');
