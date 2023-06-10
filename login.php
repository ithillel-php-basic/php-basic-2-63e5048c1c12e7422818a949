<?php
require_once "helpers.php";
require_once "db_connect.php";
$pagename = 'Завдання';

// Перевірка, чи були надіслані дані форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Підключення до бази даних
    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "todolist";

    $conn = getConnection($host, $db_username, $db_password, $database);

    // Перевірка наявності користувача з введеним емейлом в базі даних
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        // Знайдено користувача з введеним емейлом
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];

        // Перевірка пароля
        if (password_verify($password, $hashed_password)) {
            // Пароль збігається, вхід успішний
            echo "Вхід успішний!";
            echo PHP_EOL;
            // Тут можна виконати додаткові дії після успішного входу, наприклад, перенаправлення на іншу сторінку
            echo "<a href = 'index.php'>на головну:</a>";

        } else {
            echo "Неправильний пароль!";
        }
    } else {
        echo "Користувача з таким емейлом не знайдено!";
    }
}

$content = @renderTemplate('login.php', [
    'email' => $email,
]);

echo renderTemplate('layout.php', [
    'content' => $content,
    'pagename' => $pagename,
]);
