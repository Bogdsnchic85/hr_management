<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE employees SET is_terminated = 1 WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$id])) {
        header('Location: index.php');
        exit();
    } else {
        echo "Ошибка увольнения сотрудника.";
    }
}
?>
