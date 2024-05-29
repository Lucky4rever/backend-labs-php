<?php
if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
  $keyword = $_GET['keyword'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "workers_with_computers";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM workers WHERE name LIKE '%$keyword%'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<h2>Результати пошуку:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
      echo "<li>" . $row["name"] . "</li>";
    }
    echo "</ul>";
  } else {
    echo "Немає результатів для введеного ключового слова.";
  }

  $conn->close();
} else {
  echo "Введіть ключове слово для пошуку.";
}
