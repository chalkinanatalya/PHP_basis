<a href="/">Главная</a>
<a href="/?controller=second">Вторая</a>

<?php if ($username === null) : ?>
    <a href="/?controller=security">Вход</a>
    <form method="post">
        <input type="text" name="username" placeholder="Введите ваше имя"/>
        <input type="submit" value="Отправить"/>
    </form>
<?php else : ?>
    <a href="/?controller=tasks">Задачи</a>
    <a href="/?controller=security&action=logout">Выход</a>
    <p>Рады вас приветствовать, <?= $username ?>. </p>
<?php endif ?><br>