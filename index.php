<?php

include "helpers.php";


$pagename = 'Завдання';

$categories = [
    "Вхідні",
    "Навчання",
    "Робота",
    "Домашні справи",
    "Авто",
];

$tasks = [
    [
        'title' => 'замовити піцу',
        'date_realisation' => '13.05.2023',
        'category' => 'Домашні справи',
        'status' => 'to-do',
    ],
    [
        'title' => 'вивчити цейво',
        'date_realisation' => '14.05.2023',
        'category' => 'Навчання',
        'status' => 'to-do',
    ],
    [
        'title' => 'нагодувати кота',
        'date_realisation' => '15.05.2023',
        'category' => 'Домашні справи',
        'status' => 'to-do',
    ],
    [
        'title' => 'погладити кота',
        'date_realisation' => '15.05.2023',
        'category' => 'Домашні справи',
        'status' => 'to-do',
    ],
    [
        'title' => 'погуляти',
        'date_realisation' => '02.06.2023',
        'category' => 'Домашні справи',
        'status' => 'to-do',
    ],
    [
        'title' => 'написати сайт',
        'date_realisation' => '01.06.2023',
        'category' => 'Робота',
        'status' => 'in-progress',
    ],
    [
        'title' => 'пограти в козаки 3',
        'date_realisation' => '01.07.2022',
        'category' => 'Робота',
        'status' => 'done',
    ],
    [
        'title' => 'пройти співбесіду',
        'date_realisation' => '01.08.2023',
        'category' => 'Робота',
        'status' => 'backlog',
    ],
    [
        'title' => 'знайти вхід',
        'date_realisation' => null,
        'category' => 'Вхідні',
        'status' => 'backlog',
    ],
    [
        'title' => 'винести сміття',
        'date_realisation' => '01.01.2023',
        'category' => 'Вхідні',
        'status' => 'done',
    ],
    [
        'title' => 'помити посуд',
        'date_realisation' => '01.09.2023',
        'category' => 'Вхідні',
        'status' => 'in-progress',
    ],
];

function countHome($array, $category)
{
    $i = 0;
    foreach ($array as $ar) {
        if ($ar['category'] === $category) {
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






