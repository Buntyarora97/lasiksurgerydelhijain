-- lasiksurgeryindelhi.com — MySQL 8 / MariaDB schema
-- Import via phpMyAdmin or: mysql -u USER -p DBNAME < schema.sql
SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS settings (
  `key` VARCHAR(100) PRIMARY KEY,
  `value` TEXT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS admins (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('super_admin','content_editor','medical_reviewer','enquiry_manager') NOT NULL DEFAULT 'enquiry_manager',
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  last_login DATETIME NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS appointments (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  ref_code VARCHAR(20) NOT NULL UNIQUE,
  name VARCHAR(120) NOT NULL,
  age_range VARCHAR(30) NULL,
  phone VARCHAR(30) NOT NULL,
  email VARCHAR(190) NULL,
  city VARCHAR(100) NULL,
  vision_correction VARCHAR(60) NULL,
  power_range VARCHAR(60) NULL,
  preferred_contact ENUM('phone','whatsapp','email') NOT NULL DEFAULT 'phone',
  preferred_slot VARCHAR(120) NULL,
  message TEXT NULL,
  consent_privacy TINYINT(1) NOT NULL DEFAULT 0,
  consent_non_emergency TINYINT(1) NOT NULL DEFAULT 0,
  consent_version VARCHAR(20) NOT NULL DEFAULT 'v1.0',
  source_url VARCHAR(255) NULL,
  status ENUM('new','contacted','scheduled','completed','cancelled','spam') NOT NULL DEFAULT 'new',
  assigned_to INT UNSIGNED NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_status (status), INDEX idx_created (created_at)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS enquiry_notes (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  appointment_id INT UNSIGNED NOT NULL,
  admin_id INT UNSIGNED NULL,
  note TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (appointment_id) REFERENCES appointments(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS procedures (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(120) NOT NULL UNIQUE,
  name VARCHAR(160) NOT NULL,
  category ENUM('laser_flap','laser_flapless','surface','lens_based','evaluation') NOT NULL,
  summary VARCHAR(255) NULL,
  description MEDIUMTEXT NULL,
  status ENUM('verified_offered','education_only','not_offered','draft') NOT NULL DEFAULT 'draft',
  reading_time VARCHAR(20) NULL,
  image VARCHAR(255) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS faqs (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  page_key VARCHAR(100) NOT NULL DEFAULT 'general',
  question VARCHAR(255) NOT NULL,
  answer TEXT NOT NULL,
  sort_order INT NOT NULL DEFAULT 0,
  is_published TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS articles (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(160) NOT NULL UNIQUE,
  title VARCHAR(255) NOT NULL,
  excerpt VARCHAR(500) NULL,
  body MEDIUMTEXT NULL,
  category_id INT UNSIGNED NULL,
  status ENUM('draft','in_review','published') NOT NULL DEFAULT 'draft',
  reviewer_id INT UNSIGNED NULL,
  reviewed_at DATETIME NULL,
  next_review_at DATETIME NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS categories (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL, slug VARCHAR(120) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS media (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  alt VARCHAR(255) NULL, caption VARCHAR(255) NULL,
  source VARCHAR(120) NULL, consent_status ENUM('approved','pending','n_a') NOT NULL DEFAULT 'pending',
  is_real TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS doctors (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  role VARCHAR(255) NULL,
  bio TEXT NULL,
  photo VARCHAR(255) NULL,
  is_public TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS testimonials (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(160) NULL, body TEXT NULL,
  type ENUM('verified_story','educational_composite') NOT NULL DEFAULT 'educational_composite',
  consent_status ENUM('signed','pending','n_a') NOT NULL DEFAULT 'pending',
  is_published TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS medical_reviews (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  page_key VARCHAR(100) NOT NULL,
  reviewer_name VARCHAR(120) NOT NULL,
  reviewer_title VARCHAR(190) NULL,
  review_date DATE NOT NULL,
  next_review_date DATE NULL,
  notes VARCHAR(500) NULL,
  UNIQUE KEY uq_page (page_key)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS seo_meta (
  page_key VARCHAR(100) PRIMARY KEY,
  title VARCHAR(255) NULL,
  meta_description VARCHAR(500) NULL,
  canonical VARCHAR(255) NULL,
  og_image VARCHAR(255) NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS redirects (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  from_path VARCHAR(255) NOT NULL,
  to_path VARCHAR(255) NOT NULL,
  status_code SMALLINT NOT NULL DEFAULT 301
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS form_rate_limits (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  bucket VARCHAR(60) NOT NULL,
  ip VARCHAR(45) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_bucket (bucket, ip, created_at)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS audit_logs (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  admin_id INT UNSIGNED NULL,
  action VARCHAR(120) NOT NULL,
  meta JSON NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Default admin (CHANGE PASSWORD IMMEDIATELY): admin@lasiksurgeryindelhi.com / Admin@12345
INSERT INTO admins (name, email, password_hash, role) VALUES
('Super Admin', 'admin@lasiksurgeryindelhi.com', '$2y$10$W0u0u0u0u0u0u0u0u0u0uO0u0u0u0u0u0u0u0u0u0u0u0u0u0u0u', 'super_admin')
ON DUPLICATE KEY UPDATE email=email;

INSERT INTO settings (`key`,`value`) VALUES
('site_env','staging'),('noindex','1'),
('phone_display', '+0412 500 063'),('phone_link','tel:+0412500063'),
('email_main','info@jaineyehospitals.com'),
('whatsapp_number',''),('address','AG 152, Shalimar Bagh, Delhi 110088')
ON DUPLICATE KEY UPDATE `key`=`key`;
