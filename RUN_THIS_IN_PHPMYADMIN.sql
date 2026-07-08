-- ============================================================
--  CRM Missing Tables SQL Setup
--  Run this file in phpMyAdmin:
--    1. Open phpMyAdmin → select database "krayin_crm"
--    2. Click the "SQL" tab
--    3. Paste this entire file and click "Go"
-- ============================================================

-- 1. CUSTOMERS table
CREATE TABLE IF NOT EXISTS `customers` (
    `id`                INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `lead_id`           INT(10) UNSIGNED NULL DEFAULT NULL,
    `full_name`         VARCHAR(255) NOT NULL,
    `email`             VARCHAR(255) NULL DEFAULT NULL,
    `phone`             VARCHAR(30) NULL DEFAULT NULL,
    `company`           VARCHAR(255) NULL DEFAULT NULL,
    `address`           TEXT NULL DEFAULT NULL,
    `registration_type` VARCHAR(255) NOT NULL DEFAULT 'converted',
    `hire_date`         DATE NULL DEFAULT NULL,
    `created_by`        INT(10) UNSIGNED NULL DEFAULT NULL,
    `created_at`        TIMESTAMP NULL DEFAULT NULL,
    `updated_at`        TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `customers_lead_id_foreign` (`lead_id`),
    KEY `customers_created_by_foreign` (`created_by`),
    CONSTRAINT `customers_lead_id_foreign`
        FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE SET NULL,
    CONSTRAINT `customers_created_by_foreign`
        FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. FOLLOW_UPS table
CREATE TABLE IF NOT EXISTS `follow_ups` (
    `id`                   INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `lead_id`              INT(10) UNSIGNED NULL DEFAULT NULL,
    `user_id`              INT(10) UNSIGNED NULL DEFAULT NULL,
    `follow_up_date`       DATETIME NOT NULL,
    `follow_up_type`       VARCHAR(255) NOT NULL DEFAULT 'call',
    `notes`                TEXT NULL DEFAULT NULL,
    `next_follow_up_date`  DATETIME NULL DEFAULT NULL,
    `status`               ENUM('pending','completed','cancelled','rescheduled') NOT NULL DEFAULT 'pending',
    `created_at`           TIMESTAMP NULL DEFAULT NULL,
    `updated_at`           TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `follow_ups_lead_id_foreign` (`lead_id`),
    KEY `follow_ups_user_id_foreign` (`user_id`),
    CONSTRAINT `follow_ups_lead_id_foreign`
        FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE,
    CONSTRAINT `follow_ups_user_id_foreign`
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. SALES_REPORTS table
CREATE TABLE IF NOT EXISTS `sales_reports` (
    `id`                   INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id`              INT(10) UNSIGNED NULL DEFAULT NULL,
    `total_leads`          INT(10) UNSIGNED NOT NULL DEFAULT 0,
    `converted_customers`  INT(10) UNSIGNED NOT NULL DEFAULT 0,
    `revenue_generated`    DECIMAL(14,2) NOT NULL DEFAULT 0.00,
    `report_month`         VARCHAR(7) NOT NULL,
    `generated_date`       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `created_at`           TIMESTAMP NULL DEFAULT NULL,
    `updated_at`           TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `sales_reports_user_id_foreign` (`user_id`),
    CONSTRAINT `sales_reports_user_id_foreign`
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. ACTIVITY_LOGS table
CREATE TABLE IF NOT EXISTS `activity_logs` (
    `id`             INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id`        INT(10) UNSIGNED NULL DEFAULT NULL,
    `activity_type`  VARCHAR(255) NOT NULL,
    `description`    TEXT NULL DEFAULT NULL,
    `activity_date`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `ip_address`     VARCHAR(45) NULL DEFAULT NULL,
    `created_at`     TIMESTAMP NULL DEFAULT NULL,
    `updated_at`     TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `activity_logs_user_id_foreign` (`user_id`),
    CONSTRAINT `activity_logs_user_id_foreign`
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Mark migrations as run so artisan doesn't try to re-run them
INSERT IGNORE INTO `migrations` (`migration`, `batch`)
VALUES
    ('2026_07_04_100001_create_customers_table',     99),
    ('2026_07_04_100002_create_follow_ups_table',    99),
    ('2026_07_04_100003_create_sales_reports_table', 99),
    ('2026_07_04_100004_create_activity_logs_table', 99);

-- Done! All 4 tables are now ready.
