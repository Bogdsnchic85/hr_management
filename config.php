<?php
$host = 'localhost';
$db = 'employee_management';
$user = 'root'; // по умолчанию
$pass = ''; // по умолчанию пусто

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
?>