<!DOCTYPE html>
<html>
<head>
    <title>Пошук за датою</title>
</head>
<body>
    <h1>Пошук за датою</h1>
    <form action="search_by_date.php" method="GET">
        <label for="search_date">Введіть дату:</label>
        <input type="date" id="search_date" name="search_date">
        <br />
        <button type="submit">Пошук</button>
    </form>
    <h1>Пошук за діапазоном дати</h1>
    <form action="search_by_date_diapason.php" method="GET">
        <label for="search_date_start">Введіть дату початку:</label>
        <input type="date" id="search_date_start" name="search_date_start">
        <br />
        <label for="search_date_end">Введіть дату кінця:</label>
        <input type="date" id="search_date_end" name="search_date_end">
        <br />
        <button type="submit">Пошук</button>
    </form>
</body>
</html>