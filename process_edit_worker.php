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
$worker_id = $_POST['worker_id'];
$name = $_POST['name'];
$room_number = $_POST['room_number'];
$department_number = $_POST['department_number'];
$computer_id = $_POST['computer_id'];

// SQL-запит для оновлення книги в базі даних
$sql = "UPDATE workers SET name='$name', room_number='$room_number', department_number='$department_number', computer_id='$computer_id' WHERE id=$worker_id";

if ($conn->query($sql) === TRUE) {
  echo "Робітника успішно відредаговано<br>";
  echo "<a href='index.php'>Повернутися на головну сторінку</a>"; // Посилання на головну сторінку
} else {
  echo "Помилка: " . $conn->error;
}

$conn->close();
