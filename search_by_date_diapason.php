<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workers_with_computers";
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получаем дату из GET-запроса
$search_date_start = $_GET['search_date_start'];
$search_date_end = $_GET['search_date_end'];

// Подготавливаем SQL-запрос для поиска книг по дате
$sql = "SELECT * FROM workers WHERE created >= '$search_date_start' AND created <= '$search_date_end'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Выводим найденные книги
    while ($row = $result->fetch_assoc()) {
        echo "Ініціали: " . $row["name"] . " - номер кімнати: " . $row["room_number"] . "<br>";
    }
} else {
    echo "Немає даних";
}
$conn->close();
