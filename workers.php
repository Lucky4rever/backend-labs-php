<!DOCTYPE html>
<html>
<head>
  <title>Таблиця робітників</title>
</head>
<body>
  <h1>Таблиця робітників</h1>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Created <a href="sorted_table.php?sort=created">▲</a></th>
      <th>Departament number</th>
      <th>Room number</th>
      <th>Computer ID</th>

      <th>Редагувати</th>
      <th>Видалити</th>
    </tr>
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

    // SQL-запит для отримання всіх книг
    $sql = "SELECT id, name, created, department_number, room_number, computer_id FROM workers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Виведення книг у вигляді таблиці
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["created"] . "</td>";
        echo "<td>" . $row["department_number"] . "</td>";
        echo "<td>" . $row["room_number"] . "</td>";
        echo "<td>" . $row["computer_id"] . "</td>";
        // Посилання на редагування книги з ідентифікатором $row["id"]
        echo "<td><a href='edit_worker.php?worker_id=" . $row["id"] . "'>Редагувати</a></td>";
        // Посилання на видалення книги з ідентифікатором $row["id"]
        echo "<td><a href='remove_worker.php?worker_id=" . $row["id"] . "'>Видалити</a></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>Немає робітників у базі даних</td></tr>";
    }
    $conn->close();
    ?>
  </table>
  <p><a href="index.php">Повернутися на головну сторінку</a></p>
</body>
</html>