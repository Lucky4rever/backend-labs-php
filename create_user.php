<?php
// Параметри підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";

// Створення з'єднання з сервером MySQL
$conn = new mysqli($servername, $username, $password);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

// SQL-запит для створення нового користувача з усіма привілеями
$query = "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' IDENTIFIED BY 'admin' WITH GRANT OPTION";

if ($conn->query($query) === TRUE) {
    echo "Новий користувач успішно створений з усіма привілеями";
} else {
    echo "Помилка при створенні користувача: " . $conn->error;
}

$conn->close();
