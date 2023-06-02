<?php

include "helpers.php";
include 'db_connect.php';

// Параметри підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";

$pagename = 'Завдання';
$conn = getConnection ($servername, $username, $password, $dbname);
$categories = getCategories($conn,1);
$tasks = getTasks($conn,1);

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


$kanban = renderTemplate('kanban.php', [
    'tasks' => $tasks,
]);

$main = renderTemplate('main.php', [
    'kanban' => $kanban,
    'tasks' => $tasks,
    'username' => 'Volodymyr',
    'photopath' => "static/img/user2-160x160.jpg",
    'categories' => $categories,
]);

echo renderTemplate('layout.php', [
    'content' => $main,
    'pagename' => $pagename,
]);






