<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $birth_date = $_POST['birth_date'];
    $passport_series_number = $_POST['passport_series_number'];
    $contact_info = $_POST['contact_info'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    $sql = "INSERT INTO employees (full_name, birth_date, passport_series_number, contact_info, address, department, position, salary, hire_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$full_name, $birth_date, $passport_series_number, $contact_info, $address, $department, $position, $salary, $hire_date])) {
        header('Location: index.php');
        exit();
    } else {
        echo "Ошибка добавления сотрудника.";
    }
}
?>
