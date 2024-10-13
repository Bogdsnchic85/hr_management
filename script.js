// Отображение формы добавления сотрудника
function showAddEmployeeForm() {
    document.getElementById('addEmployeeForm').style.display = 'block';
}

// Скрытие формы добавления сотрудника
function hideAddEmployeeForm() {
    document.getElementById('addEmployeeForm').style.display = 'none';
}

// Фильтрация таблицы сотрудников по имени
function filterTable() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const tableRows = document.querySelectorAll('#employeesTable tbody tr');

    // Проходим по каждой строке таблицы
    tableRows.forEach(row => {
        // Получаем полное имя сотрудника из первой ячейки строки и переводим в нижний регистр
        const fullName = row.cells[0].textContent.toLowerCase();
        
        // Проверяем, содержит ли полное имя искомое значение
        if (fullName.includes(searchInput)) {
            // Если да, показываем строку
            row.style.display = ''; 
        } else {
            // Если нет, скрываем строку
            row.style.display = 'none'; 
        }
    });
}

// Редактирование информации о сотруднике
function editEmployee(id) {
    alert("Редактировать сотрудника с ID: " + id);
}

//Увольнение сотрудника
function terminateEmployee(id) {
    // Запрашиваем подтверждение у пользователя
    if (confirm("Вы уверены, что хотите уволить сотрудника?")) {
        // Если пользователь подтвердил, перенаправляем на страницу увольнения сотрудника
        window.location.href = `terminate_employee.php?id=${id}`;
    }
}





