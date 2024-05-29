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

// Отримання ідентифікатора книги з URL
$worker_id = $_GET['worker_id'];

// SQL-запит для видалення книги з бази даних за ідентифікатором
$sql = "DELETE FROM workers WHERE id = $worker_id";

if ($conn->query($sql) === TRUE) {
  echo "Робітника успішно видалено<br>";
  echo "<a href='index.php'>Повернутися на головну сторінку</a>";
} else {
  echo "Помилка: " . $conn->error;
}

$conn->close();
