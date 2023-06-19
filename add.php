<?php

require_once 'helpers.php';
require_once 'db_connect.php';
require_once 'env.php';

$conn = getConnection ($servername, $username, $password, $dbname);
$categories = getCategories($conn,15);

$add = renderTemplate('add.php', [
    'categories' => $categories,
]);

echo renderTemplate('layout.php', [
'content' => $add,
    'pagename' => 'Завдання',
]);