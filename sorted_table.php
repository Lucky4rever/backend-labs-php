<!DOCTYPE html>
<html>
<head>
    <title>Відсортована таблиця</title>
</head>
<body>
    <h1>Відсортована таблиця</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created <a href="sorted_table.php?sort=created">▲</a></th>
            <th>Departament number</th>
            <th>Room number</th>
            <th>Computer ID</th>
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

        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';

        $sql = "SELECT * FROM workers ORDER BY $sort";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["created"] . "</td>";
                echo "<td>" . $row["department_number"] . "</td>";
                echo "<td>" . $row["room_number"] . "</td>";
                echo "<td>" . $row["computer_id"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Немає даних</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>