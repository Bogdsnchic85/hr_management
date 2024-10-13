<?php
// Подключение к Базе данных
include 'config.php'; //Файл конфигурации, который, содержит параметры подключения к базе данных
$sql = "SELECT * FROM employees";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кадровый учёт</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Кадровый учёт сотрудников</h1>
    <input type="text" id="search" placeholder="Поиск по ФИО" onkeyup="filterTable()">
    <button onclick="showAddEmployeeForm()">Добавить сотрудника</button>
    
    <table id="employeesTable">
        <thead>
            <tr>
                
                <th>ФИО</th>
                <th>Дата рождения</th>
                <th>Паспорт</th>
                <th>Контактная информация</th>
                <th>Адрес</th>
                <th>Отдел</th>
                <th>Должность</th>
                <th>Зарплата</th>
                <th>Дата принятия</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr data-id="<?= $employee['id'] ?>" class="<?= $employee['is_terminated'] ? 'terminated' : '' ?>">
                    <td><?= $employee['full_name'] ?></td>
                    <td><?= $employee['birth_date'] ?></td>
                    <td><?= $employee['passport_series_number'] ?></td>
                    <td><?= $employee['contact_info'] ?></td>
                    <td><?= $employee['address'] ?></td>
                    <td><?= $employee['department'] ?></td>
                    <td><?= $employee['position'] ?></td>
                    <td><?= $employee['salary'] ?></td>
                    <td><?= $employee['hire_date'] ?></td>
                    <td><?= $employee['is_terminated'] ? 'Уволен' : 'Работает' ?></td>
                    <td>
                        <?php if (!$employee['is_terminated']): ?>
                            <button onclick="editEmployee(<?= $employee['id'] ?>)">Редактировать</button>
                            <button onclick="terminateEmployee(<?= $employee['id'] ?>)">Уволить</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="addEmployeeForm" style="display: none;">
        <h2>Добавить нового сотрудника</h2>
        <form id="form" action="add_employee.php" method="POST">
            <input type="text" name="full_name" placeholder="ФИО" required>
            <input type="date" name="birth_date" required>
            <input type="text" name="passport_series_number" placeholder="Паспорт" required>
            <input type="text" name="contact_info" placeholder="Контактная информация" required>
            <input type="text" name="address" placeholder="Адрес" required>
            <input type="text" name="department" placeholder="Отдел" required>
            <input type="text" name="position" placeholder="Должность" required>
            <input type="number" name="salary" placeholder="Зарплата" required>
            <input type="date" name="hire_date" required>
            <button type="submit">Сохранить</button>
            <button type="button" onclick="hideAddEmployeeForm()">Отмена</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>