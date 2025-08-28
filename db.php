<?php
$host = 'localhost';
$db   = 'hyakuninnissyunanki';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ DB接続成功";
} catch (PDOException $e) {
    echo "❌ DB接続失敗: " . $e->getMessage();
}
?>
