<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workers_with_computers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Помилка з'єднання: " . $conn->connect_error);
}

$worker_id = $_GET['worker_id'];

$sql = "SELECT * FROM workers WHERE id = $worker_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  $name = $row["name"];
  $room_number = $row["room_number"];
  $department_number = $row["department_number"];
  $computer_id = $row["computer_id"];
} else {
  echo "Робітника не знайдено";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Редагування робітника</title>
</head>
<body>
  <h1>Редагування робітника</h1>
  <form action="process_edit_worker.php" method="POST">
    <input type="hidden" name="worker_id" value="<?php echo $_GET['worker_id']; ?>">

    <label for="title">Ініціали:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>

    <label for="publication_year">Номер кімнати:</label><br>
    <input type="number" id="room_number" name="room_number" value="<?php echo $room_number; ?>"><br><br>

    <label for="author_address">Номер відділу:</label><br>
    <input type="text" id="department_number" name="department_number"
      value="<?php echo $department_number; ?>"><br><br>

    <label for="publisher_address">Номер комп'ютера:</label><br>
    <input type="number" id="computer_id" name="computer_id" value="<?php echo $computer_id; ?>"><br><br>

    <input type="submit" value="Додати">
  </form>
</body>
</html>