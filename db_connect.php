<?php

// Створення з'єднання з базою даних
function getConnection ($servername, $username, $password, $dbname){
    $conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення до бази даних
    if ($conn->connect_error) {
        die("Помилка підключення до бази даних: " . $conn->connect_error);
    }
    return $conn;
}

// SQL-запит для отримання списку проєктів поточного користувача
function getCategories ($conn, $author_id){
    $userProjectsQuery = "SELECT * FROM categories WHERE author_id = $author_id";
    $categories = $conn->query($userProjectsQuery);


// Перевірка результату запиту
    if ($categories->num_rows > 0) {
        // Вивід списку проєктів
        while ($row = $categories->fetch_assoc()) {

            return $categories;
        }
    }else{
        return [];
    }
}



function getTasks ($conn, $author_id){
// SQL-запит для отримання списку завдань поточного користувача
    $userTasksQuery = "SELECT * FROM tasks WHERE author_id = $author_id";
    $tasks = $conn->query($userTasksQuery);

// Перевірка результату запиту
    if ($tasks->num_rows > 0) {
        // Вивід списку завдань
        while ($row = $tasks->fetch_assoc()) {


            return $tasks;
        }
    } else{
        return [];
    }
}



