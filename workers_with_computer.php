<?php
// З'єднання з сервером бази даних
$servername = "localhost";
$username = "root";
$password = "";
$database = "workers_with_computers";

// Підключення до сервера MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

// Отримання id комп'ютерів з параметрів запиту
if (isset($_GET['computer'])) {
    $computer_id = $_GET['computer'];

    // SQL-запит для вибірки книг, що належать до даної бібліотеки
    $sql = "SELECT * FROM workers WHERE computer_id = $computer_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Робітники, які мають доступ до комп'ютеру:</h2>";
        echo "<table border=\"1\"><tr><th>ID</th><th>Name</th><th>Room number</th><th>Department number</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["room_number"] . "</td><td>" . $row["department_number"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Немає результатів";
    }
} else {
    echo "Недостатньо даних";
}

$conn->close();
?>