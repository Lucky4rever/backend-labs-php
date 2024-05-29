<!DOCTYPE html>
<html>
<head>
  <title>Додати робітника</title>
</head>
<body>
  <h1>Додати робітника</h1>
  <form action="process_add_worker.php" method="POST">
    <label for="title">Ініціали:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="publication_year">Номер кімнати:</label><br>
    <input type="number" id="room_number" name="room_number"><br><br>

    <label for="author_address">Номер відділу:</label><br>
    <input type="text" id="department_number" name="department_number"><br><br>

    <label for="publisher_address">Номер комп'ютера:</label><br>
    <input type="number" id="computer_id" name="computer_id"><br><br>

    <input type="submit" value="Додати">
  </form>
</body>
</html>