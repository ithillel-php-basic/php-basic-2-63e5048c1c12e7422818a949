<?php
require_once "helpers.php";
require_once "db_connect.php";

$pagename = 'Завдання';


// Перевірка, чи користувач залогінений
session_start();
$user = $_SESSION['user'] ?? null;

if ($user) {
    // Користувач залогінений, отримуємо його завдання та проекти
    $user_id = $user['id'];

    // Запит для отримання завдань поточного користувача
    $query = "SELECT * FROM tasks WHERE user_id = $user_id";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $tasks = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    // Запит для отримання проектів поточного користувача
    $query = "SELECT * FROM projects WHERE user_id = $user_id";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $projects = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

$kanban = renderTemplate('kanban.php', [
    'tasks' => $tasks ?? [],
]);

$main = renderTemplate('main.php', [
    'kanban' => $kanban,
    'tasks' => $tasks ?? [],
    'username' => $user ? htmlspecialchars($user['name']) : 'Volodymyr',
    'photopath' => $user ? $user['photopath'] : 'static/img/user2-160x160.jpg',
    'categories' => $categories ?? [],
]);

echo renderTemplate('layout.php', [
    'content' => $main,
    'pagename' => $pagename,
    'user' => $user,
]);

function countHome($array, $category)
{
    $i = 0;
    foreach ($array as $ar) {
        if ($ar['category_id'] === $category) {
            $i = $i + 1;
        }
    }
    return $i;
}

function showTime($dateRealisation)
{
    if (!is_null($dateRealisation)) {
        $currentHours = floor(time() / 3600);
        $timeLeft = floor(strtotime($dateRealisation) / 3600) - $currentHours;
        if ($timeLeft > 24) {
            $timeLeft = floor($timeLeft / 24);
            return $timeLeft . ' днів';
        }
        return $timeLeft . ' годин';
    }
}




