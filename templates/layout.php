<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pagename; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="static/plugins/fontawesome-free/css/all.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="static/plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="static/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="static/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- custom kanban styles -->
    <link rel="stylesheet" href="static/css/kanban.css">

</head>
<?php if (empty($user)): ?>
    <!-- Відображення кнопки "Увійти" та "Зареєструватися" -->
    <a href="templates/login.php">Увійти</a> |
    <a href="register.php">Зареєструватися</a>
<?php else: ?>
    <!-- Відображення імені користувача, кнопки "Додати завдання" та "Вийти" -->
    Вітаємо, <?php echo htmlspecialchars($user['name']); ?>! |
    <a href="#">Додати завдання</a> |
    <a href="logout.php">Вийти</a>
    <?=$content; ?>
<?php endif; ?>

</html>
