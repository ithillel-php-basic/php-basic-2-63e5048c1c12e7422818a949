<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Завдання та проекти</h3>
            <nav class="nav nav-masthead justify-content-center">
                <?php if (empty($user)): ?>
                    <!-- Відображення кнопки "Увійти" та "Зареєструватися" -->
                    <a href="auth.php">Увійти</a> |
                    <a href="register.php">Зареєструватися</a>
                <?php else: ?>
                    <!-- Відображення імені користувача, кнопки "Додати завдання" та "Вийти" -->
                    Вітаємо, <?php echo htmlspecialchars($user['name']); ?>! |
                    <a href="tasks.php">Додати завдання</a> |
                    <a href="logout.php">Вийти</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Завдання та проекти</h1>
        <p class="lead">"Завдання та проекти" - це веб додаток для зручного
            ведення списку справ. Сервіс допомагає користувачам не забувати про
            майбутні важливі події та завдання.</p>
        <p class="lead">Після створення облікового запису, користувач може почати
            вносити свої справи, розподіляючи їх за проєктами і вказуючи терміни.</p>
        <p class="lead">
            <a href="#" class="btn btn-lg btn-secondary">Зареєструватися</a>
        </p>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <strong>Copyright &copy; 2023 <a href="https://ithillel.ua/">Комп'ютерна школа Hillel</a>.</strong> All rights
            reserved.
        </div>
    </footer>
</div>

<!-- jQuery -->
<script src="static/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="static/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap -->
<script src="static/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ekko Lightbox -->
<script src="static/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- overlayScrollbars -->
<script src="static/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="static/js/adminlte.min.js"></script>
<!-- Filterizr-->
<script src="static/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $('.cover-container').css('min-height', $(window).height());
    })
</script>
</body>