<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
<h1><?= $pageHeader ?></h1>

<?php if (is_null($username)): ?>
    <a href="/?controller=security&action=login">Войти</a>
    <a href="/?controller=security&action=signup">Регистрация</a>
<?php else: ?>
    <?=$username?> <a href="/?controller=security&action=logout">Выйти</a>
    <a href="/?controller=tasks">Задачи</a>

<?php endif; ?>
</body>