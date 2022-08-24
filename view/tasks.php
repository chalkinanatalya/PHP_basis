
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список задач</title>
</head>

<h2>Ваши задачи</h2>
<form method="post" action="">
    <input type="text" name="description" placeholder="Добавьте задачу">
    <button type="submit" value="add">Добавить</button>
</form><br>
<?php if (isset($tasks)): ?>
    <?php foreach ($tasks->getUndoneList() as $key => $task): ?>
        * <?=$task->getDescription()?>  <a href="?action=delete&key=<?=$key?>">[X]</a> <br>
    <?php endforeach; ?>
<?php else: ?>
    Нет задач
<?php endif; ?>

</body>