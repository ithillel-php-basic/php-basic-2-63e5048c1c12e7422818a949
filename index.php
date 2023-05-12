
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
        'title'=>'замовити піцу',
        'date_realisation'=>'04.06.2023',
        'category'=>'Домашні справи',
        'status'=>'to-do',
    ],
    [
        'title'=>'вивчити цейво',
        'date_realisation'=>'04.06.2023',
        'category'=>'Навчання',
        'status'=>'to-do',
    ],
    [
        'title'=>'погуляти',
        'date_realisation'=>'02.06.2023',
        'category'=>'Домашні справи',
        'status'=>'to-do',
    ],
    [
        'title'=>'погуляти',
        'date_realisation'=>'02.06.2023',
        'category'=>'Домашні справи',
        'status'=>'to-do',
    ],
    [
        'title'=>'написати сайт',
        'date_realisation'=>'01.02.2021',
        'category'=>'Робота',
        'status'=>'done',
    ],
    [
        'title'=>'пройти співбесіду',
        'date_realisation'=>'01.02.2015',
        'category'=>'Робота',
        'status'=>'backlog',
    ],
    [
        'title'=>'пройти співбесіду',
        'date_realisation'=>'01.02.2015',
        'category'=>'Робота',
        'status'=>'backlog',
    ],
    [
        'title'=>'знайти вхід',
        'date_realisation'=>'01.02.2011',
        'category'=>'Вхідні',
        'status'=>'backlog',
    ],
];

function countHome ($array,$category){
    $i = 0;
    foreach ($array as $ar){
        if($ar['category'] === $category){
            $i = $i + 1;
        }
    }
    return $i;
}

$kanban = renderTemplate('kanban.php',[
    'tasks'=>$tasks,
]);

$main = renderTemplate('main.php',[
    'kanban'=>$kanban,
    'tasks'=>$tasks,
    'username'=>'Volodymyr',
    'photopath'=>"static/img/user2-160x160.jpg",
    'categories'=>$categories,
]);

echo renderTemplate('layout.php',[
    'content'=>$main,
    'pagename'=>$pagename,
]);






