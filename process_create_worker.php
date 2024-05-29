<?php
// З'єднання з сервером бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workers_with_computers";

// Підключення до сервера MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
  die("Помилка з'єднання: " . $conn->connect_error);
}

// Отримання даних з форми
$name = $_POST['name'];
$room_number = $_POST['room_number'];
$department_number = $_POST['department_number'];
$computer_id = $_POST['computer_id'];

// SQL-запит для додавання нового робітника
$sql = "INSERT INTO workers (name, room_number, department_number, computer_id)
        VALUES ('$name', '$room_number', '$department_number', '$computer_id')";

if ($conn->query($sql) === TRUE) {
  echo "Робітника створено успішно<br>";
  echo "<a href='index.php'>Повернутися на головну сторінку</a>"; // Посилання на головну сторінку
} else {
  echo "Помилка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
