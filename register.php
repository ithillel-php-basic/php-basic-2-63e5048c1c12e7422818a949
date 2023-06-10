<?php
require_once "helpers.php";
require_once "db_connect.php";
$pagename = 'Завдання';
// Перевірка, чи були надіслані дані форми
$name = '';
$email = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $name = $_POST["name"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $registration_date = date("Y-m-d"); // Отримуємо сьогоднішню дату
    $email = $_POST["email"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Підключення до бази даних
    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "todolist";
    if (isset($password) and isset($password2) and $password != $password2 ) {
        echo '<b>паролі не збігаються.</b>' . PHP_EOL . '<b>спробуйте ще раз</b>';
        unset($password);
        unset($password2);
    }elseif (isset($password) and mb_strlen($password) < 4) {
        echo '<b>пароль занадто короткий, треба мінімум 4 символи.</b>' . PHP_EOL . '<b>спробуйте ще раз</b>';
        unset($email);
    } elseif (isset($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo '<b>введіть валідний емайл.</b>' . PHP_EOL . '<b>спробуйте ще раз</b>';
    unset($email);
} else {
        $conn = getConnection($host, $db_username, $db_password, $database);
        // Перевірка наявності емейла в базі даних
        $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($checkEmailQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Користувач з таким емейлом вже існує!";
        } else {

            // Виконання запиту для збереження даних
            $insertQuery = "INSERT INTO users (registration_date, email, name, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("ssss", $registration_date, $email, $name, $hashed_password);

            if ($stmt->execute()) {
                echo "Ви успішно зареєструвалися!";
            } else {
                echo "Помилка: " . $stmt->error;
            }
        }
    }
}


$content = @renderTemplate('register.php', [
        'username' => $name,
        'email' => $email,
    ]);


    echo renderTemplate('layout.php', [
        'content' => $content,
        'pagename' => $pagename,
    ]);

