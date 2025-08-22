<?php
// إعدادات قاعدة البيانات
define('DB_HOST', 'localhost');
define('DB_NAME', 'customs_clearance');
define('DB_USER', 'root');
define('DB_PASS', '');

// إعدادات الموقع
define('SITE_NAME', 'شركة التخليص الجمركي');
define('SITE_URL', 'http://localhost/customs');
define('SITE_EMAIL', 'info@customsclearance.com');
define('SITE_PHONE', '+20 10 1234 5678');
define('SITE_WHATSAPP', '+201234567890');

// إعدادات أخرى
define('UPLOAD_DIR', 'uploads/');
define('MAX_FILE_SIZE', 20 * 1024 * 1024); // 20MB

// إنشاء اتصال قاعدة البيانات
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", 
        DB_USER, 
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ]
    );
} catch(PDOException $e) {
    // في حالة فشل الاتصال، نعرض رسالة خطأ بسيطة
    error_log("Database connection failed: " . $e->getMessage());
    $pdo = null;
}

// تفعيل عرض الأخطاء للتطوير (إزالة في الإنتاج)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
