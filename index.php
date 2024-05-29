<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS workers_with_computers";

if ($conn->query($sql) === TRUE) {
    echo "База даних успішно створена або вже існує<br>";

    $conn->select_db("workers_with_computers");

    $create_table_sql = "CREATE TABLE IF NOT EXISTS Computers
    (
        id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        name VARCHAR(100) NOT NULL,
        OS VARCHAR(20) NOT NULL,
        worker_id INT NOT NULL
    )";

    if ($conn->query($create_table_sql) === TRUE) {
        echo "Таблиця 'Computers' успішно створена або вже існує";

    } else {
        echo "Помилка створення таблиці: " . $conn->error;
    }

} else {
    echo "Помилка створення бази даних: " . $conn->error;
}

$sql = "SELECT * FROM Computers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=\"1\"><tr><th>ID</th><th>Name</th><th>Actions</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td><a href='workers_with_computer.php?computer=" . $row["id"] . "'>Переглянути робітників із комп'ютерами</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 результатів";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Головна сторінка</title>
</head>
<body>
    <h1>Головна сторінка</h1>
    <p><a href="workers.php">Переглянути таблицю робітників</a></p> <!-- done -->
    <p><a href="add_worker.php">Додати нового робітника</a></p> <!-- done -->
    <p><a href="workers_info.php">Інформація про таблиці</a></p> <!-- done -->
    <p><a href="keyword.php">Пошук за ключовим словом</a></p> <!-- done -->
    <p><a href="datesearch.php">Пошук по даті</a></p> <!-- done -->
</body>
</html>