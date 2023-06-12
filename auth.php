<?php
require_once "helpers.php";
require_once "db_connect.php";

echo 'test';
// Перевірка, чи були надіслані дані форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo 'підключено до ДБ';
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
    $query = "SELECT * FROM users WHERE email = $email";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();



    if ($result->num_rows === 1) {
        // Знайдено користувача з введеним емейлом
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];

        // Перевірка пароля
        if (password_verify($password, $hashed_password)) {
            // Пароль збігається, аутентифікація успішна
            session_start();
            $_SESSION['user'] = $user;
            echo 'Ви увійшли'.PHP_EOL;
            echo "<a href = 'index.php'>На головну</a>";
            exit;
        }
    }

    // Неправильний емейл або пароль
    $error_message = "Неправильний емейл або пароль";
}

$content = renderTemplate('auth.php', [
    'error_message' => $error_message ?? 'інша помилка',
]);

echo renderTemplate('layout.php', [
    'content' => $content,
    'user' => $user ?? null,
]);
