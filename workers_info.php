<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workers_with_computers";

// З'єднання з базою даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
  die("Помилка з'єднання: " . $conn->connect_error);
}

$sql_workers = "SELECT COUNT(*) AS total_workers FROM workers";
$result_workers = $conn->query($sql_workers);

$sql_computers = "SELECT COUNT(*) AS total_computers FROM computers";
$result_computers = $conn->query($sql_computers);

$sql_workers_per_last_month = "SELECT COUNT(*) AS total_workers_last_month
                               FROM workers
                               WHERE created >= NOW() - INTERVAL 1 MONTH";
$result_workers_per_last_month = $conn->query($sql_workers_per_last_month);

$sql_computers_per_last_month = "SELECT COUNT(*) AS total_computers_last_month
                                 FROM computers
                                 WHERE created >= NOW() - INTERVAL 1 MONTH";
$result_computers_per_last_month = $conn->query($sql_computers_per_last_month);

$sql_last_worker = "SELECT name FROM workers ORDER BY id DESC LIMIT 1";
$result_last_worker = $conn->query($sql_last_worker);

$sql_max_workers_per_machine = "SELECT computers.name AS computer_name, COUNT(workers.id) AS total_workers 
                       FROM workers INNER JOIN computers ON workers.computer_id = computers.id 
                       GROUP BY workers.computer_id 
                       ORDER BY total_workers DESC LIMIT 1";
$result_max_workers_per_machine = $conn->query($sql_max_workers_per_machine);

// Обробка результатів запитів
if ($result_workers->num_rows > 0) {
  $row_workers = $result_workers->fetch_assoc();
  $total_workers = $row_workers["total_workers"];
} else {
  $total_workers = 0;
}

if ($result_computers->num_rows > 0) {
  $row_computers = $result_computers->fetch_assoc();
  $total_computers = $row_computers["total_computers"];
} else {
  $total_computers = 0;
}

if ($result_workers_per_last_month->num_rows > 0) {
  $row_workers_per_last_month = $result_workers_per_last_month->fetch_assoc();
  $total_workers_per_last_month = $row_workers_per_last_month["total_workers_last_month"];
} else {
  $total_workers_per_last_month = 0;
}

if ($result_computers_per_last_month->num_rows > 0) {
  $row_computers_per_last_month = $result_computers_per_last_month->fetch_assoc();
  $total_computers_per_last_month = $row_computers_per_last_month["total_computers_last_month"];
} else {
  $total_computers_per_last_month = 0;
}

if ($result_last_worker->num_rows > 0) {
  $row_last_worker = $result_last_worker->fetch_assoc();
  $last_worker_name = $row_last_worker["name"];
} else {
  $last_worker_name = "Немає даних";
}

if ($result_max_workers_per_machine->num_rows > 0) {
  $row_max_workers_per_machine = $result_max_workers_per_machine->fetch_assoc();
  $nameof_computer_with_max_workers = $row_max_workers_per_machine["computer_name"];
} else {
  $nameof_computer_with_max_workers = "Немає даних";
}

// Закриття з'єднання
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Статистика</title>
</head>
<body>
  <h1>Статистика</h1>
  <p>Загальна кількість робітників, доданих за весь час: <?php echo $total_workers; ?></p>
  <p>Загальна кількість комп'ютерів, доданих за останній місяць: <?php echo $total_computers; ?></p>
  <p>Загальна кількість робітників, доданих за останній місяць: <?php echo $total_workers_per_last_month; ?></p>
  <p>Загальна кількість комп'ютерів, доданих за весь час: <?php echo $total_computers_per_last_month; ?></p>
  <p>Остання додана книга: <?php echo $last_worker_name; ?></p>
  <p>Книжковий магазин з найбільшою кількістю книг: <?php echo $nameof_computer_with_max_workers; ?></p>
</body>
</html>