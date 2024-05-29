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
