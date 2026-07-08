<?php
/**
 * ============================================================
 *  CRM TABLE SETUP — Open this in your browser once:
 *  http://127.0.0.1:8000/setup-tables.php
 *  or
 *  http://localhost/Crm_modules/public/setup-tables.php
 *
 *  It will create all 4 missing tables automatically.
 *  DELETE this file after running it for security.
 * ============================================================
 */

// --- Read .env ---
function readEnv(string $key, string $default = ''): string {
    $envFile = __DIR__ . '/../.env';
    if (!file_exists($envFile)) return $default;
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), '#')) continue;
        if (str_contains($line, '=')) {
            [$k, $v] = explode('=', $line, 2);
            if (trim($k) === $key) return trim($v, " \t\n\r\0\x0B\"'");
        }
    }
    return $default;
}

$host   = readEnv('DB_HOST',     '127.0.0.1');
$port   = readEnv('DB_PORT',     '3306');
$dbname = readEnv('DB_DATABASE', 'krayin_crm');
$user   = readEnv('DB_USERNAME', 'root');
$pass   = readEnv('DB_PASSWORD', '');

$results = [];

try {
    $pdo = new PDO(
        "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $tables = [

        // 1. customers
        'customers' => "CREATE TABLE IF NOT EXISTS `customers` (
            `id`                INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `lead_id`           INT(10) UNSIGNED NULL DEFAULT NULL,
            `full_name`         VARCHAR(255) NOT NULL,
            `email`             VARCHAR(255) NULL DEFAULT NULL,
            `phone`             VARCHAR(30)  NULL DEFAULT NULL,
            `company`           VARCHAR(255) NULL DEFAULT NULL,
            `address`           TEXT NULL DEFAULT NULL,
            `registration_type` VARCHAR(255) NOT NULL DEFAULT 'converted',
            `hire_date`         DATE NULL DEFAULT NULL,
            `created_by`        INT(10) UNSIGNED NULL DEFAULT NULL,
            `created_at`        TIMESTAMP NULL DEFAULT NULL,
            `updated_at`        TIMESTAMP NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `cust_lead_fk`  (`lead_id`),
            KEY `cust_crby_fk`  (`created_by`),
            CONSTRAINT `cust_lead_fk`  FOREIGN KEY (`lead_id`)   REFERENCES `leads`(`id`) ON DELETE SET NULL,
            CONSTRAINT `cust_crby_fk`  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

        // 2. follow_ups
        'follow_ups' => "CREATE TABLE IF NOT EXISTS `follow_ups` (
            `id`                  INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `lead_id`             INT(10) UNSIGNED NULL DEFAULT NULL,
            `user_id`             INT(10) UNSIGNED NULL DEFAULT NULL,
            `follow_up_date`      DATETIME NOT NULL,
            `follow_up_type`      VARCHAR(255) NOT NULL DEFAULT 'call',
            `notes`               TEXT NULL DEFAULT NULL,
            `next_follow_up_date` DATETIME NULL DEFAULT NULL,
            `status`              ENUM('pending','completed','cancelled','rescheduled') NOT NULL DEFAULT 'pending',
            `created_at`          TIMESTAMP NULL DEFAULT NULL,
            `updated_at`          TIMESTAMP NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `fu_lead_fk` (`lead_id`),
            KEY `fu_user_fk` (`user_id`),
            CONSTRAINT `fu_lead_fk` FOREIGN KEY (`lead_id`) REFERENCES `leads`(`id`) ON DELETE CASCADE,
            CONSTRAINT `fu_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

        // 3. sales_reports
        'sales_reports' => "CREATE TABLE IF NOT EXISTS `sales_reports` (
            `id`                  INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `user_id`             INT(10) UNSIGNED NULL DEFAULT NULL,
            `total_leads`         INT(10) UNSIGNED NOT NULL DEFAULT 0,
            `converted_customers` INT(10) UNSIGNED NOT NULL DEFAULT 0,
            `revenue_generated`   DECIMAL(14,2) NOT NULL DEFAULT 0.00,
            `report_month`        VARCHAR(7) NOT NULL,
            `generated_date`      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `created_at`          TIMESTAMP NULL DEFAULT NULL,
            `updated_at`          TIMESTAMP NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `sr_user_fk` (`user_id`),
            CONSTRAINT `sr_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

        // 4. activity_logs
        'activity_logs' => "CREATE TABLE IF NOT EXISTS `activity_logs` (
            `id`            INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `user_id`       INT(10) UNSIGNED NULL DEFAULT NULL,
            `activity_type` VARCHAR(255) NOT NULL,
            `description`   TEXT NULL DEFAULT NULL,
            `activity_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `ip_address`    VARCHAR(45) NULL DEFAULT NULL,
            `created_at`    TIMESTAMP NULL DEFAULT NULL,
            `updated_at`    TIMESTAMP NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `al_user_fk` (`user_id`),
            CONSTRAINT `al_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
    ];

    foreach ($tables as $name => $sql) {
        try {
            $pdo->exec($sql);
            $results[$name] = ['ok' => true, 'msg' => 'Created / already exists ✅'];
        } catch (PDOException $e) {
            $results[$name] = ['ok' => false, 'msg' => 'ERROR: ' . $e->getMessage()];
        }
    }

    // Mark migrations as done so artisan doesn't re-run them
    $migrations = [
        '2026_07_04_100001_create_customers_table',
        '2026_07_04_100002_create_follow_ups_table',
        '2026_07_04_100003_create_sales_reports_table',
        '2026_07_04_100004_create_activity_logs_table',
    ];
    $maxBatch = (int) $pdo->query("SELECT COALESCE(MAX(batch),0) FROM migrations")->fetchColumn();
    $batch    = $maxBatch + 1;
    $stmt     = $pdo->prepare("INSERT IGNORE INTO `migrations` (`migration`,`batch`) VALUES (?,?)");
    foreach ($migrations as $m) { $stmt->execute([$m, $batch]); }

    $connected = true;

} catch (PDOException $e) {
    $connected = false;
    $connectError = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CRM Table Setup</title>
<style>
  body { font-family: Arial, sans-serif; background: #0d2440; color: #e7eefb; margin: 0; padding: 40px; }
  .box { max-width: 620px; margin: 0 auto; background: #14304f; border-radius: 12px; padding: 30px; border: 1px solid rgba(255,122,41,.4); }
  h1 { color: #ff7a29; margin-top: 0; font-size: 22px; }
  .row { display: flex; justify-content: space-between; align-items: center; padding: 10px 14px; border-radius: 8px; margin: 8px 0; font-size: 14px; }
  .ok  { background: rgba(46,160,67,.15); border: 1px solid rgba(46,160,67,.4); }
  .err { background: rgba(220,38,38,.15); border: 1px solid rgba(220,38,38,.4); }
  .err-box { background: rgba(220,38,38,.1); border: 1px solid rgba(220,38,38,.4); border-radius: 8px; padding: 14px; color: #ffb3b3; font-size: 13px; }
  .label { font-weight: 700; font-family: monospace; }
  .next { margin-top: 24px; background: rgba(27,152,224,.12); border: 1px solid rgba(27,152,224,.3); border-radius: 8px; padding: 16px; font-size: 13px; }
  a { color: #ff7a29; }
  .warn { background: rgba(255,200,0,.1); border: 1px solid rgba(255,200,0,.35); border-radius: 8px; padding: 12px 16px; font-size: 13px; margin-top: 16px; color: #ffe080; }
</style>
</head>
<body>
<div class="box">
    <h1>⚙️ CRM Table Setup</h1>

    <?php if (!$connected): ?>
        <div class="err-box">
            <strong>❌ Could not connect to database.</strong><br><br>
            <?= htmlspecialchars($connectError) ?><br><br>
            Check your <code>.env</code> file — DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD.
        </div>
    <?php else: ?>
        <p style="color:#7bb4dc;margin-top:0">Connected to <strong><?= htmlspecialchars($dbname) ?></strong> successfully.</p>

        <?php foreach ($results as $table => $r): ?>
            <div class="row <?= $r['ok'] ? 'ok' : 'err' ?>">
                <span class="label"><?= $table ?></span>
                <span><?= $r['msg'] ?></span>
            </div>
        <?php endforeach; ?>

        <?php $allOk = array_reduce($results, fn($c, $r) => $c && $r['ok'], true); ?>

        <?php if ($allOk): ?>
            <div class="next">
                ✅ <strong>All tables created successfully!</strong><br><br>
                You can now:<br>
                • <a href="/admin/customers">Open Customers</a><br>
                • <a href="/admin/follow-ups">Open Follow-Ups</a><br>
                • <a href="/admin/sales-reports">Open Sales Reports</a><br>
                • <a href="/admin/activity-log">Open Activity Log</a>
            </div>
            <div class="warn">
                ⚠️ <strong>Security:</strong> Please delete <code>public/setup-tables.php</code> after setup.
            </div>
        <?php else: ?>
            <div class="err-box" style="margin-top:16px">
                ⚠️ Some tables failed. Check the errors above and try again.
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
</body>
</html>
